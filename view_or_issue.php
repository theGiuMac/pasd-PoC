<?php


if (isset($_POST['view'])) {
    include "view_order_page.php";
} elseif (isset($_POST['issue'])) {
    include "issue_order_page.php";
}
