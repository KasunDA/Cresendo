
<?php
include "connect.php";
$con = connect();

?>
<?php
if (isset($_GET['view'])){

    $class = $_GET['class'];
    $split_class=explode(" ",$class);
    $instrument= $split_class[0];
    $Class_id=$split_class[8];
    $year= $split_class[4];
    $term= $split_class[6];
    $type=$split_class[9];

    $stmt=$con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
    $stmt->bind_param("s",$instrument);
    $stmt->execute();
    $stmt->bind_result($I_id);
    $stmt->fetch();
    $stmt->close();

    $query1=mysqli_query($con,"select ID,FirstName,LastName from person where ID in(select Student_id from participate natural join fee where Instrument_id='$I_id' AND Class_id=$Class_id AND Term=$term AND Year=$year) ");
    $query2=mysqli_query($con,"select ID,FirstName,LastName from person where ID in(select Student_id from participate where Instrument_id='$I_id' AND Class_id=$Class_id AND Term=$term AND Year=$year AND Student_id not in (select Student_id from fee))");

}
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

<ul>
</ul>


<div class="main-content">

    <form class="form-basic" method="get" action="#">
        <div class="form-title-row">
            <h1>Payment details</h1>
        </div>
        <div class="form-row">
            <span>Paid Student List</span>
        </div>
        <div class="form-row">
            <table border="=1" cellspacing="0"  width="100%">
                <tr>
                    <th align="center">ID</th>
                    <th align="center">Name</th>

                </tr>
                <tbody>
                <?php
                
                if($query1){
                    while ($row1=mysqli_fetch_array($query1)){
                        echo "<tr>";
                        echo "<td align='center'>".$row1['ID']."</td>";
                        echo "<td align='center'>".$row1['FirstName']." ".$row1['LastName']."</td>";

                    }
                }

                ?>
                </tbody>
            </table>

        </div>
        <div class="form-row">
            <span>Non-Paid Student List</span>
        </div>
        <div class="form-row">
            <table border="=1" cellspacing="0"  width="100%">
                <tr>
                    <th align="center">ID</th>
                    <th align="center">Name</th>

                </tr>
                <tbody>
                <?php
                if($query2){
                    while ($row2=mysqli_fetch_array($query2)){
                        echo "<tr>";
                        echo "<td align='center'>".$row2['ID']."</td>";
                        echo "<td align='center'>".$row2['FirstName']." ".$row2['LastName']."</td>";

                    }
                }

                ?>
                </tbody>
            </table>

        </div>

    </form>

</div>
</body>
</html>
