<?php
	session_start();
	$la="7a42a8fe1d180f422d7bf84b0717b9c6";
	$pa="8021e7f39b979cff4b28735ce144b760";
	if ($_SESSION["login"]!=$la || $_SESSION["pass"] != $pa) {
		header('location:./login.php');
	} 
	require("./php/conn.php");
?>