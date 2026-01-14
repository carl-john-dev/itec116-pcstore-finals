<?php
session_start();
include 'connection.php'; // Database connection file

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {

            // Create session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];

            // Optional: redirect based on role if you have a "role" column
            if (isset($user['role']) && $user['role'] === 'admin') {
                header("Location: Admin.php");
            } else {
                header("Location: index.php");
            }
            exit();

        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Username not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url('21.avif');
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
            display: block;
            margin-bottom: 10px;
            width: 95%;
            height: 30px;
            border-radius: 20px;
            padding-left: 10px;
        }
        button {
            width: 95%;
            height: 35px;
            border-radius: 20px;
            margin: 5px;
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: white; 
            color: black; 
            border: 2px solid rgb(0, 0, 0);
            font-size: 15px;
            font-weight: bold;
        }
        button:hover {
            background-color: rgb(133, 117, 15);
            color: white;
        }
        .register-btn {
            background-color: #4CAF50;
            color: white;
            border: 2px solid #4CAF50;
        }
        .register-btn:hover {
            background-color: rgb(133, 117, 15);
            color: white;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Login</h1>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>

        <a href="register.php">
            <button type="button" class="register-btn">Register</button>
        </a>
    </form>
</body>
</html>
