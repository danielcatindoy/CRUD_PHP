<?php

    //start the session
    session_start();

    //let's do the trick here... after x seconds then redirect to homepage
    $secondsToDelay = 3000; //setting (3) seconds for seconds to delay - can be changeable
    $role = $_SESSION['role'];
    $redirectionPage = $role == 99 ? "../admin/admin.php" : "../client/client.php";

    echo '
        <script>
            setTimeout(function() {
                window.location.href = "'.$redirectionPage.'";
            }, '.$secondsToDelay.');
        </script>
    ';
    

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <!-- REQUIRED META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Logo & Title -->
    <title>Loading | Jess Repair Hub Services</title>

    <!-- Scripts -->
    <script src="/public/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="/public/css/app.css" rel="stylesheet">
</head>

<body>
    
    <div class="container" style="margin-top: 15rem;">
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" style="width: 7rem; height: 7rem;" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <div style="text-align: center;margin-top: 2rem;font-size: 2rem;">
            <p>Loading, please wait...</p>
        </div>
    </div>
    
</body>

</html>
