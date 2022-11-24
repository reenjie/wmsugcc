<?php
session_start();
require_once '../vendor/autoload.php';
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP(); 
$mail->SMTPDebug = 0; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';
$provider = new Google([
    'clientId'      => '633894388009-dq823nvhl97u0okjg7nascsdj451atdo.apps.googleusercontent.com',
    'clientSecret'  => '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'
]);
$mail->setOAuth(
    new OAuth(
        [
            'provider'          => $provider,
            'clientId'          => '633894388009-dq823nvhl97u0okjg7nascsdj451atdo.apps.googleusercontent.com',
            'clientSecret'      => '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',
            'refreshToken'      => '1//0eepRXzzc1YfRCgYIARAAGA4SNwF-L9IrhwAgHCR9IoTFK9ndiJwSHQqWHQd4SXDDd-uIrxCGitWZmZ4K1L8k1bCTSkH8ViNE6Oc',
            'userName'          => 'noreplygcc2022@gmail.com',
        ]
    )
);


if (isset($_POST['sendconfirmation']))
{
    $email = $_SESSION['student_email'];
    $thecode = $_SESSION['student_unique_code'];

    date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');

    include '../GCC/create_form/connect.php';
    date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');


    $mail->setFrom('noreplyGCC2022@gmail.com', 'WMSU-GCC'); // From email and name
    $mail->addAddress($email,'Anonymous'); // to email and name
    $mail->Subject = 'CONFIRMATION CODE';
    $mail->msgHTML("

	<h4>Your 4 Digit confirmation code is :</h4>
	<br>
	<br>
	<h1 style='font-weight:bolder'>" . $thecode . "</h1>

	<br>
	<h4>No one can access your account without this code.</h4>





");

    $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    if (!$mail->send())
    {
        echo "Error" . $mail->ErrorInfo;
    }
    else
    {
        // echo "sent";
        
    }

}

?>
