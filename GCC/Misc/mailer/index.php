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



if(isset($_POST['sendemail'])){ 
	$admintoken = $_SESSION['admin_token'];
	$defemail =$_SESSION['email'];
		$defpassword = $_SESSION['password'];
	$recepientemail = $_POST['recepientemail'];
	$subjectemail = $_POST['subjectemail'];
	$messagemail = $_POST['messagemail'];

		include '../../create_form/connect.php';
		date_default_timezone_set('Asia/Manila');
		$datenow= date('Y-m-d H:i:s');

				$sql = " INSERT INTO `email`(`recepient`, `subject`, `message`, `date_send`,`admin_id`) VALUES ('$recepientemail','$subjectemail','$messagemail','$datenow','$admintoken')  ";
		                $result = mysqli_query($con,$sql); // run query
		             
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
}

	
	}else if(isset($_POST['verifycode'])){ 
		include '../../create_form/connect.php';
		$defemail =$_SESSION['email'];
		$defpassword = $_SESSION['password'];
		$admintoken = $_SESSION['admin_token'];
		$newemail = $_POST['newemail'];

			function createRandomPassword() { 

						    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
						    srand((double)microtime()*1000000); 
						    $i = 0; 
						    $pass = '' ; 

						    while ($i <= 7) { 
						        $num = rand() % 33; 
						        $tmp = substr($chars, $num, 1); 
						        $pass = $pass . $tmp; 
						        $i++; 
						    } 

						    return $pass; 

						} 
						$code = createRandomPassword();

				$insertcode = " UPDATE `administrator` SET `vcode`='$code' WHERE admin_id='$admintoken'  ";
		        $resultinsert = mysqli_query($con,$insertcode); 
		              $get_id =  mysqli_insert_id($con);

		        		$sql = " select * from `administrator` where admin_id='$admintoken'  ";
		                        $result = mysqli_query($con,$sql); 
		                        $count= mysqli_num_rows($result);
		                     
		                    
		                     
		                         while($row = mysqli_fetch_array($result)){
		        						$vcode = $row['vcode'];
		                         }	
		                


 $mail->Username = 'noreplyGCC2022@gmail.com'; // email
  $mail->Password = 'guidancecounselingcenter2022'; // password
$mail->setFrom('noreply@wmsugcc.com', 'WMSU GUIDANCE COUNCELING CENTER'); // From email and name
$mail->addAddress($newemail); // to email and name
$mail->Subject = 'WMSU-GCC System Settings';
$mail->msgHTML("

Your verification code is: <span style='font-size:18px;font-weight:bolder'> ".$vcode." </span>
<br><br>

Note: Changing your email address is a hazardous move. Make sure you've entered your password correctly. Otherwise, no email will be sent. If you get an error, it's a good idea to click the Reset to Default button.



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
}
	}


?>