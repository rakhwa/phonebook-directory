<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phonebook";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// var_dump($connection); exit;

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
else
{
  echo "";
}


