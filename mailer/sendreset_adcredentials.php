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


if (isset($_POST['sendcredentials']))
{
    $userid = $_POST['userid'];

    include '../GCC/create_form/connect.php';

    $gettingcred = " SELECT * FROM `administrator` where admin_id = '$userid'  ";
    $getcred = mysqli_query($con, $gettingcred);

    while ($row = mysqli_fetch_array($getcred))
    {
        $lname = $row['admin_lname'];
        $adtype = $row['admin_type'];
        $email = $row['admin_email'];
        $password = '@' . strtolower($adtype) . '_' . $lname;
    }
    $pass = md5('pass');
    $updatetodefault = "UPDATE `administrator` SET `admin_password`='$pass',`ft`='1' WHERE  admin_id = '$userid'";
    mysqli_query($con, $updatetodefault);


    //$mail->setFrom('noreply@hantechdesign.com','WMSU-GCC');
    $mail->setFrom('noreplyGCC2022@gmail.com', 'WMSU GUIDANCE COUNCELING CENTER'); // From email and name
    $mail->addAddress($email,''); // to email and name
    $mail->Subject = 'GCC Account Credentials (RESET)';
    $mail->msgHTML("

	

	<h1 style='font-weight:bolder'><span style='font-weight:normal;'>Login Credentials : <br><br> </span> <br> <span style='font-weight:normal;font-size:18px'>Email : </span> " . $email . " <br>  <span style='font-weight:normal;font-size:18px'>Password : </span> " . $password . "</h1>

	<br>
	<h2>Thank you.</h2>
	<h3 style='font-weight:normal'>Please dont share this message.</h3>





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
