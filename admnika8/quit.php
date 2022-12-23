<?php
	session_start();
	$_SESSION["login"] = "";
	$_SESSION["pass"] = "";
	header('location:login.php');
?>