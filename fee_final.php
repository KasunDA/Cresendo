<?php
include "inc/fee_final.php";
if (isset($_GET['pay'])){
    session_start();
    $amount=$_SESSION['amount'];

    $feeid=uniqid();
    $date=date('Y-m-d H:i:s');
    $message="";
    $id=$_SESSION['id'];
    $instrument=$_SESSION['instrument'];
    $year=$_SESSION['year'];
    $term=$_SESSION['term'];
    $class_id=$_SESSION['Class_id'];
    $type=$_SESSION['type'];
    if($amount=="You have already paid for the class"){
        $message="No payment has done!";
    }else{
        feeFinal($feeid,$date,$id,$amount,$instrument,$year,$term,$class_id,$type);
        $message="payment Successful!";
    }

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


<div class="main-content">

    <form class="form-basic" method="get" action="#">
        <div class="form-title-row">
            <h1></h1>
        </div>

        <div class="form">
            <div class="form-row">
                <label><?php echo htmlspecialchars($message)?></label>
            </div>

        </div>


    </form>

</div>
</body>
</html>

