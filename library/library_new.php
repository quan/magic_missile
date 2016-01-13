<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Attribute Library</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.25" />
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
	<script>
			$(document).ready(function () {
			var $targets = $('.target');
			$('#buttons .Smallbutton').click(function () {
				var $target = $($(this).data('target')).toggle();
				$targets.not($target).hide()
			});
		});
	</script>
	<style>
		.pod{
			width: 100%;
			background: ;
			text-align: center;
			padding: 10px 0 10px 0;			
		}
		.pea{
			display: inline;
			text-align: center;
			margin: 0 20px 0 20px;
			padding: 0 5px 0 5px;
			border: 2px solid;
		}
	</style>
</head>

<body>
	<?php if($_SESSION['login_user'] <> ''){include('header.php');} ?>
	<div class="header">
		Attribute Library
	</div>
	<!--tier 1 pod-->
	<div id="buttons" class="pod">  
		<div class="pea">
			<a class="Smallbutton" id="showRace" data-target=".race">Race</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showClass" data-target=".class">Class</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showAlignment" data-target=".alignment">Alignment</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showFeat" data-target=".feat">Feats</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showSkill" data-target=".skill">Skills</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showSpell" data-target=".spell">Spells</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showItem" data-target=".item">Items</a>
		</div>
		<div class="pea">
			<a class="Smallbutton" id="showPet" data-target=".pet">Pets</a>
		</div>
	</div>  
		<!--tier 2 pods-->
		<div class="race target pod" style="display: none;">
			<div class="pea">
				Human
			</div>
			<div class="pea">
				Halfling
			</div>
			<div class="pea">
				Half-Elf
			</div>
			<div class="pea">
				Half-Orc
			</div>
		</div>
		<div class="class target pod" style="display: none;">
			Class div.
		</div>
		<div class="alignment target pod" style="display: none;">
			Alignment div.
		</div>
		<div class="feat target pod" style="display: none;">
			Feats div.
		</div>
		<div class="skill target pod" style="display: none;">
			Skills div.
		</div>
		<div class="spell target pod" style="display: none;">
			Spells div.
		</div>
		<div class="item target pod" style="display: none;">
			Items div.
		</div>
		<div class="pet target pod" style="display: none;">
			Pets div.
		</div>
	<!--tier 3 pods-->
	
</body>

</html>
