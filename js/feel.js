function main() {
	$('.heart img').click(function(){
		$(this).attr({
        	src: $(this).attr('data-other-src'), 'data-other-src': $(this).attr('src') 
		});
	});
	
};

$(document).ready(main);
