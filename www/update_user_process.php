<?php

require 'database.php';

if(!isset($_POST['email']) || !isset($_POST['dob']) || !isset($_POST['firstname']) || !isset($_POST['lastname'])) {
  echo "een veld is niet aangemaakt";
  exit;
}

if(empty($_POST['email']) || empty($_POST['dob']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
  echo "een veld is niet ingevuld";
  exit;
}

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo"niet een goed email in gevoord";
  exit;
} 

session_start();


// prepare sql and bind parameters
$stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, dob = :dob WHERE user_id = :id");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':dob', $dob);
$stmt->bindParam(':id', $_SESSION['id']);

$dob = $_POST['dob'];
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
if($stmt->execute()) {
  echo 'upgedate';
  exit;
}
