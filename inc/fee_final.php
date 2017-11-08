<?php
include "connect.php";

function feeFinal($feeid,$date,$id,$amount,$instrument,$year,$term,$class_id,$type){
    $con = connect();
    $paid=false;
    try{
        mysqli_autocommit($con, false);
        $stmt=$con->prepare("SELECT Instrument_id from instrument WHERE Title=?");
        $stmt->bind_param("s",$instrument);
        $stmt->execute();
        $stmt->bind_result($Instrument_id);
        $stmt->fetch();
        $stmt->close();

        $stmt1=$con->prepare("INSERT INTO fee (fee_id,Amount,PaidDate,Student_id,Instrument_id,Class_id,Term,Year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssssssi", $feeid,$amount,$date,$id,$Instrument_id,$class_id,$term,$year);
        $stmt1->execute();
        $stmt1->close();
        $paid=true;
        mysqli_autocommit($con, true);

        $con->close();
    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    }catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
    return $paid;
}
