<?php
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "fitness"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all saved workouts
$sql = "SELECT * FROM workout ORDER BY id DESC";
$result = $conn->query($sql);

$workouts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $workouts[] = $row;
    }
}

// Return the workouts in JSON format
echo json_encode($workouts);

$conn->close();
?>