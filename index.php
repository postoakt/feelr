<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap -->
		<link rel = "stylesheet" type = "text/stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<link rel = "stylesheet type = "text/stylesheet" href = "css/home.css">
		
		<!-- Google-hosted jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script src = "js/home.js"></script>
	</head>
	<body>
		<div class = "jumbotron">
			<div class = "container">
				<div class = "f_form">
					<form autocomplete = "off" method = "POST" action = 'feels' id = "l_form">
						<div class = "row row-centered">
							<div class = "col-md-12">
								<div class = "title">feel it.</div>
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home top" type = "email" id = "i_email" name = "n_email" placeholder  = "Email">
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<input class = "i_home bottom" type = "password" id = "i_pass" name = "n_pass" placeholder = "Password">
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<div class = "error_msg">Your email or password were incorrect.</div>
							</div>
						</div> <!-- row -->
						<div class = "row row-centered">
							<div class = "col-md-12">
								<div class = "i_submit">Log In</div>
							</div>
						</div> <!-- row -->
					</form> <!-- form -->
				</div> <!-- f_form -->
			</div> <!-- container -->
		</div> <!-- jumbotron -->
		<div class = 'foot'>
			<ul class = 'f_list'>
				<li><a href = "#">About</a></li>
				<li><a href = "#">Sign In</a></li>
				<li><a href = "signup">Register</a></li>
				<li><a href = "feels">Anon</a></li>
			</ul>
		</div> <!-- foot -->
	</body>
</html>
