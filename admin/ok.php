<?php
	session_start();
	require("./php/conn.php");
    $sessionlogin ="@@@324";
    $sessionpass = "@@1224";
	if (isset($_SESSION["login"])) {
		$sessionlogin =$_SESSION["login"];
		$sessionpass = $_SESSION["pass"];
	} else {		
		header('location:index.php');
	}
	$r = $conn -> query("SELECT * FROM creater WHERE login='$sessionlogin' and pass = '$sessionpass'");
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
	$usersKol = 0;
	$r = $conn -> query("SELECT * FROM developers WHERE id_creater = '$idCreater' ORDER BY id DESC");
	$usersKol = mysqli_num_rows($r);
	$usersArray = array();
	$un = 0;
	if ($usersKol) {
		$row = mysqli_fetch_array($r);
		do {
			$usersArray[] = array($row["id"], $row["fio"], $row["start_working"], $row["end_working"], $row["image"],"0","0","0","0");
		} while ($row = mysqli_fetch_array($r));
		$un = sizeof($usersArray[0]);
	}
	$r = $conn -> query("SELECT * FROM product WHERE id_creater = '$idCreater'");
	$userProduct = mysqli_num_rows($r);
	$orderArray = array();
	$r = $conn -> query("SELECT * FROM orders WHERE id_creater = '$idCreater' and accepted > '0' and get_developer='-'  ORDER BY id_developers, date_order  DESC ");
	$userOrders = mysqli_num_rows($r);
	if ($userOrders) {
		$row = mysqli_fetch_array($r);
		do {
			$orderArray[] = array($row["id"],$row["id_developers"], $row["count_order"],$row["date_order"],$row["client_order"],$row["price_order"],$row["price_order_give"],$row["get_developer"]);
		} while ($row = mysqli_fetch_array($r));
		
	}	
?>