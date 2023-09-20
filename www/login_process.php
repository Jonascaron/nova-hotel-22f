<?php

require 'database.php';

if(isset($_POST['email']) && !empty($_POST['email'])  ) {
  if(isset($_POST['password']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() == 0) {
      echo "de email is niet goed";
      exit;
    }
    
    $myGuests = $stmt->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password, $myGuests['password'])) {
      session_start();
      $_SESSION['logedin'] = true;
      $_SESSION['id'] = $myGuests['user_id'];
      $_SESSION['firstname'] = $myGuests['firstname'];
      $_SESSION['lastname'] = $myGuests['lastname'];
      $_SESSION['email'] = $myGuests['email'];
      $_SESSION['password'] = $myGuests['password'];
      $_SESSION['dob'] = $myGuests['dob'];
      $_SESSION['role'] = $myGuests['role'];


      if($myGuests['role'] == 'guest') {
        header('location: dashbord.php');
        exit;
      }

      if($myGuests['role'] == 'manager') {
        header('location: dashbordmanager.php');
        exit;
      }
    }
  }
}
