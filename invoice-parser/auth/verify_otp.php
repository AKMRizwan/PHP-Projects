<?php
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['email'])) {
    header("Location: register.php");
    exit();
}

// If OTP is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_otp = trim($_POST['otp']);
    $email = $_SESSION['email'];

    // Check OTP from DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND otp = ?");
    $stmt->execute([$email, $input_otp]);
    $user = $stmt->fetch();

    if ($user) {
        // Mark as verified
        $stmt = $conn->prepare("UPDATE users SET is_verified = 1, otp = NULL WHERE email = ?");
        $stmt->execute([$email]);

        // Start login session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Verify OTP</title>
  <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
  <h2>Enter the OTP sent to your email</h2>

  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

  <form method="POST">
    <input type="text" name="otp" maxlength="6" required placeholder="Enter 6-digit OTP">
    <br><br>
    <input type="submit" value="Verify OTP">
  </form>
</body>
</html>
