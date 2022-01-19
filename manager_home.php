<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

        <!-- Side Navigation -->
        <div class="sidenav">
        <a href="view_orders_page.php">View Orders</a>
        <hr>
        <a href="view_deliveries_page.php">View Deliveries</a>
        <hr>
        <a href="add_user_page.php">Add a user</a>
        <hr>
        <a class="logout" href="logout.php">Logout</a>
        <hr>
        </div>

    <head>
        <title>Manager Homepage</title>
        <div class="homepage"><h1 style="color:red;font-size:100px;">Manager Homepage<h1></div>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>

    <body>


    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    </body>

    <footer>
    <p style="font-size:13px">Authors: G & M & S</p>
    <p style="font-size:13px"><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
    </footer>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>
