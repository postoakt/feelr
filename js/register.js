function main(){
	
	$('.error_msg').hide();
	$('.reg_success').hide();

	$('.i_submit').click(function(){
		var em = document.getElementById('i_email').value;
		var uname = document.getElementById('i_username').value;
		var pw = document.getElementById('i_pass1').value;
		var pw2 = document.getElementById('i_pass2').value;
		
		if (!validateEmail(em)){
			$('.error_msg').show();
			$('.error_msg').html("Your email address is invalid.");
		}
		else if (uname.length < 6){
			$('.error_msg').show();
			$('.error_msg').html("Username must be at least 6 characters in length.");
		}
		else if (pw.length < 6){
			$('.error_msg').show();
			$('.error_msg').html("Password must be at least 6 characters in length.");
		}
		else if (pw !== pw2){
			$('.error_msg').show();
			$('.error_msg').html("Passwords do not match.");			
		}
		else{	
				$.ajax({
					url: "../scripts/register.php",
					method: "POST",
					data: {email: em, username: uname, password: pw}
				}).done(function(data){
					if (data === "EMAIL"){
						$('.error_msg').show();
						$('.error_msg').html("Email address already in use.");
					}
					else if (data === "USERNAME"){
						$('.error_msg').show();
						$('.error_msg').html("That username is taken.");	
					}
					else if (data === "SQL"){
						$('.error_msg').show();
						$('.error_msg').html("There was an error processing your request.");		
					}
					else{

						$('.row.row-centered').hide();
						$('.error_msg').hide();
						$('.reg_success').show();
					}
				}); //$.ajax -- register user --
		}	
	});// $('.i_submit').click()
} //main()

function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)


$(document).ready(main);
