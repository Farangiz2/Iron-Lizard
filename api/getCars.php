<?php
require_once('../config.php');

// Connect to MySQL
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars from database
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

$cars = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

// Return cars data as JSON
header('Content-Type: application/json');
echo json_encode($cars);

$conn->close();
?>
