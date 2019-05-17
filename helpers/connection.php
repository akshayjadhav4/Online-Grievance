<?php
$serevername = "localhost";
$username = "root";
$password = "12345";
$errors = array();

try {
  $conn = new PDO("mysql:host=$serevername;dbname=onlinegrievance",$username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  // echo "YES";
  session_start();
  

} catch (PDOException $e) {
  echo "Connection Failed : ".$e->getMessage();
}
//Disconnect
// $conn = null;
 ?>
