<?php
require 'database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM guests WHERE guest_id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

// set the resulting array to associative
$guest = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <tr>
      <td><?php echo $guest['guest_id']?></td>
      <td><?php echo $guest['firstname']?></td>
      <td><?php echo $guest['lastname']?></td>
      <td><?php echo $guest['email']?></td>
      <td><?php echo $guest['dob']?></td>
    </tr>
  </table>
</body>
</html>