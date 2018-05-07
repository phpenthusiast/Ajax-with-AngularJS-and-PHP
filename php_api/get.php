<?php
require 'connect.php';

$connect = connect();

// Get the data
$people = array();
$sql = "SELECT id, name, phone FROM people";

if($result = mysqli_query($connect,$sql))
{
  $count = mysqli_num_rows($result);

  $people[0]['id']    = 1;
  $people[0]['name']  = 'Joe';
  $people[0]['phone'] = '1234567';
  
  $cr = 1;
  while($row = mysqli_fetch_assoc($result))
  {
      $people[$cr]['id']    = $row['id'];
      $people[$cr]['name']  = $row['name'];
      $people[$cr]['phone'] = $row['phone'];

      $cr++;
  }
}

$json = json_encode($people);
echo $json;
exit;
