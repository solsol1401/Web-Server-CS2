<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  $date = $_POST["bicycleDate"];
  $time = $_POST["bicycleTime"];
  
  if (empty($date) || empty($time)) {
    echo "Please fill in all the required fields.";
    exit;
  }
  
  $name = $_SESSION['name'];
  
  $db = new SQLite3("bicycles.db");
  
  $statement = $db->prepare("INSERT INTO bookings (name, date, time) VALUES (:name, :date, :time)");
  $statement->bindValue(":name", $name);
  $statement->bindValue(":date", $date);
  $statement->bindValue(":time", $time);
  
  $result = $statement->execute();
  
  if ($result) {
    echo "Bicycle booking successful!";
  } else {
    echo "An error occurred. Please try again later.";
  }
  
  $db->close();
}
?>
