<?php

$con=mysqli_connect("localhost","root","","cp");
mysqli_select_db($con,'users');

if(mysqli_connect_errno()){
    echo"Failed to connect".mysqli_connect_errno();
}

if (isset($_POST['submit'])){
    $name = (isset($_POST['name']) ? $_POST['name'] : '');
    $psw = (isset($_POST['password']) ? $_POST['password'] : '');
    
        
     $sql="SELECT * FROM `users` WHERE `name`='$name'and `password` = '$psw'";
        
     try{
         $result=mysqli_query($con, $sql);
         
         if($result){
             if(mysqli_affected_rows($con)>0){
                 echo "<script type='text/javascript'>alert('Login Successful'); window.location.href='/ITP/CPHome.php';</script>";
             }else{
                 echo"<script type='text/javascript'>alert('User name or password is incorrect');</script>";
                   // window.location.href='employeeViewAll.php';</script>";
             }
         }
     }catch(Exception $ex){
         echo("error in delete".$ex->getMessage());
     }
     
}
mysqli_close($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/concept.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your User Name"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi field-icon toggle-password zmdi-eye-off"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Login"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Do not have an account? <a href="http://localhost/ITP/loginRegistration/registration.php" class="loginhere-link">Register here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>