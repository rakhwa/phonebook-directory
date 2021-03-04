<?php

require 'connection.php';

session_start();

$sql = "SELECT * FROM user where id= ".$_SESSION['contact_id'];
$result = $connection->query($sql);

 // var_dump($result); exit;

$count = 1;
    $row = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>VIEW</title>
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
          <th>username</th>
          <th>email</th>
          <th>action</th>
        </tr>
      </thead>

      <tbody>
          <?php 

         if($result){ 
  ?>
    <tr>
      <th><?php echo $count; ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
     
    <td> <a href="edit_user.php?editid=<?php echo $row["id"]; ?>" class="text-decoration-none text-primary mr-2">Edit </a></td>  

    </tr>
  <?php  }
    else {?>
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