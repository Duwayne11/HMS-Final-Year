<?php
session_start(); $userPassword = $_SESSION['userPassword']; 
//load.php


$connect = new PDO('mysql:host=localhost;dbname=althealth1', 'root', '');

$data = array();

$query = "SELECT * FROM events WHERE `userPasswID`='$userPassword'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>