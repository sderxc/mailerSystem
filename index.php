<?php
ini_set('error_reporting', E_ALL);

function classAutoLoader($className)
{
    $classNameArray = explode('_', $className); // разобьем имя

    $modul = $classNameArray[0];
    $folder = $classNameArray[1];
    $file = $classNameArray[2];

    $path = 'App/' . $modul . '/' . $folder . '/' . $file . '.php';

    if (file_exists($path)) {
        require_once ($path);
    }
}
spl_autoload_register('classAutoLoader');

$router = new Base_Service_Router();
$router->start();

// Выпилить нахрен
//$email = $_GET['email'];
//if ($email) {
//
//    /**
//     * Created by PhpStorm.
//     * User: 1
//     * Date: 16.02.14
//     * Time: 15:37
//     */
//    require 'PHPMailer/PHPMailerAutoload.php';
//
//    $html = implode('', file ('mail.html'));
//
//    $mail = new PHPMailer();
//    if ($mail) {
//
//
//        //$mail->SMTPDebug = 1;
//        //$mail->isSMTP();                                      // Set mailer to use SMTP
//        $mail->Host = 'mx1.hostinger.com.ua';  // Specify main and backup server
//        $mail->Port = 143;
//        //$mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $mail->Username = 'noreplay@numalo-li.w.pw';                            // SMTP username
//        $mail->Password = 'didiji11';                           // SMTP password
//        //$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
//
//        $mail->From = 'noreplay@numalo-li.w.pw';
//        $mail->FromName = 'Mailer';
//        $mail->addAddress($email);  // Add a recipient
////        $mail->addAddress('razumason@gmail.com');               // Name is optional
////    $mail->addReplyTo('info@example.com', 'Information');
////    $mail->addCC('cc@example.com');
//
////    $mail->addBCC('bcc@example.com');
//
//        $mail->isHTML(true);                                  // Set email format to HTML
//
//        $mail->Subject = 'Here is the subject';
//        $mail->Body    = $html;
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//        if(!$mail->send()) {
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
//            exit;
//        }
//
//        echo 'Message has been sent ';
//    }
//
//} else {
//    echo '<p>Type your email here!</p><form method="GET" action="/"><input name="email" type="text"><br><input type="submit" value="Send!"></form>';
//}
