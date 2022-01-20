<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>


<?php
 if ($_SESSION['role'] == 'manager') {
?>
<!--Manager Side Navigation -->
<div class="sidenav">
  <a href="manager_home.php">Manager Homepage</a>
  <hr>
  <a href="create_order_page.php">Create Order</a>
  <hr>
  <a href="view_orders_page.php">View Orders</a>
  <hr>
  <a href="view_deliveries_page.php">View Deliveries</a>
  <hr>
  <a href="add_user_page.php"> Add a user </a>
  <hr>
  <a class="logout" href="logout.php">Logout</a>
  <hr>
</div>
<?php
 } else {
?>
<!-- Clerk Side Navigation -->
<div class="sidenav">
  <a href="clerk_home.php">Clerk Homepage</a>
  <hr>
  <a class="logout" href="logout.php">Logout</a>
  <hr>
</div>
<?php
        }
?>

<div class="main">


<head>
    <title>Search page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styles/dark.css">
</head>

<body>
    <div class="search-container">
        <form action="" method="post">
            Enter product name: <input type="text" name="productname" placeholder="Name of product"><br/>
            Enter product id: <input type="number" name="productid" value="0" placeholder="Id of product" min="0" step="1"><br/>
            <button type="submit" name="search-submit">Search</button>
        </form>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>

    <?php
        if (isset($_POST["search-submit"])) {
            require "./DBhandlers/connectionDB_products.php";
            if (isset($_POST['productname']))
            {
                $productname = $_POST['productname'];
                $sql_query_name = "SELECT * FROM products WHERE name = '" . $productname . "'";
                $result = mysqli_query($conn, $sql_query_name);
                $row = mysqli_fetch_array($result);
            }
            if ($_POST['productid'] > 0)
            {
                $productid = $_POST['productid'];
                $sql_query_id = "SELECT * FROM products WHERE id = '" . $productid . "'";
                $result = mysqli_query($conn, $sql_query_id);
                $row = mysqli_fetch_assoc($result);
            }
    ?>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Product id</th>
                            <th>Price in euros</th>
                            <th>Quantity in store</th>
                            <th>Quantity in warehouse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['quantity_display']?></td>
                            <td><?php echo $row['quantity_warehouse']?></td>
                        </tr>
                    </tbody>
                </table>
    <?php
        }
    ?>
</body>
</div>

<footer>
  <p>Authors: G & M & S</p>
  <p><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
</footer>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>
