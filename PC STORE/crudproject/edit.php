<?php   
    include 'connection.php';
    if(isset($_GET["id"])){
        $id = $_GET['id'];
        $selectStd = "SELECT * FROM movies WHERE Name_ID = '$id'";

        $selectStdquery = mysqli_query($conn, $selectStd);
        if(mysqli_num_rows($selectStdquery)){
            while($result = mysqli_fetch_assoc($selectStdquery)){
                $fetchID = $result['Name_ID'];
                $fetchname = $result['Mv_Name'];
                $fetchAge = $result['Mv_age'];
                $fetchnMovies = $result['Mv_NMovies'];
                $fetchTicket = $result['Mv_Ticket'];
                $fetchContact = $result['Mv_Contact'];
            }
        }
    }
 ?>   

<!DOCTYPE html>
<html>
        <head>
            <title>
                    BSIT 3-4
            </title>
    <style>
        body {
            background-image: url('books.jpg');
            background-size: cover;
            font-family: Arial;
            border-radius: 10px;
            margin-left: 10px;
            
                    }
        form {
            background-image: url(gray.jpg);
            background-size: cover;
            padding: 30px;
            padding-bottom: 10%;
            margin-left: 35%;
            width: 350px;
            border-radius: 20px;
            color:black;
            font-size: 20px;
            font-weight: bold;

        }
        input {
            display: block;
            width: 100%;
            height: 40px;
            border-radius: 10px;
            background-color:rgb(180, 134, 185);
            background: transparent;
            color: black;
            font-size: 15px;
        }
        button{
            border: none;
            width: 100%;
            height: 40px;
            border-radius: 20px;
            margin: 5px;transition-duration: 0.4s;
            cursor: pointer;
            background-color: white; 
            color: black; 
            border: 2px solidrgb(0, 0, 0);
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            background-color:rgb(133, 117, 15);
            color: white;
        }
        h2{
            margin-left: 10%;
            color: white;
            font-size: 30px;
        }
        
    </style>


        </head>
        <body>
            <h2>UPDATE PURCHASE: <?php echo $_GET['id'] ?></h2>
            <form action="" method="post">
                <label for= "">Name: </label>
                <input type="text" name="name" value="<?php echo $fetchname ?> "><br><br>
                <label for= "">Age: </label>
                <input type="number" name="age" id="" value="<?php echo $fetchAge ?>"><br><br>
                <label for= "">Name Of Movie: </label>
                <input type="text" name="movies" value="<?php echo $fetchnMovies ?>"><br><br>
                <label for= "">Ticket: </label>
                <input type="number" name="ticket" value="<?php echo $fetchTicket ?>"><br><br>
                <label for= "">Contact number: </label>
                <input type="number" name="contracnum" value="<?php echo $fetchContact ?>"><br><br>
                <button type="submit" name="submit">Update</button> <button type="reset">Reset</button>
            </form>


            <?php
                 if(isset($_POST['submit'])){
                    $name = mysqli_real_escape_string($conn, $_POST["name"]);
                    $age = mysqli_real_escape_string($conn, $_POST["age"]);
                    $movies = mysqli_real_escape_string($conn, $_POST["movies"]);
                    $ticket = mysqli_real_escape_string($conn, $_POST["ticket"]);
                    $contracnum = mysqli_real_escape_string($conn, $_POST["contracnum"]);

                    $updatedStd = "UPDATE movies SET
                    Mv_Name = '$name',
                    Mv_age = '$age',
                    Mv_NMovies = '$movies',
                    Mv_Ticket = '$ticket',
                    Mv_Contact = '$contracnum'
                    WHERE Name_ID = '$id'";
                    $updatedStdquery = mysqli_query($conn, $updatedStd);

                    header("location: Admin.php");
                 }

                 


            ?>
        </body>
</html>           