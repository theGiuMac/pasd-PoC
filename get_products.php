<?php
    function getProducts() {
        // Server url
        $url = "https://rethink-supplier.herokuapp.com/product/";
        $apiKey = 'eec0d644e253677eebedf079406bad4130683b53';
        $headers = array('Authorization: Token '.$apiKey);
        // Send reqest to server
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Get response
        $response = curl_exec($ch);
        // Decode
        $result = json_decode($response, true);
        return $result;
    }
