<?php
	include_once("sql.php");
	
	function increment_hearts($pid){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "UPDATE posts SET hearts = hearts + 1 WHERE PID = '" . (int)$pid . "'";
		$result = mysqli_query($con, $query);
		echo $result;	
	} //increment_hearts($pid)
	
	increment_hearts($_POST['PID']);
	
?>