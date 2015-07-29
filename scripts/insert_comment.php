<?php
	require_once('sql.php');

	$username = $_POST['username'];
	$msg_body = $_POST['body'];
	$pid = $_POST['pid'];

	$mysqli = new mysqli(SERVER, USER, PW, DB);
	$query = "INSERT INTO comments (PID, user, body) VALUES (?, ?, ?)";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param('iss', $pid, $username, $msg_body);
	$stmt->execute();
	$result = $stmt->affected_rows;

	if ($result > 0){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "UPDATE posts SET comments = comments + 1 WHERE PID = " . (int)$pid;
		mysqli_query($con, $query);
	}

?>
