<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'header.php'; ?>
  <?php
    $user = 0;
    $success = 0;

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include 'Connection.php';

     $username = $_POST['uname'];
     $password = $_POST['pass'];
     $email = $_POST['email'];
     $age = $_POST['age'];

    $sql = "select * from registration where username='$username';";
    $result = $con->query($sql);

    if(mysqli_num_rows($result) > 0){
      //echo 'User Already Exist...';
        $user = 1;
    }
    else {
       $sql = "insert into registration (username, password, email, age) values('$username', '$password', '$email', $age)";
        $result = $con->query($sql);

        if($result == true)
         { 
          //echo 'Sign Up Success...';
           $success = 1;
        }else
          die(mysqli_error($con));
    }      
  $con->close();
  }
  ?>

  <div class="container mt-5 w-50 mb-5">
  <h1 class="text-center">Registration Page</h1>
  <?php
    
    if($user)
     echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> Sorry </strong> User already exist...
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>    ';
     if($success)
     echo ' <div class="alert alert-info alert-dismissible fade show" role="alert">
     <strong> Congrats </strong> User Registered Successfully...
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
     ';
  
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
  <div class="mb-3">
    <label class="form-label">Email Id</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Email Id Here">
  </div>
  <div class="mb-3">
    <label class="form-label">Age</label>
    <input type="number" class="form-control" name="age" placeholder="Enter Age Here">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
  </form>
  <p>Already have an Account ? <a href="Login.php">Login Here</a></p> 

  </div>
  
  <?php include 'footer.php'; ?> 
</body>
</html>