<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("location:../Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABESIT EVENT DASHBOARD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'Dashheader.php';  ?>

  <div class="container-fluid">
    <h1 class="text-center">ABESIT EVENT DASHBOARD</h1>
  </div>

  <div class="container bg-warning p-3 w-50 ">
    
      <?php
            include '../Connection.php';
            $uname = $_SESSION['username'];

            $sql = "select * from registration where username='$uname'";
            $result = $con->query($sql);
  
            $row = $result->fetch_assoc();

              $id      = $row['id'];
              $uname    = $row['username'];
              $pass = $row['password'];
              $email  = $row['email'];
              $age  = $row['age'];
             
              echo "
              <table class='table'>
              <tr>
                <th>Id</th>
                <td>$id</td>
              </tr>
              <tr>
              <th>User Name</th>
              <td>$uname</td>
            </tr>
            <tr>
            <th>Password</th>
            <td>$pass</td>
          </tr>
          <tr>
          <th>Email Id</th>
          <td>$email</td>
        </tr>
                <tr>
        <th>Age</th>
        <td>$age</td>
      </tr>
      </table>      
    ";
      ?>
  </div>
   <div>
  <?php include 'dashfooter.php'; ?>
 </div>
</body>

</html>