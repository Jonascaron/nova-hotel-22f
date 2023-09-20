<?php

require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM rooms WHERE room_id = :room_id");
$stmt->bindParam(':room_id', $id);
if($stmt->execute()) {
  header('location: rooms-index.php');
  exit;
}