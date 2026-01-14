<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>

    <style>
        body {
            background-image: url('2.png');
            background-size: cover;
            font-family: Arial;
        }
        form {
            background-color: white;
            padding: 30px;
            margin: 100px auto;
            width: 300px;
            border-radius: 30px;
        }
        input {
            font-weight: 15px;
            display: block;
            width: 95%;
            height: 30px;
            border-radius: 20px;
           
        }
        label{
            font-weight: bold;
        }
        .button{
            width: 95%;
            height: 30px;
            border-radius: 20px;
            margin: 5px;transition-duration: 0.4s;
            cursor: pointer;
            background-color: white; 
            color: black; 
            border: 2px solidrgb(0, 0, 0);
            font-size: 15px;
            font-weight: bold;
        }
        .button:hover {
            background-color:rgb(133, 117, 15);
            color: white;
        }
        textarea{       
            font-size: 17px;
            padding-left: 10px;
            padding-right: 50px;
        }
        a{
            text-decoration: none;
            color: black;
            margin: 5px;transition-duration: 0.4s;
            cursor: pointer;
            padding: 10px;
            border-radius: 15px;
            font-weight: bold;
            position: absolute;
            margin-bottom: 150px;
        }
        a:hover {
            background-color:rgb(133, 117, 15);
            color: white;
        }
    </style>
</head>
<body>


<form method="post" action="print_contact.php">
    <h2>Contact Us</h2>
    <label for="name">Name:</label><br>
    <input type="text" id="text" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="" name="email" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="" name="message" rows="5" required></textarea><br><br>

    <input class="button" type="submit" name="User" value="Send Message">
    <a href="index.php">Back</a><br><br>
</form>

</body>
</html>
