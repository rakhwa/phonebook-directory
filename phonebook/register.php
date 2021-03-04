<?php
require 'connection.php';
session_start();

$message = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password =$_POST['confirm_password'];

  if($name == '' || $username == ''  || $email == ''  || $password == '' || $confirm_password ==''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 

  }
  else if( $password != $confirm_password){
    
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Passwords do not match.</div>'; 
  }
  else
  {
    $emailExists = $connection->query("SELECT * FROM user WHERE email = '$email' ");
    $usernameExists = $connection->query("SELECT * FROM user WHERE username = '$username' ");

    if ($usernameExists->num_rows == 1) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
    }
    elseif ($emailExists->num_rows == 1) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
      
    }
    else
    {
        $sql = "INSERT INTO user(name, username, email, password) VALUES ('$name','$username','$email', '$password')";
        $result = $connection->query($sql);
        if($result == TRUE){
          $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Record added successfully</div>'; 
        }
        else  
        {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';  
        }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>REGISTER</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">

<nav class="navbar navbar-expand-lg text-white pt-3">
  <div class="container-fluid">


	<div class="navbar-header">
   	<h2><img src="https://img.icons8.com/fluent/48/000000/address-book-2.png"/>PhoneBook</h2>
	</div>

</div>
</nav>
<!-- nav end -->


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center"><h4 class="text-info">Registeration form</h4></div>
                        <div class="card-body">

                          <?php echo $message ?>
                            <form name="my-form" onsubmit="return validform()" action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right text-info">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name">
                                    </div>
                                </div>

                                  <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right text-info">Username<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right text-info">Email Address<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right text-info">Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="cpassword" class="col-md-4 col-form-label text-md-right text-info">Conform Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="cpassword" class="form-control" name="confirm_password">
                                    </div>
                                </div>

                                
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="submit" class="btn btn-info btn-form">
                                        Register
                                        </button>
                                    </div>

                                    <div class="mt-5"><p class="text-capitalize">if you have an account yet<a href="index.php"> Login Here</a></p></div>
                                    
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