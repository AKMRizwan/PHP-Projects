<?php
include '../Connection.php';
if (isset($_GET['participant_id'])) {
  $id = $_GET['participant_id'];

  $sql = "delete from participants where id=$id";
  $result = $con->query($sql);

  if ($result)
    //    echo 'deleted successfully';
    header("location:DisplayParticipant.php");
  else
    die(mysqli_error($con));
}
