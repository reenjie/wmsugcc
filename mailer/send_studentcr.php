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
    $email = $_POST['email'];
    include '../GCC/create_form/connect.php';

    $gettingcred = " SELECT * FROM `student` where stud_email = '$email'  ";
    $getcred = mysqli_query($con, $gettingcred);

    while ($row = mysqli_fetch_array($getcred))
    {

        $name = $row['stud_fname'];
    }

    $password = $_SESSION['pass'];

    

    //$mail->setFrom('noreply@hantechdesign.com','WMSU-GCC');
    $mail->setFrom('noreplyGCC2022@gmail.com', 'WMSU GUIDANCE COUNCELING CENTER'); // From email and name
    $mail->addAddress($email,$name); // to email and name
    $mail->Subject = 'GCC Account Credentials';
    $mail->msgHTML("

	

	<h3 style='font-weight:bolder'><span style='font-weight:normal;'> Welcome <span style='font-weight:bolder;text-transform:uppercase'>" . $name . " </span>,This is Login Credentials : <br><br> </span> <br> <span style='font-weight:normal;font-size:14px'>Email : </span> <span style='font-weight:bolder'> " . $email . " </span><br> <br>  <span style='font-weight:normal;font-size:14px'>Password : </span> <span style='font-weight:bolder'>" . $password . "</span></h3>

	<br>
	<h3>Thank you.</h3>
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
