<?php 
	session_start();
 ?>

<title>Drang and Drop</title>

<style>
	.attribute{
		height: 100px;
		width: 100px;
		padding: 10px;
		margin: 10px;
		border: 5px solid #000;
		background: #0FF;
	}
	#roll1, #roll2, #roll3, #roll4, #roll5, #roll6, .value{
		height: 50px;
		width: 50px;
		background: white;
		font-size: 2em;
		border: 2px solid #000;

	}
</style>

<div style="display: flex; flex-direction: row; justify-content: space-around;">
	Str<div id="att1" class="attribute"></div>
	Wis<div id="att2" class="attribute"></div>
	Int<div id="att3" class="attribute"></div>
	Cha<div id="att4" class="attribute"></div>
	Dex<div id="att5" class="attribute"></div>
	Con<div id="att6" class="attribute"></div>
</div>

<div style="display: flex; flex-direction: row; justify-content: space-around;">
	<div id="roll1" class="value" draggable="true"><?php echo $_SESSION['total_1']; ?></div>
	<div id="roll2" class="value" draggable="true"><?php echo $_SESSION['total_2']; ?></div>
	<div id="roll3" class="value" draggable="true"><?php echo $_SESSION['total_3']; ?></div>
	<div id="roll4" class="value" draggable="true"><?php echo $_SESSION['total_4']; ?></div>
	<div id="roll5" class="value" draggable="true"><?php echo $_SESSION['total_5']; ?></div>
	<div id="roll6" class="value" draggable="true"><?php echo $_SESSION['total_6']; ?></div>
</div>


<div id="commentz">Commentz</div>
<div id="feedback">Feedback</div>
<div id="whichone">Which One</div>

<br></br>
<button id="save_allocate" >Continue</button>



<script>

	

	$('.value').on("dragstart", function(event){
 		
			$('#feedback').html(this.innerHTML);
			$('#whichone').html(this.id);
			event.dataTransfer.setData('text/html', this.innerHTML);
			

			
	});

	$('.value').on("drag", function(event){
			event.preventDefault();
			var which = this.id;
			$('#whichone').html(which);
	});

	$('.attribute').on("dragover", function(event){
			event.preventDefault();
			event.stopPropagation();
	});

	$('.attribute').on("dragenter", function(event){
		    event.preventDefault();  
    		event.stopPropagation();

	});

	$('.attribute').on("dragleave", function(event){
		    event.preventDefault();  
    		event.stopPropagation();

	});


	$('.value').on("drop", function(event){
		var dataz = event.dataTransfer.getData('text/html');
		alert(dataz);
	});

	$('.value').on('dragend', function(event){
			event.preventDefault();
			event.stopPropagation();
	});




		function drop_str(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_str').val(data);
			$('#commentz').html("Strength is: " + data);
			$last_str = $touch;
			ev.target.appendChild(document.getElementById($touch));
			alert(data);
		}		
		function drop_wis(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_wis').val(data);
			$('#commentz').html("Wisdom is: " + data);
			ev.target.appendChild(document.getElementById($touch));
		}

		function drop_int(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_int').val(data);
			$('#commentz').html("Intelligence is: " + data);
			ev.target.appendChild(document.getElementById($touch));
		}		

		function drop_cha(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_cha').val(data);
			$('#commentz').html("Charisma is: " + data);
			ev.target.appendChild(document.getElementById($touch));
		}

		function drop_dex(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_dex').val(data);
			$('#commentz').html("Dexterity is: " + data);
			ev.target.appendChild(document.getElementById($touch));
		}

		function drop_con(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			$('#char_con').val(data);
			$('#commentz').html("Constitution is: " + data);
			ev.target.appendChild(document.getElementById($touch));
		}		
	</script>

<script>

$('#save_allocate').click(function(){
	$('#next_button').show();
});

</script>