<?php

$server_name = "localhost";
$username = "salo";
$pw = "";
$db = "supermarket_users";

$conn = mysqli_connect($server_name, $username, $pw, $db);

if (!$conn) {
    echo "Connection failed!";
}
