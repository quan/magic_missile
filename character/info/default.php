<?php
	session_start();

	$query_alignment = "SELECT * FROM `class_alignment` WHERE `class`='$_SESSION[char_class]'";
	$results = mysql_query($query_alignment);
?>

<div style="width: 100%; height: 100%;">
	<div class="title">Please Enter Your Info.</div>

	<p>
		These are words that help you choose your infos or whatever.
	</p>



	<form class="info" method="POST">
		<label>Character Name:</label><input type="text" name="char_name" placeholder="" value="<?php echo $_POST['char_name']; ?>" />
		<label>Gender</label><input type="text" name="char_gender" value="<?php echo $_POST['char_gender']; ?>">
		<label>Height</label>
		<label>Weight</label>
		<label>Looks</label>
		<label>Religion</label>
		
		<label>Alignment</label>

			<select>
				<option></option>
				<?php
					while($row = mysql_fetch_assoc($results)){
						echo "<option>";
						echo $row['alignment'];
						echo "</option>";
					} 

					echo var_dump($results);
				?>
			</select>

		<input type="submit" name="save_info" value="Save Info" class="save">
	</form>
</div>

<style>
	input[type=submit].save{
		background-image: url('../img/button.png');
		background-size: 150px 50px;
		width: 150px;
		height: 50px;
		border: none;
		font-family: 'Kaushan Script', cursive;
		font-size: 2em;
	}
	input[type=text]{
		width: 100px;
	}
	.info{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
</style>