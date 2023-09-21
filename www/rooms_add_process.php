<?php
require "database.php";

// set the resulting array to associative

if(!isset($_POST['room_number'])) {
  echo "hoi";
  exit;
}

if(empty($_POST['room_number']) || empty($_POST['room_type']) || empty($_POST['bed_count']) || empty($_POST['bathroom_type']) || empty($_POST['view_type']) || empty($_POST['floor_level']) || empty($_POST['has_balcony'])) {
  echo "nee";
  exit;
}

$room_number = $_POST['room_number'];

$stmt = $conn->prepare("SELECT * FROM rooms WHERE room_number = :room_number");
$stmt->bindParam(':room_number', $room_number);
$stmt->execute();

if($stmt->rowCount() != 0) {
  echo "hij werkt";
  exit;
}


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