<?php
function getProducts()
{
    // Server url
    $url = "https://rethink-supplier.herokuapp.com/product/";
    return performGET($url);
}
