<?php

session_start();

// current roles

$roles = array("manager", "clerk", "cashier");

require "./DBhandlers/connectionDB_users.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role     = validate($_POST['role']);
    $password = hash('sha256', $password);



    if (empty($username)) {
        header("Location: add_user_page.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: add_user_page.php?error=Password is required");
        exit();
    } else if (empty($role)) {
        header("Location: add_user_page.php?error=Role is required");
        exit();
    } else if (!in_array($role, $roles)) {
        header("Location: add_user_page.php?error=Role can only be $roles");
        exit();
    } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username='$username'")) >= 1) {
        header("Location: add_user_page.php?error=User Name '$username' already exists");
        exit();
    } else {
        $sql_query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
        if ($conn->query($sql_query) == TRUE) {
            header("Location: add_user_page.php?error='$username' created successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        exit();
    }
} else {
    header("Location: manager_home.php");
    exit();
}
