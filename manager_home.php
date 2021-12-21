<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manager Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
    function getProducts() {
        // Server url
        $url = "https://rethink-supplier.herokuapp.com/product/";
        $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
        $headers = array('Authorization: Token '.$apiKey);
        // Send reqest to server
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Get response
        $response = curl_exec($ch);
        // Decode
        $result = json_decode($response, true);
        return $result;
    }
?>

<body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>
    <form action="issue_order.php" method="post">
        <h2>Issue Orders</h2>
        <label>Products</label>
        <div class="container">
            <?php
                require "./DBhandlers/connectionDB_products.php";
                $sql_query = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql_query);
                //while ($row = $result->fetch_array()) {
                $count = 0;
                $products = getProducts();
                while ($count != sizeof($products)) {
                    ?>
                    <div class="product">
                        <div class="limit-title">
                        <?php
                        echo "<h1> " . $products[$count]['name'] . "</h1><br>";
                        ?>
                        </div>
                        <?php
                        echo "<p> Price in cents: " . $products[$count]['price_in_cents'] . "</p><br>";
                        //echo "<h1> " . $row['name'] . "</h1><br>";
                        //echo "<img src='images/" . strtolower($row['name']) . ".jpg' alt='" . $row['name'] . "'>";
                        ?>
                        <br>
                        <input type="number" class="amount-selector" name="amount" placeholder="amountToOrder">
                        <br>
                    </div>
                    <?php
                    $count++;
                }    
            ?>
        </div>
        <button type="submit">Issue Order</button>
    </form>
    <br>
    <br>
    <a href="logout.php">Logout</a>
</body>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>