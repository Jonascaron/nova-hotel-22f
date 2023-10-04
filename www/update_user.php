<?php 
session_start();

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
    <form action="update_user_process.php" method="post" enctype="multipart/form-data">
      <input type="email" name="email" id="" required placeholder="email" value="<?php echo $_SESSION['email'] ?>">
      <input type="firstname" name="firstname" id="" required placeholder="firstname" value="<?php echo $_SESSION['firstname'] ?>">
      <input type="lastname" name="lastname" id="" required placeholder="lastname" value="<?php echo $_SESSION['lastname'] ?>">
      <input type="date" name="dob" id="" required placeholder="gebortedatum" value="<?php echo $_SESSION['dob'] ?>">
      <button type="submit">update</button>
    </form>
  </div>
</body>
</html>