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
    <h2 class="text-center">Display Participants Record</h2>
    <div class="container main-dp">
      <button class="btn btn-primary mb-2"><a href="AddParticipant.php" class="text-light"> Add Participants </a></button>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Name</th>
            <th scope="col">College Name</th>
            <th scope="col">Branch</th>
            <th scope="col">Mobile</th>
            <th scope="col">City</th>
            <th scope="col">Gender</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include '../Connection.php';


          $sql = 'select * from participants;';
          $result = $con->query($sql);

          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $colname = $row['colname'];
            $branch = $row['branch'];
            $mobile = $row['mobile'];
            $city = $row['city'];
            $gender = $row['gender'];

            switch ($gender) {
              case 'm': $gender = 'Male'; break;
              case 'f': $gender = 'Female'; break;
              case 'o': $gender = 'Other'; break;
            }
            echo "
            <tr>
            <th>$id</th>
            <td>$name</td>
            <td>$colname</td>
            <td>$branch</td>
            <td>$mobile</td>
            <td>$city</td>
            <td>$gender</td>           
            <td>   
                <button class='btn btn-primary'><a href='update.php?participant_id=$id' class='text-light'>Update</a></button>
                <button class='btn btn-danger'><a href='delete.php?participant_id=$id' class='text-light'>Delete</a></button>
            </td>
          </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php include 'dashfooter.php'; ?>

</body>

</html>