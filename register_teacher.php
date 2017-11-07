<?php
include "connect.php";
$con = connect();


include "inc/instrument.php";
$instruments = get_instrument($con);
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
                    <?php endfor;?>
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


    #select the instrument id from instrument table;

    $stmt1=$con->prepare("SELECT Instrument_id FROM Instrument WHERE Title=?");
    $stmt1->bind_param("s",$instrument);
    $stmt1->execute();
    $stmt1->bind_result($instrument_id);
    $stmt1->store_result();
    $stmt1->fetch();
    $stmt1->close();





    #$instrument_array=["Violene"=>"I1","Guitar"=>"I2","Tabla"=>"I3","Piano"=>"I4","Flute"=>"I5"];
    #$instrument=$instrument_array[$instrument];

    $uppercase=preg_match('@[A-Z]@',$pass);
    $lowercase=preg_match('@[a-z]@',$pass);
    $number=preg_match('@[0-9]@',$pass);

    if ($tp1==$tp2 and $tp1!=""){
        echo"<script>alert('Telephone numbers must be distinct!')</script>";
    } elseif((strlen($tp1)!=10 and $tp1!=0) or (strlen($tp2)!=10) and $tp2!=0){
        echo"<script>alert('Telephone numbers must be of valid length!')</script>";
    } elseif(!$uppercase || !$lowercase || !$number || strlen($pass)<8){
        echo"<script>alert('Password is not Strong!')</script>";
    } elseif($pass!=$cpass){
        echo"<script>alert('Password confirmation failed!')</script>";

    }else{
        mysqli_autocommit($con,false);
        #insert details to the teacher table

        $stmt = $con->prepare("INSERT INTO person (FirstName, LastName, ID, Gender, DoB, Address, Province, City,UType,password,Instrument) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $name1, $name2, $id,$gender,$bday,$address,$province,$city,$type,$pass,$instrument_id);

        if($gender=="Male"){
            $gender="M";
        } else{
            $gender="F";
        }
        $type="T";
        $pre=substr($name1,0,1);
        $id=uniqid($pre);
        $stmt->execute();

        #insert details to the tp_numbers of the student.

        if ($tp1!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $tp1);
            $stmt->execute();
        }
        if($tp2!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $tp2);
            $stmt->execute();
        }
        mysqli_autocommit($con,true);
    }




}

?>

</body>