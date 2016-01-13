<?php
session_start();
$_SESSION['logout'] = TRUE;
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>
