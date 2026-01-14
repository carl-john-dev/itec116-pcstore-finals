<?php
include 'connection.php';

$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username already exists!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed);
            if ($stmt->execute()) {
                $success = "Registration successful! <a href='login.php'>Login now</a>";
            } else {
                $error = "Registration failed.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            background-image: url('books.jpg');
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
            margin-bottom: 5px;
            width: 95%;
            height: 30px;
            border-radius: 20px;
        }
        button {
            width: 95%;
            height: 30px;
            border-radius: 20px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Register</h1>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>
