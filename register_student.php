<?php
include "connect.php";
$con = connect();
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "search_sibling.php",
                minLength: 1
            });

        });
    </script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto2").autocomplete({
                source: "search_sibling.php",
                minLength: 1
            });

        });
    </script>
</head>


<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>


<body>
<div class="main-content">

    <!-- You only need this form and the form-basic.css -->

    <form class="form-basic"  method="post" action="#">

        <div class="form-title-row">
            <h1>Student Registration</h1>
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
                <span> ParentDetails-1</span>

            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent First Name</span>
                <input type="text" name="p1name1" value="<?= isset($_POST['p1name1']) ? $_POST['p1name1'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent Last Name</span>
                <input type="text" name="p1name2" value="<?= isset($_POST['p1name2']) ? $_POST['p1name2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="p1relation" value="<?= isset($_POST['p1relation']) ? $_POST['p1relation'] : ''; ?>" >
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="p1address" value="<?= isset($_POST['p1address']) ? $_POST['p1relation'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=p1province value="<?= isset($_POST['p1province']) ? $_POST['p1province'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="p1city" value="<?= isset($_POST['p1city']) ? $_POST['p1city'] : ''; ?>" >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>ContactNo-1</span>
                <input type="number" name="p1tp1" value="<?= isset($_POST['p1tp1']) ? $_POST['p1tp1'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>ContactNo-2</span>
                <input type="number" name="p1tp2" value="<?= isset($_POST['p1tp2']) ? $_POST['p1tp2'] : ''; ?>">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>ParentDetails-2</span>

            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent First Name</span>
                <input type="text" name="p2name1" value="<?= isset($_POST['p2name1']) ? $_POST['p2name1'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Parent Last Name</span>
                <input type="text" name="p2name2" value="<?= isset($_POST['p2name2']) ? $_POST['p2name2'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="p2relation" value="<?= isset($_POST['p2relation']) ? $_POST['p2relation'] : ''; ?>">
                    <option>Mother</option>
                    <option>Father</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="p2address" value="<?= isset($_POST['p2address']) ? $_POST['p2address'] : ''; ?>">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name=p2province value="<?= isset($_POST['p2province']) ? $_POST['p2province'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="p2city" value="<?= isset($_POST['p2city']) ? $_POST['p2city'] : ''; ?>" >
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>ContactNo-1</span>
                <input type="number" name="p2tp1" value="<?= isset($_POST['p2tp1']) ? $_POST['p2tp1'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>ContactNo-2</span>
                <input type="number" name="p2tp2" value="<?= isset($_POST['p2tp2']) ? $_POST['p2tp2'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>SiblingDetails-1</span>
                <input type="text" name="sib1" class="auto1" value="<?= isset($_POST['sib1']) ? $_POST['sib1'] : ''; ?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>SiblingDetails-2</span>
                <input type="text" name="sib2" class="auto2" value="<?= isset($_POST['sib2']) ? $_POST['sib2'] : ''; ?>">
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
    $p1tp1=$_POST['p1tp1'];
    $p1tp2=$_POST['p1tp2'];
    $p2tp1=$_POST['p2tp1'];
    $p2tp2=$_POST['p2tp2'];

    $name1=$_POST['name1'];
    $name2=$_POST['name2'];
    $bday=$_POST['bday'];
    $address=$_POST['address'];
    $province=$_POST['province'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];

    if (($tp1==$tp2 and $tp1!="") or ($p1tp1==$p1tp2 and $p1tp1!="") or ($p2tp1==$p2tp2 and $p2tp1!="")){
        echo"<script>alert('Telephone numbers must be distinct!')</script>";
    } elseif((strlen($tp1)!=10 and  $tp1!="")or (strlen($tp2)!=10 and $tp2!="") or (strlen($p1tp1)!=10 and $p1tp1!="") or (strlen($p1tp1)!=10 and $p1tp2!="") or (strlen($p2tp1)!=10 and $p2tp1!="") or (strlen($p2tp2)!=10) and $p2tp2){
        echo"<script>alert('Telephone numbers must be of valid length!')</script>";
    } else{


        mysqli_autocommit($con,false);

        #insert details to the person table

        $stmt = $con->prepare("INSERT INTO person (FirstName, LastName, ID, Gender, DoB, Address, Province, City,UType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name1, $name2, $id,$gender,$bday,$address,$province,$city,$type);

        if($gender=="Male"){
            $gender="M";
        } else{
            $gender="F";
        }
        $type="S";
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

        #insert details to the parent1

        $pid1=uniqid();
        $pid2=uniqid();

        $stmt = $con->prepare("INSERT INTO parent (Parent_id,Student_id,FirstName,LastName,Relation,Address,Province,City) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $pid1, $id,$p1name1,$p1name2,$p1relation,$p1address,$p1province,$p1city);
        $p1name1=$_POST['p1name1'];
        $p1name2=$_POST['p1name2'];
        $p1relation=$_POST['p1relation'];
        $p1address=$_POST['p1address'];
        $p1province=$_POST['p1province'];
        $p1city=$_POST['p1city'];
        $stmt->execute();

        #insert details to the parent2

        #insert tp_numbers of the parent

        if ($p1tp1!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $pid1, $p1tp1);
            $stmt->execute();
        }
        if($p1tp2!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $pid2, $p1tp2);
            $stmt->execute();
        }

        #insert sib_details
        $sib1=$_POST['sib1'];
        $sib2=$_POST['sib2'];

        #insert sibling details of the student

        if($sib1 != ""){
            $s1=substr($sib1,strrpos($sib1," ")+1);
            $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $s1);
            $stmt->execute();

            $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
            $stmt->bind_param("ss", $s1, $id);
            $stmt->execute();
        }

        if($sib2 != ""){
            $s2=substr($sib2,strrpos($sib2," ")+1);
            $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $s2);
            $stmt->execute();

            $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
            $stmt->bind_param("ss", $s2, $id);
            $stmt->execute();
        }


        #insert enrollment details

        mysqli_autocommit($con,true);



    }}
?>


</body>

</html>
