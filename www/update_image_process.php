<?php

session_start();


  require 'database.php';
  if (isset($_FILES['image'])) {
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $allowed_exs = array('jpg', 'jpeg', 'png');
    if (in_array($img_ex_lc, $allowed_exs)) {
      $new_name = uniqid("IMG-", true).'.'.$img_ex_lc;
      $img_upload_path = 'img/'.$new_name;
      move_uploaded_file($tmp_name, $img_upload_path);
      
      $stmt = $conn->prepare("UPDATE users SET image = :image WHERE user_id = :id");
      $stmt->bindParam(':image', $new_name);
      $stmt->bindParam(':id', $_SESSION['id']);

      if($stmt->execute()) {
        echo 'upgedate';
        echo '<a href="dashbord.php">terug naar het dashbord</a>';
        $_SESSION['image'] = $new_name;
        exit;
      }      
    }
    else {
      echo 'not allowed file type';
    }
  }
