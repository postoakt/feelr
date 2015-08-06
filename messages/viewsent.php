<?php session_start(); if (!isset($_SESSION['username']) || !isset($_POST['mid'])){header("location: ../feels"); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- Google reCaptcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script src = "../js/feel.js"></script>
		<script src = "../js/logout.js"></script>
		<script src = "../js/messages.js"></script>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/messages.css">
		
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
			<div id = "v_body">
				<?php
					require_once("../scripts/functions.php");
					$mid = $_POST['mid'];
					$msg = retrieve_message_by_id($mid);
					echo "<table>";
						echo "<tr><td style = 'float: left;'>To:</td><td>" . $msg[0] . "</td></tr>";
						echo "<tr><td style = 'float: left;'>Subject:</td><td>" . $msg[1] . "</td></tr>";
						echo "<tr><td colspan = '2'><div class = 'v_msg'>" . $msg[2] . "</div></td></tr>";
						echo "<tr><td><a href = 'index.php'>Back</a></td>";
					echo "</table>";
				?>
			</div> <!-- m_body -->
		</div> <!-- wrapper -->						
	</body>
</html>