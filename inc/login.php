<?php
include "connect.php";
function operation($user,$pass){
    $type="";
    $con = connect();


    try {
        $stmt = $con->prepare("select UType,FirstName from person where ID=? AND password=?");
        $stmt->bind_param('ss', $user, $pass);
        $stmt->execute();
        $stmt->bind_result($type,$name);
        $stmt->store_result();
        $check = $stmt->num_rows();
        $stmt->fetch();
        $stmt->close();

        session_start();
        $_SESSION['USER']=$user;
        $_SESSION['PASS']=$pass;
        $_SESSION['TYPE']=$type;
        $_SESSION['NAME']=$name;

    } catch(Exception $e){
        echo"<script>alert('Error Connecting to Database!')</script>";
        exit();
    }



    if($check==0){
        echo"<script>alert('Invalid User Name or Password.Try again!')</script>";
        exit();

    }

    else{
        echo"<script>alert('Logged in Successfully!')</script>";

         if($type=="A"){
             echo "<script>window.open('main_admin_window.php','_self')</script>";

        }elseif($type=="T"){

        }

        #if $type==A admin T techer
        #echo"<script>window.open('home.php','_self')</script>";
        #header( "Location: signup.php" ); die;

    }
    $con->close();
}
?>