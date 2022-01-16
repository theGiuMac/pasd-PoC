<?php
session_start();

require "./DBhandlers/connectionDB_users.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

include "get_products.php";
require "./DBhandlers/connectionDB_products.php";

$products = getProducts();
$count = 0;

$url = "https://rethink-supplier.herokuapp.com/orderline/";
$apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
$headers = array(
    'Authorization' => 'Token ' . $apiKey,
    'Content-type' => 'application/x-www-form-urlencoded',
);


while ($count != sizeof($products)) {
    /* check if the associated input is empty */
    if (!empty($_POST[($count)])) {
        /* extract the amount from the inputs */
        $amount = validate($_POST[($count)]);
        /* get through the $count the id, name of the products */
        $product = $products[$count];
        $id_product = $product['id'];
        $name_product = $product['name'];

        $jsonObj = http_build_query(
            array(
                'product_id' => $id_product,
                'order_id' => 69,
                'nr_of_products' => $amount
            ));

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => $headers,
                'content' => $jsonObj
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);

        echo "<p>.$result.</p>";
    }
    $count++;
}

$jsonObj = http_build_query(
    array('order_id' => 69)
);

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => $headers,
        'content' => $jsonObj
    )
);
$url = 'https://rethink-supplier.herokuapp.com/send_order/';
$context = stream_context_create($opts);
$result = file_get_contents($url, false, $context);

echo $result;

