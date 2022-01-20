<!DOCTYPE html>
<div class="sidenav">
  <a href="manager_home.php">Manager Homepage</a>
  <hr>
  <a href="view_orders_page.php">View Orders</a>
  <hr>
  <a href="view_deliveries_page.php">View Deliveries</a>
  <hr>
  <a href="add_user_page.php"> Add a user</a>
  <hr>
  <a href="search_page.php">Search a Product</a>
  <hr>
  <a class="logout" href="logout.php">Logout</a>
  <hr>
</div>

<div class="main">

  <head>
    <title>Create Order</title>
    <link rel="stylesheet" type="text/css" href="./styles/dark.css">
  </head>

  <body>
    <form action="create_order.php" method="post">
      <div class="issue-order-container">
        <label>Products</label>
        <div class="container">
          <?php
           include "get_products.php";
           $count = 0;
           $products = getProducts();
           $size = sizeof($products);
           while ($count != $size) {
           ?>
          <div class="product">
            <div class="limit-title">
              <?php
               echo "<h1>" . $products[$count]['name'] . "</h1><br>";
                           ?>
            </div>
            <?php
             echo "<p>Price in cents: " . $products[$count]['price_in_cents'] . "</p><br>";
                            echo "<input type='text class='amount-selector' name=" . $count . " placeholder='amountToOrder'>";
                            ?>
          </div>
          <?php
           $count++;
           }
           ?>
           </div>
        <button type="submit">Create new Order</button>
      </div>
    </form>
  </body>

  <footer>
    <p>Authors: G & M & S</p>
    <p><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
  </footer>

</div>
