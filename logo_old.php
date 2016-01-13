<?php
	$times=0;
	$string='';
	while($times<$level){
		$string = $string . '../';
		$times++;;
	}
?>
<div class="logo">
	<div class="launchR"><img src="<?php echo $string; ?>img/missile.png" width="125px" height="30px"/></div>
	<div class="launchL"><img src="<?php echo $string; ?>img/missile.png" width="125px" height="30px"/></div>
	<div class="hover"><a href="<?php echo $string; ?>index.php"><img src="<?php echo $string; ?>img/logo.png" height="100px" width="75px" /></a></div>
</div>

<style>
.logo{
	width: 920px;
	height: 100px;
	margin: auto;
	position: relative;
	z-index: 2;
}	
	
@keyframes missileL {
0% {transform: rotate(180deg) scale(0.2) translate(20px, -150px) ;}
60% {transform: rotate(180deg) scale(0.2) translate(20px, -150px) ;}
65%{transform: rotate(180deg) scale(1)  translate(400px, 0px)  ;}
70% {transform: rotate(180deg) scale(1) translate(1200px, 0px) ;}
100% {transform: rotate(180deg) scale(1) translate(1200px, 0px) ;}

}
@keyframes missileR {
0% {transform: scale(0.2) translate(-20px, 250px) ;}
5% {transform: scale(0.2) translate(-20px, 250px) ;}
10%{transform: scale(1)  translate(400px, 50px)  ;}
12%{transform: scale(1)  translate(1200px, 50px)  ;}
100% {transform: scale(1) translate(1200px, 50px) ;}

}

.launchL{
	width: 125px;
	height: 30px;
	margin: auto;
	animation-name: missileL;
	animation-duration: 10s;
	animation-iteration-count: infinite;
	animation-timing-function: linear;
	animation-delay: 0s;
}
.launchR{
	width: 125px;
	height: 30px;
	margin: auto;
	animation-name: missileR;
	animation-duration: 10s;
	animation-iteration-count: infinite;
	animation-timing-function: linear;
	animation-delay: 0s;
}

@keyframes rot {
from {transform: rotate(0deg) translate(-15px) rotate(0deg);}
to {transform: rotate(360deg) translate(-15px) rotate(-360deg);}
}

.hover {
	width: 75px;
	height: 100px;
	margin: -60px auto;
	animation: rot 5s infinite linear;
	transform-style: preserve-3d;
}

	
</style>
