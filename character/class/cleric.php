<?php
	if (isset($_POST['update_deity'])) {
		$_SESSION['char_class'] = "Cleric";
		$_SESSION['char_deity'] = $_POST['deity'];
	}
?>

<?php
	$query_deity = "SELECT DISTINCT `deity_name` FROM `deity_domain` WHERE `deity_name` != '$_SESSION[char_deity]' ORDER BY `deity_name` ASC";
	$deity_results = mysql_query($query_deity);
	$query_domain = "SELECT * FROM `deity_domain` WHERE `deity_name` = '$_SESSION[char_deity]'";
	$domain_results = mysql_query($query_domain);
	$query_alignment = "SELECT * FROM `deity_alignment` WHERE `deity_name` = '$_SESSION[char_deity]'";
	$alignment_results = mysql_query($query_alignment);
?>

<div class="title">
	Cleric
</div>
<p class="welcome">
	These are words about a Cleric.
</p>
<br></br>
<!--Deity-->
Please select a deity.
<form method="POST">
	<select name="deity" id="deity">
		<?php 
			echo (isset($_SESSION['char_deity']) ? '<option>' . $_SESSION['char_deity'] . '</option>' : '<option></option>');
		?>
		
		<?php
			while ($row = mysql_fetch_assoc($deity_results)) {
				echo '<option>' . $row['deity_name'] . '</option>';
			}
		?>
	</select>
	<input type="submit" name="update_deity" value="Update">
</form>

<!--Domain-->
Please select a domain.
<form method="POST">
	<select name="domain" id="domain">
		<?php 
			echo (isset($_SESSION['char_domain']) ? '<option>' . $_SESSION['char_domain'] . '</option>' : '<option></option>');
		?>
		
		<?php
			while ($row = mysql_fetch_assoc($domain_results)) {
				echo '<option>' . $row['domain_name'] . '</option>';
			}
		?>
	</select>
</form>

<!--Alignment-->
Please select an alignment.
<form method="POST">
	<select name="alignment" id="alignment">
		<?php 
			echo (isset($_SESSION['char_alignment']) ? '<option>' . $_SESSION['char_alignment'] . '</option>' : '<option></option>');
		?>
		
		<?php
			while ($row = mysql_fetch_assoc($alignment_results)) {
				echo '<option>' . $row['alignment_name'] . '</option>';
			}
		?>
	</select>
</form>

<br></br>
<button class="default" id="commit_cleric">Select</button>

<script>
	$('#commit_cleric').click(function(){
		//Commit Choices
		$('#char_class').val('Cleric');
		$('#char_deity').val($('#deity').val());
		$('#char_domain').val($('#domain').val());
		$('#char_alignment').val($('#alignment').val());
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>