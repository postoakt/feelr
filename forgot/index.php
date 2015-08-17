<?php session_start(); if (isset($_SESSION['username'])){header("location: feels"); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap -->
		<link rel = "stylesheet" type = "text/stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<link rel = "stylesheet type = "text/stylesheet" href = "../css/home.css">
		
		<!-- jQuery -->
		<script src="../js/jquery-2.1.4.min.js"></script>
		
		<script src = "../js/home.js"></script>
	</head>
	<body>
		<div class = "jumbotron">
			<div class = "container">
				<div class = "f_form">
                        <div class = "row row-centered">
                            <div class = "col-md-12">
                            	<div class = "p_msg">Enter your email address and we will send you an email containing your temporary password. Once logged in, you may change your password.</div>
                            </div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
                            	<form autocomplete = "off" method = "POST" id = "f_form">
									<input class = "i_home middle" type = "email" id = "i_email" name = "n_email" placeholder  = "Email">
                                    <div class = "reset_result"></div><div class = "r_submit">Submit</div>
                                </form> <!-- form -->
							</div>
						</div> <!-- row -->
				</div> <!-- f_form -->
			</div> <!-- container -->
		</div> <!-- jumbotron -->
		<div class = 'foot'>
			<ul class = 'f_list'>
				<li><a id = 'expand' href = "#">About</a></li>
				<li><a href = "../">Sign In</a></li>
				<li><a href = "../signup">Register</a></li>
				<li><a href = "../feels">Anon</a></li>
			</ul>
		</div> <!-- foot -->
		<div class = 'about'>
			<div class = 'b_quote'>Feel it is a place for anyone to say whatever they want, anonymously. Share your secrets, your desires, or just how you feel at the time - whether that be angry, joyous, apathetic, comedic, depressed, or just contemplative. This a safe place to breathe, my friends.</br></br>
				<div class = 'sig'> -Scout</div>
			</div> <!-- b_quote -->
		</div><!-- about -->