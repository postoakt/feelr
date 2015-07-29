<?php
	require_once("sql.php");

	function insert_post($user, $body){	
		$mysqli = new mysqli(SERVER, USER, PW, DB);
		$query = "INSERT INTO posts (user, body) VALUES (?, ?)";
		$stmt = $mysqli->prepare(query);
		$stmt->bind_param('ss', $user, $body);
		$stmt->execute();
		return $stmt->affected_rows;
	} //insert_post($user, $body)

	function register_user($username, $email){

	} //register_user($username, $email)

	function remove_user($username){

	} //remove_user($username)

	function get_posts_by_latest($p_num){
		$e_index = $p_num * 10;
		$s_index = $e_index - 10;
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM `posts` ORDER BY date DESC LIMIT " . (int)$s_index . ", " . (int)$e_index;
		$result = mysqli_query($con, $query);
		echo_result($result);
	} //get_posts_by_latest()

	function get_popular_posts_this_week($p_num){

	} //get_popular_posts_this_week()

	function get_popular_posts_today($p_num){

	} //get_popular_posts_today()

	function get_posts_randomly($p_num){
		$e_index = $p_num * 10;
		$s_index = $e_index - 10;
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM `posts` ORDER BY RAND() DESC LIMIT " . (int)$s_index . ", " . (int)$e_index;
		$result = mysqli_query($con, $query);
		echo_result($result);
	} //get_posts_randomly()

	function echo_result($result){
		while ($row = mysqli_fetch_assoc($result))
			echo "<div class = 'feel'>
				<p>" . $row['body'] . "</p>
				<div class = 'u_n'>-" . $row['user'] ."</div>
				<ul class = 'c_h'>
					<li><a href = '../comments/?p=" . $row['PID'] . "'><div class = 'comments'>" . $row['comments'] . " comments</div></a></li>
					<li><div class = 'heart'><img changed = 'false' val = '" . $row['hearts'] . "' src = '../imgs/heart.png' id = '" . $row['PID'] . "' data-other-src = '../imgs/heart-filled.png' width = 8px; height = 8px;></div></li>
					<li><div class = 'h_c' id = 'h_" . $row['PID'] . "'>(" . $row['hearts'] . 	")</div></li>
				</ul>
			</div>";
	} //echo_result($result)
	
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
	
	function echo_comments_by_pid($pid){
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM comments WHERE PID = " . (int)$pid . " ORDER BY date ASC";
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
?>
