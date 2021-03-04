<?php
require 'connection.php';

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(11) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($connection->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $connection->error;
}


$connection->close();
?>