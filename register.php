<?php
// SQLite database file
$databaseFile = 'users.db';

// Create a new SQLite database connection
$db = new SQLite3($databaseFile);

// Process the registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the user into the database
    $insertQuery = "INSERT INTO users (name, username, password) VALUES (:name, :username, :password)";
    $statement = $db->prepare($insertQuery);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);


    // Check if the insertion was successful
    if ($statement->execute()) {
    // Return a success response
    echo "success";
    } else {
    // Return an error response
    echo "error";

  }
}
     
// Close the database connection
$db->close();
?>
