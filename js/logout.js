function logout(){
	//alert('derp');
	$.ajax({
		url: "../scripts/logout.php"
	}).done(function(){
		location.href = "../";
	});
} //logout()
