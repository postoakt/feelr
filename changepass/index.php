<?php session_start(); if (!isset($_SESSION['username'])){die();} ?>
<!DOCTYPE html>
<html>
	<head>
    	<!-- jQuery -->
		<script src="../js/jquery-2.1.4.min.js"></script>
        <script>
			function validate(){
				var old1 = document.getElementById('old1').value;
				var old2 = document.getElementById('old2').value;
				var new1 = document.getElementById('new1').value;
				var new2 = document.getElementById('new2').value;
				
				alert
				
				if (!(old1 === old2 && new1 === new2)){
					$('#error').html('*passwords do not match.');
				}
				else if (!(old1 && old2 && new1 && new2)){
					$('#error').html('*empty fields.');
				}
				else if (new1.length < 6){
					$('#error').html('*password is too short.');
				}
				else{
					return true;
				}
				return false;
			}
		</script>
    	<style>
			body{
				background-color:#efefef;
				font-weight: normal;
			}
		</style>
    </head>
    <body>
    	<h4>You can change your password here.</h4>
        <form action = 'result.php' method = 'post' onsubmit = 'return validate()'>
            <table style = "margin: 0 auto; margin: 16px;">
                <tr><td>username:</td><td><?php echo $_SESSION['username']; ?></td></tr>
                <tr><td>old password:</td><td><input type = 'password' id = 'old1' name = 'oldpass1'></td></tr>
                <tr><td>confirm:</td><td><input type = 'password' id = 'old2' name = 'oldpass2'></td></tr>
                <tr><td>new password:</td><td><input type = 'password' id = 'new1' name = 'newpass1'></td></tr>
                <tr><td>confirm:</td><td><input type = 'password' id = 'new2' name = 'newpass2'></td></tr>
                <tr><td><div style = 'color:red;font-size:.75em;'id = 'error'></div></td>
                <td><input style = 'float:right;' type = 'submit' value = 'submit'></td></tr>
            </table>
        </form>
    </body>
</html>