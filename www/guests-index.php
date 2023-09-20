<?php

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM users WHERE role = 'guest'");
$stmt->execute();

// set the resulting array to associative
$guests = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    td, th{
      border: 1px solid;
      padding: 5px;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>guest_id</th>
      <th>firstname</th>
      <th>lastname</th>
      <th>email</th>
      <th>dob</th>
    </tr>
    <?php foreach ($guests as $guest): ?>
    <tr>
      <td><?php echo $guest['user_id']?></td>
      <td><?php echo $guest['firstname']?></td>
      <td><?php echo $guest['lastname']?></td>
      <td><?php echo $guest['email']?></td>
      <td><?php echo $guest['dob']?></td>
      <td><a href="guest_dital.php?id=<?php echo $guest['users_id'] ?>">info</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>