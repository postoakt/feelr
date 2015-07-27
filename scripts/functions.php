<?php
	include_once("sql.php");

	function is_email_in_use($email){

	} //is_email_in_use($username)

	function is_username_in_use($username) {

	} //is_username_in_use($username)

	function insert_post($user, $body){

	} //insert_post($user, $body)

	function register_user($username, $email){

	} //register_user($username, $email)

	function remove_user($username){

	} //remove_user($username)

	function get_posts_by_latest($p_num){
		$e_index = $p_num * 10;
		$s_index = $e_index - 10;
		$con = mysqli_connect(SERVER, USER, PW, DB);
		$query = "SELECT * FROM `posts` ORDER BY date DESC LIMIT " . $s_index . ", " . $e_index;
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
		$query = "SELECT * FROM `posts` ORDER BY RAND() DESC LIMIT " . $s_index . ", " . $e_index;
		$result = mysqli_query($con, $query);
		echo_result($result);
	} //get_posts_randomly()

	function echo_result($result){
		while ($row = mysqli_fetch_row($result))
			echo "<div class = 'feel'>
				<p>" . $row[2] . "</p>
				<div class = 'u_n'>-" . $row[1] ."</div>
				<ul class = 'c_h'>
					<li><div class = 'comments'>" . $row[3] . " comments</div></li>
					<li><div class = 'heart'><img changed = 'false' val = '" . $row[4] . "' src = '../imgs/heart.png' id = '" . $row[0] . "' data-other-src = '../imgs/heart-filled.png' width = 8px; height = 8px;></div></li>
					<li><div class = 'h_c' id = 'h_" . $row[0] . "'>(" . $row[4] . 	")</div></li>
				</ul>
			</div>";
	} //echo_result($result)
	
	function echo_random_footer(){
			echo "<div id = 'footer'>";
			echo "<a style = 'color: #E60000;' href = 'index.php?m=random'>More Randomness</a>";
			echo "</div> <!-- footer -->";	
			echo "</div> <!-- wrapper -->";
	} //echo_random_footer()
?>
