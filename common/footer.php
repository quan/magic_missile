<?php
	$times=0;
	$string='';
	while($times<$level){
		$string = $string . '../';
		$times++;;
	}
?>

<!--HTML-->
<div id="footer" class="footerGlow">
	&copy; 2016 The Magic Missile Team
	| <a href="<?php echo $string; ?>legal.php">LEGAL</a>
	| <a href="<?php echo $string; ?>contact.php">CONTACT</a>
	| <a href="<?php echo $string; ?>results.php" target="_blank">PDF</a>
</div>


<!--CSS-->
<style type="text/css">
#footer {
	font-family: 'Lato', sans-serif;
	font-size:1em;
	font-weight: bold;
	color: #fff;
	}
.footerGlow{
	text-shadow:
		-1px -1px 0 #000,
		1px -1px 0 #000,
		-1px 1px 0 #000,
		1px 1px 0 #000;
}
a{
	color: gray;
	text-decoration: none;
}

</style>
