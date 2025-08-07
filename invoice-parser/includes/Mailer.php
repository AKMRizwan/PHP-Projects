<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php'; // If using Composer
// OR
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';
// require '../PHPMailer/src/Exception.php';
require_once '../config.php';  

function sendOTP($toEmail, $toName, $otp) {
    $mail = new PHPMailer(true);

    try {
        $config = require '../config.php'; // Make sure path is correct

        $mail->isSMTP();
        $mail->Host       = $config['smtp_host'];
        $mail->SMTPAuth   = $config['smtp_auth'];
        $mail->Username   = $config['smtp_username'];
        $mail->Password   = $config['smtp_password'];
        $mail->SMTPSecure = $config['smtp_secure'];
        $mail->Port       = $config['smtp_port'];


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