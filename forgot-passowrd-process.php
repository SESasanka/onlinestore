<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/PHPMailer.php";
require "mail/SMTP.php";
require "mail/Exception.php";

$email = $_GET["email"];

if (empty($email)) {
    echo ("Please enter your email address");
} else {

    $rs = Database::search("SELECT * FROM `users` WHERE `email`='$email'");
    $num = $rs->num_rows;

    if ($num > 0) {

        $row = $rs->fetch_assoc();
        $vcode = uniqid();

        Database::iud("UPDATE `users` SET `vcode`='$vcode' WHERE `id`='" . $row["id"] . "'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sasankaakash22@gmail.com';
            $mail->Password = 'uukajkggipimgxju';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('sasankaakash22@gmail.com', 'Sasanka Akash');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset your account password';
            $mail->Body = '<a href="http://localhost/onlinestore/reset-password.php">Reset Password</a>';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo ("User not found with the given email");
    }
}
