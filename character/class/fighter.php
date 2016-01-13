<div class="title">
	Fighter
</div>
<p class="welcome">
	These are words about a Fighter.
</p>
<br></br>
<button class="default" id="commit_fighter">Select</button>

<script>
	$('#commit_fighter').click(function(){
		//Commit Choice
		$('#char_class').val('Fighter');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>