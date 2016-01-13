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
	.value{
		height: 50px;
		width: 50px;
		background: white;
		font-size: 2em;
		border: 2px solid #000;
		cursor: move;
	}
	.value.over {
  		border: 2px dashed #000;
	}
	.attr{
		font-size: 2em;
		text-align: right;
		padding: 0 10px 0 10px;
	}
	#allocator{
		 margin: auto;
		 position: absolute;
		 right: 100px;
	}
	#results{
		width: 300px;
		position: absolute;
		left: 100px;
	}
</style>

<div id="results"></div>


<table id="allocator">

	<tr>
		<td class="attr">Strength</td>
		<td id="str_spot">
			<div id="roll1" class="value" draggable="true"><?php echo $_SESSION['total_1']; ?></div>
		</td>
	</tr>

	<tr>
		<td class="attr">Dexterity</td>
		<td id="dex_spot">
			<div id="roll2" class="value" draggable="true"><?php echo $_SESSION['total_2']; ?></div>
		</td>
	</tr>

	<tr>
		<td class="attr">Constitution</td>
		<td id="con_spot">
			<div id="roll3" class="value" draggable="true"><?php echo $_SESSION['total_3']; ?></div>
		</td>
	</tr>

	
	<tr>
		<td class="attr">Intelligence</td>
		<td id="int_spot">
			<div id="roll4" class="value" draggable="true"><?php echo $_SESSION['total_4']; ?></div>
		</td>
	</tr>

	<tr>
		<td class="attr">Wisdom</td>
		<td id="wis_spot">
			<div id="roll5" class="value" draggable="true"><?php echo $_SESSION['total_5']; ?></div>
		</td>
	</tr>

	<tr>
		<td class="attr">Charisma</td>
		<td id="cha_spot">
			<div id="roll6" class="value" draggable="true"><?php echo $_SESSION['total_6']; ?></div>
		</td>
	</tr>

</table>


<button id="render">Commit</button>

<script>

	var vals = document.querySelectorAll('.value');
	var dragSrcEl = null;

	function handleDragStart(e) {
		this.style.opacity = '0.4';  // this / e.target is the source node.
		dragSrcEl = this;

		e.dataTransfer.effectAllowed = 'move';
		e.dataTransfer.setData('text/html', this.innerHTML);
		$('#feedback').html(this.innerHTML);
		$('#commentz').html(this.id);
	}

	function handleDragOver(e) {
	  if (e.preventDefault) {
	    e.preventDefault(); // Necessary. Allows us to drop.
	  }

	  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

	  return false;
	}

	function handleDragEnter(e) {
	  // this / e.target is the current hover target.
	  this.classList.add('over');
	}

	function handleDragLeave(e) {
	  this.classList.remove('over');  // this / e.target is previous target element.
	}

	function handleDrop(e) {
	  // this / e.target is current target element.

		if (e.stopPropagation) {
		e.stopPropagation(); // stops the browser from redirecting.
		}

		// Don't do anything if dropping the same column we're dragging.
		if (dragSrcEl != this) {
		// Set the source column's HTML to the HTML of the column we dropped on.
		dragSrcEl.innerHTML = this.innerHTML;
		this.innerHTML = e.dataTransfer.getData('text/html');
		}

  return false;
	}

	function handleDragEnd(e) {
		this.style.opacity = '1';
	  	// this/e.target is the source node.

	  [].forEach.call(vals, function (val) {
	    val.classList.remove('over');
	  });

	}
	
	[].forEach.call(vals, function(val) {
	  val.addEventListener('dragstart', handleDragStart, false);
	  val.addEventListener('dragenter', handleDragEnter, false)
	  val.addEventListener('dragover', handleDragOver, false);
	  val.addEventListener('dragleave', handleDragLeave, false);
	  val.addEventListener('drop', handleDrop, false);
	  val.addEventListener('dragend', handleDragEnd, false);
	});

	$('#render').click(function(){

		$('#next_button').attr('type', 'submit');


		$('.value').css('background-color', 'transparent');
		$('.value').attr('draggable', 'false');
		$('.value').css('cursor', 'default');
		var str = $('#str_spot').find('.value').html();
		var dex = $('#dex_spot').find('.value').html();
		var con = $('#con_spot').find('.value').html();
		var int = $('#int_spot').find('.value').html();
		var wis = $('#wis_spot').find('.value').html();
		var cha = $('#cha_spot').find('.value').html();
		
		$('#char_str').val(str);
		$('#char_dex').val(dex);
		$('#char_con').val(con);
		$('#char_int').val(int);
		$('#char_wis').val(wis);
		$('#char_cha').val(cha);

		$('#results').html('Strength is ' + str + '<br>Dexterity is ' + dex + '<br>Constitution is ' + con + '<br>Intelligence is ' + int + '<br>Wisdom is ' + wis + '<br>Charisma is ' + cha);
	});

</script>