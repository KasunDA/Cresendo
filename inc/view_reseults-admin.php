<?php
include "connect.php";
#$con=connect();

function operationResults(){

    $con=connect();

if(isset($_GET['submit'])) {

    $class1 = $_GET['class1'];
    $ETitle = $_GET['ETitle'];
    $split_class = explode(" ", $class1);

    $instrument = $split_class[0];
    $year1 = $split_class[4];
    $term1 = $split_class[6];
    $class_id1 = $split_class[8];
    $type1 = $split_class[9];

    $stmt1 = $con->prepare('select Instrument_id from instrument where Title=?');
    $stmt1->bind_param("s", $instrument);
    $stmt1->execute();
    $stmt1->bind_result($Instrument_id);
    $stmt1->fetch();
    $stmt1->close();


    $stmt2 = $con->prepare('select Exam_id from exam where Instrument_id=? AND Term=? AND Year=? AND Exam_Title=?');
    $stmt2->bind_param("ssss", $Instrument_id, $term1, $year1, $ETitle);
    $stmt2->execute();
    $stmt2->bind_result($Exam_id);
    $stmt2->fetch();
    $stmt2->close();

    $query = "SELECT Student_id,Grade from grades where Exam_id=$Exam_id";
    $result = mysqli_query($con, $query);

    $arr=array($instrument,$term1,$year1,$ETitle,$result);

    return $arr;
}}
?>
