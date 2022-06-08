<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/Exception.php';
include 'PHPMailer/PHPMailer.php';
include 'PHPMailer/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = 'smtp.gmail.com'; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port =587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;


if (isset($_POST['sendconfirmation']))
{
    $email = $_SESSION['student_email'];
    $thecode = $_SESSION['student_unique_code'];

    date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');

    include '../GCC/create_form/connect.php';
    date_default_timezone_set('Asia/Manila');
    $datenow = date('Y-m-d H:i:s');


    $mail->Username = 'noreplyGCC2022@gmail.com'; // email
    $mail->Password = 'guidancecounselingcenter2022'; // password
    $mail->setFrom('noreply@hantechdesign.com', 'WMSU-GCC'); // From email and name
    $mail->addAddress($email); // to email and name
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
