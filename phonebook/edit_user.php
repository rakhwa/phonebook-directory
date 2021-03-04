<?php 
require 'connection.php';
session_start();


 $message = '';
      if(isset($_POST['update'])){

          $name = $_POST['name'];
          $username = $_POST['username'];
          $email = $_POST['email'];


          $id = $_SESSION['contact_id'];

          if($name == ''  || $username ==''  || $email ==''  ){
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

          }
          else
          {
            $emailExists = $connection->query("SELECT * FROM user WHERE id <> '$id' AND email = '$email' ");
            $usernameExists = $connection->query("SELECT * FROM user WHERE id <> '$id' AND username = '$username' ");

            if ($usernameExists->num_rows == 1) {
              
              $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
            }
            elseif ($emailExists->num_rows == 1) {
              $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
              
            }
            else
            {
            $query = "UPDATE user SET name = '$name',  username =  '$username' , email =  '$email' WHERE id ='$id'";
            $result = $connection->query($query);
              if($result){
                 $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Profile Update Successfully</div>';   
               } else {
                 $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
               }
             }
          }
      }
      $query = "SELECT * FROM user WHERE id = ".$_SESSION['contact_id'];
      $result = $connection->query($query);
      $row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit_user</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">


<?php include 'menu.php' ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card pb-4">
                        <div class="card-header text-center"><h4 class="text-info">Update User</h4></div>
                        <div class="card-body mt-4">

                            <?php echo $message ?>

                            <form name="my-form" onsubmit="return validform()" action="<?php echo ($_SERVER["PHP_SELF"]);?>" method="POST">

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right text-info">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">

                                      <input type="hidden" id="id" class="form-control" display="hidden" name= "id" value = "<?php echo $row["id"]; ?>" >

                                        <input type="text" id="name" class="form-control" name= "name" value = "<?php echo $row["name"]; ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="designation" class="col-md-4 col-form-label text-md-right text-info">Username<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" id="designation" class="form-control" name="username" value = "<?php echo $row["username"]; ?>" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right text-info">Email<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" value = "<?php echo $row["email"]; ?>">
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