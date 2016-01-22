<style>
	.mod{
		width: 100px;
		height: 50px;
	}
	.stat_table{
		margin: auto;
		font-size: 1.5em;
		text-align: center;
	}

	button.plus{
		background-image: url('img/plus.png');
		background-size: 25px 25px;
		background-color: transparent;
		height: 25px;
		width: 25px;
	}	
	button.minus{
		background-image: url('img/minus.png');
		background-size: 25px 25px;
		background-color: transparent;
		height: 25px;
		width: 25px;
	}
	
	.viewer{
		height: 50px;
		width: 50px;
	}
	.remain{
		font-size: 1.5em;
		width: 120px;
		height: 100px;
		position: absolute;
		left: 40px;
		top: 120px;
	}
	.button_holder{
		 height: 50px; 
		 width: 100%;
		 margin: 20px 0 0 0;
	}
	#commit_manual{
		 justify-content: center;
		 align-items: center;
		 text-align:center;
		 padding:0px;
	}
</style>

<?php $options = array("strength", "dexterity", "constitution", "intelligence", "wisdom", "charisma"); ?>


<table class="stat_table" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">
		</td>
		<td style= "font-size: .75em";>
		Modifier
		</td>
	</tr>
	<?php 
		for ($i=0; $i < count($options); $i++) { 
			echo 	'<tr>
						<td width="200px">' . ucfirst($options[$i]) . '</td>
						<td width="80px">
							<button id="down_' . substr($options[$i], 0, 3) . '_m" title="' . ucfirst($options[$i]) . ' Down" class="minus"></button>
						</td>
						<td width="50px">
							<div id="' . $options[$i] . '_m" name="' . $options[$i] . '" class="viewer">' . 
								(isset($_SESSION['char_' . substr($options[$i], 0, 3)]) && $_SESSION[char_roll_type] == 'Manual' ? $_SESSION['char_' . substr($options[$i], 0, 3)] : 10) .
							'</div>
						</td>
						<td width="80px">
							<button id="up_' . substr($options[$i], 0, 3) . '_m" title="' . ucfirst($options[$i]) . ' Up" class="plus"></button>
						</td>
						<td width="100px";">
							<div class="mod" id="mod_' . substr($options[$i], 0, 3) . '_m">
							0
							</div>
						</td>
					</tr>';
		}
	?>
</table>
<div class="button_holder">
	<button id="commit_manual" class="default">Commit</button>
</div>


<script>
	
//Calculate Modifier on Page Load
<?php
	for ($i=0; $i < count($options); $i++) {
		echo '$("#mod_' . substr($options[$i], 0, 3) . '_m").html(modifier(parseInt($("#' . $options[$i] . '_m").html())));';
		}
?>

//Down Buttons
<?php
	for ($i=0; $i < count($options); $i++) { 
		echo '$("#down_' . substr($options[$i], 0, 3) . '_m").click(function() {
			if($("#' . $options[$i] . '_m").html() > 0) {
				$("#' . $options[$i] . '_m").html(parseInt($("#' . $options[$i] . '_m").html())-1);
				$("#mod_' . substr($options[$i], 0, 3) . '_m").html(modifier(parseInt($("#' . $options[$i] . '_m").html())));
			};
		});';
	}
?>
//Up Buttons
<?php
	for ($i=0; $i < count($options); $i++) { 
		echo '$("#up_' . substr($options[$i], 0, 3) . '_m").click(function() {
			if($("#' . $options[$i] . '_m").html() < 99) {
				$("#' . $options[$i] . '_m").html(parseInt($("#' . $options[$i] . '_m").html())+1); 
				$("#mod_' . substr($options[$i], 0, 3) . '_m").html(modifier(parseInt($("#' . $options[$i] . '_m").html())));
			};
		});';
	}
?>
function modifier(stat) {
	return Math.floor((stat-10)/2);
	};

$('#commit_manual').click(function(e){
		$('#char_str').val($('#strength_m').html());
		$('#char_wis').val($('#wisdom_m').html());
		$('#char_int').val($('#intelligence_m').html());
		$('#char_cha').val($('#charisma_m').html());
		$('#char_dex').val($('#dexterity_m').html());
		$('#char_con').val($('#constitution_m').html());
		
		//Next Button
		$('#next_button').attr('type', 'submit');
		$('#next_button').prop('disabled', false);
	
});
</script>
