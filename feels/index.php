<!DOCTYPE html>
<html>
	<head>
		<!-- Google-hosted jQuery -->
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script src = "../js/feel.js"></script>
		<script src = "../js/logout.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
	</head>
	<body>
		<div id = "wrapper">
		<div id = "header">
			<h1><a href = "../">feelr</a></h1>
			<p>let it all out.</p>
			<ul class = "nav">
		<?php
			session_start();
			require_once('../scripts/functions.php');
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
		
		<?php
			require_once("../scripts/functions.php");
	
			$m = '';
			if (isset($_GET['m']))
				$m = $_GET['m'];
			else
				$m = 'latest';
			
			echo "<div id = 'sort_menu'>";
				echo "<ul>";
					
					if ($m === 'latest')
						echo "<li><a class = 'active' href = '#'>Latest</a></li>";
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
					
					if ($m == 'random')
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
			
			switch ($m) {
				case 'latest': get_posts_by_latest($p_num);
							   echo_posts_footer($m, $p_num);
					break;
				case 'p_today':
					break;
				case 'p_week':
					break;
				case 'random': get_posts_randomly($p_num);
							   echo_random_footer();
					break;
				default:
					break;
			}
		?>
		</div> <!-- wrapper -->						
	</body>
</html>