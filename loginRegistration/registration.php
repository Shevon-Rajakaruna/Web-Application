<?php

$con=mysqli_connect("localhost","root","","cp");
mysqli_select_db($con,'users');

if(mysqli_connect_errno()){
    echo"Failed to connect".mysqli_connect_errno();
}

if (isset($_POST['submit'])){
    $name = (isset($_POST['name']) ? $_POST['name'] : '');
    $email = (isset($_POST['email']) ? $_POST['email'] : '');
    $psw = (isset($_POST['password']) ? $_POST['password'] : '');
    $re_psw = (isset($_POST['re_password']) ? $_POST['re_password'] : '');

    //validations
    
    if ($psw == $re_psw){

        $sql="INSERT INTO `users`(`name`, `email`, `password`, `re_password`) VALUES ('$name','$email','$psw','$re_psw')";
    
        if(!mysqli_query($con,$sql)){
            die('Error:'.mysqli_error($con));
        }
        echo "<script type='text/javascript'>alert('One User Added');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Re-enter the correct password');</script>";
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
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create Account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi field-icon toggle-password zmdi-eye-off"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Already have an account ? <a href="http://localhost/ITP/loginRegistration/login.php" class="loginhere-link">Login here</a>
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