<?php
	error_reporting();
	session_start();
	if(isset($_SESSION['username']) and
	isset($_SESSION['passw']))
	{
		include "utama.php";
	}
	else {
		header("location: login.php");
	}
?>
<html>
<head><link rel="canonical shortcut icon" href="wallp/ico.png" /></head>
</html>
