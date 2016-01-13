<?php
//removes spaces and uppercases
function normal($string)
{
	$string = str_replace(' ', '', $string);
	$string = strtolower($string);
	return $string;
	}

	include('../db.php');
?>
<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Library Race</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--JS-->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
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
	<link rel="stylesheet" type="text/css" href="library.css">

</head>

<body class="noselect">
	<!--Logo Area-->
	<?php $level=1; include('logo.php'); ?>
	<!--Nav Bar-->
	<div class="top shadowLight" style="position: relative; z-index: 1;">
		<?php $level = 1; include('nav.php'); ?>
	</div>

	<div class="title">
		Races
	</div>

	<?php {include('library_nav.php');} ?>
	<br></br>
	<!----------------------------This generates links----------------------------------------------------------------------------------->
	<?php
		
		$query = "SELECT `race_name` FROM `race`";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div class="lib_link_wrapper">';
			echo '<a href="#" class="lib_link" onClick="return pop(';
			echo "'";
			echo normal($row['race_name']);
			echo "'";
			echo ')">';
			echo $row['race_name'];
			echo '</a> '; 
			echo '</div>';
			}
		mysql_close($con);
	?>
	<!----------------------------This generates popins---------------------------------------------------------------------------------->
	<?php
		include('../db.php');

		$query = "SELECT `race_name` FROM `race`";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div id="';
			echo normal($row['race_name']);
			echo '" class="parentDisable"> <div class="popin shadow">' . '<div class="title">';
			echo $row['race_name'];
			echo '</div>' . '<a href="#" onClick="return hide(';
			echo "'";
			echo normal($row['race_name']);
			echo "')";
			echo '"><img src="img/close.png" width="15px" height="15px" class="close_button" /></a>' . '</div></div>';
			}
		mysql_close($con);
	?>

	<!--Footer-->
	<div style="padding: 10px 0 0 0">
		<?php $level=1; include('footer.php'); ?>
	</div>
</body>

</html>
