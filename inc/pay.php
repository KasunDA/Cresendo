<?php

if (isset($_GET['save'])){

    $id=$_GET['id'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $class = $_GET['class'];
    $split_class=explode(" ",$class);
    $instrument= $split_class[0];
    $year= $split_class[4];
    $term= $split_class[6];
    $Class_id=$split_class[8];
    $type=$split_class[9];


    $query1=mysqli_query($con,"SELECT COUNT(Fee_id) as number FROM fee WHERE Student_id='$id' AND Class_id='$Class_id' AND Year='$year' AND Term='$term'");
    $result=mysqli_fetch_assoc($query1);
    $paid=$result['number'];

    if($paid==1){
        $amount="You have already paid for the class";
    }else{
        $stmt=$con->prepare("select FirstName,LastName from person where ID=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows===1){
            $row=$result->fetch_assoc();
            if(strcasecmp(trim($row["FirstName"]),trim($fname))==0 && strcasecmp(trim($row["LastName"]),trim($lname))==0){
                if(strcasecmp(trim($type),"Group")==0){
                    $query = mysqli_query($con, "select Charge from charges where Class_Type='G' and UType='S'");
                    if (!$query) {
                        die("database query failed." . mysqli_error($con));
                    }
                    $result = $query->fetch_array();
                    $amount=$result["Charge"];
                }else{
                    $query = mysqli_query($con, "select Charge from charges where Class_Type='I' and UType='S'");
                    if (!$query) {
                        die("database query failed." . mysqli_error($con));
                    }
                    $result = $query->fetch_array();
                    $amount=$result["Charge"];

                }


            }else{
                echo"<script>alert('Name not matching with ID')</script>";
            }

        }
    }





}
?>