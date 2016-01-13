<html>

<head>
<style type="text/css">
	.pod{

		border: 5px solid #000;
		max-width: 800px;
		max-height: 400px;
		margin: auto;
		display: flex;
		flex-direction: column;
		flex-wrap: wrap;
	}
	.pea{
		border: 3px solid #000;
		width: 150px;
		height: 50px;
		margin: 10px;
		text-align: center;
		position: relative;
	}
	.points{
		color: #F00;
		font-size: 2em;
		width: 150px;
		height: 50px;
		position: absolute;
		top: 0;
		left: 0;
		text-align: center;
		opacity: 0.5;
		-webkit-touch-callout: none;
    	-webkit-user-select: none;
    	-khtml-user-select: none;
    	-moz-user-select: none;
    	-ms-user-select: none;
    	user-select: none;
	}
</style>
</head>


<body oncontextmenu="return false;">
	<div class="pod" id="main">
		<?php
			for ($i=1; $i < 21; $i++) { 
				echo '<div class="pea" id="skill_' . $i . '">' . $i . '<div class="points">0</div></div>';
			}
		?>
	</div>
	<div id="remain" class="remain">12</div>
</body>
<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
<script type="text/javascript">
	
	$('.pea').mousedown(function(event) {
    switch (event.which) {
        case 1:
        	if (parseInt($('#remain').html()) > 0) {
        		$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())+1);
        		$('#remain').html(parseInt($('#remain').html())-1);
        		break;
        	} else {
        		break;
        	};
        case 2:
            break;
        case 3:
        	if ( parseInt($(this).find($('.points')).html()) > 0 ) {
				$(this).find($('.points')).html(parseInt($(this).find($('.points')).html())-1);
            	$('#remain').html(parseInt($('#remain').html())+1);
            	break;
        	} else {
        		break;
        	};

        default:
            alert('You have a strange Mouse!');
    }
});
</script>

</html>