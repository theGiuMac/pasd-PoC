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
    <form action="issue_order.php" method="post">
        <div class="issue-order-container">
            <h2>Issue Orders</h2>
            <label>Products</label>
            <div class="container">
                <?php
                require "./DBhandlers/connectionDB_products.php";
                include "get_products.php";
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
                        ?>
                        <br>
                        <?php
                        // fixme: html does not accept any spaces so "Shower Gel" does not work here
                        echo "<input type='text' class='amount-selector' name=" . $count . " placeholder='amountToOrder'>";
                        ?>
                        <br>
                    </div>
                    <?php
                    $count++;
                }
                ?>
            </div>
            <button type="submit">Issue Order</button>
        </div>
    </form>
    <br>
    <br>
    <a href="add_user_page.php"> Add a user </a>
    <a href="view_orders_page.php">View Orders</a>
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
?>