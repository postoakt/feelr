<?php
	require_once('sql.php');
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$con = mysqli_connect(SERVER, USER, PW, DB);
	$query = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";
	$result = mysqli_query($con, $query);
	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $row['username'];
		echo $num_rows;
	}
	else
		echo 0;
?>