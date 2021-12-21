<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Clerk Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="button-fancy-container">
        <button class="button-fancy" name="search-submit" type="submit">Search products</button>
    </div>

    <?php 
    if (isset($_POST['search-submit'])) {
        require "./redirect_to_search_page.php";
    }
    ?>


    <br/>
    <br/>
    <br/>
    <br/>

    <a href="logout.php">Logout</a>

</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>