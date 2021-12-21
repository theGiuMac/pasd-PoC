<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>


<head>
    <title>Search page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <p>This is the page that allows for searching the amount of each product in both
        the warehouse and the store, on display.
        You can search products by id or by name, using the following interface, the
        resulting products and related information will be shown further down the page.
    </p>

    <div class="search-container">
        <form action="" method="post">
            Enter product name: <input type="text" name="productname" placeholder="Name of product"><br/>
            Enter product id: <input type="number" name="productid" placeholder="Id of product" min="1" step="1"><br/>
            <input type="radio" value="byname" name="type">By Name<br/>
            <input type="radio" value="byid" name="type">By ID<br/>
            <button type="submit" name="search-submit">Search</button>
        </form>
    </div>


    <?php
        if (isset($_POST["search-submit"])) {
            if (!isset($_POST['type'])) {
                echo "<pre>Radio button was not clicked!</pre>";
            }
            require "./DBhandlers/connectionDB_products.php";
            if ($_POST['type'] === "byname") 
            {
                $sql_query_name = "SELECT * FROM products WHERE name = '" . $POST_['productname'] . "'";
                $result = mysqli_query($conn, $sql_query_name);
                if (!$result) {
                    echo "<pre>Query not executed</pre>";
                }
                $row = mysqli_fetch_assoc($result);

                echo "<pre>" . $row['name'] . "</pre>";
    ?>
                <div class="product-table">
                    <table>
                        <tr>
                            <th>Product name</th>
                            <th>Product id</th>
                            <th>Price in euros</th>
                            <th>Quantity in store</th>
                            <th>Quantity in warehouse</th>
                        </tr>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity_display']; ?></td>
                            <td><?php echo $row['quantity_warehouse']; ?></td>
                        </tr>
                    </table>
                </div>
    <?php
            } else if ($_POST['type'] === 'byid') 
            {
                $sql_query_id = "SELECT * FROM products WHERE id = '" . $POST_['productid'] . "'";
                $result = mysqli_query($conn, $sql_query_id);
                $row = mysqli_fetch_assoc($result);   
    ?>
                <div class="product-table">
                    <table>
                        <tr>
                            <th>Product name</th>
                            <th>Product id</th>
                            <th>Price in euros</th>
                            <th>Quantity in store</th>
                            <th>Quantity in warehouse</th>
                        </tr>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['quantity_display']?></td>
                            <td><?php echo $row['quantity_warehouse']?></td>
                        </tr>
                    </table>
                </div>
    <?php
            }
        } 
    ?>

    <div class="go-back-container">
        <?php 
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
        }   
        if ($role === "clerk") {
        ?>
            <a href="clerk_home.php">Go back</a>
        <?php 
        } else if ($role === 'manager') {
        ?>
            <a href="manager_home.php">Go back</a>
        <?php
        }
        ?>
    </div>

</body>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>