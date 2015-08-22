function main() {
	$('.heart img').click(function(){	
		var pid = $(this).attr('id');
		var img = document.getElementById(pid);
		var changed = $(img).attr('changed');
		
		if (changed === 'false'){		
			$.ajax({
				url: "../scripts/inc_hearts.php",
				type: "POST",
				data: {PID: pid}
			})
			.success(function(data){
				var img = document.getElementById(pid);
				var h_c = $(img).attr('val');
				if (data === '1'){
					$(img).attr('changed', 'true');
					$(img).attr({
	        			src: $(img).attr('data-other-src'), 'data-other-src': $(img).attr('src') 
					});
					
					h_c = parseInt(h_c) + 1;
					document.getElementById('h_' + pid).innerHTML = '(' + h_c + ')';
				}
			});
		}
	});
	
};

function pop_window(url){
	newwindow=window.open(url,'name','height=304,width=304');
	if (window.focus) {newwindow.focus()}
	return false;
}

$(document).ready(main);
