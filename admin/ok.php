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
	$r = $conn -> query("SELECT * FROM developers WHERE id_creater = '$idCreater'");
	$usersKol = mysqli_num_rows($r);
	$r = $conn -> query("SELECT * FROM product WHERE id_creater = '$idCreater'");
	$userProduct = mysqli_num_rows($r);
	$date = date("Y-m-d");
	$r = $conn -> query("SELECT * FROM orders WHERE id_creater = '$idCreater' and get_developer='-' and date_order LIKE '%$date%'");
	$userOrder = mysqli_num_rows($r);
	$r = $conn -> query("SELECT * FROM orders WHERE id_creater = '$idCreater' ");
	$userOrders = mysqli_num_rows($r);
?>