<?php
require 'database.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {
  $email = $_POST['email'];

  
  $stmt = $conn->prepare("SELECT email FROM newsletter WHERE email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  if($stmt->rowCount() > 0) {
    echo "email is al in gebruik";
    exit;
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (:email)");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    header("location: thank_you_for_sub.php");
    exit;
  } 
}

header("location: index.php");