<?php
session_start();
require_once '../includes/db.php';
require_once '../includes/Mailer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Check if user already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Update OTP
        $stmt = $conn->prepare("UPDATE users SET otp = ?, name = ? WHERE email = ?");
        $stmt->execute([$otp, $name, $email]);
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, otp) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $otp]);
    }

    // Send OTP to email
    $subject = "Your OTP for Invoice Parser Login";
    $message = "Hello $name,\n\nYour OTP is: $otp\n\nThis OTP is valid for 10 minutes.\n";
    $headers = "From: no-reply@invoice-parser.com";

    if (sendOTP($email, $name, $otp)) {
    $_SESSION['email'] = $email;
    header("Location: verify_otp.php");
    exit();
} else {
    echo "Failed to send OTP. Please try again.";
}
} else {
    echo "Invalid request.";
}
?>