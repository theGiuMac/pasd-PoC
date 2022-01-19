<?php

include "get_products.php";

function getOrders()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/order/";
    return performGET($url);
}

?>
<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" type="text/css" href="./styles/dark.css">

    <!-- Side Navigation -->
    <div class="sidenav">
        <a href="manager_home.php">Manager Homepage</a>
        <hr>
        <a href="view_deliveries_page.php">View Deliveries</a>
        <hr>
        <a href="add_user_page.php"> Add a user </a>
        <hr>
        <a href="logout.php">Logout</a>
        <hr>
    </div>

    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>

    <div class="main">

    <head>
        <title>Orders</title>
    </head>

    <body>
    <br>
    <br>

    <div class="view-order-container">
        <h2>Orders</h2>

        <div class="container">
            <?php
            $orders = getOrders();
            $count = 0;
            ?>
            <?php
            while ($count != sizeof($orders)) {
                ?>
                <div class="order">
                    <div class="limit-title">
                        <?php
                        echo "<h1> Order ID:" . $orders[$count]['id'] . "</h1><br>";
                        echo "<form action='view_or_issue.php' method='post'>
                        <input style = 'display:none' name='order_id' value=" . $orders[$count]['id'] . ">";
                        echo "<input style = 'display:none' name='is_processed' value=" . $orders[$count]['is_processed'] . ">";
                        echo "<p> Buyer: " . $orders[$count]['buyer'] . "</p><br>";
                        echo "<p> Processed: " . ($orders[$count]['is_processed'] == false ? "No" : "Yes") . "</p><br>";
                        echo($orders[$count]['is_processed'] == false ?
                            "<button type='submit' name='issue'>Add Products</button>"
                            :
                            null
                        );
                        ?>
                        <button type="submit" name='view'>See Details</button>
                        </form>
                        ;
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>
            ;
        </div>
    </div>
    </div>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?><?php
