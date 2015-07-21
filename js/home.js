function validateLogin(){
	var email = document.getElementById("i_email").value;
	var pw = document.getElementById("i_pass").value;
	if (validateEmail(email) && pw.length > 0){
		
	}
	else{
		return false;
	}
}


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)


function main(){
	
	$('.error_msg').hide();
	
	$('.i_submit').click(function(){
		if (validateLogin()){
			document.getElementById("l_form").submit();
		}
		else{
			$('.error_msg').show();
		}

	});	
}

$(document).ready(main);
