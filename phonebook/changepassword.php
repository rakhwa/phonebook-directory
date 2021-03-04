<?php 
require 'connection.php';

session_start();

    $message= '';
        if(isset($_POST['change']))
        {
          $old_password = $_POST['old_password'];
          $new_password = $_POST['new_password'];
          $confirm_password = $_POST['confirm_password'];
          if($old_password == ''  || $new_password ==''  || $confirm_password ==''  ){
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  
          } 
          else 
          {
             $sql = "SELECT * FROM user where id = ".$_SESSION['contact_id']." AND password = '".$old_password."'";
              $result = $connection->query($sql);

              if ($result->num_rows == 1) {
                if ($new_password == $confirm_password) {
                  $query = "UPDATE user SET password='".$new_password."' WHERE id =".$_SESSION['contact_id'];

                   $result= $connection->query($query);
                   if($result){
                      $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Password Changed successfully.</div>';
                   }else {
                      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> There was error while adding record.</div>';  
                   } 
                } else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Confirm Password does not match.</div>';  
               } 
              }else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Old Password does not match.</div>';  
               }  


             
          }
        }



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ChangePassword</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg">

<?php include 'menu.php' ?>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center"><h4 class="text-info">Change Password</h4></div>
                        <div class="card-body mt-4">

                            <?php echo $message ?>

                            <form name="my-form" onsubmit="return validform()" action="<?php echo ($_SERVER['REQUEST_URI']);?>" method="POST">
                          
                                  <div class="form-group row">
                                    <label for="old_password" class="col-md-4 col-form-label text-md-right text-info">Old Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="old_password" class="form-control" name="old_password">
                                    </div>
                                </div>

                                

                                <div class="form-group row">
                                    <label for="newpassword" class="col-md-4 col-form-label text-md-right text-info">New Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="new_password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cpassword" class="col-md-4 col-form-label text-md-right text-info">Confirm Password<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" id="cpassword" class="form-control" name="confirm_password">
                                    </div>
                                </div>


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="change" class="btn btn-info btn-form">
                                        Change
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