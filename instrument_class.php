<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view class" content="width=device-width, initial-scale=1">

    <title>Class Details</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/instrument_class.css">

    <?php

    $con= mysqli_connect("localhost","root","","db_group");
    if(mysqli_connect_errno()){
        echo"<script>alert('Error Connecting to Database!')</script>";
        exit();
    }
    ?>
    <?php

    if(isset($_GET['View_Class'])) {
        $Year=$_GET['Year'];
        $Term=$_GET['Term'];
        $Instrument=$_GET['instrument'];
        session_start();
        $_SESSION['instrument']=$Instrument;
        $_SESSION['Year']=$Year;
        $_SESSION['Term']=$Term;

        $stmt=$con->prepare("SELECT Class_id FROM class WHERE Year=? AND Term=? AND Instrument_id in(select Instrument_id from instrument WHERE Title=?)");
        $stmt->bind_param("sss",$Year,$Term,$Instrument);
        $stmt->execute();
        $result=$stmt->get_result();
        $classes=array();
        while($row = $result->fetch_assoc()) {
            $classes[] = $row['Class_id'];
        }
        $_SESSION['class']=$classes;
        if(sizeof($classes)==0){
            echo "<script>alert('Invalid Class')</script>";

        }
        else{
            echo "<script>window.open('view_class.php','_self') </script>";
            #header("view_class.php");die;
        }







    }


    ?>
</head>
</html>