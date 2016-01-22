<?php
//removes spaces and uppercases
function normal($string)
{
	$string = str_replace(' ', '', $string);
	$string = strtolower($string);
	return $string;
	}
?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Library Alignment</title>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="library.css">
	<!--JS-->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script>
		function pop(div) {
			document.getElementById(div).style.display='block';
			return false;
		}
		function hide(div) {
			document.getElementById(div).style.display='none';
			return false;
		}
	</script>
	<!--CSS-->
	<style>
		.ttt{
		margin: auto;
		width: 60vw;
		height: 20vw;
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		}

	</style>
</head>

<body>
	<!--Logo Area-->
	<?php $level=1; include('logo.php'); ?>
	<!--Nav Bar-->
	<div class="top" style="position: relative; z-index: 1;">
		<?php $level = 1; include('nav.php'); ?>
	</div>
	<div class="title">
		Alignments
	</div>
	
	<?php {include('library_nav.php');} ?>
	<br></br>
	<!----------------------------This generates links----------------------------------------------------------------------------------->
	<div class="ttt">
	<?php
		include('../db.php');

		$query = "SELECT `alignment_name` FROM `alignment`";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div style="width:20vw">';
			echo '<a href="#" class="lib_link" onClick="return pop(';
			echo "'";
			echo normal($row['alignment_name']);
			echo "'";
			echo ')">';
			echo $row['alignment_name'];
			echo '</a> '; 
			echo '</div>';
			}
		mysql_close($con);
	?>
	</div>
	<!----------------------------This generates popins---------------------------------------------------------------------------------->
	<?php
		include('../db.php');

		$query = "SELECT `alignment_name` FROM `alignment`";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div id="';
			echo normal($row['alignment_name']);
			echo '" class="parentDisable"> <div class="popin shadow">' . '<div class="title">';
			echo $row['alignment_name'];
			echo '</div>' . '<a href="#" onClick="return hide(';
			echo "'";
			echo normal($row['alignment_name']);
			echo "')";
			echo '"><img src="img/close.png" width="15px" height="15px" class="close_button" /></a>';
			echo '</div></div>';
			}
		mysql_close($con);
	?>

	<!--Footer-->
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
</body>

</html>
