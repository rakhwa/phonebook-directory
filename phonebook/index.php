<?php require 'connection.php' ;

session_start();


$message = '';

if(isset($_POST['submit'])){


  $username = $_POST['username'];
  $password = $_POST['password'];
  // echo $username." ". $password;
  // exit;



  if($username == '' || $password == ''){
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

  }


  else{

    $usernameExists = $connection->query("SELECT * FROM user WHERE username = '$username' ");
     $passwordExists = $connection->query("SELECT * FROM user WHERE password = '$password' ");

    if ($usernameExists->num_rows == 0) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username does not exists</div>';
    }

     elseif ($passwordExists->num_rows == 0) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> password doesnot exists</div>';
      
    }


  else
  {

   $query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
   $result = $connection->query($query);

  
   if($result == TRUE) {
     $member = $result->fetch_assoc();

     $_SESSION['username'] = $username;
     
     $_SESSION['contact_id'] = $member['id'];
  

       // var_dump($result); exit;

     header('Location: home.php'); 

   }
   else
   {
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Invalid username or password</div>';  

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
	<title>LOGIN</title>

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

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center"><h4 class="text-info">Login form</h4></div>
                        <div class="card-body mt-4">

                            <?php echo $message ?>
                            <form name="my-form" onsubmit="return validform()" action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">
                          
                                  <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right text-info">Username<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username">
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right text-info">Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="submit" class="btn btn-info btn-form">
                                        Login
                                        </button>
                                    </div>


                                    <div class="mt-5"><p class="text-capitalize">if you don't have an account<a href="register.php"> Register Here</a></p></div>
                                    
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