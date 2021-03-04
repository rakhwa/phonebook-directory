<?php 
require 'connection.php';
session_start();

   $id = $_GET['editid']; 
  // var_dump($id) ;exit;
// GETTING ID FROM URL
   $query = "SELECT * FROM contact WHERE id ='$id' AND user_id = ".$_SESSION['contact_id'];
   $result = $connection->query($query);
   if ($result->num_rows == 1) {
    $row = $result->fetch_assoc(); 
   }

   else
   {
     header('Location: viewall.php');
   }


   $message = '';
  if(isset($_POST['update'])){

      $id = $_POST['id'];
      $name = $_POST['name'];
      $designation = $_POST['designation'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      if($name == ''  || $phone ==''  ){
         $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

      }
      else
      {
         $query = "UPDATE contact SET name = '$name', designation =  '$designation', phone =  '$phone', address = '$address'WHERE  id ='$id' ";
          $result =$connection->query($query);
         //var_dump($result); exit;

          if($result){
            header("Location:viewall.php"); 
           } else {
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
           }
      }
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADDNEW</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">


<?php include 'menu.php' ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card pb-4">
                        <div class="card-header text-center"><h4 class="text-info">Update Contact</h4></div>
                        <div class="card-body mt-4">
                            <form name="my-form" onsubmit="return validform()" action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right text-info">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">

                                      <input type="hidden" id="id" class="form-control" display="hidden" name= "id" value = "<?php echo $row["id"]; ?>" >

                                        <input type="text" id="name" class="form-control" name= "name" value = "<?php echo $row["name"]; ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="designation" class="col-md-4 col-form-label text-md-right text-info">Designation<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="designation" class="form-control" name="designation" value = "<?php echo $row["designation"]; ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right text-info">Phone<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" id="phone" class="form-control" name="phone" value = "<?php echo $row["phone"]; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right text-info">Address<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="address" value = "<?php echo $row["address"]; ?>">
                                    </div>
                                </div>

                                
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit"   name="update" class="btn btn-info btn-form">
                                        Update
                                        </button>
                                    </div>

                                    
                                    </form>
                                </div>
                            
                        </div>
                  </div>
            </div>
        </div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>