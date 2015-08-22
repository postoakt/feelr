<!DOCTYPE html>
<html>
	<head>
		<!-- jQuery -->
		<script src="../js/jquery-2.1.4.min.js"></script>
		
		<script src = "../js/feel.js"></script>
		<script src = "../js/logout.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
	</head>
	<body>
		<div id = "wrapper">
			<div id = "header">
				<h1><a style ="text-decoration:none;" href = "../">feel it</a></h1>
				<p>let it all out.</p>
				<ul class = "nav">
					<?php
						session_start();
						require_once('../scripts/functions.php');
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
				</ul> <!-- ul class nav -->
			</div> <!-- header -->
			<?php
				require_once("../scripts/functions.php");
		
				$m = '';
				if (isset($_GET['m']))
					$m = $_GET['m'];
				else
					$m = 'latest';
				
				echo "<div id = 'sort_menu'>";
					echo "<ul>";
						
						if ($m === 'latest' || !(($m === 'p_today') || ($m === 'p_week') || ($m === 'random') || ($m === 'all_time'))){
							$m = 'latest';
							echo "<li><a class = 'active' href = 'index.php?m=latest'>Latest</a></li>";
						}
						else
							echo "<li><a href = 'index.php?m=latest'>Latest</a></li>";
						
						if ($m === 'p_today')
							echo "<li><a class = 'active' href = 'index.php?m=p_today'>Popular Today</a></li>";
						else
							echo "<li><a href = 'index.php?m=p_today'>Popular Today</a></li>";
						
						if ($m === 'p_week')
							echo "<li><a class = 'active' href = 'index.php?m=p_week'>Popular This Week</a></li>";
						else 
							echo "<li><a href = 'index.php?m=p_week'>Popular This Week</a></li>";
							
						if ($m === 'all_time')
							echo "<li><a class = 'active' href = 'index.php?m=all_time'>Popular All Time</a></li>";
						else
							echo "<li><a href = 'index.php?m=all_time'>Popular All Time</a></li>";
												
						if ($m === 'random')
							echo "<li><a class = 'active' href = 'index.php?m=random'>Random</a></li>";
						else
							echo "<li><a href = 'index.php?m=random'>Random</a></li>";
							
						echo "<li><a href = '../post'>Post</a></li>";
					echo "</ul>";
				echo "</div> <!-- sort menu -->";
				
				if (isset($_GET['p']))
					$p_num = $_GET['p'];
				else
					$p_num = 1;
				
				if ((filter_var($p_num, FILTER_VALIDATE_INT) === false) || ($p_num > get_page_count()))
					$p_num = 1;
				
				switch ($m) {
					case 'latest': get_posts_by_latest($p_num);
						           echo_posts_footer($m, $p_num );
						break;
					case 'p_today': get_popular_posts_today();
						break;
					case 'p_week': get_popular_posts_this_week();
						break;
					case 'all_time': get_popular_all_time($p_num);
						             echo_posts_footer($m, $p_num);
						break;
					case 'random': get_posts_randomly();
								   echo_random_footer();
						break;
					default:      get_posts_by_latest($p_num);
	                              echo_posts_footer($m, $p_num);
						break;
				}
			?>
		</div> <!-- wrapper -->						
	</body>
</html>