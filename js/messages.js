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

function viewsent(mid){
	var url = 'viewsent.php';
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
			document.getElementById('err_msg').innerHTML = '*Invalid recipient.';
			$('#err_msg').show();
		}
		else{
			$('#r_username').attr('valid', 1);
			$('#err_msg').hide();
		}
	});
}

function validate_form(){
	var googleResponse = jQuery('#g-recaptcha-response').val();
	var body = document.getElementById('f_body').value;
	var valid = $('#r_username').attr('valid');
	if (body.length < 1){
		document.getElementById('err_msg').innerHTML = '*Message body cannot be blank.';
		$('#err_msg').show();
		return false;
	}
	else if (googleResponse.length < 1){
		document.getElementById('err_msg').innerHTML = '*Please complete the reCaptcha.';
		$('#err_msg').show();
		return false;
	}
	else if (valid < 1){
		document.getElementById('err_msg').innerHTML = '*Invalid recipient.';
		$('#err_msg').show();
		return false;	
	}
	else{
		$('#err_msg').hide();
		return true;		
	}
}

function reply(to, subj){
	subj = subj.replace(/'/g, "`");
	subj = subj.replace(/"/g, "`");
	subj = "RE:" + subj;
	if (subj.length > 10)
		subj = subj.substr(0, 10) + "...";
	var url = "index.php?m=c";
	var html = "<form action = '" + url + "' method = 'post'>"
	           + "<input type = 'text' name = 'r' value = '" + to + "' readonly>"
	           + "<input type = 'text' name = 's' value = '" + subj + "' readonly></form>";
	var form = $(html);
	$('body').append(form);
	form.submit();
}

function addslashes(string) {
    return string.replace(/\\/g, '\\\\').
        replace(/\u0008/g, '\\b').
        replace(/\t/g, '\\t').
        replace(/\n/g, '\\n').
        replace(/\f/g, '\\f').
        replace(/\r/g, '\\r').
        replace(/'/g, '\\\'').
        replace(/"/g, '\\"');
} //addslashes(string)

function removeQuotes(str){
	for (var i = 0; i < str.length; i++){
		if (str[i] == "'" || str[i] == '"'){
			str[i] = "_";
		}
	}
	return str;
} //removeQuotes(string)

$(document).ready(function(){
	$('#err_msg').hide();
	validateUser();
});
