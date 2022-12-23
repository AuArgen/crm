<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>форма2</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<?php
require("./header.php");
?>
		<!--
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
		-->
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Главная</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Формы2</a></li>
			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			

<!-- <table  style="width: 90%;
	border-bottom: 1px solid black;
	background: grey;
">
	<tr style=" border-bottom: 1px solid black;">
		<th>fdgfdg</th>
		<th>fdgfdg</th>
		<th>fdgfdg</th>
		<th>fdgfdg</th>
		<th>fdgfdg</th>
		<th>fdgfdg</th>
	</tr>
	<center>
	<tr style="border-bottom: 1px solid black; 
	margin-left: 25px;
	" >
		<td>fdgfdg</td>
		<td>fdgfdg</td>
		<td>fdgfdg</td>
		<td>fdgfdg</td>
		<td>fdgfdg</td>
		<td>fdgfdg</td>
	</tr>
</center>
</table> -->

<h1>кызматкерлер</h1>
<table class="table" border="1">
	<thead>
	  <tr>
		<th scope="col">№</th>
		<th scope="col">ФИО</th>
		<th scope="col">должност</th>
		<th scope="col">facebook</th>
		<th scope="col">WhatsApp</th>
		<th scope="col">Instagram</th>
		<th scope="col">E-mail</th>
		<th scope="col">Изменить</th>
		<th scope="col">Удалить</th>

	  </tr>
	</thead>
	<tbody>
	  <tr>
		<th scope="row">1</th>
		<td>Бегислан</td>
		<td>Лаборант</td>
		<td>@асвыавав</td>
		<td>авыфавыфа</td>
		<td>@mdoпавпав</td>
		<td>@mdoпавыпавы</td>
		<td style="width: 15px;"><button class="btn btn-warning"><a href="update.php"> Изменить</a></button></td>
		<td  style="width: 15px;"><button class="btn btn-danger">Удалить</button></td>
	  </tr>
	 

	
	  <!-- <tr>
		<th scope="row">3</th>
		<td colspan="2">Larry the Bird</td>
		<td>@twitter</td>
	  </tr>
	   <tr>
		<th scope="row">3</th>
		<td colspan="2">Larry the Bird</td>
		<td>@twitter</td>
	  </tr> -->
	</tbody>
  </table>
  <h1>книги</h1>
<table class="table" border="1">
	<thead>
	  <tr>
		<th scope="col">№</th>
		<th scope="col">ФИО</th>
		<th scope="col">должност</th>
		<th scope="col">facebook</th>
		<th scope="col">Изменить</th>
		<th scope="col">Удалить</th>

	  </tr>
	</thead>
	<tbody>
	  <tr>
		<th scope="row">1</th>
		<td>Бегислан</td>
		<td>Лаборант</td>
		<td>@асвыавав</td>
		<td style="width: 15px;"><button class="btn btn-warning"><a href="update.php"> Изменить</a></button></td>
		<td  style="width: 15px;"><button class="btn btn-danger">Удалить</button></td>
	  </tr>
	</tbody>
	</table>


	<h1>Новости</h1>
	<table class="table" border="1">
		<thead>
		  <tr>
			<th scope="col">№</th>
			<th scope="col">ФИО</th>
			<th scope="col">должност</th>
			<th scope="col">facebook</th>
			<th scope="col">WhatsApp</th>
			<th scope="col">Изменить</th>
			<th scope="col">Удалить</th>
	
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<th scope="row">1</th>
			<td>Бегислан</td>
			<td>Лаборант</td>
			<td>@асвыавав</td>
			<td>авыфавыфа</td>
			<td style="width: 15px;"><button class="btn btn-warning"><a href="update.php"> Изменить</a></button></td>
			<td  style="width: 15px;"><button class="btn btn-danger">Удалить</button></td>
		  </tr>
		 
		</tbody>
	  </table>


	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
