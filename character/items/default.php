<?php
	$query = "SELECT * FROM `items`";
	$results = mysql_query($query);
?>

<div style="width: 100%; height: 100%;">
	<div class="title">Please Choose Your Items.</div>

	<p>
		These are words that help you pick your items or whatever.
	</p>

	<select>
		<?php
			while($row = mysql_fetch_assoc($results)){
				echo "<option>";
				echo $row['name'];
				echo "</option>";
			} ?>
	</select>
</div>