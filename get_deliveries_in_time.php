<?php

include "get_products.php";

function getDeliveries()
{
    $url = "https://rethink-supplier.herokuapp.com/delivery/";
    return performGET($url);
}

$date_period = $_GET['datetimes'];
// echo $date_period;
$begin_date = substr($date_period, 0, 5);
// $begin_time = substr($date_period, 5, 6);
$end_date = substr($date_period, 16, 5);
// $end_time = substr($date_period, 21, 6);
// echo "<br>" . $begin_date . "<br>" . $begin_time . "<br>";
// echo "<br>" . $end_date . "<br>" . $end_time . "<br>";
if (strlen($begin_date) == 5) {
    $begin_month = "0" . $begin_date[0];
    $begin_day = substr($begin_date, 2, 3);
    // echo "<p>Begin: " . $begin_date . "</p>";
} else {
    $begin_month = substr($begin_date, 0, 2);
    $begin_day = substr($begin_date, 3, 2);
    // echo "<p>Begin: " . $begin_date . "</p>";
}
if (strlen($end_date) == 5) {
    $end_month = "0" . $end_date[0];
    $end_day = substr($end_date, 2, 3);
    // echo "<p>End: " . $end_date . "</p>";
} else {
    $end_month = substr($end_date, 0, 2);
    $end_day = substr($end_date, 3, 2);
    // echo "<p>End: " . $end_date . "</p>";
}

$deliveries = getDeliveries();
$size = sizeof($deliveries);
// echo "<br>" . $size . "<br>";
$count = 0;
?>
<h2>Deliveries</h2>
<div class="delivery-container">
<?php
while ($count != $size)
{
    $del_time = $deliveries[$count]['date_time'];
    // echo "<br>" . $deliveries[$count]['date_time'] . "<br>";
    $date_delivery = substr($del_time, 5, 5);
    $del_month = substr($date_delivery, 0, 2);
    $del_day = substr($date_delivery, 3, 2);
    ?>
    <div class="delivery-homepage">
    <?php
        echo "<h1>Delivery ID: " . $deliveries[$count]['id'] . "</h1><br>";
        echo "<p>Delivery Month/Day: " . $del_month . "/" . $del_day . "</p><br>";
        echo "<p>Order ID: " . $deliveries[$count]['order'] . "</p><br>";

    ?>
    </div>
    <?php
    // echo "<br>" . $date_delivery . "<br>";
    // echo "<br>" . $del_month . "<br>" . "$del_day" . "<br>";
    // echo "<br>" . "Delivery will occur on " . $del_day . "/" . "$del_month" . "in 2022<br>";
    $count++;
}
?>
</div>
