<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script src = "../js/feel.js"></script>
		<script src = "../js/logout.js"></script>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		
		<script>
		window.setTimeout(function(){ window.location.href = "../feels";}, 5000);
		</script>
	</head>
	<body>
		<div id = "wrapper" style = 'height: 256px;'>
		<div id = "header">
			<h1><a href = "../">feelr</a></h1>
			<p>let it all out.</p>
			<ul class = "nav">
				<?php
					require_once('../scripts/functions.php');
					session_start();
					
					if (isset($_SESSION['logged_in'])){
						$msg_count = get_message_count($_SESSION['username']);
						echo "<li>" . $_SESSION['username'] . " -</li>
						<li>messages (" . $msg_count . ") - </li>
						<li><a href = '#' onclick = 'logout()'>sign out</a></li>";
					}
					else {
						echo "<li><a href = '../'><div class = 'log_in'>log in</div></a></li>
							  <li><a href = '../signup'><div class = 'sign_up'>sign up</div></a></li>";
					}
				?>
			</ul>
		</div> <!-- header -->
			
		<div id = 'sort_menu'>
			<ul>
				<li><a href = '../feels/index.php?m=latest'>Latest</a></li>
				<li><a href = '../feels/index.php?m=p_today'>Popular Today</a></li>
				<li><a href = '../feels/index.php?m=p_week'>Popular This Week</a></li>
				<li><a href = '../feels/index.php?m=random'>Random</a></li>
				<li><a class = 'active' href = 'index.php'>Post</a></li>
			</ul>
		</div> <!-- sort menu -->
		
		<?php
			require_once("../scripts/functions.php");
			
			if (!isset($_POST['u_name']) || !isset($_POST['body']))
				die();
			
			$name = $_POST['u_name'];
			$body = $_POST['body'];
			
			if (insert_post($name, $body))
				echo "<div style = 
				' text-align: center; color: #39f; font-size: 2em;
				 margin: 0 auto; margin-top: 32px; padding: 32px; font-family: Sans-Serif;'>
				 Feel posted successfully!</div>";
			else
				echo "<div style = 
				' text-align: center; color: #8F0000; font-size: 2em;
				 margin: 0 auto; margin-top: 32px; padding: 32px; font-family: Sans-Serif;'>
				 There was an error processing your request.</div>";		
		?>
	</body>
</html>