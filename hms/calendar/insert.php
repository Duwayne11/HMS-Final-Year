<?php

  session_start(); $userPassword = $_SESSION['userPassword'];  
//insert.php

$connect = new PDO('mysql:host=localhost;dbname=althealth1', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event, userPasswID) 
 VALUES (:title, :start_event, :end_event, :userPasswID)";
 
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':userPasswID' => $userPassword 
  )
 );
}


?>
