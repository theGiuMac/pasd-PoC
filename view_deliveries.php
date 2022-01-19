<?php
function getDeliveries()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/delivery/";
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
    <a href="view_deliveries.php">View Deliveries</a>
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
