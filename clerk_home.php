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
        <form action="redirect_to_search_page.php" method="post">
            <button class="button-fancy" type="submit">Search products</button>
        </form>
    </div>

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