<?php

session_start();

require "connectionDB_users.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $password = hash('sha256', $password);

    if (empty($username)) {
        header("Location: index.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql_query = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql_query);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['id'] = $row['id'];

                // Redirect according to role of logged in user
                if ($row['role'] === "manager") {
                    header("Location: manager_home.php");
                } else if ($row['role'] === "cashier") {
                    header("Location: cashier_home.php");
                } else if ($row['role'] === "clerk") {
                    header("Location: clerk_home.php");
                } else {
                    // Not a valid role, redirect to login page
                    require "logout.php";
                    header("Location: index.php");
                }
                exit();
                
            } else {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }
        } else {
            // Not a unique match for the username and password
            header("Location: index.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}



?>