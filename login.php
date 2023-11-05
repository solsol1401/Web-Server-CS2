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
        // Connect to the SQLite database
        $db = new SQLite3('users.db');

        // Prepared Statement Method for protection against SQL injection
        $query = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $query->bindValue(':username', $username, SQLITE3_TEXT);
        $query->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $query->execute();

        // Return 'success' if the user exists, otherwise return 'failure'
        if ($result->fetchArray()) {
          $_SESSION['username'] = $username;
            echo 'success';
        } else {
            echo 'failure';
        }

        // Close the database connection
        $db->close();
    }
}
?>
