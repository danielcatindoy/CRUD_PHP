<?php 

    $db = mysqli_connect("localhost", "root", "", "simpleapp");

    if($db){
        echo "<script>console.log('connected to db.')</script>";
    }

?>