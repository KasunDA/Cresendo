<?php
include "connect.php";
$con = connect();
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Results</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

</head>
<header>
    <h1>CRESCENDO MUSIC ACADEMY</h1>

</header>

<body>
<div class="main-content">

    <form class="form-basic">


        <?php
        if(isset($_POST['submit'])) {

            $class1 = $_POST['class1'];
            $ETitle = $_POST['ETitle'];
            $split_class = explode(" ", $class1);

            $instrument = $split_class[0];
            $year1 = $split_class[4];
            $term1 = $split_class[6];
            $class_id1 = $split_class[8];
            $type1 = $split_class[9];

            $stmt1 = $con->prepare('select Instrument_id from instrument where Title=?');
            $stmt1->bind_param("s", $instrument);
            $stmt1->execute();
            $stmt1->bind_result($Instrument_id);
            $stmt1->fetch();
            $stmt1->close();

            #echo $Instrument_id;

            $stmt2 = $con->prepare('select Exam_id from exam where Instrument_id=? AND Term=? AND Year=? AND Exam_Title=?');
            $stmt2->bind_param("ssss", $Instrument_id, $term1, $year1, $ETitle);
            $stmt2->execute();
            $stmt2->bind_result($Exam_id);
            $stmt2->fetch();
            $stmt2->close();

            $query = "SELECT Student_id,Grade from grades where Exam_id=$Exam_id";
            $result = mysqli_query($con, $query);

?>

        <div class="form-title-row">
            <h1>View Results for <?php echo htmlspecialchars($instrument)." ".htmlspecialchars($year1)." Term".htmlspecialchars($term1)." ".htmlspecialchars($ETitle) ?></h1>
        </div>


            <table border="=1" cellpadding="10" width="50%" >

        <tr>
            <th>Student_ID</th>
            <th>Grade</th>
        </tr>

        <tbody>


        <?php
            if($result){
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$row['Student_id']."</td>";
                    echo "<td>".$row['Grade']."</td>";
                }
            }
        }


        ?>

        </tbody>

    </table>

    </form>
</div>

</body>






