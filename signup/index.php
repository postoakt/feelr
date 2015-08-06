<?php session_start(); if (isset($_SESSION['username'])){header("location: ../feels"); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap -->
		<link rel = "stylesheet" type = "text/stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<link rel = "stylesheet type = "text/stylesheet" href = "../css/home.css">
		
		<!-- Google-hosted jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script src = "../js/register.js"></script>
		<script src = "../js/home.js"></script>
	</head>
	<body>
		<div class = "jumbotron">
			<div class = 'reg_success'>Registration successful, you may now <a href = '../'>login.</a></div>
			<div class = "container">
				<div class = "f_form">
					<form autocomplete = "off" action = "home/" onsubmit = "return validateLogin()">
						<div class = "row row-centered">
							<div class = "col-md-12">
								<div class = "title">sign up.</div>
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home top" type = "email" id = "i_email" name = "n_email" placeholder  = "Email">
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home middle" type = "text" id = "i_username" name = "n_user" plusername placeholder = "Username">
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home middle" type = "password" id = "i_pass1" name = "n_pass1" placeholder = "Password">
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home bottom" type = "password" id = "i_pass2" name = "n_pass2" placeholder = "Confirm Password">
							</div>
						</div> <!-- row -->
						<div class = "row row centered">
							<div class = "col-md-12">
								<div class = "error_msg"></div>
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<div class = "i_submit">submit</div>
							</div>
						</div> <!-- row -->
					</form> <!-- form -->
				</div> <!-- f_form -->
			</div> <!-- container -->
		</div> <!-- jumbotron -->
		<div class = 'foot'>
			<ul class = 'f_list'>
				<li><a id = "expand" href = "#">About</a></li>
				<li><a href = "../">Sign In</a></li>
				<li><a href = "#">Register</a></li>
				<li><a href = "../feels">Anon</a></li>
			</ul>
		</div> <!-- foot -->
		<div class = 'about'>
			<div class = 'b_quote'>Feel it is a place for anyone to say whatever they want, anonymously. Share your secrets, your desires, or just how you feel at the time - whether that be angry, joyous, apathetic or depressed. This a safe place to breathe, my friends.</br></br>
				<div class = 'sig'> -Scout</div>
			</div> <!-- b_quote -->
		</div><!-- about -->
	</body>
</html>