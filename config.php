<?php
	
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();

	$gClient->setClientId("633894388009-sk36sifm3nivsjhmenh8sqp8hvq3pk36.apps.googleusercontent.com"); 
	
        $gClient->setClientSecret("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"); 

	$gClient->setApplicationName("WMSUGCC");
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
        $callback =  $protocol.$_SERVER['SERVER_NAME'].'/'.basename(getcwd()).'/g-callback.php';
	$gClient->setRedirectUri($callback); 
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>





