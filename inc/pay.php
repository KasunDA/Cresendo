<?php
include "connect.php";

function pay($id,$fname,$lname,$instrument,$year,$term,$Class_id,$type){
    try{
        $con = connect();
        $query1 = mysqli_query($con, "SELECT COUNT(Fee_id) as number FROM fee WHERE Student_id='$id' AND Class_id='$Class_id' AND Year='$year' AND Term='$term'");
        $result = mysqli_fetch_assoc($query1);
        $paid = $result['number'];

        if ($paid == 1) {
            $amount = "You have already paid for the class";
        } else {
            mysqli_autocommit($con, false);
            $stmt = $con->prepare("select FirstName,LastName from person where ID=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $stmt->close();
                if (strcasecmp(trim($type), "Group") == 0) {
                    $query = mysqli_query($con, "select Charge from charges where Class_Type='G' and UType='S'");
                    if (!$query) {
                        die("database query failed." . mysqli_error($con));
                    }
                    $result = $query->fetch_array();
                    $amount = $result["Charge"];
                } else {
                    $query = mysqli_query($con, "select Charge from charges where Class_Type='I' and UType='S'");
                    if (!$query) {
                        die("database query failed." . mysqli_error($con));
                    }
                    $result = $query->fetch_array();
                    $amount = $result["Charge"];

                }

                mysqli_autocommit($con, true);
                $con->close();

             }

        }
        return $amount;
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }

}
?>