<?php
	$query = "SELECT `pet_name` FROM `pet` ORDER By `pet_name` ASC";
	$results = mysql_query($query);
?>

<div style="width: 100%; height: 100%;">
	<div class="title">Please Choose Your Pet.</div>

	<p>
		These are words that help you pick your pet or whatever.
	</p>

	<select name="pet" id="pet_selector">
		<option></option>
		<?php
			while($row = mysql_fetch_assoc($results)){
				echo "<option>";
				echo $row['pet_name'];
				echo "</option>";
			} ?>
	</select>
</div>

<script>



	$('#pet_selector').change(function(){
		if ($(this).val() != "") {
			$('#next_button').attr('type', 'submit');
			$('#next_button').prop('disabled', false);
			$('#char_pet').val($(this).val());
		} else {
			$('#next_button').attr('type', 'hidden');
			$('#next_button').prop('disabled', true);
		}
		
	});
</script>