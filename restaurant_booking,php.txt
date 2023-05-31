<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $date = $_POST["restaurantDate"];
  $time = $_POST["restaurantTime"];
  
  // Validate the form data (you can add additional validation if needed)
  if (empty($date) || empty($time)) {
    // Handle form validation errors
    echo "Please fill in all the required fields.";
    exit;
  }
  
  // Connect to the SQLite database
  $db = new SQLite3("restaurants.db");
  
  // Prepare the SQL statement to insert the booking into the database
  $statement = $db->prepare("INSERT INTO bookings (date, time) VALUES (:date, :time)");
  $statement->bindValue(":date", $date);
  $statement->bindValue(":time", $time);
  
  // Execute the prepared statement
  $result = $statement->execute();
  
  // Check if the insertion was successful
  if ($result) {
    // Handle successful booking
    echo "Restaurant booking successful!";
  } else {
    // Handle database insertion error
    echo "An error occurred. Please try again later.";
  }
  
  // Close the database connection
  $db->close();
}
?>
