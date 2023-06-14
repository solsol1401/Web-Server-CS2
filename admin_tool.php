<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Not logged in, redirect to login page
    header("Location: admin_login.html");
    exit;
}

// Fetch and display bookings

function displayBookings($dbName, $header) {
    //echo "Trying to open database at: " . realpath($dbName) . "<br>"; //Check the path
    $db = new SQLite3($dbName);
    $results = $db->query("SELECT * FROM bookings");

    echo "<h2>$header</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Date</th><th>Time</th></tr>";
    while ($row = $results->fetchArray()) {
        echo "<tr><td>".$row['name']."</td><td>".$row['date']."</td><td>".$row['time']."</td></tr>";
    }
    echo "</table>";

    $db->close();
}

echo "<h1>Admin Page</h1>";

displayBookings("Booking/restaurants.db", "Restaurant Bookings");
displayBookings("Booking/bowling.db", "Bowling Bookings");
displayBookings("Booking/bicycles.db", "Bicycle Bookings");

?>
