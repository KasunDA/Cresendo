
<?php
include "inc/pay.php";
$con = connect();

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

    <form class="form-basic" method="get" action="fee_final.php">
        <div class="form-title-row">
            <h1>Payment Details</h1>
        </div>

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
                <label><?php echo "Type      :".htmlspecialchars($type)?></label>
            </div>

        </div>

        <div class="form-row">
            <label>
                <span>Amount   :</span>
                <div class="amount-display">
                    <label for=""><?php  echo htmlspecialchars($amount)?></label>
                </div>

            </label>
        </div>
        <?php
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['amount']=$amount;
        $_SESSION['instrument']=$instrument;
        $_SESSION['year']=$year;
        $_SESSION['term']=$term;
        $_SESSION['Class_id']=$Class_id;
        $_SESSION['type']=$type;
        ?>

        <div class="form-row">
            <button type="submit" name="pay">Pay Class Charge</button>
        </div>
    </form>

</div>
</body>
</html>

