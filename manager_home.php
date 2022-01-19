<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Manager Homepage</title>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>

    <body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>

    <br>
    <br>
    <a href="add_user_page.php"> Add a user </a>
    <a href="view_orders_page.php">View Orders</a>
    <a href="view_deliveries_page.php">View Deliveries</a>
    <br>
    <a href="logout.php">Logout</a>
    </body>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>