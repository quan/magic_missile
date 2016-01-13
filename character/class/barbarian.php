<div class="title">
	Barbarian
</div>
<p class="welcome">
	These are words about a Barbarian.
</p>
<br></br>
<button class="default" id="commit_barbarian">Select</button>



<script>
	$('#commit_barbarian').click(function(){
		//Commit Choice
		$('#char_class').val('Barbarian');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').attr('type', 'submit');
		$('#next_button').prop('disabled', false);
	});
</script>