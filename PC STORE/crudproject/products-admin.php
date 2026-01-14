<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'drug_awareness';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $value = $_POST['value'];
    $effect = $_POST['effect'];
    $quantity = $_POST['quantity'];
    $conn->query("INSERT INTO products (name, value, effect, quantity) VALUES ('$name', '$value', '$effect', '$quantity')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $value = $_POST['value'];
    $effect = $_POST['effect'];
    $quantity = $_POST['quantity'];
    $conn->query("UPDATE products SET name='$name', value='$value', effect='$effect', quantity='$quantity' WHERE id=$id");
}

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>ETIVAC Chapter - ADMIN</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #4a4a4a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }
        h2 {
            font-size: 3rem;
            margin-bottom: 30px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            max-width: 1000px;
            background-color: #333;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #222;
            font-size: 1.2rem;
        }
        tr:nth-child(even) {
            background-color: #555;
        }
        tr:hover {
            background-color: #666;
        }
        td input[type="text"], td input[type="number"], td input[type="submit"] {
            width: 100%;
            padding: 6px;
            border-radius: 5px;
            border: none;
            background-color: #444;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #222;
        }
        form input[type="text"], 
        form input[type="number"], 
        form input[type="submit"] {
            padding: 8px;
            margin: 10px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #555;
            background-color: #444;
            color: white;
            font-size: 14px;
        }

        form input[type="submit"] {
            width: auto;
            cursor: pointer;
            background-color: black;
            text-align: center;
        }

        form input[type="submit"]:hover {
            background-color: #333;
        }

        .button-group {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        .back-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: black;
            color: white;
            font-size: 1rem;
            border-radius: 10px;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #222;
        }
    </style>
</head>
<body>
    <h2>Product Management (Admin)</h2>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" step="0.01" name="value" placeholder="Value" required>
        <input type="text" name="effect" placeholder="Effect" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="submit" name="add" value="Add Product">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Value</th>
            <th>Effect</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php if ($products->num_rows > 0): ?>
            <?php while($row = $products->fetch_assoc()): ?>
                <tr>
                    <form method="POST" action="">
                        <td><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
                        <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></td>
                        <td><input type="number" step="0.01" name="value" value="<?= $row['value'] ?>"></td>
                        <td><input type="text" name="effect" value="<?= htmlspecialchars($row['effect']) ?>"></td>
                        <td><input type="number" name="quantity" value="<?= $row['quantity'] ?>"></td>
                        <td>
                            <div class="button-group">
                                <input type="submit" name="update" value="Update" class="btn" style="flex:1;">
                                <a href="?delete=<?= $row['id'] ?>" class="btn" style="flex:1; text-align:center; line-height:2.2;">Delete</a>
                            </div>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <a href="index.php" class="back-btn">Back to Home</a>
    <a href="order_sheet.php" class="back-btn">View Order Sheet</a>
    <a href="users.php" class="back-btn">Manage Users</a>
</body>
</html>

<?php $conn->close(); ?>
