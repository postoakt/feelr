<?php if (!isset($_GET['p'])) {header('location: ../'); die();} ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- jQuery -->
		<script src="../js/jquery-2.1.4.min.js"></script>

		<!-- Google reCaptcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<!-- Stylesheets -->
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">

		<!-- Javascript -->
		<script src = "../js/feel.js"></script>
		<script src = "../js/logout.js"></script>
		<script>
			function validate_form(){
				var googleResponse = jQuery('#g-recaptcha-response').val();
				var u_name = document.getElementById('f_name').value;
				var msg_body = document.getElementById('f_body').value;
				var p_id = $('.feel').attr('pid');

				if ((msg_body.length > 0) && googleResponse.length > 0) {
					$('.s_post').attr('disabled', 'true');
					$.ajax({
						url: "../scripts/insert_comment.php",
						method: "POST",
						data: {pid: p_id, username: u_name, body: msg_body}
					})
					.done(function(data){
						location.reload();
					});
				}

				return false;
			}
		</script>
	</head>
	<body>
		<div id = "wrapper">
			<div id = "header">
				<h1><a href = "../">feelr</a></h1>
				<p>let it all out.</p>
				<ul class = "nav">
					<?php
						require_once('../scripts/functions.php');
						session_start();

						if (isset($_SESSION['logged_in'])){
							$msg_count = get_message_count($_SESSION['username']);
							echo "<a onclick = \"pop_window('../changepass')\"
							      href = 'javascript:void(0)'><li>" . $_SESSION['username'] . " -</li></a>
							<li><a href = '../messages'> messages (" . $msg_count . ") </a> - </li>
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
					<li><a href = '../feels/index.php?m=all_time'>Popular All Time</a></li>
					<li><a href = '../feels/index.php?m=random'>Random</a></li>
					<li><a  href = '../Post/'>Post</a></li>
				</ul>
			</div> <!-- sort menu -->
			<?php
				require_once("../scripts/functions.php");
				$p;
				$i;
				if (isset($_GET['p']))
					$p = $_GET['p'];
				else
					$p = 0;
				if(isset($_GET['i']))
					$i = $_GET['i'];
				else
					$i = 1;
				
				if ((filter_var($p, FILTER_VALIDATE_INT) === false) || (filter_var($i, FILTER_VALIDATE_INT) === false) ){
					$p = 0;
					$i = 1;
				}
				echo_post_by_pid($p);
				echo_comments_by_pid($p, $i);
				echo_comments_footer($p, $i);
			?>

			<form action = '#' onsubmit = 'return validate_form()' autocomplete = 'off'>
				<table class = 'post_form_c'>
					<tr><td>Username:</td><td>
					<?php
						if ( isset($_SESSION['username']) )
							echo "<input type = 'text' name = 'u_name' id = 'f_name' value = '" . $_SESSION['username'] . "' readonly>";
						else
							echo "<input type = 'text' name = 'u_name' id = 'f_name' value = 'Anonymous' readonly>";
					?>
					</td></tr>
					<tr><td colspan = '2'><textarea id = 'f_body' name = 'body' class = 'p_msg'></textarea></td></tr>
					<tr><td>Prove that you are human:</td><td><div style = 'float:right;' class="g-recaptcha" data-sitekey="6LcplwoTAAAAADHuYr9GlOszT-Qx_y0g_WhlAxO9"></div></td></tr>
					<tr><td></td><td><input class = 's_post' type = 'submit' value = 'submit'></td></tr>
					</table>
			</form>
		</div> <!-- wrapper -->
	</body>
</html>
