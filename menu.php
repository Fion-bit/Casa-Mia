<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Our Menu</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <section class="menu">
        <h2>Explore Our Menu</h2>
        <ul>
            <?php foreach($menu_items as $item): ?>
                <li>
                    <h3><?php echo $item['name']; ?></h3>
                    <p><?php echo $item['description']; ?></p>
                    <p><strong>$<?php echo number_format($item['price'], 2); ?></strong></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <footer>
        <p>&copy; 2025 Restaurant Name. All rights reserved.</p>
    </footer>
</body>
</html>
