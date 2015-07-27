function main(){
	
	$('.error_msg').hide();
	
	$('.i_submit').click(function (){
		var email = document.getElementById('i_email').value;
		var username = document.getElementById('i_username').value;
		var password = document.getElementById('i_pass').value;
		
		if (!validateEmail(email)){
			$('.error_msg').show();
			$('.error_msg').html("Your email address is invalid.");
		}
		else if (username.length < 6){
			$('.error_msg').show();
			$('.error_msg').html("Username must be at least 6 characters in length.");
		}
		else if (password.length < 6){
			$('.error_msg').show();
			$('.error_msg').html("Password must be at least 6 characters in length.");
		}
		else{
			if (username_in_use(username)){
				
			}
			else if (email_in_use(email)){
				
			}
			else{
				
			}
		}
		
	});
} //main()

function username_in_use(username){
	
} //username_in_use(username)

function email_in_use(email){
	
} //email_in_use(email)

function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)

function insert_into_db(email, username, password){
	
} //insert_into_db(email, username, password)

$(document).ready(main);
