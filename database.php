<?php


$username = 'sql9580579';
$password = 'VrT79kYdlJ';
try {
  $conn = new PDO("mysql:host=sql9.freemysqlhosting.net;dbname=sql9580579;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>