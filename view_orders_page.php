<?php
function getOrders()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/order/";
    $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
    $headers = array('Authorization: Token ' . $apiKey);
    // Send reqest to server
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // Get response
    $response = curl_exec($ch);
    // Decode
    $result = json_decode($response, true);
    return $result;
} ?>


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
                        echo "<p> Buyer: " . $orders[$count]['buyer'] . "</p><br>";
                        echo "<p> Processed: " . ($orders[$count]['is_processed'] == false ? "No" : "Yes") . "</p><br>";
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
