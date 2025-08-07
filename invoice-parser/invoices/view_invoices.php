<?php
require_once(__DIR__ . '/../includes/session.php');
require_once(__DIR__ . '/../includes/db.php');


$user_id = $_SESSION['user_id'];

// Fetch invoices for this user
$stmt = $conn->prepare("SELECT * FROM invoices WHERE user_id = ? ORDER BY uploaded_at DESC");
$stmt->execute([$user_id]);
$invoices = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Uploaded Invoices</title>
  <link rel="stylesheet" href="../assets/style.css">

  <style>
    table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
  </style>
</head>
<body>

<h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?></h2>
<h3>Your Uploaded Invoices</h3>

<?php if (count($invoices) === 0): ?>
  <p>No invoices uploaded yet.</p>
<?php else: ?>
  <table>
    <tr>
      <th>Invoice No</th>
      <th>Date</th>
      <th>Vendor</th>
      <th>Total (₹)</th>
      <th>GST (₹)</th>
      <th>File</th>
      <th>Uploaded At</th>
    </tr>
    <?php foreach ($invoices as $inv): ?>
      <tr>
        <td><?= htmlspecialchars($inv['invoice_no']) ?></td>
        <td><?= $inv['invoice_date'] ?></td>
        <td><?= htmlspecialchars($inv['vendor_name']) ?></td>
        <td><?= $inv['total_amount'] ?></td>
        <td><?= $inv['gst_amount'] ?></td>
        <td><a href="<?= $inv['file_path'] ?>" target="_blank">View</a></td>
        <td><?= $inv['uploaded_at'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>

<br>
<a href="upload_invoice.php">Upload Another Invoice</a> |<br><br>
<a href="../auth/logout.php" >Logout</a>

</body>
</html>
