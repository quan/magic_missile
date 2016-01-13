<?php

	include('../../db.php');

	$query = "SELECT `feat_name`, `full_text` FROM `feat`";
	$res = mysql_query($query);

	function normal($string) {
		$string = str_replace(' ', '', $string);
		$string = strtolower($string);
		return $string;
	}

?>

<html>
<head>
	<script type="text/javascript" src="../../js/jquery-1.11.3.js"></script>
</head>

<body>
	<?php
		while ($row = mysql_fetch_assoc($res)) {
			echo '<div id="' . normal($row['feat_name']) . '_text">' . $row['full_text'] . '</div>';
		}
	?>
</body>

</html>