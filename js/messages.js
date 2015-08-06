function validate_form(){
	var googleResponse = jQuery('#g-recaptcha-response').val();
	var recipient = document.getElementByid('r_username').value;
	var msg_body = document.getElementById('f_body').value;
	
	if ((msg_body.length > 0) && googleResponse.length > 0 && recipient.length > 0)
		return true;
	else
		return false;
}

function viewmessage(mid){
	var url = 'viewmessage.php';
	var form = $('<form action="' + url + '" method="post">' +
	  '<input type="text" name="mid" value="' + mid + '" readonly />' +
	  '</form>');
	$('body').append(form);
	form.submit();
}

function validateUser(){
	var username = document.getElementById('r_username').value;
	$.ajax({
		url: "../scripts/val_user.php",
		method: "POST",
		data: {user: username}
	}).success(function(data){
		if (data !== "1"){
			$('#r_username').attr('valid', 0);
		}
		else{
			$('#r_username').attr('valid', 1);
		}
	});
}

function validate_form(){
	var googleResponse = jQuery('#g-recaptcha-response').val();
	var body = document.getElementById('f_body').value;
	var valid = $('#r_username').attr('valid');
	return Boolean(googleResponse.length > 0) && Boolean(body.length > 0) && Boolean(valid > 0);
}

$(document).ready(function(){
	validateUser();
});
