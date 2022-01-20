<?php

# Creates new order with autoincremented id
require "create_new_order.php";

session_start();

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

include "get_products.php";
$products = getProducts();
$count = 0;

// Server url
$url = "https://rethink-supplier.herokuapp.com/orderline/";
$apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
$headers = array('Authorization: Token ' . $apiKey);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$order_id = $_SESSION['order_id'];
while ($count != sizeof($products)) {
    /* check if the associated input is empty */
    if (!empty($_POST[($count)])) {
        /* extract the amount from the inputs */
        $amount = validate($_POST[($count)]);
        /* get through the $count the id, name of the products */
        $product = $products[$count];
        $id_product = $product['id'];
        $name_product = $product['name'];

        /* add the data */
        $data = array(
            'product_id' => $id_product,
            'order_id' => $order_id,
            'nr_of_products' => $amount
        );
        /* sent the post request using the new body */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);

            /* check for any errors */
        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            $decoded = json_decode($result);
            echo "<h1>Added Successfully to order : " . $order_id . "</h1>";
            echo "<p> Product: " . $name_product . ". Amount: " . $amount . "</p>";
        }
    }
    $count++;
}
curl_close($ch);
header("Location: ./view_orders_page.php");
?>
