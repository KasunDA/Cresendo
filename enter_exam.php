<?php
#include "connect.php";
#include "inc/find_exam_tilte.php";
#$con = connect();

session_start();
$TYPE=$_SESSION['TYPE'];
$USER=$_SESSION['USER'];
$PASS=$_SESSION['PASS'];
$NAME=$_SESSION['NAME'];


?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enter Exam Details</title>

    <link rel="stylesheet" href="css/demo.css">

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />


    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-ui.js"></script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(function() {

            //autocomplete
            $(".auto1").autocomplete({
                source: "class_search_teacher.php",
                minLength: 1
            });

        });
    </script>
</head>
<header>
    <p align="left"><a href="main_teacher_window.php" id="logout">[back]</a></p>
    <p ALIGN="RIGHT"> Logged in as: <?php echo $NAME;?> <a href="login.php" id="logout">(logout)</a></p>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<body>
<div class="main-content">


    <form class="form-basic"  method="get" action="#">

        <div class="form-title-row">
            <h1>Enter Exam Details</h1>
        </div>

        <div class="form-row">
            <label>
                <span>Class :</span>
                <input type="text" name="class1" class="auto1" required >
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Date :</span>
                <input type="date" name="date" required >
            </label>
        </div>


        <div class="form-row">
            <button type="submit" name="submit">View Results</button>
        </div>


    </form>
</div>

</body>

<?php


if(isset($_GET["submit"])) {

    #$con=connect();

    include "inc/find_exam_title.php";
    #include "inc/insert_exam.php";

    $class1 = $_GET['class1'];
    $date=$_GET['date'];
    $split_class = explode(" ", $class1);
    $exam_id=uniqid();

    $instrument = $split_class[0];
    $year1 = $split_class[4];
    $term1 = $split_class[6];
    $class_id1 = $split_class[8];
    $type1 = $split_class[9];

    $Exam_title = operationExam($class_id1,$instrument,$year1,$term1);

    #echo htmlspecialchars($Exam_title);

    operationInsert($exam_id,$class_id1,$instrument,$year1,$term1,$date,$Exam_title);
}
?>
