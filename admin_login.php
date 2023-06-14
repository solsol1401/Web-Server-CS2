<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Hardcoded admin credentials for simplicity. In a real application, these should be securely stored and hashed.
    $adminUsername = "admin";
    $adminPassword = "Group_10";
    
    if ($username == $adminUsername && $password == $adminPassword) {
        // Correct credentials, log the admin in
        $_SESSION["admin_logged_in"] = true;
        // Redirect to admin page
        header("Location: admin_tool.php");
        exit;
    } else {
        // Incorrect credentials
        echo "Incorrect username or password.";
    }
}
?>
