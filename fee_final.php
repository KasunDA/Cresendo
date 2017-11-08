<?php
include "connect.php";
$con = connect();
if (isset($_GET['pay'])){
    $feeid=uniqid();
    $date=date('Y-m-d H:i:s');
    session_start();
    $id=$_SESSION['id'];
    $amount=$_SESSION['amount'];
    $instrument=$_SESSION['instrument'];
    $year=$_SESSION['year'];
    $term=$_SESSION['term'];
    $class_id=$_SESSION['Class_id'];
    $type=$_SESSION['type'];

    $stmt=$con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
    $stmt->bind_param("s",$instrument);
    $stmt->execute();
    $stmt->bind_result($Instrument_id);
    $stmt->fetch();
    $stmt->close();
    $stmt1=$con->prepare("INSERT INTO fee (fee_id,Amount,PaidDate,Student_id,Instrument_id,Class_id,Term,Year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssssssi", $feeid,$amount,$date,$id,$Instrument_id,$class_id,$term,$year);
    $stmt1->execute();

}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fee payments</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/form-basic.css">
    <link rel="stylesheet" href="css/new.css">
</head>


<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<ul>
</ul>


<div class="main-content">

    <form class="form-basic" method="get" action="#">

        <div class="form">

                <label>
                    <span> Payment Successful!</span>
                </label>
            </div>
        </div>



    </form>

</div>
</body>
</html>


