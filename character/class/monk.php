<div class="title">
	Monk
</div>
<p class="welcome">
	These are words about a Monk.
</p>
<br></br>
<button class="default" id="commit_monk">Select</button>

<script>
	$('#commit_monk').click(function(){
		//Commit Choice
		$('#char_class').val('Monk');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>