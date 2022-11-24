<?php 
	
	class encryptdata
	{
			function encryption($datatoencrypt,$securitykey){
				
				 $ciphering = "AES-128-CBC";
				  $iv_length = openssl_cipher_iv_length($ciphering);
				  $options = 0;
				    
				  $encryption_iv = '1234567891011121';
				  $encryption_key = $securitykey;
				    
				  
				  $encryption = openssl_encrypt($datatoencrypt, $ciphering,
				              $encryption_key, $options, $encryption_iv);


				  return $encryption;
			}
			
			function decryption($datatodecrypt,$securitykey){
				  $ciphering = "AES-128-CBC";
				  $iv_length = openssl_cipher_iv_length($ciphering);
				  $options = 0;
				    
				  $encryption_iv = '1234567891011121';
				  $encryption_key = $securitykey;
				    
				  
				  $decryption = openssl_decrypt($datatodecrypt, $ciphering,
				              $encryption_key, $options, $encryption_iv);

				  return $decryption;
			}
		
	}

 ?>