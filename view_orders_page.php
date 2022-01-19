<?php
function getOrders()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/order/";
    return performGET($url);
}

/**
 * @param $url
 * @return mixed
 */
function performGET($url)
{
    $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
    $headers = array('Authorization: Token ' . $apiKey);
    // Send request to server
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // Get response
    $response = curl_exec($ch);
    // Decode
    return json_decode($response, true);
} ?>


<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Orders</title>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>

    <body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
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
                        echo "<form action='issue_order_page.php' method='post'><input style = 'display:none' name='order_id' value=" . $orders[$count]['id'] . ">";
                        echo "<p> Buyer: " . $orders[$count]['buyer'] . "</p><br>";
                        echo "<p> Processed: " . ($orders[$count]['is_processed'] == false ? "No" : "Yes") . "</p><br>";
                        echo($orders[$count]['is_processed'] == false ?
                            "<button type='submit'>Add Products</button> </form>"
                            :
                            null
                        );
                        ?>
                    </div>
                </div>
                <?php
                $count++;
            }
            ?>
            ;
        </div>
    </div>

    <br>
    <br>

    <a href="add_user_page.php"> Add a user </a>
    <a href="manager_home.php">Manager Home Page</a>
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
?><?php
