<?php
    include 'connection.php';

    if(isset($_POST['User'])){
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $message = mysqli_real_escape_string($conn, $_POST["message"]);

        $string_insert = "INSERT INTO 
        contact(User_Name, User_Email, User_Message)
        VALUES('$name', '$email', '$message')";

        $insert_query = mysqli_query($conn, $string_insert);

        header("Location: Contact.php");
        
        
        
    }

?>