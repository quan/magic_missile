<?php
	session_start();

	$do_spells = TRUE;

	if($_SESSION['char_class'] == 'Bard'){
		$spell_table = 'spell_bard';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Cleric'){
		$spell_table = 'spell_cleric';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Druid'){
		$spell_table = 'spell_druid';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Paladin'){
		$spell_table = 'spell_paladin';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Ranger'){
		$spell_table = 'spell_ranger';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Sorcerer'){
		$spell_table = 'spell_wizard_sorcerer';
		goto first_kind;
	}

	if($_SESSION['char_class'] == 'Wizard'){
		$spell_table = 'spell_wizard_sorcerer';
		goto second_kind;
	}

	$do_spells = FALSE;
	goto resume;


	first_kind:

		$query1 = "SELECT `spell_name` FROM `$spell_table` ORDER BY `spell_name` ASC";
		$results = mysql_query($query1);
		goto resume;

	second_kind: 

		$school = $_SESSION['char_school'];
		$query2 =  "SELECT `spell_name` FROM `$spell_table` WHERE `school_name` = '$school' ORDER BY `spell_name` ASC";
		$results = mysql_query($query2);
		goto resume;

	resume: 
	
	?>

<div style="width: 100%; height: 100%;">
	<div class="title">Please Choose Your Spells.</div>

	<p>
		These are words that help you pick your spells or whatever.
	</p>

		<?php
			if ($do_spells) {
				echo '<select>';
				while($row = mysql_fetch_assoc($results)){
					echo '<option>' . $row['spell_name'] . '</option>';
				}
				echo '</select>';
			} elseif ($_SESSION['char_class'] == ""){
				echo '<br> </br> Please choose a class!';
			} else {
				echo "<br></br>You don't get to use spells! Hahaha!";
			}
		?>
	
</div>

<?php mysql_close($con); ?>