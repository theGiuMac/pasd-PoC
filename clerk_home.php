<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html>

<div class="button-fancy-container">
    <form action="redirect_to_search_page.php" method="post">
        <button class="button-fancy" type="submit">Search products</button>
    </form>
</div>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>