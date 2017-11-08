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

    <title>View Details</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/view_class_details.css">



</head>



<body>


<header id="header">
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>



<form class="form-details" method="get" action="instrument_class.php">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Class Details</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Year :</span>
                    <input type="number" name="Year" autocomplete="off" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Term :</span>
                    <input type="number" name="Term" autocomplete="off" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    <span>Instrument</span>
                    <input type="=text" list="instruments" name="instrument" id="instrument" autocomplete="off" required/>
                    <datalist id="instruments">
                        <?php for ($j = 0 ; $j< sizeof($instruments); $j++):?>
                            <option> <?php echo $instruments[$j];?></option>
                        <?php endfor;?>

                    </datalist>


                </label>
            </div>




            <div class="form-row">
                <input type="submit" name="View_Class" value="View Class">
            </div>

        </div>



    </div>

</form>

    </body>

</html>
