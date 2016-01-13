<?php

	if(isset($_POST['lib_race'])){
		$_SESSION[''] = '';
		header("location: race.php");
		}
	if(isset($_POST['lib_class'])){
		$_SESSION[''] = '';
		header("location: class.php");
		}
	if(isset($_POST['lib_alignment'])){
		$_SESSION[''] = '';
		header("location: alignment.php");
		}
	if(isset($_POST['lib_skill'])){
		$_SESSION[''] = '';
		header("location: skill.php");
		}
	if(isset($_POST['lib_feat'])){
		$_SESSION[''] = '';
		header("location: feat.php");
		}
	if(isset($_POST['lib_spell'])){
		$_SESSION[''] = '';
		header("location: spell.php");
		}
	if(isset($_POST['lib_item'])){
		$_SESSION[''] = '';
		header("location: item.php");
		}
	if(isset($_POST['lib_pet'])){
		$_SESSION[''] = '';
		header("location: pet.php");
		}
		
?>	
<style>
		.pod{
			width: 100%;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}
		.pea{
			height: 30px;
			margin: 5px 0 5px 0;
		}
		.lib_link{
			display: inline;
		}
		.lib_button{
			background-image: url('img/button.png');
			background-size: 100px 30px;
			width: 100px;
			height: 30px;
			border: none;
			font-family: 'Kaushan Script', cursive;
			font-size: 1em;
			margin: 0 10px 0 10px;
		}
	</style>

<div class="pod">
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_race" value="Race" class="lib_button shadow" />
			</form>
		</div>
		
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_class" value="Class" class="lib_button shadow" />
			</form>
		</div>
		
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_alignment" value="Alignment" class="lib_button shadow" />
			</form>
		</div>
		
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_skill" value="Skill" class="lib_button shadow" />
			</form>
		</div>
			
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_feat" value="Feat" class="lib_button shadow" />
			</form>
		</div>
			
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_spell" value="Spell" class="lib_button shadow" />
			</form>
		</div>
		
		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_item" value="Item" class="lib_button shadow" />
			</form>
		</div>

		<div class="pea">
			<form class= "lib_link" method="post">
				<input type="submit" name="lib_pet" value="Pet" class="lib_button shadow" />
			</form>
		</div>
	</div>
