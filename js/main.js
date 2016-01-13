//Fade Functions
$(function(){
  $('.fade').hide().fadeIn(750);
});

$(function(){
  $('.fade1').hide().fadeIn(250);
});

$(function(){
  $('.fade2').hide().fadeIn(1500);
});

//Show-Hide Divs
function ReverseDisplay(d) {
	if(document.getElementById(d).style.display == 'block') { 
		document.getElementById(d).style.display = "none";
		}
	else {
		document.getElementById(d).style.display = "block"; 
		}
}

