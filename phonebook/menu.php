<?php
require 'connection.php';


$sql = "SELECT * FROM contact where user_id= ".$_SESSION['contact_id'];
$result = $connection->query($sql);

function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>MENU</title>
</head>
<body>
	

	<nav class="navbar navbar-expand-lg text-white menu pt-3">
  <div class="container-fluid">


	<div class="navbar-header">
   	<h2><img src="https://img.icons8.com/fluent/48/000000/address-book-2.png"/>PhoneBook</h2>
	</div>


<button class="navbar-toggler border border-light bg-info" data-toggle="collapse" data-target="#navbarMenu">
	<span class="navbar-toggler-icon text-light"></span>
</button>

<div class="collapse navbar-collapse" id="navbarMenu">


		 <ul class="navbar-nav ml-auto text-white mb-3 list">

		<li class="nav-item active pr-3 mt-1"><a class="nav-link <?php active('home.php');?>" href="home.php">Home</a></li>

		<li class="nav-item pr-3 mt-1 mr-0"><a class="nav-link <?php active('addnew.php');?>" href="addnew.php">AddNew</a></li>

		<li class="nav-item pr-3 mt-1"><a class="nav-link <?php active('viewall.php');?>" href="viewall.php">ViewAll<span class="box"> <?php   echo $result->num_rows; ?>  </span></a></li>

		<li class="nav-item pr-3 mt-1"><a class="nav-link <?php active('view.php');?>" href="view.php">View</a></li>

		<li class="nav-item pr-3 mt-1"><a class="nav-link <?php active('changepassword.php');?>" href="changepassword.php">ChangePassword</a></li>

		<a class="nav-link" href="logout.php"><button type="button" class="btn btn-success">Logout</button>
		</a>
	</ul>
 
 </div>
</div>
</nav>
<!-- nav end -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>