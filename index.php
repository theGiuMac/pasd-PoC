<!DOCTYPE html>
<html>

<head>
    <title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>    
        <?php }?>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
</body>

<footer>
    <small>This website is designed and created as a prototype. 
           It does not intend to be a final product.</small>
</footer>

</html>