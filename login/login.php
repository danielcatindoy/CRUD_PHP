<?php

    //restart the session
    session_destroy(); //destroy
    session_start(); //start

    //let's import the database connection here...
    require("../db/connection.php");

    //when submit button is clicked
    if(isset($_POST['btnLogin'])){

        //get input from our form
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //if email is empty
        if($email == ""){
            echo "<script>alert('Please fill in email!')</script>";
        }
        
        //if password is empty
        else if($password == ""){ 
            echo "<script>alert('Please fill in password!')</script>";
        }

        else{
            //then create a query for checking the email and password
            $loginQuery = mysqli_query($db, "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."';");

            //perform a query, check for error
            if (!$loginQuery) 
                echo("Error description: " . mysqli_error($db));

            //added another query for checking if the current status is active
            $isActiveatedAccountQuery = mysqli_query($db, "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."' AND is_active = 1;");
            
            //perform a query, check for error
            if (!$isActiveatedAccountQuery) 
                echo("Error description: " . mysqli_error($db));
            
            //when records matched, then go to homepage
            //take note: num_rows returns a number of rows matched to the query from above...
            //to check use VAR_DUMP(), uncomment the code below to display the var_dump()
            // var_dump($loginQuery->num_rows);
            if($loginQuery->num_rows > 0){

                //check if the current user is activated
                if($isActiveatedAccountQuery->num_rows > 0){

                    //get the data of the matched user
                    $userData = mysqli_fetch_assoc($loginQuery);

                    //set session for role which will be used for redirection to client or admin page
                    $_SESSION['role'] = $userData['role'];

                    //redirect the user to loading page ...
                    header("location: ../loading/loading.php");

                }else {
                    echo "<script>alert('Your account is currently deactivated.');</script>";
                }
            }

            //when no records matched, then inform the user
            else {
                echo "<script>alert('No records matched. Please check your email or password.');</script>";
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
                        <div style="text-align: center; padding: 1.5rem;" ><img src="/public/img/admin.png" width="70" alt="app-logo"></div>
                        <div class="card-body">
                            <h5 class="card-title text-center">User Authentication</h5>
                            <div class="login-fields">
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
                            </div>
                            <br />
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="btnLogin">Login</button>
                            </div>
                            <hr />
                            <p class="text-center">Don't have an account? <a href="/register/register.php">Sign Up</a></p>
                            <p class="text-center">Can't Remember Password? <a href="/forgot/forgot.php">Reset Password</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / Login Section -->
    </div>
    
</body>

</html>
