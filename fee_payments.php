
<?php
include "connect.php";
$con = connect();
include "inc/instrument.php";
$instruments = get_instrument($con);
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

</head>


<header>
    <h1>Fee Payments</h1>

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
                <span>Name</span>
                <input type="text" name="name">
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>ID</span>
                <input type="text" name="number">
            </label>
        </div>

        <div class="form-row">

        </div>
        <div class="form-row">
            <label>
                <span>Class</span>
                <input type="text" list="instruments" name="instrument" id="instrument"/>
                <datalist id="instruments">

                    <?php for ($j = 0; $j < sizeof($instruments); $j++): ?>
                        <option><?php echo $instruments[$j]; ?></option>
                    <?php endfor; ?>
                </datalist>
            </label>

        </div>
        <div class="form-row">
            <label>
                <span>Type</span>
                <select name="type">
                    <option>Individual</option>
                    <option>Group</option>
                </select>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Amount</span>
                <input type="number" name="amount">
            </label>
        </div>


        <div class="form-row">
            <button type="submit" name="save">Complete payment</button>
        </div>

    </form>

</div>

</body>

</html>
<?php
if (isset($_POST['save'])){



}
