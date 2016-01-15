<?php 
	session_start();

	if (isset($_POST['save'])) {
		$_SESSION['char_feat'] = $_POST['char_feat'];
		header('location: spells.php');
	}
	
	include('../db.php');

	$query_feat = "SELECT * FROM `feat` ORDER BY `feat_name` ASC";
	$feat_results = mysql_query($query_feat);

	function feat_num() {
		$base = 1;
		$bonus = 0;
		$hum = ($_SESSION['char_race'] == 'Human' ? 1 : 0);
		return $base + $bonus + $hum;
	};

	function normal($string) {
		$string = str_replace(' ', '', $string);
		$string = str_replace('(', '', $string);
		$string = str_replace(')', '', $string);
		$string = strtolower($string);
		return $string;
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Select Feats | Magic Missile</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="character.css" />
	<style>
		.content{
			flex-direction: column;
		}
		.above{
			height: 175px;
			width: 100%;
			position: relative;
		}
		.below{
			height: 160px;
			width: 100%;
			position: absolute;
			bottom: 0;
			overflow-y: auto;
		}
		.activity{
			display: none;
		}

		#subtitle{
			background-image: url('img/titlecrossbar.png');
			background-size: 100% 75px;
			height: 75px;
			width: 964px;
			margin: 10px 0 0 -32px;
			color: #fff;
			font-size: 2.5em;
			}

		#chains{
			background-image: url('img/chainlink_long.png');
			background-size: 800px 400px;
			width: 800px;
			height: 400px;
			margin: -340px auto 0 auto;
			position: relative;
			z-index: 1;
			pointer-events: none;
		}

		#submenu{
			background-image: url('img/mediumcrossbar.png');
			background-size: 800px 64px;
			width: 800px;
			height: 64px;
			margin: -55px auto 0 auto;
			position: relative;
			display: flex;
			flex-direction: row;
			justify-content: space-around;	
			align-items: center;
		}

		.feat_slot{
			background-image: url('img/burnedinbutton.png');
			background-size: 165px 60px;
			background-color: transparent;
			height: 60px;
			width: 165px;
			font-family: inherit;
			border: 2px solid transparent;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.pod{
			border: 5px solid #000;
			background-color: transparent;
			width: 720px;
			height: 275px;
			margin: auto;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			overflow-y: auto;
		}
		.pea{
			background-color: #fff;
			border: 3px solid #000;
			font-size: 0.9em;
			width: 145px;
			height: 40px;
			margin: 5px;
			text-align: center;
			position: relative;
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
		}
		.unlock{
			background-image: url('img/unlock.svg');
			background-size: 20px 20px;
			width: 20px;
			height: 20px;
		}

		.lock{
			background-image: url('img/lock.svg');
			background-size: 20px 20px;
			width: 20px;
			height: 20px;
		}

	</style>
</head>

<body class="noselect">
	<?php $level=1; include('logo.php');?>
	
<div class="board">
	<div class="top">
		<?php include('nav.php'); ?>
	</div>
	<div class="middle">
		<div class="content">
			

			<div class="above">
				<div id="subtitle" class="glow1">
					Feats
				</div>
	

				<div class="pod">
					<?php
						//PHP to list each skill from Query
						$index = 1;
						while ($row = mysql_fetch_assoc($feat_results)) {
							echo '<div class="pea" id="' . normal($row['feat_name']) . '" title="' . $row['feat_name'] . '" draggable="true" style="order: ' . $index . ';">
									<div class="feat_name">' . $row['feat_name'] . '</div>

								</div>';
							$index++;
						}
					?>
				</div>	

				<div id="chains">
					
				</div>		

				<div id="submenu" class="shadow">

					<?php
						for ($i=1; $i <= feat_num(); $i++) { 
							echo '<div style="display: flex; flex-direction: row; align-items: center;">
									<div class="feat_slot" id="feat_' . $i . '"></div>
									<div id="lock' . $i . '" class="unlock"></div>
								</div>';
						}
					?>

				</div>
			</div>

			<div class="below">
				<?php include('feats/default.php'); ?>
			</div>
			
		</div>
	</div>
	<div class="bottom">
		<?php include('progress.php') ?>
	</div>
</div>

	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>

</body>

<script>
	//Hides Next Button
	$('#next_button').hide();

	//Number of feats
	var feat_num = <?php echo feat_num(); ?>;

	//Displays full_text for feat when a feat is clicked
	$('.pea').click(function(){
		var full_id = 'feats/full.php ' + '#' + $(this).attr('id') + '_text';
		$('.below').load(full_id);
	});

	//Locks in feat (incomplete)
	$('div[id^=lock]').click(function(){

		var slot = $(this).parent().find('div[id^=feat]');
		var lastLock = 'lock' + String(feat_num);
		
		if (slot.html() != "" && $(this).hasClass('unlock')) {
			$(this).removeClass('unlock');
			$(this).addClass('lock');
			slot.find('.pea').css('color', 'red');
			slot.find('.pea').attr('draggable', false);
			//Checks if last feat and shows Next Button
			if ($(this).attr('id') == lastLock) {
				$('#next_button').show();
			};
		} else {
			$(this).removeClass('lock');
			$(this).addClass('unlock');
			slot.find('.pea').css('color', 'black');
			slot.find('.pea').attr('draggable', true);
		}
		
	});

	


	//-------------------------DRAG AND DROP----------------------------//

	//dragstart function
	function handleDragStart(e) {
		this.style.opacity = '0.5';
		e.dataTransfer.setData('text/html', this.id);
	}

	function handleDragOver(e) {
		if (e.preventDefault) {
			e.preventDefault();
		}
		return false;
	}

	function handleDragEnter(e){
		return false;
	}

	function handleDrag(e){
		$('#submenu').find('.unlock').siblings().eq(0).css('background-color', 'green');
	}	

	function handleDragLeave(e){
		return false;
	}

	function handleDrop(e){
		if (e.stopPropogation) {
			e.stopPropogation();
		};

		if ($(this).siblings().hasClass('lock')) {
			return false;
		} else {

			var feat_id = e.dataTransfer.getData('text/html');
			var feat = $('#' + feat_id);

			if ($(this).html() == "") {
			$(this).append(feat);

			} else {
			
			$(this).find('div:first').appendTo('.pod');
			$(this).find('div').detach();
						
				$(this).html(feat);
			
			}
		}

		return false;
	}

	function handleDropPod(e){
		if (e.stopPropogation) {
			e.stopPropogation();
		};

		var feat_id = e.dataTransfer.getData('text/html');
		var feat = $('#' + feat_id);
		$(this).prepend(feat);

	};

	function handleDragEnd(e){
		this.style.opacity = '1';
		this.style.color = 'black';

		$('#submenu').find('div[id^=feat]').css('background-color', 'transparent');
	}

	var peas = $('.pea');

	[].forEach.call(peas, function(pea){
		pea.addEventListener('dragstart', handleDragStart, false);
		pea.addEventListener('drag', handleDrag, false);
		pea.addEventListener('dragover', handleDragOver, false);
		pea.addEventListener('dragend', handleDragEnd, false);
	});

	var slots = $('.feat_slot');

	[].forEach.call(slots, function(slot){
		slot.addEventListener('dragover', handleDragOver, false);
		slot.addEventListener('dragenter', handleDragEnter, false);
		slot.addEventListener('dragleave', handleDragLeave, false);
		slot.addEventListener('drop', handleDrop, false);
	});

	var pods = $('.pod');

	[].forEach.call(pods, function(pod){
		pod.addEventListener('drop', handleDropPod, false);
	});

</script>

</html>
