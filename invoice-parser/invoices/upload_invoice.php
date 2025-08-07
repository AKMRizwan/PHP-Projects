<?php
require_once(__DIR__ . '/../includes/session.php');
require_once(__DIR__ . '/../includes/db.php');


?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Invoice</title>
  <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
  <h2>Upload Invoice</h2>

  <form action="upload_invoice.php" method="POST" enctype="multipart/form-data">
    <label>Select Invoice File (JPG, PNG):</label><br>
    <input type="file" name="invoice_file" accept=" .jpg, .jpeg, .png" required><br><br>

    <input type="submit" name="upload" value="Upload"><br><br>

    <a href="../auth/logout.php" >Logout</a>
    
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploaded_invoices/";

    // Get file info
    $file_name = basename($_FILES["invoice_file"]["name"]);
    $target_file = $target_dir . time() . "_" . $file_name;

    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = [ 'jpg', 'jpeg', 'png'];

    // Validate file type
    if (!in_array($file_type, $allowed)) {
        echo "<p style='color:red;'>Only JPG, JPEG and PNG files are allowed.</p>";
    } else {
        // Save the uploaded file
        if (move_uploaded_file($_FILES["invoice_file"]["tmp_name"], $target_file)) {
            echo "<p style='color:green;'>File uploaded successfully!</p>";
            echo "<p>Saved as: <strong>$target_file</strong></p>";

            // You can now redirect to parse_invoice.php or save the file path in DB
            header("Location: parse_invoice.php?file=" . urlencode($target_file));
        } else {
            echo "<p style='color:red;'>Error uploading file. Please try again.</p>";
        }
    }
}
?>
</body>
</html>
