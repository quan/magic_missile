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
	<title>Library Class</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
</head>

<body>
	<!--Logo Area-->
	<?php $level=1; include('logo.php'); ?>
	<!--Nav Bar-->
	<div class="top" style="position: relative; z-index: 1;">
	<?php $level = 1; include('nav.php'); ?>
	</div>
	<div class="title">
		Classes
	</div>
	
	<?php {include('library_nav.php');} ?>
	<br></br>
	<!----------------------------This generates links----------------------------------------------------------------------------------->
	<?php

		$query = "SELECT * FROM `base_class` WHERE `type` = 'base'";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div class="lib_link_wrapper">';
			echo '<a href="#" class="lib_link" onClick="return pop(';
			echo "'";
			echo normal($row['name']);
			echo "'";
			echo ')">';
			echo $row['name'];
			echo '</a> '; 
			echo '</div>';
			}
		mysql_close($con);
	?>
	<!----------------------------This generates popins---------------------------------------------------------------------------------->
	<?php
		
		$query = "SELECT * FROM `base_class` WHERE `type` = 'base'";
		$results = mysql_query($query);
		while ($row = mysql_fetch_assoc($results)){
			echo '<div id="';
			echo normal($row['name']);
			echo '" class="parentDisable"> <div class="popin shadow">' . '<div class="title">';
			echo $row['name'];
			echo '</div>' . '<a href="#" onClick="return hide(';
			echo "'";
			echo normal($row['name']);
			echo "')";
			echo '"><img src="img/close.png" width="15px" height="15px" class="close_button" /></a>';
			echo $row['full_text'];
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
