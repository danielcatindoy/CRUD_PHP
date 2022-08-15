<?php

    //let's import the database connection here...
    require("../db/connection.php");

    //when register button is clicked
    if(isset($_POST['btnRegister'])){

        //get input from our form
        $name = $_POST['fname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        
        //if name is empty
        if($name == ""){
            echo "<script>alert('Please fill in name!')</script>";
        }
        
        //if email is empty
        else if($email == ""){
            echo "<script>alert('Please fill in email!')</script>";
        }
        
        //if password is empty
        else if($password == ""){ 
            echo "<script>alert('Please fill in password!')</script>";
        }
        
        //if confirm is empty
        else if($confirm == ""){
            echo "<script>alert('Please fill in confirm password!')</script>";
        }
        
        //if confirm is empty
        else if($confirm != $password){
            echo "<script>alert('Password and Confirm did not matched! Please try again.')</script>";
        }

        else{
            //then create a query for checking the email and password
            $insertQuery = mysqli_query($db, "INSERT INTO users (name, email, password, role) VALUES ('".$name."', '".$email."', '".$password."', 1);");
            
            //perform a query, check for error
            if (!$insertQuery) {
                echo("Error description: " . mysqli_error($db));
            }

            if($insertQuery){
                echo "<script>alert('Successfully registered.'); window.location.href='../index.php';</script>";
            }
            
        }

    }

?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- REQUIRED META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Logo & Title -->
    <title>Login | Jess Repair Hub Services</title>

    <!-- Scripts -->
    <script src="/public/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">
</head>

<body>
    
    <div class="container">
        <!-- Login Section-->
        <div class="row justify-content-center">
            <div style="margin-top: 8rem;">
                <div class="card" style="width: 23rem;">
                    <form method="POST" action="">
                        <div style="text-align: center; padding: 1.5rem;" ><img src="/public/img/tech.png" width="70" alt="app-logo"></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">User Registration</h5>
                            <div class="login-fields">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="fname" type="text" placeholder="Name" class="text-center form-control" name="fname" required autocomplete="fname" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Email" class="text-center form-control" name="email" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Password" class="text-center form-control" name="password" required autocomplete="password" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="confirm" type="password" placeholder="Confirm Password" class="text-center form-control" name="confirm" required autocomplete="confirm" autofocus>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="btnRegister">Register</button>
                            </div>
                            <hr />
                            <p class="text-center">Already have an account? <a href="../login/login.php">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / Login Section -->
    </div>
    
</body>

</html>
