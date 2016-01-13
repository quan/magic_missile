<?php
	$query_school = "SELECT * FROM `wizard_school` ORDER BY `school_name` ASC";
	$school_results = mysql_query($query_school);
?>

<div class="title">
	Wizard
</div>
<p class="welcome">
	These are words about a Wizard.
</p>
<br></br>
Please select a school.
<select name="school" id="school">
	<option></option>
	<?php
		while ($row = mysql_fetch_assoc($school_results)) {
			echo '<option>' . $row['school_name'] . '</option>';
		}
	?>
</select>
<br></br>
<button class="default" id="commit_wizard">Select</button>

<script>
	$('#commit_wizard').click(function(){
		//Commit Choice
		$('#char_class').val('Wizard');
		$('#char_school').val($('#school').val());
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>