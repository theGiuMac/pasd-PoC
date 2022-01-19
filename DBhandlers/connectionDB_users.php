<?php

$server_name = "localhost";
$username = "giulio1";
$pw = "indRSA!1!";
$db = "supermarket_users";

$conn = mysqli_connect($server_name, $username, $pw, $db);

if (!$conn) {
    echo "Connection failed!";
}
