<?php
session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];




?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/login.css">
</head>




<body>

<header id="header">
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?></p>
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>

<!-- You only need this form and the form-login.css -->

<div class="form-login">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-row">
                <a href="register_teacher.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Register New Teacher'></a>
            </div>

            <div class="form-row">
                <a href="register_student.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Register New Student'></a>
            </div>

            <div class="form-row">
                <a href="Teacher_class_Allocation.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Class Allocation'></a>
            </div>

            <div class="form-row">
                <a href="fee_payments.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Fee Payments'></a>
            </div>

            <div class="form-row">
                <a href="Student_class_registration.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Register to Classes'></a>
            </div>
            <div class="form-row">
                <a href="fee_list.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Fee Payments'></a>
            </div>
            <div class="form-row">
                <a href="view_results_admin.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Results'></a>
            </div>
            <div class="form-row">
                <a href="Back-hoeSelection.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Edit Profile'></a>
            </div>
            <div class="form-row">
                <a href="add_Instrument.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='Add Instrument'></a>
            </div>
            <div class="form-row">
                <a href="view_class_details.php" target="_self"  style="text-decoration:none;" target="_blank"><input  type='button' class='but1' name='regbutton' value='View Class Details'></a>
            </div>

        </div>



    </div>
</div>
</body>
</html>
