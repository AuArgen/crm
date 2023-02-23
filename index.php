<?php
	require("./admin/php/conn.php");
	session_start();
    $sessionLoginDeveloper ="2312@@";
    $sessionPassDeveloper = "123@@";
	if (isset($_SESSION["loginDevoloper"]) ) {
		$sessionLoginDeveloper =$_SESSION["loginDevoloper"];
		$sessionPassDeveloper = $_SESSION["passDevoloper"];
	} 
	$r = $conn -> query("SELECT * FROM developers WHERE login='$sessionLoginDeveloper' and pass = '$sessionPassDeveloper'");
	$la = "";
	$pa = "";
	$idCreaterDeveloper = 0;
	$fioCreaterDeveloper;
	if (mysqli_num_rows($r) != 0) {
		$row = mysqli_fetch_array($r);
		$id_creater;
		do {
			$id_creater = $row["id_creater"];
		} while ($row = mysqli_fetch_array($r));
		$r2 = $conn -> query("SELECT * FROM creater WHERE id = '$id_creater'");
		$name_office="";
		if (mysqli_num_rows($r2)) {
			$row = mysqli_fetch_array($r2);
			do {
				$name_office= $row["name_office"];
			} while ($row = mysqli_fetch_array($r2));
		}
		$name_office = mb_convert_case($name_office, MB_CASE_LOWER, "UTF-8");
		$e = "";
		for ($i = 0; $i < strlen($name_office) ; $i++) {
			if ($name_office[$i] != " ") $e = $e.''.$name_office[$i];
		}
		$name_office = $e;
		header('location:'.$name_office.'/');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Катталып кирүү</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../admin/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../admin/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../admin/css/style-responsive.css" rel="stylesheet">
	<link href='../admin/http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="../admin/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="../admin/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="../admin/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../admin/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { 
				background: url(./admin/img/bg-login.jpg);
				background-size:cover;
			}
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href=""><i class="halflings-icon home"></i></a>
						<a href=""><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Логин жана Сыр сөз жазып кириңиз</h2>
					<form class="form-horizontal" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="type username" required="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password" required=""/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" required="" />Басыңыз</label>

							<div class="button-login">	
								<button type="submit" name="lg" class="btn btn-primary">Кирүү</button>
							</div>
							<div class="clearfix">
								
							</div>
							
					</form>
					<hr>
					
				</div><!--/span-->
			</div><!--/row-->
			
<?php
	if (isset($_POST["lg"])) {
		$l = $_POST["username"];
		$p = $_POST["password"];
		$r = $conn -> query("SELECT * FROM developers WHERE login='$l' and pass = '$p'");
		if (mysqli_num_rows($r)) {
			$row = mysqli_fetch_array($r);
			$id_creater;

			do {
				$la = $row["login"];
				$pa = $row["pass"];
				$idCreaterDeveloper = $row["id"];
				$fioCreaterDeveloper = $row["fio"];
				$_SESSION["loginDevoloper"]=$l;
				$_SESSION["passDevoloper"]=$p;
				$_SESSION["idCreaterDeveloper"]=$idCreaterDeveloper;
				$_SESSION["fio_creater_developer"] = $fioCreaterDeveloper;
				$_SESSION["dateIsStarted"] = substr(date("Y-m-d H:i:s"),8,2);
				// header('location:index.php');
				$id_creater = $row["id_creater"];
			} while ($row = mysqli_fetch_array($r));
			$r2 = $conn -> query("SELECT * FROM creater WHERE id = '$id_creater'");
			$name_office="";
			if (mysqli_num_rows($r2)) {
				$row = mysqli_fetch_array($r2);
				do {
					$name_office= $row["name_office"];
				} while ($row = mysqli_fetch_array($r2));
			}
			$name_office = mb_convert_case($name_office, MB_CASE_LOWER, "UTF-8");
			$e = "";
			for ($i = 0; $i < strlen($name_office) && $id_creater > 0 ; $i++) {
				if ($name_office[$i] != " ") $e =$e.''.$name_office[$i];
			}
			$name_office = $e;
			header('location:'.$name_office.'/');
			}
	}
?>
	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="../admin/http://themifycloud.com">Катталып кирүү</a></li>
				</ul>
			</div>
		</div>
	<!-- start: JavaScript-->

		<script src="../admin/js/jquery-1.9.1.min.js"></script>
	<script src="../admin/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="../admin/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="../admin/js/jquery.ui.touch-punch.js"></script>
	
		<script src="../admin/js/modernizr.js"></script>
	
		<script src="../admin/js/bootstrap.min.js"></script>
	
		<script src="../admin/js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="../admin/js/excanvas.js"></script>
	<script src="../admin/js/jquery.flot.js"></script>
	<script src="../admin/js/jquery.flot.pie.js"></script>
	<script src="../admin/js/jquery.flot.stack.js"></script>
	<script src="../admin/js/jquery.flot.resize.min.js"></script>
	
		<script src="../admin/js/jquery.chosen.min.js"></script>
	
		<script src="../admin/js/jquery.uniform.min.js"></script>
		
		<script src="../admin/js/jquery.cleditor.min.js"></script>
	
		<script src="../admin/js/jquery.noty.js"></script>
	
		<script src="../admin/js/jquery.elfinder.min.js"></script>
	
		<script src="../admin/js/jquery.raty.min.js"></script>
	
		<script src="../admin/js/jquery.iphone.toggle.js"></script>
	
		<script src="../admin/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="../admin/js/jquery.gritter.min.js"></script>
	
		<script src="../admin/js/jquery.imagesloaded.js"></script>
	
		<script src="../admin/js/jquery.masonry.min.js"></script>
	
		<script src="../admin/js/jquery.knob.modified.js"></script>
	
		<script src="../admin/js/jquery.sparkline.min.js"></script>
	
		<script src="../admin/js/counter.js"></script>
	
		<script src="../admin/js/retina.js"></script>

		<script src="../admin/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
