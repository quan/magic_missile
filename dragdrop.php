<?php ?>

<!DOCTYPE HTML>
<html>
<head>
	<style>
		#div1 {
			width:350px;
			height:70px;
			padding:10px;
			border:1px solid #aaaaaa;
			}
		#div2 {
			width:350px;
			height:70px;
			padding:10px;
			border:1px solid #aaaaaa;
			}
		#div3{
			height: 100px;
			width: 100px;
			background: green;
		}
	</style>
	<script>
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}
	</script>
</head>
<body>

	<p>Drag the W3Schools image into the rectangle:</p>

	<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
	<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
	<br>
	<div id="div3" draggable="true"></div>
	<img id="drag1" src="img/logo.png" draggable="true" ondragstart="drag(event)" width="336" height="69">
	<img id="drag2" src="img/copper.png" draggable="true" ondragstart="drag(event)" width="336" height="69">

</body>
</html>
