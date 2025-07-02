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

  <div class="container bg-warning p-3">
    <h3>
      <?php
      echo "Welcome, <b>", $_SESSION['username'], "</b> Hello Here in This DashBoard";
      ?>
    </h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati pariatur reprehenderit quam! Expedita id aliquam facilis dignissimos cumque iste veritatis magni quis enim a. Quam, aperiam culpa. Voluptate incidunt omnis quo sapiente ipsum officia cum cupiditate placeat quis aliquam fuga earum accusantium doloremque, commodi eveniet quam recusandae excepturi sint. Aliquam!</p>
    <h4 class="bg-info">Operations you can handle here are as follows:</h4>
    <ul>
      <li>Add Participants</li>
      <li>Display Participants Record</li>
      <li>Update Participants Record</li>
      <li>Delete Participants Record</li>
    </ul>
  </div>
  <?php include 'dashfooter.php'; ?>

</body>

</html>