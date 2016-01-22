<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<title>Template | Magic Missile</title>
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<!--JS-->
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="js/unslider-min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/unslider.css" />
	<link rel="stylesheet" type="text/css" href="character/character.css" />

	<style>
		body{
			background-image: url('img/mapbg.jpg');
			background-position: center top;
			background-repeat: no-repeat;
			background-color: #000;
		}
		.view_window{
			width: calc(100% - 60px);
			height: 100%;
			position: relative;
			margin: auto;
			overflow: hidden;
			display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
			display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
			display: -ms-flexbox;      /* TWEENER - IE 10 */
			display: -webkit-flex;     /* NEW - Chrome */
			display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */

			flex-direction: row;
		}
		.prev_arrow, .next_arrow{
			display: flex;
			display: -webkit-flex;
			justify-content: center;
			-webkit-justify-content: center;
			align-items: center;
			-webkit-align-items: center;
		}
	</style>
</head>
<body class="noselect">

		<!--Logo Area-->
		<?php $level=0; include 'common/logo.php'; ?>

		
	<div class="board">

		<!--Nav Bar-->
		<div class="top">
			<?php $level=0; include 'common/nav.php'; ?>
		</div>
		
		
		<!--Sign Content-->
		<div class="middle">

			<div class="view_window">

				<div class="prev_arrow"><image src="img/prev.png" width="20px"></image></div>

				<div class="my-slider" style="margin: auto; height: 100%; width: 100%;">
					<ul>

						<li><?php include 'character/race/default.php'; ?></li>
						<li><?php include 'character/class/default.php'; ?></li>
						<li><?php include 'character/suex/default.php'; ?></li>
					</ul>
				</div>

				<div class="next_arrow"><image src="img/next.png" width="20px"></image></div>
			</div>



		</div>

		<div class="bottom"></div>
		
	</div>
	
	<!--Footer-->
	<div >
		<?php $level=0; include 'common/footer.php'; ?>
	</div>
		
		
	<script>

		//Div Carousel

		$(document).ready(function(){
			reSize();
			$('.my-slider').unslider({
				animation: 'horizontal',
				autoplay: false,
				arrows: false,
				keys: false,
				nav: false
				
			});
		});

		$('.next_arrow').click(function(){
			$('.my-slider').unslider('next');
		});			

		$('.prev_arrow').click(function(){
			$('.my-slider').unslider('prev');
		});

		
	</script>

</body>
	
</html>
