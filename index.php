<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="./styles/dark.css">
</head>

<body>
<form action="login.php" method="post">
    <div class="login-container">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="username">Username</label>
        <input id="username" type="text" name="username" placeholder="Username"><br>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
    </div>
</form>
</body>

<footer>
    <small>This website is designed and created as a prototype.
        It does not intend to be a final product.</small>
</footer>

</html>