<?php
session_start();

session_destroy();

	echo "<script>alert('LOGOUT SUCCESS');</script>";
	echo "<script>location='login.php';</script>"
	
?>