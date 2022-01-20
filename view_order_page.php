<?php

include "get_products.php";

function getOrderDetails($order_id)
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/order/" . $order_id;
    return performGET($url)['orderlines'];
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

function getProductById($products, $id)
{
    $count = 0;
    while ($count != $products) {
        if ($id == $products[$count]['id']) {
            return $products[$count]['name'];
        }
        $count++;
    }
    return null;
}


function getDeliveryDateById($id)
{
    $url = "https://rethink-supplier.herokuapp.com/delivery/";
    $deliveryDates = performGET($url);
    $count = 0;
    while ($count != $deliveryDates) {
        if ($id == $deliveryDates[$count]['order']) {
            return $deliveryDates[$count]['date_time'];
        }
        $count++;
    }
}

?>
<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $orderId = validate($_POST['order_id']);
    $products = getProducts();
    $orderDetail = getOrderDetails($orderId);
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

    <body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>


    <div class="view-order-container">
        <?php echo "<h2>Detail Of Order: " . $orderId . "</h2>" ?>
        <?php
        $count = 1;
        while ($count != sizeof($orderDetail) + 1) {
            echo "<details style='color:white;'>";
            echo "<summary>Item Number " . $count . "</summary>";
            echo "<span>
                            <div>
                                <p> Products's Name: " . getProductById($products, $orderDetail[$count - 1]['product']) . "</p>
                                <p>  Amount: " . $orderDetail[$count - 1]['nr_of_products'] . "</p>
                            </div>
                        </span>";
            echo "</details>";
            $count++;
        }
        ?>
        <div class="container">
        </div>
        <!--        if th order has already been processed do now show confirm order button -->
        <?php if ($_POST['is_processed'] != true) {
            echo "
        <form method=\"post\" action=\"confirm_order.php\">
            <?php echo \"<input style = 'display:none' name='order_id' value=\" . $orderId . \"/>\" ?>
            <button type=\"submit\">Confirm Order</button>
            </form> ";
        } else {
            $delDate = getDeliveryDateById($orderId);
            echo "<p>Delivery Date For This Order: " . $delDate . "</p>";
        }
        ?>

    </div>


    </body>

    <head>
        <title>Order Detail</title>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>


    </div>

    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?><?php
