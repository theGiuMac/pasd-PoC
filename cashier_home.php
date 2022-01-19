<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cashier homepage</title>
    <link rel="stylesheet" type ="text/css" href="style.css">
</head>

<body>
    <form action = "" method = "post">
        <div id="btn_group">
            <button id="btn1" type="submit">Payment</butthon>
            <button id="btn2" type="submit">Issue Orders</button>
            <button id="btn3" type="button">Show products</button>
        </div>
    </form>
    <br>
    <br>
    <a href = "logout.php">Logout</a>
</body>
</html>
    

<?php
}else {
    header("Location: index.php");
    exit();
}
?>
