<div class="title">
	Druid
</div>
<p class="welcome">
	These are words about a Druid.
</p>
<br></br>
<button class="default" id="commit_druid">Select</button>

<script>
	$('#commit_druid').click(function(){
		//Commit Choice
		$('#char_class').val('Druid');
		//Next Button
		$('#next_button').css("color", "white");
		$('#next_button').css("cursor", "pointer");
		$('#next_button').prop('disabled', false);
		$('#next_button').attr('type', 'submit');
	});
</script>