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
    echo $instrument;
    $query1 = mysqli_query($con, "select Instrument_id from instrument where Title=$instrument");
    if (!$query1) {
        die("database query1 failed." . mysqli_error($con));
    }
    $result1 = $query1->fetch_array();
    echo $result1;
    $inst_id=$result1["Instrument_id"];
    echo $inst_id;

    $query2 = mysqli_query($con, "select Class_id,Term,Year from class where Instrument_id=$inst_id");
    if (!$query2) {
        die("database query2 failed." . mysqli_error($con));
    }
    $result2 = $query2->fetch_array();
    $class_id=$result2["Class_id"];
    $term=$result2["Term"];
    $year=$result2["Year"];

    $stmt1=$con->prepare("INSERT INTO fee (fee_id,Amount,PaidDate,Student_id,Instrument_id,Class_id,Term,Year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("s", $feeid,$amount,$date,$id,$inst_id,$class_id,$term,$year);
    $stmt->execute();
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
    <h1>Fee Payments</h1>

</header>

<ul>
</ul>


<div class="main-content">

    <form class="form-basic" method="get" action="#">

        <div class="form">
            <div class="form-row">
                <label><?php echo "Student ID :".htmlspecialchars($id)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Name       :".htmlspecialchars($fname)." ".htmlspecialchars($lname)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Class      :".htmlspecialchars($instrument)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Type       :".htmlspecialchars($type)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Type       :".htmlspecialchars($type)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Amount     :".htmlspecialchars($amount)?></label>
            </div>
            <div class="form-row">
                <label>
                    <span> Payment Successful!</span>
                </label>
            </div>
        </div>



    </form>

</div>
</body>
</html>


