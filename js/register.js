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
		
	});
} //main()

function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)

$(document).ready(main);
