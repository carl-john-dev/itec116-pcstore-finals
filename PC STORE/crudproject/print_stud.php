<?php
    include 'connection.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $age = mysqli_real_escape_string($conn, $_POST["age"]);
        $movies = mysqli_real_escape_string($conn, $_POST["movies"]);
        $ticket = mysqli_real_escape_string($conn, $_POST["ticket"]);
        $contracnum = mysqli_real_escape_string($conn, $_POST["contracnum"]);

        $string_insert = "INSERT INTO 
        movies(Mv_Name, Mv_age, Mv_NMovies, Mv_Ticket, Mv_Contact)
        VALUES('$name', '$age', '$movies','$ticket','$contracnum')";

        $insert_query = mysqli_query($conn, $string_insert);

        header("Location: index.php");
        
        
    }

?>