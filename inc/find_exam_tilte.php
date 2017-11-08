<?php
include "connect.php";

function operation($class){
    try {
        $con = connect();

        $split_class = explode(" ", $class);

        $instrument = $split_class[0];
        $stmt = $con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
        $stmt->bind_param("s", $instrument);
        $stmt->execute();
        $stmt->bind_result($Instrument_id);
        $stmt->fetch();
        $stmt->close();

        #get the details of the class.

        $year = $split_class[4];
        $term = $split_class[6];
        $Class_id = $split_class[8];

        $count = 0;
        $stmt3 = $con->prepare("SELECT Count(Student_id) FROM participate WHERE Student_id=? AND Instrument_id=? AND Class_id=? AND Year =? AND Term=?");
        $stmt3->bind_param("sssss", $id, $Instrument_id, $Class_id, $year, $term);
        $stmt3->execute();
        $stmt3->bind_result($count);
        $stmt3->fetch();
        $stmt3->close();


        if ($fee_id == "") {
            echo "<script>alert('Please Complete the Payment for the class!')</script>";

        } elseif ($count == 1) {
            echo "<script>alert('Student has already Registered for this class!')</script>";

        } else {
            $stmt1 = $con->prepare("INSERT INTO participate(Student_id,Instrument_id,Class_id,Year,Term) VALUES (?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssss", $id, $Instrument_id, $Class_id, $year, $term);
            $stmt1->execute();
            $stmt1->close();
            $con->close();
            echo "<script>alert('Registered to the class Successfully!')</script>";
        }
    }catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}
?>