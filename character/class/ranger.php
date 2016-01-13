<div class="title">
	Ranger
</div>
<p class="welcome">
	These are words about a Ranger.
</p>
<br></br>
<button class="default" id="commit_ranger">Select</button>

<script>
	$('#commit_ranger').click(function(){
		//Commit Choice
		$('#char_class').val('Ranger');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>