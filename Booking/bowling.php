<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["bowlingDate"];
  $time = $_POST["bowlingTime"];
  $lane = $_POST["bowlingLane"];
  
  if (empty($date) || empty($time) || empty($lane)) {
    echo "Please fill in all the required fields.";
    exit;
  }
  
  $name = $_SESSION['name'];
  
  $db = new SQLite3("bowling.db");
  
  $statement = $db->prepare("INSERT INTO bookings (name, date, time, lane) VALUES (:name, :date, :time, :lane)");
  $statement->bindValue(":name", $name);
  $statement->bindValue(":date", $date);
  $statement->bindValue(":time", $time);
  $statement->bindValue(":lane", $lane);
  
  $result = $statement->execute();
  
  if ($result) {
    echo "Bowling booking successful!";
  } else {
    echo "An error occurred. Please try again later.";
  }
  
  $db->close();
}
?>
