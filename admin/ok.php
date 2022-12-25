<?php
	session_start();
	require("./php/conn.php");
	$r = $conn -> query("SELECT * FROM creater");
	$la = "";
	$pa = "";
	$idCreater = 0;
	if (mysqli_num_rows($r)) {
		$row = mysqli_fetch_array($r);
		do {
			$la = $row["login"];
			$pa = $row["pass"];
			$idCreater = $row["id"];
		} while ($row = mysqli_fetch_array($r));
	}
	if ($_SESSION["login"]!=$la || $_SESSION["pass"] != $pa) {
		header('Location:./login.php');
	} 
?>