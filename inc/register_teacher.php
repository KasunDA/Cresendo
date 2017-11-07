<?php
include "connect.php";
function operation($tp1,$tp2,$pass,$cpass,$name1,$name2,$gender,$bday,$address,$province,$city,$instrument){
    $con = connect();

    $uppercase=preg_match('@[A-Z]@',$pass);
    $lowercase=preg_match('@[a-z]@',$pass);
    $number=preg_match('@[0-9]@',$pass);

    $type="T";
    $pre=substr($name1,0,1);
    $id=uniqid($pre);

    if ($tp1==$tp2 and $tp1!=""){
        echo"<script>alert('Telephone numbers must be distinct!')</script>";
    } elseif((strlen($tp1)!=10 and $tp1!=0) or (strlen($tp2)!=10) and $tp2!=0){
        echo"<script>alert('Telephone numbers must be of valid length!')</script>";
    } elseif(!$uppercase || !$lowercase || !$number || strlen($pass)<8){
        echo"<script>alert('Password is not Strong!')</script>";
    } elseif($pass!=$cpass){
        echo"<script>alert('Password confirmation failed!')</script>";

    }else{
        mysqli_autocommit($con,false);
        #insert details to the teacher table

        $stmt1=$con->prepare("SELECT Instrument_id FROM Instrument WHERE Title=?");
        $stmt1->bind_param("s",$instrument);
        $stmt1->execute();
        $stmt1->bind_result($instrument_id);
        $stmt1->store_result();
        $stmt1->fetch();
        $stmt1->close();

        if($gender=="Male"){
            $gender="M";
        } else{
            $gender="F";
        }






        $stmt = $con->prepare("INSERT INTO person (FirstName, LastName, ID, Gender, DoB, Address, Province, City,UType,password,Instrument) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $name1, $name2, $id,$gender,$bday,$address,$province,$city,$type,$pass,$instrument_id);
        $stmt->execute();
        $stmt->close();

        #insert details to the tp_numbers of the student.

        if ($tp1!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $tp1);
            $stmt->execute();
            $stmt->close();
        }
        if($tp2!=""){
            $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $tp2);
            $stmt->execute();
            $stmt->close();
        }
        mysqli_autocommit($con,true);
    }
    $con->close();

}



?>