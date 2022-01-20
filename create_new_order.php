<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/order/";
    $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
    $headers = array('Authorization: Token ' . $apiKey);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);            /* check for any errors */
    if ($e = curl_error($ch)) {
        echo $e;
    } else {
        $decoded = json_decode($result, true);
        $_SESSION['order_id'] = $decoded['id'];
        $_SESSION['buyer'] = $decoded['buyer'];
        $_SESSION['is_processed'] = $decoded['is_processed'];
        header("Location: issue_order_page.php");
    }
} else {
    header("Location: ../index.php");
    exit();
}
