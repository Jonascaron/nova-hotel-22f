<?php

require 'database.php';

$stmt = $conn->prepare("SELECT * FROM rooms");
$stmt->execute();

// set the resulting array to associative
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
  <div>
    <a href="room_add.php">kamer aanmaken</a>
  </div>
  <table>
    <tr>
      <th>room_id</th>
      <th>room_number</th>
      <th>room_type</th>
      <th>bed_count</th>
      <th>bathroom_type</th>
      <th>view_type</th>
      <th>floor_level</th>
      <th>has_balcony</th>
    </tr>
    <?php foreach ($rooms as $room): ?>
    <tr>
      <td><?php echo $room['room_id'] ?></td>
      <td><?php echo $room['room_number'] ?></td>
      <td><?php echo $room['room_type'] ?></td>
      <td><?php echo $room['bed_count'] ?></td>
      <td><?php echo $room['bathroom_type'] ?></td>
      <td><?php echo $room['view_type'] ?></td>
      <td><?php echo $room['floor_level'] ?></td>
      <td><?php echo $room['has_balcony'] == 1 ? 'ja' : 'nee'?></td>
      <td><a href="rooms_delete.php?id=<?php echo $room['room_id'] ?>">delete</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>