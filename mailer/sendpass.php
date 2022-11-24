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


if (isset($_POST['send']))
{
    // $_SESSION['student_unique_np']   $_SESSION['student_unique_code']
    $email = $_POST['email'];
    include '../GCC/create_form/connect.php';

    if (isset($_SESSION['student_unique_np']))
    {

        if (isset($_SESSION['student_unique_np_admin']))
        {

            $rpassword = $_SESSION['student_unique_np_admin'];

            $gettingcred = " SELECT * FROM `administrator` where admin_email = '$email'  ";
            $getcred = mysqli_query($con, $gettingcred);

            while ($row = mysqli_fetch_array($getcred))
            {

                $name = $row['admin_fname'];
            }
        }
        else
        {

            $rpassword = $_SESSION['student_unique_np'];

            $gettingcred = " SELECT * FROM `student` where stud_email = '$email'  ";
            $getcred = mysqli_query($con, $gettingcred);

            while ($row = mysqli_fetch_array($getcred))
            {

                $name = $row['stud_fname'];
            }

        }

    }

 

  
    //$mail->setFrom('noreply@hantechdesign.com','WMSU-GCC');
    $mail->setFrom('noreplyGCC2022@gmail.com', 'WMSU GUIDANCE COUNCELING CENTER'); // From email and name
    $mail->addAddress($email,$name); // to email and name
    $mail->Subject = 'GCC Account Credentials';
    $mail->msgHTML("

	

	<h3 style='font-weight:bolder'><span style='font-weight:normal;'> Welcome <span style='font-weight:bolder;text-transform:uppercase'>" . $name . " </span> <br>
	<br> Your reset code is <span style='font-weight:bolder;font-size:20px'>" . $_SESSION['student_unique_code'] . "</span> <br><br>

	Enter this Code to reset your password . Your New Password is : <span style='font-weight:bolder;font-size:20px'>" . $rpassword . " </span>
	<br>Note: This password is not yet set.Enter first the reset code, and press the reset button to save this new generated password.
	</h3>

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
