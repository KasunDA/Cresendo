<?php
include "connect.php";
$con = connect();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/login.css">



</head>






<body>


<header id="header">
    <h1 style="text-align: center"><strong>CRESCENDO MUSIC ACADEMY </strong></h1>
    <!--  <span class="avatar"><img src="images/avatar.jpg" alt="" /></span> -->
</header>

<!-- You only need this form and the form-login.css -->

<form class="form-login" method="post" action="#">

    <div class="form-log-in-with-email">

        <div class="form-white-background">

            <div class="form-title-row">
                <h1>Log in</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>User Name</span>
                    <input type="text" name="username" required>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required>
                </label>
            </div>

            <div class="form-row">
                <button type="submit" name="login">Log in</button>
            </div>

        </div>



    </div>

</form>
<?php
if (isset($_POST['login'])){

    $user=$_POST['username'];
    $pass=($_POST['password']);
    $type="";



    try {
        $stmt = $con->prepare("select UType from person where ID=? AND password=?");
        $stmt->bind_param('ss', $user, $pass);
        $stmt->execute();
        $stmt->bind_result($type);
        $stmt->store_result();
        $check = $stmt->num_rows();
        $stmt->fetch();
        $stmt->close();

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

        # if($type=="A"){

        # }elseif($type=="T"){

        #}

        #if $type==A admin T techer
        #echo"<script>window.open('home.php','_self')</script>";

    }


}




?>



</body>

</html>
