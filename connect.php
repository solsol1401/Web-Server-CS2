<?php
$database = new SQLite3('users.db');

// Test the connection
if ($database) {
    echo "Connected to the SQLite database successfully.";
} else {
    echo "Failed to connect to the SQLite database.";
}
?>
