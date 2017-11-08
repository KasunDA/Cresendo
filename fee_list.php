
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
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "search_class.php",
                minLength: 1
            });

        });
    </script>
    <title>Fee payments</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/form-basic.css">

</head>

<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>


<div class="main-content">

    <form class="form-basic" method="get" action="fee_list2.php">
        <div class="form-title-row">
            <h1>Payment details</h1>
        </div>
        <div class="form-row">
            <label>
                <span>Class</span>
                <input type="text" name="class" class="auto1" />
            </label>
        </div>

        <div class="form-row">
            <button type="submit" name="view" >View details</button>
        </div>

    </form>

</div>
</body>
</html>




