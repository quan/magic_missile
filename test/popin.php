<?php 
	session_start();	
?>


	<style>
	.parentDisable {
		z-index:999;
		width:100%;
		height:100%;
		display:none;
		position:absolute;
		top:0;
		left:0;
		/* Fallback for web browsers that doesn't support RGBa */
		background: rgb(0, 0, 0);
		/* RGBa with 0.6 opacity */
		background: rgba(0, 0, 0, 0.6);
		/* For IE 5.5 - 7*/
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
		/* For IE 8*/
		-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
	}
	.popin {
		font-family: "Times New Roman", Times, serif;
		width: 500px;
		height:500px;
		margin: auto;
		color: #000;
		background-color: #fff;
		position: relative;
		padding: 25px;
	}
	.close{
		position: absolute;
		top: 0;
		right: 0;
	}
	.admin{
		background: white;
		color: #000;
		position: absolute;
		bottom: 10px;
		right: 10px;
		padding: 10px;
	}
	</style>
	<script>
		function pop(div) {
			document.getElementById(div).style.display='block';
			return false;
		}
		function hide(div) {
			document.getElementById(div).style.display='none';
			return false;
		}
	</script>



	<div id="pop1" class="parentDisable">
		<div class="popin">
			<?php echo var_dump($_SESSION); ?>

			<div class="close">
				<a href="#" onClick="return hide('pop1')">
					<img src="img/close.png" height="25px" width="25px">
				</a>
			</div>
		</div>
	</div>
	<div class="admin">
		<a href="#" onClick="return pop('pop1')">ADMIN</a>
	</div>
