<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dp = "book_store";

    $conn = mysqli_connect($server, $user, $pass, $dp);
    
    if(!$conn){
        die(mysqli_connect_error());
    }


?>    