<div class="title">
	Bard
</div>
<p class="welcome">
	These are words about a Bard.
</p>
<br></br>
<button class="default" id="commit_bard">Select</button>

<script>
	$('#commit_bard').click(function(){
		//Commit Choice
		$('#char_class').val('Bard');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>