<?php

$server = "localhost";
$user="root";
$password = "";
$db = "test";

$mysqli = new mysqli($server, $user, $password, $db);

if($mysqli->connect_error){
  die("Connection Failed :".$mysqli->connect_error);
}



 ?>
