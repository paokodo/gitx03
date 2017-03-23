<?php

function decryptCookie($value){
	echo $value;
	// global $conn,$key,$iv,$aes256Key;
	// if(!$value){return false;}
	// $key = $key;
	// $value = str_replace(' ','+',$value);
	// $crypttext = base64_decode($value); //decode cookie
	// $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	// $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	// $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
	// return trim($decrypttext);
	// return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $aes256Key, base64_decode($value), MCRYPT_MODE_CBC, $iv), "\0\3");
	global $key;
	srand((double) microtime() * 1000000);
	$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_RAND);
	$aes256Key = hash("SHA256", $key, true);
	return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $aes256Key, base64_decode($value), MCRYPT_MODE_CBC, $iv), "\0\3");

}
?>
