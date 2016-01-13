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

	<div id="fire_case" class="hover">
		<a href="<?php echo $string; ?>index.php"><video id="fire" src="<?php echo $string; ?>img/fire_logo.mp4" type="video/mp4" width="200px" loop autoplay></video></a>
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
	background-color: #000;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
	position: relative;
	z-index: 0;


  background: red; /* For browsers that do not support gradients */
  /* For Safari 5.1 to 6.0 */
  background: -webkit-linear-gradient(left,white,black,white);
  /* For Opera 11.1 to 12.0 */
  background: -o-linear-gradient(left,white,black,white);
  /* For Fx 3.6 to 15 */
  background: -moz-linear-gradient(left,white,black,white);
  /* Standard syntax */
  background: linear-gradient(to left,#000,#660066,pink, black,black,black, black,pink,#660066,#000); 

}

#Magic, #Missile{
	color: #fff;
	font-size: 5em;
	font-family: 'Aladin', cursive;
	margin: 0 20px 0 20px;
	opacity: 0.7;
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
#grad {

</style>