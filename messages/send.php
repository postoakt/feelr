<?php session_start(); if (!isset($_SESSION['username'])){header("location: ../feels"); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/messages.css">
		<script>
			setTimeout(function () {
			   window.location.href = "index.php";
			}, 3000); 			
		</script>
	</head>
	<body>
		<div id = "wrapper">
			<div id = "header">
				<h1><a href = "../">feel it</a></h1>
				<p>let it all out.</p>
				<ul class = "nav">
					<?php
						require_once('../scripts/functions.php');
						if (isset($_SESSION['logged_in'])){
							$msg_count = get_message_count($_SESSION['username']);
							echo "<li>" . $_SESSION['username'] . " -</li>
								  <li><a href = '../messages'> messages (" . $msg_count . ") </a> - </li>
						          <li><a href = '#' onclick = 'logout()'>sign out</a></li>";
						}
						else{
							echo "<li><a href = '../'><div class = 'log_in'>log in</div></a></li>
						          <li><a href = '../signup'><div class = 'sign_up'>sign up</div></a></li>";
						}
					?>
				</ul> <!-- ul class nav -->
			</div> <!-- header -->
			<?php
				require_once("../scripts/functions.php");
				$to = $_POST['r_user'];
				$from = $_SESSION['username'];
				$subj = $_POST['subj'];
				$body = $_POST['body'];
				
				if (send_message($from, $to, $subj, $body))
					echo "<div style = 'font-size: 1.2em; color: #00CC00; margin: 0 auto; margin-top: 64px; text-align: center;'>Message sent successfully!</div>";
				else
					echo "<div style = 'font-size: 1.2em; color: #FF0000; margin: 0 auto; margin-top: 64px; text-align: center;'> There was an error processing your request.</div>"
			?>
		</div> <!-- wrapper -->						
	</body>
</html>