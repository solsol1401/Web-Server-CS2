<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $username = $_POST["regUsername"];
  $password = $_POST["regPassword"];

  // Validate the form data (you can add additional validation if needed)
  if (empty($name) || empty($username) || empty($password)) {
    // Return an error response if any field is empty
    echo "error";
    exit;
  }

  // Connect to the SQLite database
  $db = new SQLite3("users.db");

  // Create a prepared statement to insert the user data into the database
  $statement = $db->prepare("INSERT INTO users (name, username, password) VALUES (:name, :username, :password)");
  $statement->bindValue(":name", $name);
  $statement->bindValue(":username", $username);
  $statement->bindValue(":password", $password);

  // Execute the prepared statement
  $result = $statement->execute();

  // Check if the insertion was successful
  if ($result) {
    // Return a success response
    echo "success";
  } else {
    // Return an error response
    echo "error";
  }

  // Close the database connection
  $db->close();
}
?>