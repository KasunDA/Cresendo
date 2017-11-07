<?php
include "connect.php";
$con = connect();
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

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
                source: "search_student.php",
                minLength: 1
            });

        });
    </script>


    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "search_class.php",
                minLength: 3
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
            <h1>Class Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>Student Name </span>
                <input type="text" name="name1" class="auto1" required placeholder="Enter Student Name">
            </label>
        </div>



        <div class="form-row">
            <label>
                <span>Class details</span>
                <input type="text" name="class" class="auto2" required placeholder="Enter Instrument Name" >
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="submit">Register</button>
        </div>


    </form>


</body>

<?php
if(isset($_POST['submit'])) {

    $name1 = $_POST['name1'];
    $class = $_POST['class'];

    #get the student id
    $id=substr($name1,strrpos($name1," ")+1);

    $split_class=explode(" ",$class);

    $instrument= $split_class[0];
    $stmt=$con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
    $stmt->bind_param("s",$instrument);
    $stmt->execute();
    $stmt->bind_result($Instrument_id);
    $stmt->fetch();
    $stmt->close();

    #get the details of the class.

    $year= $split_class[4];
    $term= $split_class[6];
    $Class_id=$split_class[8];


    $stmt1=$con->prepare("INSERT INTO participate(Student_id,Instrument_id,Class_id,Year,Term) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssss", $id, $Instrument_id, $Class_id, $year, $term);
    $stmt1->execute();


}


?>



