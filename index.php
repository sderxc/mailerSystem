<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 16.02.14
 * Time: 15:37
 */
require 'PHPMailer/PHPMailerAutoload.php';

$html = implode('', file ('mail.html'));

$mail = new PHPMailer();

if ($mail) {
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup server
    $mail->Port = 465;
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sderxc@gmail.com';                            // SMTP username
    $mail->Password = 'didijididiji';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

    $mail->From = 'from@example.com';
    $mail->FromName = 'Mailer';
//    $mail->addAddress('sderxc@gmail.com');  // Add a recipient
    $mail->addAddress('razumason@gmail.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';
    $mail->Body    = $html;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }

    echo 'Message has been sent';
}