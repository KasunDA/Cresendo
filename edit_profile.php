
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

	<title>Edit Profile</title>

	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/form-basic.css">

</head>


	<header>
		<h1>Edit Profile</h1>

    </header>

    <ul>
    </ul>


    <div class="main-content">
        <form class="form-basic" method="post" action="#">

            <div class="form-row">
                <label>
                    Student details
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Name with Initials</span>
                    <input type="text" name="name">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Address</span>
                    <textarea name="textarea"></textarea>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Province</span>
                    <input type="text" name="province">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>City</span>
                    <input type="text" name="city">
                </label>
            </div>


            <div class="form-row">
                <label>
                    <span>Gender</span>
                    <select name="gender">
                        <option>Male</option>
                        <option>Femaleo</option>
                    </select>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Date of Birth</span>
                    <input type="date" name="date">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Contact No -1</span>
                    <input type="text" name="mobile1">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Contact No -2</span>
                    <input type="text" name="mobile2">
                </label>
            </div>

            <div class="form-row">
                <label>
                    Parent details
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Parent name</span>
                    <input type="text" name="pname">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Contact No -1</span>
                    <input type="text" name="pmobile1">
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Contact No -2</span>
                    <input type="text" name="pmobile2">
                </label>
            </div>



            <div class="form-row">
                <button type="submit">Save Details</button>
            </div>

        </form>

    </div>

</body>

</html>
<?php



?>