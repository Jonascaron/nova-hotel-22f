<?php

require 'database.php';

if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['firstname']) || !isset($_POST['lastname'])) {
  echo "een veld is niet aangemaakt";
  exit;
}

if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
  echo "een veld is niet ingevuld";
  exit;
}

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo"niet een goed email in gevoord";
  exit;
} 

$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password)
VALUES (:firstname, :lastname, :email, :password)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashed_password);

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
if($stmt->execute()) {
  echo 'je bent geregristreerd';
  exit;
}
