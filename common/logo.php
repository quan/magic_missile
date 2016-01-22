<?php
	$times=0;
	$string='';
	while($times<$level){
		$string = $string . '../';
		$times++;;
	}
?>
<div class="logo_bound">

<a href="<?php echo $string; ?>index.php"><img src="<?php echo $string; ?>img/placeholderlogo.png" /></a>

</div>

<style>
@import url(https://fonts.googleapis.com/css?family=Aladin);
.logo_bound{
	width: 950px;
	height: 100px;
	margin: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
	position: relative;
	z-index: 0;
}
</style>	