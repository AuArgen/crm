<?php
	session_start();
	require("../admin/php/conn.php");
    $sessionLoginDeveloper ="@@@324";
    $sessionPassDeveloper = "@@1224";
	if (isset($_SESSION["login"])) {
		$sessionLoginDeveloper =$_SESSION["login"];
		$sessionPassDeveloper = $_SESSION["pass"];
	} else {		
		header('location:index.php');
	}
	$r = $conn -> query("SELECT * FROM developers WHERE login='$sessionLoginDeveloper' and pass = '$sessionPassDeveloper'");
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
	} else {
		header('location:login.php');
	}
	
?>