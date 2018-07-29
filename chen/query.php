<?php
require('connection.php');

$friend = getfriendByName();
if(is_array($friend)) {

  echo json_encode($friend);
}
function getfriendByName() {
  $query  =  "SELECT * from users WHERE `Name`='".$_POST['Name']."'";
  $result = mysql_query($query);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }
  while($row=mysql_fetch_array($result)) {
    $friendlist[] = $row;
  }
  return $friendlist;
}

?>