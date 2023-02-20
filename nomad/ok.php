<?php
	session_start();
	require("../admin/php/conn.php");
    $sessionLoginDeveloper ="@@@324";
    $sessionPassDeveloper = "@@1224";
	if (isset($_SESSION["dateIsStarted"])) {
		$dateIsStarted = $_SESSION["dateIsStarted"];
		if ($dateIsStarted != "$%$%$" && $dateIsStarted !=substr(date("Y-m-d H:i:s"),8,2) ) {
			$_SESSION["loginDevoloper"] = "%^%^%^^%^"; 
			$_SESSION["passDevoloper"] = "%^%^%^^%^"; 
			$_SESSION["dateIsStarted"] = "$%$%$";
			
		}
	}
	if (isset($_SESSION["loginDevoloper"])) {
		$sessionLoginDeveloper =$_SESSION["loginDevoloper"]; 
		$sessionPassDeveloper = $_SESSION["passDevoloper"];
	} else {		
		header('location:index.php');
	}
	$r = $conn -> query("SELECT * FROM developers WHERE login='$sessionLoginDeveloper' and pass = '$sessionPassDeveloper'");
	$la = "";
	$pa = "";
	$idCreater = 0;
	$idDevoloper = 0;
	$imageDeveloper = "";
	$fioDeveloper = "";
	$statusDeveloper = "";
	$workStart = "";
	$workEnd = "";
	if (mysqli_num_rows($r)) {
		$row = mysqli_fetch_array($r);
		do {
			$la = $row["login"];
			$pa = $row["pass"];
			$idCreater = $row["id_creater"];
			$idDevoloper = $row["id"];
			$imageDeveloper = $row["image"];
			$fioDeveloper = $row["fio"];
			$statusDeveloper = $row["status"];
			$workStart = $row["start_working"];
			$workEnd = $row["end_working"];
		} while ($row = mysqli_fetch_array($r));
	} else {
		header('location:login.php');
	}
	$r = $conn -> query("SELECT * FROM creater WHERE id = '$idCreater'");
	$logo = "";
	$nameOffice;
	$phone;
	if (mysqli_num_rows($r)) {
		$row = mysqli_fetch_array($r);
		do {
			$logo = $row["logo"];
			$nameOffice = $row["name_office"];
			$phone = $row["phone"];
		} while ($row = mysqli_fetch_array($r));
	}
	$r = $conn -> query("SELECT * FROM orders WHERE id_developers=$idDevoloper and accepted='0'");
	$kolOrders = mysqli_num_rows($r);


	// SELECT *
// FROM orders
// where date_order between '2022-01-01' and '2023-01-20';
// SELECT *
// FROM    orders
// WHERE   date_order BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
?>