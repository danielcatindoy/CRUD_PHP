<?php

    //let's import the database connection here...
    require("../db/connection.php");

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
        <div class="row justify-content-center mt-5">
            <div class="card" style="width: 45rem;">
                <div class="card-header">
                    <span style="display: inline-block;">
                        <a class="btn btn-light btn-sm" href="../index.php"><img src="/public/img/back_button.svg" /></a>
                    </span>
                    <span style="display: inline-block; transform: translateY(3px);">
                        <h5 class="cardHeaderAligned">Manage Users</h5>
                    </span>
                </div>

                <div class="card-body">
                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <p>Message</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mt-1">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width="185px">Action</th>
                            </tr>
                            <?php
                                
                                //create a query for getting all the users
                                $usersQuery = mysqli_query($db, "SELECT * FROM users WHERE role <> 99");
                                while($data = mysqli_fetch_assoc($usersQuery)){
                                    //if role is 99 then display Admin else Client
                                    $role = $data['role'] == 99 ? "Admin" : "Client";

                                    echo '
                                        <tr>
                                            <td>'.$data['name'].'</td>
                                            <td>'.$data['email'].'</td>
                                            <td>'.$role.'</td>
                                            <td><span style="">Activated</span></td>
                                            <td>
                                                <a class="btn btn-primary" href="#" data-toggle="tooltip" data-placement="top" title="Activate">
                                                    <img src="/public/img/reset.svg" height="20px" />
                                                </a>
                                                <a class="btn btn-danger" href="#" data-toggle="tooltip" data-placement="top" title="Deactivate">
                                                    <img src="/public/img/lock.svg" height="20px" />
                                                </a>
                                            </td>
                                        </tr>
                                    ';

                                }
                                
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
