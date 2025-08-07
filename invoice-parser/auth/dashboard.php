<?php
require_once '../includes/session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h2>

  <p>You are successfully logged in.</p>

   <a href="../invoices/upload_invoice.php" class="button">Upload Invoice</a><br><br>
  <a href="../invoices/view_invoices.php" class="button">View My Invoices</a><br><br>

  <a href="logout.php">Logout</a>
</body>
</html>
