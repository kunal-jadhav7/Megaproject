<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "missing_children_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, age, description, photo, last_seen_location FROM children";
$result = $conn->query($sql);

$children = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $children[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($children);

$conn->close();
?>
