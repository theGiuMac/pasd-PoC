<?php

include "get_products.php";

function getDeliveries()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/delivery/";
    return performGET($url);
} ?>


<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <!-- Side Navigation -->
    <div class="sidenav">
        <a href="manager_home.php">Manager Homepage</a>
        <hr>
        <a href="create_order_page.php">Create Order</a>
        <hr>
        <a href="view_orders_page.php">View Orders</a>
        <hr>
        <a href="add_user_page.php"> Add a user </a>
        <hr>
        <a href="search_page.php">Search a Product</a>
        <hr>
        <a class="logout" href="logout.php">Logout</a>
        <hr>
    </div>

    <div class="main">

        <head>
            <title>Deliveries</title>
            <link rel="stylesheet" type="text/css" href="./styles/dark.css">
        </head>

        <body>
        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        <br>
        <br>

        <div class="view-deliveries-container">
            <h2>Deliveries</h2>

            <div class="container">
                <?php
                $deliveries = getDeliveries();
                $count = 0;
                ?>
                <?php
                while ($count != sizeof($deliveries)) {
                    ?>
                    <div class="delivery">
                        <div class="limit-title">
                            <?php
                            echo "<h1> Delivery ID:" . $deliveries[$count]['id'] . "</h1><br>";
                            echo "<p> Delivery Date: " . $deliveries[$count]['date_time'] . "</p><br>";
                            echo "<p> Order ID: " . $deliveries[$count]['order'] . "</p><br>";
                            echo "<form method='post' action='view_order_page.php'>
                                    <input style='display: none' name='order_id' value=" . $deliveries[$count]['order'] . ">
                                    <input style='display: none' name='is_processed' value='1'>
                                    <button type='submit'>View Order Details</button>
                                    </form>"
                            ?>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
                ?>

            </div>
        </div>
        </body>

    </div>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>
