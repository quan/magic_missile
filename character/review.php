<?php
	session_start();
	//Race
	echo 'Race: ' . $_SESSION['char_race'] . '<br>';
	//Class
	echo 'Class: ' . $_SESSION['char_class'] . '<br>';
	//Stats
	echo 'Stats: ' . '<ul>';
	echo '<li>Strength: ' . $_SESSION['strength'] . '</li>';
	echo '<li>Wisdom: ' . $_SESSION['wisdom'] . '</li>';
	echo '<li>Intelligence: ' . $_SESSION['intelligence'] . '</li>';
	echo '<li>Charisma: ' . $_SESSION['charisma'] . '</li>';
	echo '<li>Dexterity: ' . $_SESSION['dexterity'] . '</li>';
	echo '<li>Constitution: ' . $_SESSION['constitution'] . '</li>';
	echo '</ul>';
	//Skills
	echo 'Skills: ' . '<ul>';
	echo '</ul>';	
	//Feats
	echo 'Feats: ' . '<ul>';
	echo '</ul>';	
	//Spells
	echo 'Spells: ' . '<ul>';
	echo '</ul>';	
	//Pets
	echo 'Pets: ' . '<ul>';
	echo '</ul>';
	//Items
	echo 'Items: ' . '<ul>';
	echo '</ul>';
	//Info
	echo 'Info: ' . '<ul>';
	echo '</ul>';
?>