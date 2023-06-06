<?php
$db = new PDO('sqlite:users.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT name, username, password FROM users";
$result = $db->query($query);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
echo "<tr><th>Name</th><th>Username</th><th>Password</th></tr>";

foreach ($rows as $row) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
