<?php
session_start();

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    if (isset($_POST['order_id']) || isset($_SESSION['order_id'])) {
        if (isset($_POST['order_id'])) {
            $orderId = validate($_POST['order_id']);
        }
        if (isset($_SESSION['order_id'])) {
            $orderId = validate($_SESSION['order_id']);
        }
        if (!isset($orderId)) {
            return;
        }
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
             <a href="view_deliveries_page.php">View Deliveries</a>
             <hr>
             <a href="add_user_page.php">Add a user</a>
             <hr>
             <a href="search_page.php">Search a Product</a>
             <hr>
             <a class="logout" href="logout.php">Logout</a>
             <hr>
             </div>

             <div class="main">

        <head>
            <title>Issue Order</title>
            <link rel="stylesheet" type="text/css" href="./styles/dark.css">
        </head>
        <body>
        <form action="issue_order.php" method="post">
            <?php echo "<input style='display:none' name='order_id' value=" . $orderId . ">";
            ?>

            <div class="issue-order-container">
                <?php echo "<h2>Issue Orders To Order : " . $orderId . "</h2>"; ?>
                <label>Products</label>
                <div class="container">
                    <?php
                    //                require "./DBhandlers/connectionDB_products.php";
                    include "get_products.php";
                    //                $sql_query = "SELECT * FROM products";
                    //                $result = mysqli_query($conn, $sql_query);
                    //                //while ($row = $result->fetch_array()) {
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

        </body>
                      <footer>
                  <p>Authors: G & M & S</p>
                  <p><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
                  </footer>
        </div>
    </html>
    <?php
    } else {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
