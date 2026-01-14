
 <?php   
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
    include 'connection.php';
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
            margin-left: 25%;
            color: white;
            font-weight: bold;  
            margin-top: 100px;
        }
         tr{      
            background-image: url(gray.jpg);
            background-size: cover;
            font-size: 20px;
            font-weight: bold;
            color: black;
            
        }    
         a{
            text-decoration: none;
            color: black;
            margin: 5px;transition-duration: 0.4s;
            cursor: pointer;
            padding: 10px;
            border-radius: 15px;
            margin-top: 20px;
        }
        a:hover {
            background-color:rgb(104, 14, 14);
            color: white;
        }
        h2{
            font-size: 40px;
        }   
                  
    </style>

        </head>
        <body>
        <section id="purchaselist">
            <h2 class="list">MESSAGE LIST</h2>
            <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>User_Name</th>
            <th>User_Email</th>
            <th>Message</th>
            <th>Options</th>
        </tr>
        <?Php
            $string_select = "SELECT * FROM contact";
            $select_query = mysqli_query($conn, $string_select);
            if(mysqli_num_rows($select_query) >0 ){
                while($row = mysqli_fetch_assoc($select_query)){
                    ?>
                        <tr>
                            <td><?php echo $row["User_ID"]?></td>
                            <td><?php echo $row["User_Name"]?></td>
                            <td><?php echo $row["User_Email"]?></td>
                            <td><?php echo $row["User_Message"]?></td>
                            <td><a href="deletecon.php?id=<?php echo $row["User_ID"] ?>">Delete</a>
                                    |  <a href="Admin.php">Back</a></td>
    
                        </tr>
                    <?php
                }

            }
            else{
                ?>
                    <tr>
                        <td>No data</td>
                    </tr>
                <?php
            }
        ?>
        </section>
        </body>
</html>