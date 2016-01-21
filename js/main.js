//Functions to run on document ready
$(document).ready(function(){
	//Resize the screen
	reSize();
});

//Window resize function
$(window).on('resize', function(){
	reSize();
});



//FUNCTIONS

//Zoom window on screen resize
function reSize(){
	var height_ratio = $(window).height()/900;
	var width_ratio = $(window).width()/950;
	if (height_ratio < 1 || width_ratio < 1) {
		if (height_ratio < width_ratio) {
			$('body').css('zoom', height_ratio);
		} else {
			$('body').css('zoom', width_ratio);
		}	
	}
}

