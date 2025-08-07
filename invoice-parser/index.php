<?php


session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Invoice Parsing System</title>
  <link rel="stylesheet" href="../assets/style.css">

  <style>
    body { font-family: Arial; padding: 20px; }
    a.button {
      display: inline-block; padding: 10px 20px;
      margin: 10px 0; background-color: #28a745;
      color: white; text-decoration: none; border-radius: 4px;
    }
  </style>
</head>
<body>

<h1>🧾 Invoice Parsing System</h1>
<p>Welcome to the Invoice Parser! Upload your invoice images and extract key billing data instantly.</p>

<?php if (isset($_SESSION['user_id'])): ?>
  <p>You are logged in as <strong><?= $_SESSION['user_name'] ?></strong>.</p>
  <a href="invoices/upload_invoice.php" class="button">Upload Invoice</a>
  <a href="invoices/view_invoices.php" class="button">View My Invoices</a>

  <a href="auth/logout.php" class="button" style="background-color:#dc3545;">Logout</a>
<?php else: ?>
  <a href="auth/register.php" class="button">Login / Register</a>
<?php endif; ?>

</body>
</html>
