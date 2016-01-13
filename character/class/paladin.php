<div class="title">
	Paladin
</div>
<p class="welcome">
	These are words about a Paladin.
</p>
<br></br>
<button class="default" id="commit_paladin">Select</button>

<script>
	$('#commit_paladin').click(function(){
		//Commit Choice
		$('#char_class').val('Paladin');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>