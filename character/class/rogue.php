<div class="title">
	Rogue
</div>
<p class="welcome">
	These are words about a Rogue.
</p>
<br></br>
<button class="default" id="commit_rogue">Select</button>

<script>
	$('#commit_rogue').click(function(){
		//Commit Choice
		$('#char_class').val('Rogue');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>