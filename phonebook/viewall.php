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
	<title>VIEWALL</title>
</head>
<body class="bg">

<?php include 'menu.php' ?>

<div class="container mt-5">                                                             
  <div class="table-responsive">
    <table class="table table-bordered bg-light text-center text-capitalize">
      <thead>
        <tr>
          <th>Sr#</th>
          <th>name</th>
          <th>designation</th>
          <th>phone</th>
          <th>address</th>
          <th>action</th>
        </tr>
      </thead>

      <tbody>
          <?php if($result->num_rows > 0) {
    $count = 1;
    while($row = $result->fetch_assoc()){
    ?>
    <tr>
      <th><?php echo $count; ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['designation'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['address'] ?></td>
     
    <td> <a href="edit_contact.php?editid=<?php echo $row["id"]; ?>" class="text-decoration-none text-primary mr-2">Edit </a> |  <a href="delete.php?deleteid=<?php echo $row["id"]; ?>" class="text-decoration-none text-danger ml-2" onclick="return confirm('Are you sure do you wan\'t to delete the user?')">Delete </a></td>  





    </tr>
  <?php $count++; }
    } else {?>
  <tr>
    <td colspan="6" class="text-center text-danger"> No Record Found</td>
  </tr>
<?php }?>

      </tbody>
    </table>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>