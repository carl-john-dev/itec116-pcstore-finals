
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
        html{
            scroll-behavior: smooth;
        }
        body {
            background-image: url('books.jpg');
            background-size: cover;
            font-family: Arial;
            border-radius: 10px;
            margin-left: 10px;
            
        }
        .cine{
            color:rgb(133, 117, 15);
            font-size: 33px;
            margin-left: 20px;
        }
        form {
            background-image: url(gray.jpg);
            background-size: cover;
            padding: 30px;
            padding-bottom: 10%;
            margin-left: 37%;
            width: 350px;
            border-radius: 20px;
            color:black;
            font-size: 20px;
            

        }
        input {
            display: block;
            margin-bottom: 5px;
            width: 100%;
            height: 30px;
            border-radius: 10px;
            background-color:rgb(180, 134, 185);
            background: transparent;
            color: black;
            font-size: 20px;
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
            margin-top: 100px;
            color: white;
            font-size: 30px;
        }
        a{
            text-decoration: none;
            color: white;
            margin: 5px;transition-duration: 0.4s;
            cursor: pointer;
            padding: 10px;
            border-radius: 15px;
            margin-top: 20px;
        }
        a:hover {
            background-color:rgb(133, 117, 15);
            color: white;
        }
        ul{
            display: flex;

        }
        li{
            margin-left: 200px;
            display: flex;
            margin-bottom: 400px;
            font-size: 20px;
            color: white;
        }
        .img1{
            position: absolute;
            margin-left:150px;
            margin-top: 50px;
            border-radius: 20px;
            transition: 1s;
            cursor: pointer;
        }
        .img1:hover{
            transform: scale(1.1);
            z-index:2;
        }
        .img2{
            position: absolute;
            margin-left:30%;
            margin-top: 50px;
            border-radius: 20px;
            transition: 1s;
            cursor: pointer;
        }
        .img2:hover{
            transform: scale(1.1);
            z-index:2;   
        }
        .img3{
            position: absolute;
            margin-left:52%;
            margin-top: 50px;
            border-radius: 20px;
            transition: 1s;
            cursor: pointer;
        }
        .img3:hover{
            transform: scale(1.1);
            z-index:2;
        
        }
        .img4{
            position: absolute;
            margin-left:77%;
            margin-top: 50px;
            border-radius: 20px;
            transition: 1s;
            cursor: pointer;
        }
        .img4:hover{
            transform: scale(1.1);
            z-index:2;
        
        }
        .snow{
            margin-left: 250px;
        }
        .zha{
            margin-left: 400px;
        }
        .post{
            margin-left: 300px;
        }
        
        tr{      
            background-image: url(z.jpg);
            background-size: cover;
            font-size: 20px;
            font-weight: bold;
            color: white;
            background-color: rgb(104, 14, 14); 
        }       
        .Sales{
            display: flex;
            font-weight: bold;
            color: rgb(221, 217, 217);
            margin-left: 11%;
            margin-top: 30px;
        }
        .mov2{
            margin-left: 23%;
        }
        .mov3{
            margin-left: 23%;
        }
        .mov4{
            margin-left: 27%;
        }
       h2.chase{
        margin-left: 190px;
        margin-top: 20%;
       }
       .cinee{
        font-weight: bold;
        background-image: url(gray.jpg);
        display: flex;
        padding: 5px;
        border-radius: 30px;
       }
       .push{
        color:rgb(0, 0, 0);
        padding: 20px;
        margin-left: 55%;
       }
       .push1{
        color:rgb(0, 0, 0);
        padding: 20px;
        margin-left: 5%;
       }
       .push2{
        color:rgb(0, 0, 0);
        padding: 20px;
        margin-left: 5%;
       }
       h2.list{       
        margin-top: 30%;
       }

       h2.show{
        margin-left: 190px;
       }
       td{
        margin-bottom: 100px;
       }
       
                  
    </style>

        </head>
        <body>
            <div class="cinee">
                <h1 class="cine">BOOKS CLUB</h1>
                <a class="push" href="">BOOKS</a>
                <a class="push1" href="Message.php">MESSAGES</a>
                <a class="push2" href="Purchaselist.php">PURCHASE LIST</a>
            </div>
                <h2 class="show">Books</h2>
            <ul>
                 <li>Then She Was Gone</li>
                 <img class="img1" src="3.jpg" width="300" height="400">
                 <li class="snow">The Power</li>
                 <img class="img2" src="book2.jpg" width="300" height="400">
                 <li class="post">Nerver Lie</li>
                 <img class="img3" src="book3.jpg" width="300" height="400">
                 <li class="zha">Bewitched</li>
                 <img class="img4" src="books4.jpg" width="300" height="400">
                </ul>  
                <div class="Sales">
                    <p class="mov1">₱520.00</p>
                    <p class="mov2">₱600.00</p>
                    <p class="mov3">₱630.00</p>
                    <p class="mov4">₱780.00</p>
                </div>
        <section id="purchase">
                <h2 class="chase">PURCHASE:</h2>  
            <form action="print_stud.php" method="post">
                <label for= "">Name: </label>
                <input type="text" name="name"><br><br>
                <label for= "">Age: </label>
                <input type="number" name="age" id= ""><br><br>
                <label for= "">Name Of Movie: </label>
                <input type="text" name="movies"><br><br>
                <label for= "">Ticket: </label>
                <input type="number" name="ticket"><br><br>
                <label for= "">Contact number: </label>
                <input type="number" name="contracnum"><br><br>
                <button type="submit" name="submit">Buy Tickets</button>
                <button type="reset">Reset</button>
            </form>
            </section>
       
        </body>
</html>