
<?php
include 'inc/edit_profile.php';
if (isset($_GET['edit'])){

    $student = $_GET['student'];
    $split_class=explode(" ",$student);
    $id= $split_class[2];
    $detail=getdetails($id);
    echo $detail[6];

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
    <form class="form-basic" method="get" action="#">
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
                <input type="text" name="fname" value="<?php echo htmlspecialchars($detail[0])?>" oninvalid="this.setCustomValidity('First name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Last Name</span>
                <input type="text" name="lname" value="<?php echo htmlspecialchars($detail[1])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Date of Birth</span>
                <input type="date" name="date" value="<?php echo htmlspecialchars($detail[2])?>"oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="address" value="<?php echo htmlspecialchars($detail[3])?>"oninvalid="this.setCustomValidity('Last name required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="province" value="<?php echo htmlspecialchars($detail[4])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="city" value="<?php echo htmlspecialchars($detail[5])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>Gender</span>
                <select name="gender" value="<?php echo htmlspecialchars($detail[6])?>">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </label>
        </div>


        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="mobile1" value="<?php echo htmlspecialchars($detail[7])?>" >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="mobile2" value="<?php echo htmlspecialchars($detail[8])?>">
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
                <input type="text" name="pfname1" value="<?php echo htmlspecialchars($detail[9])?>"oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>last name</span>
                <input type="text" name="plname1" value="<?php echo htmlspecialchars($detail[10])?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="prelation1" value="<?php echo htmlspecialchars($detail[11])?>">
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="paddress1" value="<?php echo htmlspecialchars($detail[12])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="pprovince1" value="<?php echo htmlspecialchars($detail[13])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="pcity1" value="<?php echo htmlspecialchars($detail[14])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="pmobile1" value="<?php echo htmlspecialchars($detail[15])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="pmobile2" value="<?php echo htmlspecialchars($detail[16])?>">
            </label>
        </div>



        <div class="form-title-row">
            <h3>
                Parent details 2
            </h3>
        </div>

        <div class="form-row">
            <label>
                <span>first name</span>
                <input type="text" name="pfname2" value="<?php echo htmlspecialchars($detail[17])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>last name</span>
                <input type="text" name="plname2" value="<?php echo htmlspecialchars($detail[18])?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Relation</span>
                <select name="prelation2" value="<?php echo htmlspecialchars($detail[19])?>">
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Guardian</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Address</span>
                <input type="text" name="paddress2" value="<?php echo htmlspecialchars($detail[20])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Province</span>
                <input type="text" name="pprovince2" value="<?php echo htmlspecialchars($detail[21])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>City</span>
                <input type="text" name="pcity2" value="<?php echo htmlspecialchars($detail[22])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -1</span>
                <input type="text" name="pmobile3" value="<?php echo htmlspecialchars($detail[23])?>" oninvalid="this.setCustomValidity('required!')" required oninput="setCustomValidity('')">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Contact No -2</span>
                <input type="text" name="pmobile4" value="<?php echo htmlspecialchars($detail[24])?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Sibling Detail 1</span>
                <input type="text" name="sib1" value="<?php echo htmlspecialchars($detail[25])?>">
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Sibling Details 2</span>
                <input type="text" name="sib2" value="<?php echo htmlspecialchars($detail[26])?>" >
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="save">Save Changes</button>
        </div>

    </form>

</div>

</body>

</html>
<?php
if (isset($_GET['save'])){
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $dob=$_GET['date'];
    $address=$_GET['address'];
    $province=$_GET['province'];
    $city=$_GET['city'];
    $gender=$_GET['gender'];
    $stp1=$_GET['mobile1'];
    $stp2=$_GET['mobile2'];

    $pfname1=$_GET['pfname1'];
    $plname1=$_GET['plname1'];
    $prelation1=$_GET['prelation1'];
    $paddress1=$_GET['paddress1'];
    $pprovince1=$_GET['pprovince1'];
    $pcity1=$_GET['pcity1'];
    $pmobile1=$_GET['pmobile1'];
    $pmobile2=$_GET['pmobile2'];

    $pfname2=$_GET['pfname2'];
    $plname2=$_GET['plname2'];
    $prelation2=$_GET['prelation2'];
    $paddress2=$_GET['paddress2'];
    $pprovince2=$_GET['pprovince2'];
    $pcity2=$_GET['pcity2'];
    $pmobile3=$_GET['pmobile3'];
    $pmobile4=$_GET['pmobile4'];

    $sib1=$_GET['sib1'];
    $sib2=$_GET['sib2'];
    include 'inc/update_edit_profile.php';
    update($id,$fname,$lname,$dob,$address,$province,$city,$gender,$stp1,$stp2,$pfname1,$plname1,$prelation1,$paddress1,$pprovince1,$pcity1,$pmobile1,$pmobile2,$pfname2,$plname2,$prelation2,$paddress2,$pprovince2,$pcity2,$pmobile3,$pmobile4,$sib1,$sib2);
}
?>
