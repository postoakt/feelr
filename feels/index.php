<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type = "text/css" href = "../css/feels.css">
	</head>
	<body>
		<div id = "wrapper">
		<div id = "header">
			<h1><a href = "../">feelr</a></h1>
			<p>let it all out.</p>
			<ul class = "nav">
				<li><a href = "../"><div class = "log_in">log in</div></a></li>
				<li><a href = "../signup"><div class = "sign_up">sign up</div></a></li>
			</ul>
		</div> <!-- header -->
		<div id = "sort_menu">
			<ul>
				<li><a class = "active" href = "#">Latest</a></li>
				<li><a href = "#">Popular Today</a></li>
				<li><a href = "#">Popular This Week</a></li>
				<li><a href = "#">Random</a></li>
			</ul>
		</div> <!-- sort menu -->
		<?php
		
		for ($i = 0; $i < 10; $i++){	
		
			echo "<div class = 'feel'>
				<p>afl;jasj;lfkdkjl;asfdjkl;safdjlk;fsajlk;djlk;asfdjkl;asfdjlk;sdafkl;fasdasdfasdfasdfafl;jasj;lfkdkjl;asfdjkl;safdjlk;fsajlk;djlk;asfdjkl;asfdjlk;sdafkl;fasdasdfasdfasdfafl;jasj;lfkdkjl;asfdjkl;safdjlk;fsajlk;djlk;asfdjkl;asfdjlk;sdafkl;fasdasdfasdfasdfafl;jasj;lfkdkjl;asfdjkdfdfdflasdfasdfasdfffffff</p>	
				<div class = 'u_n'>-Anonymous</div>
				<ul class = 'c_h'>
					<li><div class = 'comments'>4,344 comments</div></li>
					<li><div class = 'heart'><img src = '../imgs/heart.png' width = 8px; height = 8px;></div></li>
					<li><div class = 'h_c'>(34)</div></li>
				</ul>
			</div>";
		}
		?>						
		</div> <!-- wrapper -->
	</body>
</html>