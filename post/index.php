<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- Google reCaptcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		
		<script src = "../js/feel.js"></script>
		
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
		
		<script>
			function validate_form(){
				var googleResponse = jQuery('#g-recaptcha-response').val();
				var msg_body = document.getElementById('f_body').value;
				
				if ((msg_body.length > 0) && googleResponse.length > 0)
					return true;
				else
					return false;
			}
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
							<li>messages(" . $msg_count . ")</li>
							<li><a href = '#'>sign out</a></li>";
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
					<li><a class = 'active' href = '#'>Post</a></li>
				</ul>
			</div> <!-- sort menu -->
			<form action = 'done.php' method = 'post' onsubmit = 'return validate_form()' autocomplete = 'off'>
				<table class = 'post_form'>
					<tr><td>Username:</td><td>
				<?php
					if ( isset($_SESSION['username']) )
						echo "<input type = 'text' name = 'u_name' value = '" . $_SESSION['username'] . "' readonly>";
					else 
						echo "<input type = 'text' name = 'u_name' value = 'Anonymous' readonly>";
				?>
				</td></tr>
				<tr><td colspan = '2'><textarea id = 'f_body' name = 'body' class = 'p_msg'></textarea></td></tr>
				<tr><td>Prove that you are human:</td><td><div style = 'float:right;' class="g-recaptcha" data-sitekey="6Le4cAoTAAAAANLxGDjlWu1j89FOS4WVLYp_OEjY"></div></td></tr>
				<tr><td></td><td><input class = 's_post' type = 'submit' value = 'submit'></td></tr>
				</table>
			</form>
		</div> <!-- wrapper -->
	</body>
</html>