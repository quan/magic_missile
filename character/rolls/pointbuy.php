<style>
	#mode_select{
		height: 425px;
		width: 900px;
		margin: auto;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
	}
	.mod{
		width: 100px;
		height: 50px;
	}
	.stat_table{
		margin: auto;
		text-align: center;
		font-size: 2em;
	}

	button.plus{
		background-image: url('img/plus.png');
		background-size: 25px 25px;
		background-color: transparent;
		height: 25px;
		width: 25px;
		border: none;
	}	
	button.minus{
		background-image: url('img/minus.png');
		background-size: 25px 25px;
		background-color: transparent;
		height: 25px;
		width: 25px;
		border: none;
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
	.description{
		font-size: 2em;
		width: 100%;
		height: 50px;
	}
	.easy, .hard{
		width: 200px;
		height: 100px;
	}
</style>

<?php $options = array("strength", "dexterity", "constitution", "intelligence", "wisdom", "charisma"); ?>

<div id="mode_select">
	<div class="description">Please Select Difficulty</div>
	<div class="easy"><button id="easy_mode" class="default">Easy</button></div>
	<div class="hard"><button id="hard_mode" class="default">Hard</button></div>
</div>

<div id="main">

<div class="remain">
	Points Remaining: <b><span id="remain" name="remain"><?php echo ($_SESSION[char_roll_type]=='Point Buy' ? 0 : 27); ?></span></b>
</div>


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
							<button id="down_' . substr($options[$i], 0, 3) . '" title="' . ucfirst($options[$i]) . ' Down" class="minus"></button>
						</td>
						<td width="50px">
							<div id="' . $options[$i] . '" name="' . $options[$i] . '" class="viewer">' . 
								(isset($_SESSION['char_' . substr($options[$i], 0, 3)]) && $_SESSION[char_roll_type] == 'Point Buy' ? $_SESSION['char_' . substr($options[$i], 0, 3)] : 8) .
							'</div>
						</td>
						<td width="80px">
							<button id="up_' . substr($options[$i], 0, 3) . '" title="' . ucfirst($options[$i]) . ' Up" class="plus"></button>
						</td>
						<td width="100px";">
							<div class="mod" id="mod_' . substr($options[$i], 0, 3) . '">
							-1
							</div>
						</td>
					</tr>';
		}
	?>
</table>
<div class="button_holder">
	<button id="commit_pointbuy" class="default">Commit</button>
</div>

</div>


<script>

$('#main').hide();

$('#easy_mode').click(function(){
	$('#mode_select').hide();
	$('#main').show();
	$('#remain').html(32);
});

$('#hard_mode').click(function(){
	$('#mode_select').hide();
	$('#main').show();
	$('#remain').html(27);
});
	
//Calculate Modifier on Page Load
<?php
	for ($i=0; $i < count($options); $i++) {
		echo '$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));';
		}
?>

//Down Buttons
<?php
	for ($i=0; $i < count($options); $i++) { 
		echo '$("#down_' . substr($options[$i], 0, 3) . '").click(function() {
			if($("#' . $options[$i] . '").html() > 3 && $("#' . $options[$i] . '").html() < 15) {
				$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())-1);
				$("#remain").html(parseInt($("#remain").html())+1);
				$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
			} else {
				if ($("#' . $options[$i] . '").html() > 14 && $("#' . $options[$i] . '").html() < 17) {
					$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())-1);
					$("#remain").html(parseInt($("#remain").html())+2);
					$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
				} else {
					if ($("#' . $options[$i] . '").html() > 16 && $("#' . $options[$i] . '").html() < 19) {
						$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())-1);
						$("#remain").html(parseInt($("#remain").html())+3);
						$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
					};
				};
			};
		});';
	}
?>
//Up Buttons
<?php
	for ($i=0; $i < count($options); $i++) { 
		echo '$("#up_' . substr($options[$i], 0, 3) . '").click(function() {
			if($("#' . $options[$i] . '").html() < 14 && $("#remain").html() > 0) {
				$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())+1); 
				$("#remain").html(parseInt($("#remain").html())-1);
				$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
			} else {
				if ($("#' . $options[$i] . '").html() < 16 && $("#' . $options[$i] . '").html() > 13 && $("#remain").html() > 1) {
					$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())+1);
					$("#remain").html(parseInt($("#remain").html())-2);
					$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
				} else {
					if ($("#' . $options[$i] . '").html() < 18 && $("#' . $options[$i] . '").html() > 15 && $("#remain").html() > 2) {
						$("#' . $options[$i] . '").html(parseInt($("#' . $options[$i] . '").html())+1);
						$("#remain").html(parseInt($("#remain").html())-3);
						$("#mod_' . substr($options[$i], 0, 3) . '").html(modifier(parseInt($("#' . $options[$i] . '").html())));
					};
				};
			};

		});';
	}
?>
function modifier(stat) {
	return Math.floor((stat-10)/2);
	};

$('#commit_pointbuy').click(function(e){
	if ($('#remain').html() == 0) {
		$('#char_str').val($('#strength').html());
		$('#char_wis').val($('#wisdom').html());
		$('#char_int').val($('#intelligence').html());
		$('#char_cha').val($('#charisma').html());
		$('#char_dex').val($('#dexterity').html());
		$('#char_con').val($('#constitution').html());
		//Next Button

		$('#next_button').attr('type', 'submit');
		$('#next_button').prop('disabled', false);
		}
	else{
		alert("Fix yo shit!")
	}
	
});
</script>
