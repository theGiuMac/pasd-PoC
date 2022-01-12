<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Add User</title>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>

    <body>
        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        <br>
        <br>
        <div class="add-user-container">
            <form action="add_user.php" method="post" style="width: 1000px; border: 1px solid #ffffff;  border-radius: 20px;">>
                <div class="add-user-container2">
                    <h2>ADD USER</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username"><br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password"><br>
                    <label>Role</label>
                    <input type="text" name="role" placeholder="role"><br>
                    <button type="submit">Add user</button>
                </div>

            </form>
        </div>
        </form>
        <br>
        <br>
        <a href="manager_home.php">Home Page</a>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>