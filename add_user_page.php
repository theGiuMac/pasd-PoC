<?php
session_start();

$roles = array("manager", "clerk", "cashier");

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Add User</title>
        <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    </head>

    <body>
    <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
    <br>
    <br>
    <div class="add-user-container">
        <form action="add_user.php" method="post"
              style="width: 1000px; border: 1px solid #ffffff;  border-radius: 20px;">>
            <div class="add-user-container2">
                <h2>ADD USER</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="usernameField">Username</label>
                <input type="text" id="usernameField" name="username" placeholder="Username"><br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <label for="role">Role</label>
                <select id="role" name="role">
                    <?php
                    foreach ($roles as $role => $name) {
                        echo "<option value=" . $role . ">" . $name . "</option>";
                    }
                    ?>
                    <!--                <input type="text" id="role" name="role" placeholder="role"><br>-->
                </select>
                <button type="submit">Add user</button>
            </div>

        </form>
    </div>
    <br>
    <br>
    <a href="manager_home.php">Home Page</a>
    <br>
    <a href="logout.php">Logout</a>
    </body>


                                                   <footer>
                                                   <p>Authors: G & M & S</p>
                                                   <p><a href="mailto:maccarigiulio@pm.me">Contact us</a></p>
                                                   </footer>

    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>
