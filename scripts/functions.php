<?php
	require_once("sql.php");

	function insert_post($user, $body){	
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "INSERT INTO posts (user, body) VALUES (?, ?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ss', $user, $body);
		$stmt->execute();
		return $stmt->affected_rows;
	} //insert_post($user, $body)
	
	function send_message($from, $to, $subj, $body){
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "INSERT INTO messages (sender, recipient, subj, body) VALUES (?, ?, ?, ?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('ssss', $from, $to, $subj, $body);
		$stmt->execute();
		return $stmt->affected_rows;
	} //send_message($to, $from, $subj, $body)
	
	function is_email_in_use($email){
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "SELECT * FROM users WHERE email = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows;
	} //is_email_in_use($email)
	
	function is_username_in_use($username){
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "SELECT * FROM users WHERE username = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		return $stmt->num_rows;	 	
	} //is_username_in_use($username)

	function register_user($username, $email, $password){
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param('sss', $username, $email, $password);
		$stmt->execute();
		return $stmt->affected_rows;
	} //register_user($username, $email)

	function remove_user($username){
		$mysqli = new mysqli(SERVER, USER, DB);
		$query = "DELETE FROM USERS WHERE username = ?";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		return $stmt->affected_rows;
	} //remove_user($username)

	function get_posts_by_latest($p_num){
		$s_index = ($p_num * 10) - 10;
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM `posts` ORDER BY PID DESC LIMIT " . (int)$s_index . ", 10";
		$result = mysqli_query($con, $query);
		echo_result($result);
	} //get_posts_by_latest()

	function get_popular_posts_this_week(){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$count = 0;
		$i = 1;
		while ($count < 1){
			$query = "SELECT * FROM posts WHERE date > DATE_SUB(NOW(), INTERVAL " . $i . " WEEK) ORDER BY comments + hearts DESC LIMIT 0, 10";
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);			
			$i++;
		}
		echo_result($result);
	} //get_popular_posts_this_week()

	function get_popular_posts_today(){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$count = 0;
		$i = 1;
		while ($count < 1){
			$query = "SELECT * FROM posts WHERE date > DATE_SUB(NOW(), INTERVAL " . $i . " DAY) ORDER BY comments + hearts DESC LIMIT 0, 10";
			$result = mysqli_query($con, $query);
			$count = mysqli_num_rows($result);			
			$i++;
		}
		echo_result($result);
	} //get_popular_posts_today()
	
	function get_popular_all_time($p_num){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$s_index = ($p_num * 10) - 10;

			$query = "SELECT * FROM posts ORDER BY comments + hearts DESC LIMIT " . $s_index . ", 10";
			$result = mysqli_query($con, $query);
		echo_result($result);		
	}

	function get_posts_randomly(){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM `posts` ORDER BY RAND() DESC LIMIT 0, 10";
		$result = mysqli_query($con, $query);
		echo_result($result);
	} //get_posts_randomly()

	function echo_result($result){
		while ($row = mysqli_fetch_assoc($result))
			echo "<div class = 'feel'>
				<p>" . $row['body'] . "</p>
				<div class = 'u_n'>-" . $row['user'] ."</div>
				<ul class = 'c_h'>
					<li><a href = '../comments/?p=" . $row['PID'] . "&i=1'><div class = 'comments'>" . $row['comments'] . " comments</div></a></li>
					<li><div class = 'heart'><img changed = 'false' val = '" . $row['hearts'] . "' src = '../imgs/heart.png' id = '" . $row['PID'] . "' data-other-src = '../imgs/heart-filled.png' width = 8px; height = 8px;></div></li>
					<li><div class = 'h_c' id = 'h_" . $row['PID'] . "'>(" . $row['hearts'] . 	")</div></li>
				</ul>
			</div>";
	} //echo_result($result)
	
	function echo_posts_footer($m, $p_num){
		$page_count = get_page_count();
		echo "<div id = 'footer'>";
		
		if($p_num < 4){
			for ($i = 1; $i <= 3; $i++){
				if ($i == $p_num)
					echo "<a class = 'f_link' style = 'color: #000000; text-decoration: none;'>" . $p_num . "</a>";
				else
					echo f_footer_link($m, $i, $i);
			}
			echo "...";
			echo f_footer_link($m, $page_count, $page_count);
			echo f_footer_link($m, $p_num + 1, ">>");
		}
		else if($p_num >= 3 && $p_num < ($page_count - 2)){
			echo f_footer_link($m, $p_num - 1, "<<");
			echo f_footer_link($m, 1, 1);
			echo "...";
			for ($i = $p_num - 1; $i <= $p_num + 1; $i++){
				if ($i == $p_num)
					echo "<a class = 'f_link' style = 'color: #000000; text-decoration: none;'>" . $p_num . "</a>";
				else
					echo f_footer_link($m, $i, $i);
			}
			echo "...";
			echo f_footer_link($m, $page_count, $page_count);
			echo f_footer_link($m, $p_num + 1, ">>");			
		}
		else{
			echo f_footer_link($m, $p_num - 1, "<<");
			echo f_footer_link($m, 1, 1);
			echo "...";
			for ($i = $page_count - 2.; $i <= $page_count; $i++){
				if ($i == $p_num)
					echo "<a class = 'f_link' style = 'color: #000000; text-decoration: none;'>" . $p_num . "</a>";
				else
					echo f_footer_link($m, $i, $i);
			}	
			echo f_footer_link($m, $p_num + 1, ">>");		
		}
		echo "</div>";
	} //echo_posts_footer($m, $p_num)
	
	function echo_comments_footer($pid, $p_num){
		echo "<div id = 'footer'>";
		if ($p_num > 1){
			echo c_footer_link($pid, $p_num - 1, '<<');
			echo "<a class = 'f_link' style = 'color: #000000; text-decoration: none;'>" . $p_num . "</a>";
		}
		$page_count = get_comments_page_count($pid);
		if ($p_num == 1 && $page_count > 1)
			echo "<a class = 'f_link' style = 'color: #000000; text-decoration: none;'>" . $p_num . "</a>";
		if ($page_count > 1 && $p_num < $page_count){
			echo "...";
			echo c_footer_link($pid, $page_count, $page_count);
			if ($p_num < $page_count){
				echo c_footer_link($pid, $p_num + 1, '>>');
			}
		}
		echo "</div>";
	}
	
	function get_page_count(){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM posts WHERE 1";
		$result = mysqli_query($con, $query);
		$posts_count = mysqli_num_rows($result);
		$mod = (int)(($posts_count % 10) > 0);
		return (int)($posts_count / 10) + $mod;	
	} //get_posts_count()
	
	function get_comments_page_count($pid){
		$c_count = get_comment_count($pid);
		$mod = (int)(($c_count % 10) > 0);
		return (int)($c_count / 10) + $mod;
	} //get_comments_count()
	
	function get_comment_count($pid){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM comments WHERE PID = " . $pid;
		$result = mysqli_query($con, $query);
		return mysqli_num_rows($result);	
	} //get_comment_count($pid)
	
	function f_footer_link($m, $page_number, $text){
		return sprintf("<a class = 'f_link' href = 'index.php?m=%s&p=%s'>%s</a>", $m, $page_number, $text);
	} //f_footer_link($m, $page_number, $text)
	
	function c_footer_link($p, $i, $text){
		return sprintf("<a class = 'f_link' href = 'index.php?p=%s&i=%s'>%s</a>", $p, $i, $text);
	} //f_footer_link($p, $i, $text)
	
	function echo_random_footer(){
			echo "<div id = 'footer'>";
			echo "<a style = 'color: #E60000;' href = 'index.php?m=random'>More Randomness</a>";
			echo "</div> <!-- footer -->";	
			echo "</div> <!-- wrapper -->";
	} //echo_random_footer()
	
	
	function echo_post_by_pid($pid){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM posts WHERE PID = " . $pid;
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row > 0) {
			echo "<div class = 'feel' pid ='" . $row['PID'] . "'>
				<p>" . $row['body'] . "</p>
				<div class = 'u_n'>-" . $row['user'] ."</div>
				<ul class = 'c_h'>
					<li><div class = 'comments'>" . $row['comments'] . " comments</div></li>
					<li><div class = 'heart'><img changed = 'false' val = '" . $row['hearts'] . "' src = '../imgs/heart.png' id = '" . $row['PID'] . "' data-other-src = '../imgs/heart-filled.png' width = 8px; height = 8px;></div></li>
					<li><div class = 'h_c' id = 'h_" . $row['PID'] . "'>(" . $row['hearts'] . 	")</div></li>
				</ul>
			</div>";
		}
		else
			die();
	} //echo_post_by_pid($pid)
	
	function echo_comments_by_pid($pid, $p_num){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$s_index = ($p_num * 10) - 10;
		$query = "SELECT * FROM comments WHERE PID = " . (int)$pid . " ORDER BY date ASC LIMIT " . $s_index . ", 10";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_assoc($result)){
			echo "<div class = 'feel_comment'><p>" . $row['body'] . "</p></br><div class = 'feel_comment_closing'> -" . $row['user'] . ", " . $row['date'] . "</div></div>";
		}
	} //echo_comments_by_pid($pid)
	
	function echo_comment_box(){
		if ( isset($_SESSION['username']) )
			echo "<input type = 'text' name = 'u_name' value = '" . $_SESSION['username'] . "' readonly>";
		else 
			echo "<input type = 'text' name = 'u_name' value = 'Anonymous' readonly>";		
	} //echo_comment_box()
	
	function get_message_count($user){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM messages WHERE	recipient = '" . $user . "'";
		$result = mysqli_query($con, $query);
		return mysqli_num_rows($result);		
	}
	
	function echo_inbox($user){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM messages WHERE recipient = '" . $user . "' ORDER BY date DESC";
		$result = mysqli_query($con, $query);
		$len = mysqli_num_rows($result);

		if ($len > 0){
			echo "<table class='t-hover'>";
			echo "<thead><tr><td>From</td><td>Subject</td><td>Message</td><td>Date</td></tr></thead>";
			while ($row = mysqli_fetch_assoc($result)){
				$body = $row['body'];
				$subj = $row['subj'];
				if (strlen($body) > 10){
					$body = substr($body, 0, 10) . "...";
				}
				if(strlen($subj) > 10){
					$subj = substr($subj, 0, 10) . "...";
				}
				echo "<tr onclick = 'viewmessage(" . $row['MID'] . ")' style = 'cursor:pointer;'><td>" . $row['sender'] . "</td><td>" . $subj . "</td><td>" . $body . "</td><td>" . date('M j Y g:i A', strtotime($row['date'])) . "</td></tr></a>";	
			}
			echo "</table>";
		}
		else{
			echo "<div style = 'margin: 0 auto; margin-top: 64px; text-align: center; font-family: 'Shift', Sans-Serif;'>No messages to display. </div>";
		}
	} //echo_inbox($user)
	
	function echo_sentbox($user){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM messages WHERE sender = '" . $user . "' ORDER BY date DESC";
		$result = mysqli_query($con, $query);
		$len = mysqli_num_rows($result);

		if ($len > 0){
			echo "<table class='t-hover'>";
			echo "<thead><tr><td>To</td><td>Subject</td><td>Message</td><td>Date</td></tr></thead>";
			while ($row = mysqli_fetch_assoc($result)){
				$body = $row['body'];
				if (strlen($body) > 10){
					$body = substr($body, 0, 10) . "...";
				}
				echo "<tr><td>" . $row['recipient'] . "</td><td>" . $row['subj'] . "</td><td>" . $body . "</td><td>" . date('M j Y g:i A', strtotime($row['date'])) . "</td></tr>";		
			}
			echo "</table>";
		}
		else{
			echo "<div style = 'margin: 0 auto; margin-top: 64px; text-align: center; font-family: 'Shift', Sans-Serif;'>No messages to display. </div>";
		}	
	} //echo_sentbox($user)
	
	function compose_msg(){
		$to = "";
		$subj = "";
		
		if (isset($_GET['r']))
			$to = $_GET['r'];
		
		if (isset($_GET['s']))
			$subj = $_GET['s'];
		
		echo "<form action = 'send.php' method = 'post' onsubmit = 'return validate_form()' autocomplete = 'off'>
				<table class = 'c_form'>
				<tr><td>To:</td><td><input onkeyup = 'validateUser()' style = 'float: right; width: 100%;' type = 'text' id = 'r_username' name = 'r_user' value = '" . $to . "' valid = 0></td></tr>
				<tr><td>Subject:</td><td><input style = 'float: right; width: 100%;' type = 'text' id = 'r_subj' name = 'subj' value = '" . $subj . "'></td></tr>
				<tr><td colspan = '2'><textarea id = 'f_body' name = 'body' class = 'p_msg'></textarea></td></tr>
				<tr><td>Prove that you are human:</td><td><div style = 'float:right;' class='g-recaptcha' data-sitekey='6LcplwoTAAAAADHuYr9GlOszT-Qx_y0g_WhlAxO9'></div></td></tr>
				<tr><td></td><td><input class = 's_post' type = 'submit' value = 'send'></td></tr>
				</table>
				</form>";
	} //compose_msg($user)
	
	function retrieve_message_by_id($mid){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM messages WHERE MID = " . $mid;
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$msg = array($row['sender'], $row['subj'], $row['body']);
		return $msg;
	}
?>
