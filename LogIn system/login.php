<?php
    $login=false;   
    $showError=false; 
if ($_SERVER["REQUEST_METHOD"]=="POST") { 
  
    include 'partials/_dbconnect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    
   
        // $sql="select * from `users` where `username` ='$username' AND `password`='$password'";
        $sql="select * from `users` where `username` ='$username' ";
        $result=mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);
        if ($num==1) {
            while($row=mysqli_fetch_assoc($result)){
              if (password_verify($password, $row['password'])) {
                
                  $login=true;
                  session_start();
                  $_SESSION['loggedin']=true;
                  $_SESSION['username']=$username;
                  header("location: welcome.php");
              } 
              else{
            $showError="Invalid Password ";
        } 
            }

        }
        else{
            $showError="Invalid Password ";
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

    <title>LogIn</title>
  </head>
  <body>
    <?php require 'partials/_nav.php';  ?>
    <?php
    if ($login) {
        
        echo'
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> You are logged in.
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
        <h1 class="text-center">LogIn to our website</h1>
        <form action="/LogIn system/login.php" method="post">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">UserName</label>
                <input type="text" class="form-control" id="username" , name="username" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary col-md-6">LogIn</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    
  </body>
</html>