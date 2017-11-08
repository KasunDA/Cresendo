<?php

session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];


define('HOST', 'localhost');
define('NAME', 'db_group');
define('USER','root');
define('PASSWORD','');
$con1=mysqli_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con1,NAME) or die("Failed to connect to MySQL: " . mysqli_error());




include "inc/instrument.php";
$instruments = get_instrument($con1);

include "inc/register_teacher.php";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
</head>

<header>
    <P ALIGN="RIGHT"> logged in as : <?php  echo $NAME;?></P>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>
<body>
<div class="main-content">

    <!-- You only need this form and the form-basic.css -->

    <form class="form-basic"  method="post" action="#">

        <div class="form-title-row">
            <h1>Teacher Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>First Name</span>
                <input type="text" name="name1"  required value="<?= isset($_POST['name1']) ? $_POST['name1'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="name2" value="<?= isset($_POST['name2']) ? $_POST['name2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Birthday</span>
                <input type="date" name="bday" value="<?= isset($_POST['bday']) ? $_POST['bday'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : ''; ?>" >
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=province  value="<?= isset($_POST['province']) ? $_POST['province'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" value="<?= isset($_POST['city']) ? $_POST['city'] : ''; ?>">
            </label>
        </div>



       <div class="form-row">
            <label>
                <span>Gender</span>
                <select name="gender" required value="<?= isset($_POST['gender']) ? $_POST['gender'] : ''; ?>">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </label>
        </div>




       <!-- <div class="form-row">
            <label>
                <span>Instrument</span>
                <select name="instrument" required value="<?= isset($_POST['instrument']) ? $_POST['instrument'] : ''; ?>">
                    <option>Violene</option>
                    <option>Guitar</option>
                    <option>Tabla</option>
                    <option>Piano</option>
                    <option>Flute</option>
                </select>
            </label>
        </div>-->


        <div class="form-row">
            <label>
                <span>Instrument</span>
                <input type="=text" list="instruments" name="instrument" id="instrument"/>
                <datalist id="instruments">
                    <?php for ($j = 0 ; $j< sizeof($instruments); $j++):?>
                    <option> <?php echo $instruments[$j];?></option>
                    <?php endfor; ?>
                </datalist>


            </label>
        </div>




        <div class="form-row">
            <label>
                <span>ContactNo-1</span>
                <input type="number" name="tp1" value="<?= isset($_POST['tp1']) ? $_POST['tp1'] : ''; ?>">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>ContactNo-2</span>
                <input type="number" name="tp2" value="<?= isset($_POST['tp2']) ? $_POST['tp2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Password</span>
                <input type="password" name="pass" value="<?= isset($_POST['pass']) ? $_POST['pass'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Confirm-Password</span>
                <input type="password" name="cpass" value="<?= isset($_POST['cpass']) ? $_POST['cpass'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="submit">Register</button>
        </div>

    </form>
</div>

<?php
if(isset($_POST['submit'])){

    $tp1=$_POST['tp1'];
    $tp2=$_POST['tp2'];
    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $bday=$_POST['bday'];
    $address=$_POST['address'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $instrument=$_POST['instrument'];

    $con1->close();
    #select the instrument id from instrument table;
    operation($tp1,$tp2,$pass,$cpass,$name1,$name2,$gender,$bday,$address,$province,$city,$instrument);





    #$instrument_array=["Violene"=>"I1","Guitar"=>"I2","Tabla"=>"I3","Piano"=>"I4","Flute"=>"I5"];
    #$instrument=$instrument_array[$instrument];






}

?>

</body>