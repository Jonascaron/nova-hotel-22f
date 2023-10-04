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
  <div class="card" style="width: 18rem;">
    <a href="update_image.php">
      <img src="img/<?php echo $_SESSION['image'] ?>" class="card-img-top" alt="...">
    </a>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><?php echo $_SESSION['firstname'] ?></li>
      <li class="list-group-item"><?php echo $_SESSION['lastname'] ?></li>
      <li class="list-group-item"><?php echo $_SESSION['email'] ?></li>
      <li class="list-group-item"><a href="password_update.php">password veranderen</a></li>
      <li class="list-group-item"><a href="update_user.php">update user</a></li>
    </ul>
  </div>
</body>
</html>