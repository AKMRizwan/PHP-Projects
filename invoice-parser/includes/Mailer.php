<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php'; // If using Composer
// OR
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';
// require '../PHPMailer/src/Exception.php';

function sendOTP($toEmail, $toName, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'smithninza@gmail.com';         // Your Gmail
        $mail->Password = 'vguw ffmh tjea hzhq';       // App password from Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('smithninza@gmail.com', 'Invoice Parser');
        $mail->addAddress($toEmail, $toName);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Invoice Parser';
        $mail->Body    = "Hi $toName,<br>Your OTP is: <strong>$otp</strong><br>Valid for 10 minutes.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
