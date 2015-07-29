<?php
	require_once('functions.php');
	
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (is_email_in_use($email)){
		echo "EMAIL";
		die();
	}
	else if (is_username_in_use($username)){
		echo "USERNAME";
		die();
	}
	else if (register_user($username, $email, $password) < 1){
		remove_user($username);
		echo "SQL";
		die();
	}
	else
		echo "SUCCESS";	
?>