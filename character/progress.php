<!--PHP-->
<?php 
	$options  = ["race", "class", "suex", "rolls", "skills", "feats", "spells", "items", "info"];
	$page_name =  basename($_SERVER['PHP_SELF']);
	$page_name = str_replace(".php", "", $page_name);
	$cont = TRUE;
?>
<!--JS-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/progress.js"></script>	

<!--CSS-->
<style type="text/css">
.progressbar{
	color: #000;
	display: flex;
	display: -webkit-flex;
	flex-direction: row;
	-webkit-flex-direction: row;
	justify-content: center;
	-webkit-justify-content: center;
	align-items: center;
	-webkit-align-items: center;
	position: absolute;
	left: 40px;
	top: 8px;
}
.progressitem{
	font-size: 2em;
	background: transparent;
	text-align: center;
	width: 84px;
	position: relative;
}

.nameInfo, .namePets{
	color: #000;
	position: absolute;
	top: 1px;
	left: 22px;
	text-decoration: none;
}
.nameRace, .nameClass, .nameRolls, .nameSuex{
	color: #000;
	position: absolute;
	top: 1px;
	left: 18px;
	text-decoration: none;
}
.nameSkills, .nameFeats, .nameItems{
	color: #000;
	position: absolute;
	top: 1px;
	left: 15px;
	text-decoration: none;
}
.nameSpells{
	color: #000;
	position: absolute;
	top: 1px;
	left: 12px;
	text-decoration: none;
}
.selected{
	color: #fff;
}
#next_button{
	background-image: url('img/progress.png');
	background-size: 100px 50px;
	background-color: transparent;
	border: none;
	width: 100px;
	height: 50px;
	font-family: inherit;
	font-size: inherit;
	color: #fff;
	cursor: pointer;
	padding:0px;
}
</style>

<!--HTML-->
<div class="progressbar">
<?php

	$here = array_search($page_name, $options);

	for ($i=0; $i < count($options); $i++) { 
		echo '<div class="progressitem">
				<img src="';
					echo ($i < $here ? 'img/green.png' : ($i == $here ? 'img/selected.png' : 'img/red.png') ); 

					/*
					{
						echo "img/selected.png";
						$cont = FALSE;
					} elseif ($cont) {
						echo "img/green.png";
					} else {
						echo "img/red.png";
					}
					*/
		echo '" />
				<a href="' . $options[$i] . '.php" class="name' . ucfirst($options[$i]) . ' ';
		echo ($i == $here ? 'selected' : '' );
		echo '">' . ucfirst($options[$i]) .'</a>
			</div>';
	}
?>
	<!--Next Button-->
	<div class="progressitem" id="NEXT">
		<form method="POST" style="margin: 0 0 65px 0;">
			<input id="next_button" type="submit" name="save" value="Next" class="nameClass"/>
			<!--Level-->
			<input id="char_level" name="char_level" type="hidden" />
			<!--Race-->
			<input id="char_race" name="char_race" type="hidden" />
			<!--Class-->
			<input id="char_class" name="char_class" type="hidden" />
			<!--Domain-->
			<input id="char_domain" name="char_domain" type="hidden" />
			<!--Deity-->
			<input id="char_deity" name="char_deity" type="hidden" />
			<!--School-->
			<input id="char_school" name="char_school" type="hidden" />
			<!--Alignment-->
			<input id="char_alignment" name="char_alignment" type="hidden" />
			<!--Roll Type-->
			<input id="char_roll_type" name="char_roll_type" type="hidden" />
			<!--Strength-->
			<input id="char_str" name="char_str" type="hidden" />
			<input id="char_wis" name="char_wis" type="hidden" />
			<input id="char_int" name="char_int" type="hidden" />
			<input id="char_cha" name="char_cha" type="hidden" />
			<input id="char_dex" name="char_dex" type="hidden" />
			<input id="char_con" name="char_con" type="hidden" />
			<!--Skills-->
			<input id="char_skill" name="char_skill" type="hidden" />
			<input id="char_xskill" name="char_xskill" type="hidden" />

			<!--Pet-->
			<input id="char_pet" name="char_pet" type="hidden" />
		</form>
	</div>
	
</div>

<!--JS-->

<script>

$('a[class^=name]').click(function (e) {
    if (e.shiftKey) {
    	var href = $(this).attr('href');
    	e.preventDefault();
    	window.open(href, '_self');
    } else {
    	e.preventDefault();
    }
});

	$('a[class^=name]').css('cursor', 'default');

</script>
