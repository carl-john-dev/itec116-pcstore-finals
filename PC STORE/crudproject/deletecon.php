<?php
    include "connection.php";

    if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $deletestd = "DELETE FROM contact WHERE User_ID = '$id'";
    $deletedquery = mysqli_query($conn, $deletestd);
    
    header("location: admin.php");
}