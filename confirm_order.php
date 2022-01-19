<?php

if (isset($_POST['order_id'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    $url = "https://rethink-supplier.herokuapp.com/send_order/";
    $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
    $headers = array('Authorization: Token ' . $apiKey);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    /* add the data */
    $data = array(
        'order_id' => validate($_POST['order_id']),
    );
    /* sent the post request using the new body */
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);

    /* check for any errors */
    if ($e = curl_error($ch)) {
        echo $e;
    } else {
        $decoded = json_decode($result);
        header("Location: ../order_success_page.php");
    }
} else {
    header("Location: ../view_order_page.php");
}