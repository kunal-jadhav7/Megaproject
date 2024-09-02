<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "missing_children_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];
$description = $_POST['description'];
$last_seen_location = $_POST['last_seen_location'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

$photo = $target_file;

$sql = "INSERT INTO children (name, age, description, photo, last_seen_location)
        VALUES ('$name', $age, '$description', '$photo', '$last_seen_location')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
