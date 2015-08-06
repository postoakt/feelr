<?php session_start(); if (!isset($_SESSION['username'])){header("location: ../feels"); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- Google reCaptcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<script src = "../js/logout.js"></script>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/messages.css">
		
		<script src = '../js/messages.js'></script>
		
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
			<ul class = 'm_menu'>
				<?php
					$m = "";
					if (!isset($_GET['m']))
						$m = "i";
					else
						$m = $_GET['m'];
						
					switch($m){
						case "i": echo "<li class = 'active'><a href = 'index.php?m=i'>Inbox</a></li>";
								  echo "<li><a href = 'index.php?m=s'>Sent</a></li>";
								  echo "<li><a href = 'index.php?m=c'>Compose</a></li>";
							break;
						case "s": echo "<li><a href = 'index.php?m=i'>Inbox</a></li>";
								  echo "<li class = 'active'><a href = 'index.php?m=s'>Sent</a></li>";
								  echo "<li><a href = 'index.php?m=c'>Compose</a></li>";
							break;
						case "c": echo "<li><a href = 'index.php?m=i'>Inbox</a></li>";
								  echo "<li><a href = 'index.php?m=s'>Sent</a></li>";
								  echo "<li class = 'active'><a href = 'index.php?m=c'>Compose</a></li>";
							break;
						default: echo "<li class = 'active'><a href = 'index.php?m=i'>Inbox</a></li>";
								  echo "<li><a href = 'index.php?m=s'>Sent</a></li>";
								  echo "<li><a href = 'index.php?m=c'>Compose</a></li>";
								  $m = "i";
					}
					
				?>
			</ul> <!-- ul class m_menu -->
			<div id = "m_body">
				<?php
					$username = $_SESSION['username'];
					
					switch($m){
						case "i": echo_inbox($username);
							break;
						case "s": echo_sentbox($username);
							break;
						case "c": compose_msg();
							break;
						default: echo_inbox($username);
					}
				?>
			</div> <!-- m_body -->
		</div> <!-- wrapper -->						
	</body>
</html>