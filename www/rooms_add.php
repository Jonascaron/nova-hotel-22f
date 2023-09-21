<?php
require "database.php";

$room_number = $_POST['room_number'];
$room_type = $_POST['room_type'];
$bed_count = $_POST['bed_count'];
$bathroom_type = $_POST['bathroom_type'];
$view_type = $_POST['view_type'];
$floor_level = $_POST['floor_level'];
$has_balcony = $_POST['has_balcony'];

$stmt = $conn->prepare("INSERT INTO rooms (room_number, room_type, bed_count, bathroom_type, view_type, floor_level, has_balcony) 
        VALUES (:room_number, :room_type, :bed_count, :bathroom_type, :view_type, :floor_level, :has_balcony)");
$stmt->bindParam(':room_number', $room_number);
$stmt->bindParam(':room_type', $room_type);
$stmt->bindParam(':bed_count', $bed_count);
$stmt->bindParam(':bathroom_type', $bathroom_type);
$stmt->bindParam(':view_type', $view_type);
$stmt->bindParam(':floor_level', $floor_level);
$stmt->bindParam(':has_balcony', $has_balcony);

if($stmt->execute()) {
  header("location: rooms-index.php");
  exit;
}

?>