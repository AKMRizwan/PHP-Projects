<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register - Invoice Parser</title>
  <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
  <h2>Register</h2>
  <form action="send_otp.php" method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <input type="submit" value="Send OTP">
  </form>
</body>
</html>
