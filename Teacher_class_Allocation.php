<?php
include "connect.php";
$con = connect();
?>


    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Allocations</title>

        <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />


        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-ui.js"></script>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

        <script type="text/javascript">
            $(function() {

                //autocomplete
                $(".auto1").autocomplete({
                    source: "search_teacher.php",
                    minLength: 1
                });

            });
        </script>
    </head>
    <header>
        <h1>CRESCENDO MUSIC ACADEMY</h1>

    </header>

    <body>
    <div class="main-content">


        <form class="form-basic"  method="post" action="#">

            <div class="form-title-row">
                <h1>Class Allocation</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Teacher Name :</span>
                    <input type="text" name="name1" class="auto1" required >
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>ClassType:</span>
                    <select name="type" value="Group" required>
                        <option>Group</option>
                        <option>Individual</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>TimeSlot:</span>
                    <select name="time" value="Slot 2" required>
                        <option>Slot 1</option>
                        <option>Slot 2</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Term:</span>
                    <select name="term" value="Term 2" required>
                        <option>Term 1</option>
                        <option>Term 2</option>
                    </select>
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>Day:</span>
                    <select name="day" value="Monday" required>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="submit">Allocate</button>
            </div>

        </form>
    </div>

    </body>

<?php
if(isset($_POST['submit'])) {

    $name1 = $_POST['name1'];
    $type = $_POST['type'];
    $time = $_POST['time'];
    $term = $_POST['term'];
    $day = $_POST['day'];
    $id=substr($name1,strrpos($name1," ")+1);

    $date_array=["Monday"=>"MO", "Tuesday"=>"TU","Wednesday"=>"WE","Thursday"=>"TH","Friday"=>"FR" ];
    $term_array=["Term 1"=>"1","Term 2"=>"2"];
    $time_start_array=["Slot 1"=>2,"Slot 2"=>4];
    $time_end_array=["Slot 1"=>4,"Slot 2"=>6];
    $class_type_array=["Group"=>"G","Individual"=>"I"];

    $type=$class_type_array[$type];
    $start=$time_start_array[$time];
    $end=$time_end_array[$time];
    $term=$term_array[$term];
    $date=$date_array[$day];

    $date=mysqli_real_escape_string($con,$date);
    $start=mysqli_real_escape_string($con,$start);
    $ens=mysqli_real_escape_string($con,$end);

    $today=new DateTime('now');
    $year=(int)date('Y');

    $stmt = "SELECT * FROM time_slot WHERE Date='$date' and Start_time='$start' and End_time='$end'";
    $result=mysqli_query($con,$stmt);
    $num=mysqli_num_rows($result);




    if ($num>0){
        $row=mysqli_fetch_array($result);
        $Time_slot_id=$row['Time_slot_id'];
        $stmt="SELECT * FROM class WHERE Time_slot_id = '$Time_slot_id' and Term ='$term' and Year='$year'and Class_Type='$type'";
        $result=mysqli_query($con,$stmt);
        $rooms=array();
        while ($row=mysqli_fetch_array($result)){
            # echo $row['Class_room_id'];
            $rooms[]=$row['Class_room_id'];
        }
        $stmt="SELECT Class_room_id FROM  Class_room ";
        $result=mysqli_query($con,$stmt);
        $result=mysqli_query($con,$stmt);
        $class_available=false;
        $new_class_room;

        #check the availability of the class rooms
        while ($row=mysqli_fetch_array($result)){
            $row['Class_room_id']." ";
            if(! in_array($row['Class_room_id'],$rooms)){
                $new_class_room=$row['Class_room_id'];
                $class_available=true;
                break;

            }

        }
        #if class available add to the new class list
        if ($class_available){
            echo"<script>alert('Class can be Allocated')</script>";


            #check whether same teacher doesn't teach in a class on the same slot;

            $msg='Your Class location will be  '.$new_class_room;
            echo'<script>alert(" '.$msg.'");</script>';

            #insert new class details to the database

            $stmt = $con->prepare("INSERT INTO class (Class_id, Instrument_id, Term, Year, Class_Type, Time_slot_id, Class_room_id,Charge) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $class_id, $instrument_id, $term,$year,$type,$Time_slot_id,$new_class_room,$charge);

            #get the instrument of the teacher

            $stmt1="SELECT Instrument FROM person WHERE ID='$id'";
            $result1=mysqli_query($con,$stmt1);
            while ($row=mysqli_fetch_array($result1)){
                $instrument_id=$row['Instrument'];

            }
            echo $instrument_id." ";


            #get the charge for the class
            $stmt2="SELECT Charge from charges WHERE Class_Type='$type' and UType='S'";
            $result2=mysqli_query($con,$stmt2);
            while ($row=mysqli_fetch_array($result2)){
                $charge=$row['Charge'];
            }
            echo $charge." ";

            $result3=mysqli_query($con,"SELECT COUNT(Class_id) as total FROM class WHERE Instrument_id='$instrument_id'");
            $data=mysqli_fetch_assoc($result3);
            echo $data['total'];
            $class_id=$data['total']+1;

            #insert the values in to the class details.
            $stmt->execute();

            #insert the data in to the the conduct table

            $stmt3=$con->prepare("INSERT INTO conduct (Teacher_id, Instrument_id, Class_id, Term, Year) VALUES ( ?, ?, ?, ?, ?)");
            $stmt3->bind_param("sssss", $id, $instrument_id,$class_id, $term,$year);
            $stmt3->execute();















        }else{
            echo"<script>alert('Sorry ! Class cannot be Allocated')</script>";
        }





    }
    else{
        echo"<script>alert('Invalid time slot!')</script>";
        exit();
    }




}
?>