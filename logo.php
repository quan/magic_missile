<?php
	$times=0;
	$string='';
	while($times<$level){
		$string = $string . '../';
		$times++;;
	}
?>
<div class="logo_bound">

	<span id="Magic" class="glow2 magic_glow">MAGIC</span>


	<div class="round shadow1 hover">
		<div class="wrap">
			<video src="img/fire_logo.mp4" type="video/mp4" width="200px" height="200px" style="margin: 0 8px 55px 0;" loop autoplay></video>
		</div>
	</div>

	<span id="Missile" class="glow2 magic_glow">MISSILE</span>

</div>

<style>
@import url(https://fonts.googleapis.com/css?family=Aladin);
#fire_case{
	height: 100px;
	width: 70px;
	overflow: hidden;
	position: relative;
	z-index: 2;
}

#fire{
	margin: -115px 0 0 -70px;
}

.logo_bound{
	width: 900px;
	height: 100px;
	margin: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
	position: relative;
	z-index: 0;

}

#Magic, #Missile{
	color: #fff;
	font-size: 5em;
	font-family: 'Aladin', cursive;
	opacity:1;
	text-shadow: 2px 2px #666;
}

@keyframes magic_glow{
	0% {color: #ff00ff;}
	50% {color: #990099;}
	100% {color: #ff00ff;}
}

.magic_glow{
	animation-name: magic_glow;
	animation-duration: 3s;
	animation-iteration-count: infinite;
}

@keyframes hover{
	0% {transform: translate(0, 0);}
	50% {transform: translate(0, -15px);}
	100% {transform: translate(0, 0);}
}

.hover{
	animation-name: hover;
	animation-duration: 6s;
	animation-iteration-count: infinite;
	transition-timing-function: linear;
}
.round{
	height: 130px;
	width: 130px;
	background-color: #000;
	border-radius: 65px;
	margin: 50px 50px 100px 50px;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}
.wrap{
	height: 120px;
	width: 55px;
	overflow: hidden;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
	position: relative;
}
.shadow1{
	box-shadow: 0px 0px 50px 50px rgba(0,0,0,1);
}
</style>