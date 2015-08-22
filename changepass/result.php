<?php session_start(); if (!isset($_SESSION['username'])){die();} ?>
<!DOCTYPE html>
<html>
	<head>
    	<style>
			body{
				background-color:#efefef;
				text-align:center;
			}
		</style>
    </head>
    <body>
    	<div style = "margin:0 auto;margin-top:32px;margin-bottom:32px;width:100%;">
    	<?php
			require_once('../scripts/functions.php');
			
			$un = $_SESSION['username'];
			$em = get_email($_SESSION['username']);
			$op = $_POST['oldpass1'];
			$np = $_POST['newpass1'];
			error_reporting(0);
			if (!is_valid_login($em, $op)){
				echo "Your information could not be validated.";
			}
			else{
				change_password($em, $np);
				echo "Password successfully changed.";
			}
			
		?>
        </div>
        <a href="javascript: self.close()">[x] close this window</a>
    </body>
</html>