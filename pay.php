
<?php
include "connect.php";
$con = connect();

?>

<?php
if (isset($_GET['save'])){

    $id=$_GET['id'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $instrument=$_GET['instrument'];
    $type=$_GET['type'];

    $stmt=$con->prepare("select FirstName,LastName from person where ID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows===1){
        $row=$result->fetch_assoc();
        if(strcasecmp(trim($row["FirstName"]),trim($fname))==0 && strcasecmp(trim($row["LastName"]),trim($lname))==0){
            if(strcasecmp(trim($type),"Group")==0){
                $query = mysqli_query($con, "select Charge from charges where Class_Type='G' and UType='S'");
                if (!$query) {
                    die("database query failed." . mysqli_error($con));
                }
                $result = $query->fetch_array();
                $amount=$result["Charge"];
            }else{
                $query = mysqli_query($con, "select Charge from charges where Class_Type='I' and UType='S'");
                if (!$query) {
                    die("database query failed." . mysqli_error($con));
                }
                $result = $query->fetch_array();
                $amount=$result["Charge"];

            }
            session_start();
            $_SESSION['id']=$id;
            $_SESSION['amount']=$amount;
            $_SESSION['instrument']=$instrument;
        }else{
            echo"<script>alert('Name not matching with ID')</script>";
        }

    }


}
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
    <link rel="stylesheet" href="css/new.css">
</head>


<header>
    <h1>Fee Payments</h1>

</header>

<ul>
</ul>


<div class="main-content">

    <form class="form-basic" method="get" action="fee_final.php">
        <div class="form1">
            <h2>
                Payment Details
            </h2>
        </div>
        <div class="form">
            <div class="form-row">
                <label><?php echo "Student ID :".htmlspecialchars($id)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Name       :".htmlspecialchars($fname)." ".htmlspecialchars($lname)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Class      :".htmlspecialchars($instrument)?></label>
            </div>
            <div class="form-row">
                <label><?php echo "Type      :".htmlspecialchars($type)?></label>
            </div>

        </div>

        <div class="form-row">
            <label>
                <span>Amount   :<?php  echo htmlspecialchars($amount)?></span>

            </label>
        </div>

    </form>

</div>
</body>
</html>

