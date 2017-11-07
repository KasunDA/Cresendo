<?php
include "connect.php";


function operation($tp1,$tp2,$p1tp1,$p1tp2,$p2tp2,$p2tp1,$name1,$name2,$gender,$bday,$address,$province,$city,$p1name1,$p1name2,$p1relation,$p1address,$p1city,$p1province,$p2name1,$p2name2,$p2relation,$p2address,$p2city,$p2province,$sib1,$sib2){

    try {
        $con = connect();

        if (($tp1 == $tp2 and $tp1 != "") or ($p1tp1 == $p1tp2 and $p1tp1 != "") or ($p2tp1 == $p2tp2 and $p2tp1 != "")) {
            echo "<script>alert('Telephone numbers must be distinct!')</script>";
        } elseif ((strlen($tp1) != 10 and $tp1 != "") or (strlen($tp2) != 10 and $tp2 != "") or (strlen($p1tp1) != 10 and $p1tp1 != "") or (strlen($p1tp1) != 10 and $p1tp2 != "") or (strlen($p2tp1) != 10 and $p2tp1 != "") or (strlen($p2tp2) != 10) and $p2tp2) {
            echo "<script>alert('Telephone numbers must be of valid length!')</script>";
        } else {

            $type = "S";
            if ($gender == "Male") {
                $gender = "M";
            } else {
                $gender = "F";
            }

            $pre = substr($name1, 0, 1);
            $id = uniqid($pre);

            mysqli_autocommit($con, false);

            #insert details to the person table

            $stmt = $con->prepare("INSERT INTO person (FirstName, LastName, ID, Gender, DoB, Address, Province, City,UType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $name1, $name2, $id, $gender, $bday, $address, $province, $city, $type);
            $stmt->execute();
            $stmt->close();

            #insert details to the tp_numbers of the student.

            if ($tp1 != "") {
                $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt->bind_param("ss", $id, $tp1);
                $stmt->execute();
                $stmt->close();
            }
            if ($tp2 != "") {
                $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt->bind_param("ss", $id, $tp2);
                $stmt->execute();
                $stmt->close();
            }

            #insert details to the parent1

            $pid1 = uniqid();
            $pid2 = uniqid();

            $stmt = $con->prepare("INSERT INTO parent (Parent_id,Student_id,FirstName,LastName,Relation,Address,Province,City) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $pid1, $id, $p1name1, $p1name2, $p1relation, $p1address, $p1province, $p1city);
            $stmt->execute();
            $stmt->close();

            #insert details to the parent2

            $stmt = $con->prepare("INSERT INTO parent (Parent_id,Student_id,FirstName,LastName,Relation,Address,Province,City) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $pid2, $id, $p2name1, $p2name2, $p2relation, $p2address, $p2province, $p2city);
            $stmt->execute();
            $stmt->close();

            #insert tp_numbers of the parent

            if ($p1tp1 != "") {
                $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt->bind_param("ss", $pid1, $p1tp1);
                $stmt->execute();
                $stmt->close();
            }
            if ($p1tp2 != "") {
                $stmt = $con->prepare("INSERT INTO tel_numbers (ID,TP) VALUES (?, ?)");
                $stmt->bind_param("ss", $pid2, $p1tp2);
                $stmt->execute();
                $stmt->close();
            }


            #insert sibling details of the student

            if ($sib1 != "") {
                $s1 = substr($sib1, strrpos($sib1, " ") + 1);
                $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt->bind_param("ss", $id, $s1);
                $stmt->execute();
                $stmt->close();

                $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt->bind_param("ss", $s1, $id);
                $stmt->execute();
                $stmt->close();
            }

            if ($sib2 != "") {
                $s2 = substr($sib2, strrpos($sib2, " ") + 1);
                $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt->bind_param("ss", $id, $s2);
                $stmt->execute();
                $stmt->close();

                $stmt = $con->prepare("INSERT INTO sibling (s_ID,sib_ID) VALUES (?, ?)");
                $stmt->bind_param("ss", $s2, $id);
                $stmt->execute();
                $stmt->close();
            }


            #insert enrollment details

            mysqli_autocommit($con, true);
            $con->close();

        }
    } catch (mysqli_sql_exception $e){
        echo "<script>alert('Error Occur in connecting to the Database!')</script>";
    } catch (Exception $e){
        echo "<script>alert('Enter Valid Inputs!')</script>";
    }
}

?>
