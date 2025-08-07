<?php
require_once(__DIR__ . '/../includes/session.php');
require_once(__DIR__ . '/../includes/db.php');

if (!isset($_GET['file'])) {
    die("No file provided.");
}

$file_path = $_GET['file'];
$file_name = basename($file_path);

// Path to Tesseract executable (change if needed)
$tesseract_path = "C:\\Program Files\\Tesseract-OCR\\tesseract.exe";

// Output text file name (temporary)
$output_txt = tempnam(sys_get_temp_dir(), 'ocr_output');

// Run Tesseract on the uploaded file
$cmd = "\"$tesseract_path\" " . escapeshellarg($file_path) . " " . escapeshellarg($output_txt);
shell_exec($cmd);

// Read the result
$ocr_text = file_get_contents($output_txt . ".txt");


// Regex patterns
preg_match("/Invoice\s*(No\.?|Number)[:\-]?\s*(\S+)/i", $ocr_text, $inv_match);
preg_match("/Date[:\-]?\s*(\d{1,2}\/\d{1,2}\/\d{2,4})/i", $ocr_text, $date_match);
preg_match("/Total[:\-]?\s*₹?\s*([\d,]+\.\d{2})/i", $ocr_text, $total_match);
preg_match("/GST[:\-]?\s*₹?\s*([\d,]+\.\d{2})/i", $ocr_text, $gst_match);
preg_match("/Vendor[:\-]?\s*(.+)/i", $ocr_text, $vendor_match);

// Extracted values or fallback
$parsed_data = [
    "Invoice No" => $inv_match[2] ?? "Not Found",
    "Date" => $date_match[1] ?? "Not Found",
    "Vendor" => $vendor_match[1] ?? "Not Found",
    "Total Amount" => "₹" . ($total_match[1] ?? "Not Found"),
    "GST" => "₹" . ($gst_match[1] ?? "Not Found")
];



$user_id = $_SESSION['user_id'];
$invoice_no = $parsed_data['Invoice No'];
$date_str = $parsed_data['Date'];
$vendor = $parsed_data['Vendor'];
$total = str_replace(['₹', ','], '', $parsed_data['Total Amount']);
$gst = str_replace(['₹', ','], '', $parsed_data['GST']);
$file = $file_path;

// Convert date to YYYY-MM-DD if needed
$date = date("Y-m-d", strtotime($date_str));

// Insert into DB
$stmt = $conn->prepare("INSERT INTO invoices (user_id, invoice_no, invoice_date, vendor_name, total_amount, gst_amount, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$user_id, $invoice_no, $date, $vendor, $total, $gst, $file]);


// Delete temporary file
unlink($output_txt . ".txt");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Parsed Invoice (Real OCR)</title>
  <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
  <h2>Text Extracted from: <?= htmlspecialchars($file_name) ?></h2>

  <pre style="background:#eee;padding:10px;border:1px solid #ccc;"><?= htmlspecialchars($ocr_text) ?></pre>

  <br>
  <a href="upload_invoice.php">Upload Another Invoice</a><br><br>
  <a href="../auth/logout.php" >Logout</a>
</body>
</html>
