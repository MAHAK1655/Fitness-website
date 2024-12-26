<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $workoutName = $_POST['workoutName'];
    $workoutTime = $_POST['workoutTime'];

    // Connect to MySQL
    $servername = "localhost";
    $username = "root"; // Update with your MySQL username
    $password = ""; // Update with your MySQL password
    $dbname = "fitness"; // Your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert workout data into the database
    $sql = "INSERT INTO workout (workout_name, workout_time) VALUES ('$workoutName', '$workoutTime')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Workout saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>