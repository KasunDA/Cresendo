<?php
include 'connect.php';
    function update($id,$fname,$lname,$dob,$address,$province,$city,$gender,$stp1,$stp2,$pfname1,$plname1,$prelation1,$paddress1,$pprovince1,$pcity1,$pmobile1,$pmobile2,$pfname2,$plname2,$prelation2,$paddress2,$pprovince2,$pcity2,$pmobile3,$pmobile4,$sib1,$sib2){
        $con = connect();
        $type = "S";
        if ($gender == "Male") {
            $gender = "M";
        } else {
            $gender = "F";
        }
        mysqli_autocommit($con, false);

        mysqli_autocommit($con, true);
    }
?>