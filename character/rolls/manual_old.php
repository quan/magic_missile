<?php 
	session_start();

?>

	<style>
		form.scores{
			display: flex;
			width:200px;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: left;
			align-items: center;
		}

		input[type=number].entry {
			font-family: 'Kaushan Script', cursive;
			font-size: 20px;
			text-align: center;
			background: transparent;
			width: 50px;
			height: 40px;
			border: none;
		}
		input[type=text].mod{
			font-size: 20px;
			text-align: center;
			width: 40px;
			height: 40px;
			border: none;
		}
		table{
			margin: auto;
			font-size: 2em;
			width: 500px;
		}
		.save_scores{
			font-family: 'Kaushan Script', cursive;
			font-size: 2em;
			background-image: url('../img/button.png');
			background-size: 180px 50px;
			width: 180px;
			height: 50px;
			border: none;
		}
		.button_wrapper{
			margin: 50px 0 0 0;
		}
		th, td{
			text-align: center;
		}
	</style>

	<?php $options = array("strength", "wisdom", "intelligence", "charisma", "dexterity", "constitution"); ?>

	<table>
		
			<th colspan="2" width="250px">
			</th>
			<th style="font-size: 0.5em; font-weight: normal;">
				Modifier
			</th>

			<?php
				for ($i=0; $i < count($options) ; $i++) { 
					echo '<tr>
							<td  style="text-align: right;">' . ucfirst($options[$i]) . '</td>
							<td>
								<input type="number" min="3" max="18"  value="10" name="' . $options[$i] . '" class="entry" id="' . $options[$i] . '" />
							</td>
							<td>
								<input type="text" value="0" class="mod" id="mod_' . substr($options[$i], 0, 3) . '" />
							</td>
						</tr>';
				};
			?>
		
	</table>

	<div class="button_wrapper">
			<input type="submit" id="manual_save" value="Save Scores" class="save_scores" />
	</div>

	<script>
		document.getElementById('strength').onchange = function(event){
			document.getElementById('mod_str').value = Math.floor(( document.getElementById('strength').value -10)/2);
		}		
		document.getElementById('wisdom').onchange = function(event){
			document.getElementById('mod_wis').value = Math.floor(( document.getElementById('wisdom').value -10)/2);
		}		
		document.getElementById('intelligence').onchange = function(event){
			document.getElementById('mod_int').value = Math.floor(( document.getElementById('intelligence').value -10)/2);
		}		
		document.getElementById('charisma').onchange = function(event){
			document.getElementById('mod_cha').value = Math.floor(( document.getElementById('charisma').value -10)/2);
		}		
		document.getElementById('dexterity').onchange = function(event){
			document.getElementById('mod_dex').value = Math.floor(( document.getElementById('dexterity').value -10)/2);
		}		
		document.getElementById('constitution').onchange = function(event){
			document.getElementById('mod_con').value = Math.floor(( document.getElementById('constitution').value -10)/2);
		}
	</script>

	<script type="text/javascript">
		$('#manual_save').click(function(){
			$('#char_str').val($('#strength').val());
			$('#char_wis').val($('#wisdom').val());
			$('#char_int').val($('#intelligence').val());
			$('#char_cha').val($('#charisma').val());
			$('#char_dex').val($('#dexterity').val());
			$('#char_con').val($('#constitution').val());
			//Next Button
			$('#next_button').css("color", "#FFF");
			$('#next_button').css("cursor", "pointer");
			$('#next_button').prop('disabled', false);
		});

	</script>