<?php 
	session_start();

	if (isset($_POST['continue'])) {
		//Do a Thing
	}

	if (isset($_POST['reroll'])) {
		unset($_SESSION['char_roll']);
	}

	if ($_SESSION['char_roll'] == "4D6") {
		goto end;
	}


	for ($i=1; $i < 7; $i++) { 
		for ($j=1; $j < 5; $j++) { 
			$roll_name = 'r_' . $i . '_' . $j;
			$_SESSION[$roll_name] = rand(1,6);
		}
		$roll_array = 'array_' . $i;
		$_SESSION[$roll_array] = array($_SESSION['r_' . $i . '_1'], $_SESSION['r_' . $i . '_2'], $_SESSION['r_' . $i . '_3'], $_SESSION['r_' . $i . '_4']);
		sort($_SESSION[$roll_array]);

		$low_name = 'low_' . $i;
		$_SESSION[$low_name] = $_SESSION[$roll_array][0];


		$total_name = 'total_' . $i;
		$_SESSION[$total_name] = $_SESSION['r_' . $i . '_1'] + $_SESSION['r_' . $i . '_2'] + $_SESSION['r_' . $i . '_3'] + $_SESSION['r_' . $i . '_4'] - $_SESSION[$low_name];

		$mod_name = 'mod_' . $i;
		$_SESSION[$mod_name] = floor(($_SESSION[$total_name]-10)/2);
		$_SESSION['total_mod'] = $_SESSION['mod_1'] + $_SESSION['mod_2'] + $_SESSION['mod_3'] + $_SESSION['mod_4'] + $_SESSION['mod_5'] + $_SESSION['mod_6'];
	}
	end: //The End

?>
	<style>
		.table_scores{
			width: 500px;
			margin: auto;
			font-size: 1.5em;
		}
		.number{
			position: relative;
		}
		.X{
			color: #FF0000;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			opacity: 0.8;
		}
		.border{
			border: 3px solid #000;
		}
		tr{
			height: 40px;
		}
	</style>

		<div id="explain">
			These are words about how to use the 4 D-6 thing.
		</div>

		<div id="the_table">
			<table class="table_scores" id="fourDsix_table">
				<tr>
					<th colspan="4" width="350px">Rolls</th>
					<th colspan="1" width="50px">Total</th>
					<th colspan="1" width="100px">Mod</th>
				</tr>
				
				<?php 
					for ($i=1; $i < 7; $i++) { 
						echo '<tr class="rolls" id="row_' . $i . '">';
						$_SESSION['trip_' . $i] = FALSE;
						for ($j=1; $j < 5; $j++) { 
							echo '<td><div class="number">' . $_SESSION['r_' . $i . '_' . $j];
							if ($_SESSION['r_' . $i . '_' . $j] == $_SESSION['low_' . $i] && !$_SESSION['trip_' . $i]) {
								echo '<div class="X">X</div>';
								$_SESSION['trip_' . $i]=TRUE;
							}
							echo '</div></td>';
						}
						echo '<td class="border">' . $_SESSION['total_' . $i] . '</td>';
						echo '<td>' . $_SESSION['mod_' . $i] . '</td>'; 
						echo '</tr>';
					}
				?>

				<tr class="mod">
				<td colspan="5"> </td>
				<td><?php echo $_SESSION['total_mod']; ?></td>
				</tr>
			</table>
		</div>

		<div id="roll_buttons" style="position: absolute; bottom: 10px; width: 100%;">
			<button id="roll_1" class="default">Roll 1</button>
			<button id="roll_6" class="default">Roll 6</button>
		</div>

		<div id="dragdrop">
			<?php include('dragdrop.php'); ?>
		</div>

		<div id="end" style="position: absolute; bottom: 10px; width: 100%;">
			<form method="POST">
				<?php
					if ($_SESSION['total_mod'] < 0) {
						echo '<input type="submit" id="reroll" name="reroll" value="Re-Roll"  class="default"/>';
					}
				?>
			</form>
				<button id="allocate" class="default">Continue</button>
			
		</div>

		<script type="text/javascript">
		$('#fourDsix_table').hide();
		$('#dragdrop').hide();

		$('#end').hide();
		$(".rolls").hide();
		$(".mod").hide();
		
		var $rolls = $(".rolls");

		$("#roll_1").click(function() {
    		// Prevent event if disabled
    	if ($(this).hasClass('disable')) return;
    	$('#fourDsix_table').show();
    	$('#explain').hide();
    	$('#roll_6').hide();

    	var $hidden = $rolls.filter(':hidden:first').show();
	    	if (!$hidden.next('.rolls').length) {
	        	$(this).addClass('disable');
	        	$(this).hide();
	        	$('.mod').show();
	        	$('#end').show();
	    	};
    	});

    	$("#roll_6").click(function() {
    		$('#fourDsix_table').show();
    		$('#explain').hide();
    		$(".rolls").show();
    		$('#roll_buttons').hide();
	        $('.mod').show();
	        $('#end').show();
    	});

    	$('#allocate').click(function(){
    		$('#allocate').hide();
    		$('#reroll').hide();
    		$('#the_table').hide();
    		$('#dragdrop').show();
    	});

		</script>