<?php
$showAlert=false;   
$showError=false; 
if ($_SERVER["REQUEST_METHOD"]=="POST") { 
      
    include 'partials/_dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
    // Checking the username
    $existSql="select*from `users` where username='$username'";
    $result=mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if ($numExistRows>0) {
        $showError=" Username already exists.";
    }
    else{
        // $exists=false;
        
            if ($password==$cpassword) {
                $hash= password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`username`,`password`,`dt`) VALUES ('$username','$hash',current_timestamp())";
                $result=mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert=true;
                }
            }
            else{
                $showError="Passwords do not match.";
            }
        }
}

?>


<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css" integrity="sha384-MdqCcafa5BLgxBDJ3d/4D292geNL64JyRtSGjEszRUQX9rhL1QkcnId+OT7Yw+D+" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/_nav.php';  ?>
    <?php
    if ($showAlert) {
        
        echo'
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> Your account has been created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        }
    if ($showError) {
        
        echo'
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error </strong>'.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        }
     ?>

    <div class="container my-4 ">
        <h1 class="text-center">SignUp to our website</h1>
        <form action="/LogIn system/signup.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">UserName</label>
                <input type="text" class="form-control" id="username" , name="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 col-md-6">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
            </div>
            
            <button type="submit" class="btn btn-primary col-md-6">SignUp</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    
  </body>
</html>