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
//$mail->Host = localhost; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;



if(isset($_POST['sendmessage'])){ 
	$emails = $_POST['emails'];
	$mensahe = $_POST['mensahe'];
				$defemail = $_SESSION['emails'];
 				$defpassword=$_SESSION['passwords'];
	foreach ($emails as $key => $value) {

    
$mail->Username = 'noreplyGCC2022@gmail.com'; // email
    $mail->Password = 'guidancecounselingcenter2022'; // password
$mail->setFrom('noreply@hantechdesign.com','WMSU-GCC');// From email and name
$mail->addAddress($value); // to email and name

	}

$mail->Subject = 'WMSU Guidance Coordinator NOTIFICATION';
$mail->msgHTML("
".$mensahe."






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
if(!$mail->send()){
    echo "Error" ;
}else{
    header('location:success.php');
}


$mail->Username = 'noreplyGCC2022@gmail.com'; // email
    $mail->Password = 'guidancecounselingcenter2022'; // password
$mail->setFrom('noreply@wmsugcc.com', 'WMSU GUIDANCE COUNCELING CENTER'); // From email and name
$mail->addAddress($recepientemail); // to email and name
$mail->Subject = $subjectemail;
$mail->msgHTML("
".$messagemail."






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
if(!$mail->send()){
    echo "Error" ;
}else{
    echo "sent";
}*/

}
 



?>