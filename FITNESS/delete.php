<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";      // Update with your MySQL password
$dbname = "fitness"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all workouts
$sql = "SELECT id, workout_name, workout_time FROM workout";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each workout
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "Workout: " . $row['workout_name'] . " | Time: " . $row['workout_time'];
        echo "<form method='POST' action='delete_workout.php'>";
        echo "<input type='hidden' name='workout_id' value='" . $row['id'] . "'>";
        echo "<button type='submit'>Delete Workout</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No workouts found.";
}

$conn->close();
?>