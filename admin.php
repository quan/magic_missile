<title>Admin Session Variables</title>
<?php
session_start();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

?>
