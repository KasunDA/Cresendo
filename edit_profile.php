
<?php
include "connect.php";
$con = connect();

if (isset($_GET['edit'])){

    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $fname= $split_class[0];
    $lname=$split_class[1];
    $id= $split_class[2];




}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Profile</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/form-basic.css">

</head>


<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<div class="main-content">
    <form class="form-basic" method="post" action="#">
        <div class="form-title-row">
            <h1>Edit Profile</h1>
        </div>

        <div class="form-title-row">
            <h3>
                Student details
            </h3>
        </div>

        <div class="form-row">
            <label>
                <span>First Name</span>
                <input type="text" name="fname" oninvalid="this.setCustomValidity('First name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="lname" oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Date of Birth</span>
                <input type="date" name="date" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="address" oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="province"oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>Gender</span>
                <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="mobile1" >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="mobile2">
            </label>
        </div>

        <div class="form-title-row">
            <h3>
                Parent details 1
            </h3>
        </div>

        <div class="form-row">
            <label>
                <span>first name</span>
                <input type="text" name="pfname" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>last name</span>
                <input type="text" name="plname">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="prelation" >
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <textarea name="text" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')"></textarea>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="province"oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="pmobile1" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="pmobile2">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Sibling Detail 1</span>
                <input type="text" name="sib1" >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Sibling Details 2</span>
                <input type="text" name="sib2" >
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="save">Save Details</button>
        </div>

    </form>

</div>

</body>

</html>
<?php
if (isset($_POST['save'])){



}
?>
