<?php
session_start();

$_SESSION['username'] = "$username";
 echo $_SESSION['username'];
  header('Location: index.php'); 
 session_destroy();

?>