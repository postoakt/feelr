<?php
	require_once("functions.php");
	$user = $_POST['user'];
	if (is_username_in_use($user))
		echo 1;
	else
		echo 0;
?>