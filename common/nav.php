<?php
	$times=0;
	$string='';
	while($times<$level){
		$string = $string . '../';
		$times++;;
	}
?>
<!--HTML-->
<div class="nav">
	<a class="navtext glow" href="<?php echo $string; ?>character/"><div class="navbutton back">Character Creator</div></a>
	<a class="navtext glow" href="<?php echo $string; ?>library/"><div class="navbutton back">Browse Library</div></a>
	<a class="navtext glow" href="<?php echo $string; ?>home.php"><div class="navbutton back">My Profile</div></a>
</div>
<!--CSS-->
<style type="text/css">
.nav{

	font-size: 22pt;
	color: #fff;
	margin: auto;
	display: -webkit-box;      /* OLD - iOS 6-, Safari 3.1-6 */
	display: -moz-box;         /* OLD - Firefox 19- (buggy but mostly works) */
	display: -ms-flexbox;      /* TWEENER - IE 10 */
	display: -webkit-flex;     /* NEW - Chrome */
	display: flex;             /* NEW, Spec - Opera 12.1, Firefox 20+ */
	flex-direction: row;
	-webkit-flex-direction: row;
	justify-content: space-around;
	-webkit-justify-content: space-around;
	align-items: center;
	-webkit-align-items: center;
}

.navbutton{
	padding: 18px 0 0 0;
	width: 250px;
	height: 68px;
}

.navtext{
	color: #000;
	font-size: 15pt;
	text-decoration: none;

}
.back{
	background-image: url("<?php echo $string; ?>img/navbutton.png");
	background-size: 250px 68px;
	background-repeat: no-repeat;
	}
.inshadow {
	-moz-box-shadow:    inset 0 0 10px #000000;
	-webkit-box-shadow: inset 0 0 10px #000000;
	box-shadow:         inset 0 0 10px #000000;
}

.glow{
	text-shadow: 0 0 10px #fff;
}

</style>
