<?php
require('connection.php');
$query = $conn->query("SELECT * FROM users");
$friends = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($friends)) {
  echo json_encode($friends);
}

?>