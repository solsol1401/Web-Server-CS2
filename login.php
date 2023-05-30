<?php
// Retrieve the submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the SQLite database
$db = new SQLite3('users.db');

// Check if the user exists in the database
$query = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
$query->bindValue(':username', $username, SQLITE3_TEXT);
$query->bindValue(':password', $password, SQLITE3_TEXT);
$result = $query->execute();

// Return 'success' if the user exists, otherwise return 'failure'
if ($result->fetchArray()) {
  echo 'success';
} else {
  echo 'failure';
}

// Close the database connection
$db->close();
?>