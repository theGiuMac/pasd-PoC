<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

<!DOCTYPE html>
<html lang="en">

  <!-- Side Navigation -->
  <div class="sidenav">
    <a href="create_order_page.php">Create Order</a>
    <hr>
    <a href="view_orders_page.php">View Orders</a>
    <hr>
    <a href="view_deliveries_page.php">View Deliveries</a>
    <hr>
    <a href="add_user_page.php">Add a user</a>
    <hr>
    <a href="search_page.php">Search a product</a>
    <hr>
    <a class="logout" href="logout.php">Logout</a>
    <hr>
  </div>

  <div class="main">

    <head>
      <title>Manager Homepage</title>
      <div class="homepage"><h1 style="color:red;font-size:100px;">Manager Homepage</h1></div>
      <link rel="stylesheet" type="text/css" href="./styles/dark.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    </head>

    <body>
      <h2 class="greeting" style="font-size:50px">Hello, <?php echo $_SESSION['username']; ?></h2>



      <!-- CHARTS -->
      <div class="chartBox">
        <div class="salesChart">
          <canvas id="salesChart" width="400" height="400"></canvas>
          <script src="saleschart.js"></script>
        </div>
        <div class="ordersChart">
          <canvas id="ordersChart" width="400" height="400"></canvas>
          <script src="orderschart.js"></script>
        </div>
        <div class="productsTypeChart">
          <canvas id="typesChart" width="400" height="400"></canvas>
          <script src="typeschart.js"></script>
        </div>
        <div class="supplierTypeChart">
          <canvas id="supplierChart" width="400" height="400"></canvas>
          <script src="supplierchart.js"></script>
        </div>
      </div>

      <!-- STATISTICS SECTION -->
      <div class="datepicker">
        <h3 style="position:absolute;top:-185px;color:white;font-size:50px">View deliveries in a specific period</h3>
        <form name="form" action="" onsubmit="return false" method="get">
          <input class="datetimespicker" type="text" name="datetimes" />
          <button id="submitDate" type="submit" name="submitDate">Find deliveries</button>
        </form>
        <script src="datetimes.js"></script>
        <?php require "get_deliveries_in_time.php"; ?>
      </div>

    </body>
  </div>
  <footer>
    <p style="font-size:13px">Authors: G. & M. & S.</p>
    <p style="font-size:13px"><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
  </footer>
</html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>
