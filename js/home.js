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
	
	var toggle = true;
	$('.error_msg').hide();
	$('.reset_result').hide();
	$('.b_quote').hide();
	$('.i_submit').click(function(){
		validateLogin();
	});
	
	$('#expand').click(function(){
		if (toggle){
			$('.about').animate({ height: '256px'}, 300,
			function(){
				toggle = false;
				$('.b_quote').show();
			});
			$("html, body").animate({ scrollTop: $(document).height() }, "slow");
		}
		else{
			$('.about').animate({ height: '0'}, 300,
		    function(){
		    	toggle = true;
		    	$('.b_quote').hide();
		    });
			$("html, body").animate({ scrollTop: 0}, "slow");
		}
	});
	
	$('.r_submit').click(function(){
		var email = document.getElementById("i_email").value;
		if (validateEmail(email)){;
			$posting = $.post("../scripts/reset_password.php", {email: email});
			$posting.done(function(data){
				if (data > 0){
					$(this).html("Password reset successfully.");
					$(this).css("color", "green");
				}
				else {
					$(this).html("Email could not be validated.");
					$(this).css("color", "red");
				}
			});
		}
		else{
			$(this).html("Email could not be validated.");
			$(this).css("color", "red");
		}
	});
}

function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} //validateEmail(email)

$(document).ready(main);
