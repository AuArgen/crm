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
	$date = date("Y-m-d");
	$r = $conn -> query("SELECT * FROM orders WHERE id_creater = '$idCreater' and accepted='1' and get_developer='-' and date_order LIKE '%$date%' ORDER BY id_developers DESC");
	$userOrder = mysqli_num_rows($r);
	$thisMoney = 0;
	$orderArray = array();
	if ($userOrder) {
		$row = mysqli_fetch_array($r);
		$x = array();
		$countx = 0;
		$summa = 0;
		$kol = 0;
		do {
			if ($usersArray[$countx][0] == $row["id_developers"]) {
				$summa += $row["price_order_give"];
				$kol++;
				$x[] = array($row["id"], $row["client_oreder"], $row["price_order_give"], $row["count_order"], $row["name_order"]);
			} else {
				$orderArray[] = $x; 
				$x = array($row["id"], $row["client_oreder"], $row["price_order_give"], $row["count_order"], $row["name_order"]);
				$usersArray[$countx][$un-4] = $summa;
				$usersArray[$countx][$un-3] = $kol;
				$countx++;
				if ($row["count_order"] > 0 && $usersArray[$countx][0] == $row["id_developers"]) {
					$kol = 1;
					$summa = $row["price_order_give"];
					$x = array($row["id"], $row["client_oreder"], $row["price_order_give"], $row["count_order"], $row["name_order"]);
				} else {
					$kol = 0;
					$summa = 0;
					$x = array();
				}
			}
			$thisMoney += $row["price_order_give"];
		} while ($row = mysqli_fetch_array($r));
		$orderArray[] = $x; 
		$usersArray[$countx][$un-4] = $summa;
		$usersArray[$countx][$un-3] = $kol;
		$kol = 0;
		$summa = 0;
	}
	$r = $conn -> query("SELECT * FROM orders WHERE id_creater = '$idCreater' and accepted='1' and get_developer='-'  ORDER BY id_developers DESC");
	$userOrders = mysqli_num_rows($r);
	$allMoney = 0;
	if ($userOrders) {
		$row = mysqli_fetch_array($r);
		$x = array();
		$countx = 0;
		$summa = 0;
		$kol = 0;
		do {
			if ($usersArray[$countx][0] == $row["id_developers"]) {
				$summa += $row["price_order_give"];
				$kol++;
				$x[] = array($row["id"], $row["client_oreder"], $row["price_order_give"], $row["count_order"], $row["name_order"]);
			} else {
				$orderArray[] = $x; 
				$usersArray[$countx][$un-2] = $summa;
				$usersArray[$countx][$un-1] = $kol;
				$countx++;
				if ($row["count_order"] > 0 && $usersArray[$countx][0] == $row["id_developers"]) {
					$kol = 1;
					$summa = $row["price_order_give"];
					$x = array($row["id"], $row["client_oreder"], $row["price_order_give"], $row["count_order"], $row["name_order"]);
				} else {
					$kol = 0;
					$summa = 0;
					$x = array();
				}
			}
			$allMoney += $row["price_order_give"];
		} while ($row = mysqli_fetch_array($r));
		$orderArray[] = $x; 
		$usersArray[$countx][$un-2] = $summa;
		$usersArray[$countx][$un-1] = $kol;
		$kol = 0;
		$summa = 0;
	}
?>