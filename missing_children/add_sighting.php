<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "missing_children_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$child_id = $_POST['child_id'];
$location = $_POST['location'];
$description = $_POST['description'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["sighting_photo"]["name"]);
move_uploaded_file($_FILES["sighting_photo"]["tmp_name"], $target_file);

$sighting_photo = $target_file;

$sql = "INSERT INTO sightings (child_id, location, description, sighting_photo)
        VALUES ($child_id, '$location', '$description', '$sighting_photo')";

if ($conn->query($sql) === TRUE) {
    header("Location: sighting.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
