<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php include 'header.php' ?>

  <?php
    $invalid = 0;
    $success = 0;

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include 'Connection.php';

     $username = $_POST['uname'];
     $password = $_POST['pass'];

    $sql = "select * from registration where username='$username' and password='$password';";
    $result = $con->query($sql);

        if(mysqli_num_rows($result) > 0)
         { 
//           echo 'Login Success...';
            $success=1;
            session_start();
            $_SESSION["username"] = $username; // define session variable
            header("location:DashBoard\Event-DashBoard.php");
          }else
          {
//            echo 'Login Failed due to invalid credentials...';
            $invalid = 1;
          }
  $con->close();
  }
  ?>

  <div class="container mt-5 w-50 mb-5">
  <h1 class="text-center">Login Page</h1>
  <?php
        if($invalid)
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Sorry </strong> Login Failed due to invalid credentials...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    ';
      if($success)
      echo ' <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong> Success </strong> Login Success.....
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    ';
   
  
  ?>
  <form action="" method="post">
  <div class="mb-3">
    <label class="form-label">User Name</label>
    <input type="text" class="form-control" name="uname" placeholder="Enter Username Here">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>

   <p>Don't have an Account ? <a href="Registration.php">Register Here</a></p> 
  </div>
  
  <?php include 'footer.php'; ?>
  
</body>
</html>