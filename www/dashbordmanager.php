<?php

session_start();

if(!isset($_SESSION['logedin']) && !$_SESSION['logedin']) {
  echo "nee";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <a href="rooms-index.php">rooms</a>
  </div>
  <div>
    <a href="guests-index.php">guests</a>
  </div>
</body>
</html>