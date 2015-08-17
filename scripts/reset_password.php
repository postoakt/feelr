<?php
	require_once("functions.php");
	$email = $_POST['email'];
	$subj = "feelit: New Password";
	$str = genRandStr(8);
	$body = "Your new password is below. You may change your password after you log in.
			 
			 Password: " . $str;
			 
	if (is_email_in_use($email)){
		if (change_password($email, $str) && mail($email, $subj, $body))
			return 1;
		else
			return 0; 
	}
	else{
		echo 0;
	}
?>
