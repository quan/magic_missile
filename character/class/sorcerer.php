<div class="title">
	Sorcerer
</div>
<p class="welcome">
	These are words about a Sorcerer.
</p>
<br></br>
<button class="default" id="commit_sorcerer">Select</button>

<script>
	$('#commit_sorcerer').click(function(){
		//Commit Choice
		$('#char_class').val('Sorcerer');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>