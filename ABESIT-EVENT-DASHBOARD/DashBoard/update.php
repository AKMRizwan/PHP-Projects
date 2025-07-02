<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABESIT EVENT DASHBOARD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style1.css">

</head>

<body>
  <?php include 'Dashheader.php';  ?>

  <div class="container-fluid">
    <h1 class="text-center">ABESIT EVENT DASHBOARD</h1>
    <h2 class="text-center">Update Participants Record</h2>

    <div class="container main">
      <?php
         include '../Connection.php';

        if (isset($_GET['participant_id'])) {
          $id = $_GET['participant_id'];

          $sql = "select * from participants where id=$id";
          $result = $con->query($sql);

          while ($row = $result->fetch_assoc()) {
            $id      = $row['id'];
            $name    = $row['name'];
            $colname = $row['colname'];
            $branch  = $row['branch'];
            $mobile  = $row['mobile'];
            $city    = $row['city'];
            $gender  = $row['gender'];
          }
        }


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = $_POST['name'];
        $colname = $_POST['colname'];
        $branch = $_POST['branch'];
        $mobile = $_POST['mobile'];
        $city = $_POST['city'];
        $gender = $_POST['gender'];

        $sql = "update participants set name='$name', colname='$colname', branch='$branch', mobile='$mobile', city='$city', gender='$gender' where id=$id;";

        $result = $con->query($sql);

        if ($result)
          //     echo 'Participants Record Saved Successfully';
          header("location:DisplayParticipant.php");
        else
          echo 'failed';
      }
      ?>
      <form action="" method="post">
        <div>
          <label for="">Name</label>
          <input type="text" placeholder="Enter Name" name="name" value=<?php echo $name; ?>>
        </div>
        <div>
          <label for="">College Name</label>
          <input type="text" placeholder="Enter College Name" name="colname" value=<?php echo $colname; ?>>
        </div>
        <div>
          <label for="">Branch</label>
          <input type="text" placeholder="Enter Branch" name="branch" value=<?php echo $branch; ?>>
        </div>
        <div>
          <label for="">Mobile No.</label>
          <input type="text" placeholder="Enter Mobile" name="mobile" value=<?php echo $mobile; ?>>
        </div>
        <div>
          <label for="">City</label>
          <input type="text" placeholder="Enter City" name="city" value=<?php echo $city; ?>>
        </div>
        <div class="text-center">
          <label for="">Gender</label>
          <input type="radio" value="m" name="gender" checked>Male
          <input type="radio" value="f" name="gender">Female
          <input type="radio" value="o" name="gender">Other
        </div>

        <button class="btn btn-primary w-100 mt-3">Update Paricipant</button>
      </form>

    </div>
  </div>
  <?php include 'dashfooter.php'; ?>

</body>

</html>