function validateLogin(){
	var em = document.getElementById("i_email").value;
	var pw = document.getElementById("i_pass").value;

	if (validateEmail(em) && pw.length > 0){
		$.ajax({
			url: "scripts/login.php",
			method: "POST",
			data: {email: em, password: pw}
		}).success(function(data){
			var result = parseInt(data);
			if (result > 0)
				location.href = "feels";
			else
				$('.error_msg').show();
		});
	}
	else
		$('.error_msg').show();

} //validateLogin()


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)


function main(){
	
	$('.error_msg').hide();
	$('.i_submit').click(function(){
		validateLogin();
	});	
}

$(document).ready(main);
