<?php
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
<body>
<h1>Hello, <?php echo $_SESSION['username']; ?></h1>
<br>
<br>


<div class="view-order-container">
    <div class="container">
        <h1>Order Is Confirmed And A Delivery Date Has Been Scheduled</h1>
    </div>
    <small><a href="view_deliveries_page.php">View Delivery Date</a></small>
</div>

<br>
<br>

<a href="add_user_page.php"> Add a user </a>
<a href="manager_home.php">Manager Home Page</a>
<a href="view_deliveries_page.php">View Deliveries</a>
<br>
<a href="logout.php">Logout</a>
</body>

<head>
    <title>Order Detail</title>
    <link rel="stylesheet" type="text/css" href="./styles/dark.css">
</head>

</html>

