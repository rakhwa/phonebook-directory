<?php
require 'connection.php';
session_start();


$sql = "SELECT * FROM contact where user_id= ".$_SESSION['contact_id'];
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>HOME</title>
</head>
<body class="bg">

<?php include 'menu.php' ?>
<div class="container mt-5 text-dark">
	<div class="row">
		<div class="col-md-9 m-auto text-center mt-5">
			<h3 class="text-capitalize text-secondary pt-5">log in as <?php echo $_SESSION['username']; ?></h3>


			<h4 class="mb-4 pt-5 mt-5 text-capitalize text-light">total user in yor contact list <?php   echo $result->num_rows; ?> </h4>
		</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>