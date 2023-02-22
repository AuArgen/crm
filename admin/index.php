<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Башкы бет</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	
	<script src="http://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
		
	<script src="https://code.highcharts.com/highcharts.js"></script>
		
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
					<a href="index.php">Башкы бет </a> 
					<i class="icon-angle-right"></i>
				</li>

			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			<div class="row-fluid">	

				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Жумушчулардын саны</p>
					<span class="badge"><?php echo $usersKol;?></span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-shopping-cart"></i>
					<p>Жалпы заказдар</p>
					<span class="badge"><?php echo $userOrders;?></span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Заказдар бүгүнкү</p>
					<span class="badge"><?php echo $userOrder;?></span>
				</a>
				<a class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Товарлар</p>
					<span class="badge"><?php echo $userProduct;?></span>

				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-money"></i>
					<p>Жалпы акча</p>
					<span class="badge"><?php echo $allMoney;?></span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-money"></i>
					<p>Бүгүнкү акча</p>
					<span class="badge"><?php echo $thisMoney;?></span>

				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Башкы</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table showUsers" style="font-size:12px;" border=1>
							
						</table>

					</div>
				</div><!--/span-->
				
				</div>
						
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p>

	</footer>
	<script>
                let arrayUsers = [<?php 
					$n = sizeof($usersArray);
					for ($i=0; $i < $n; $i++) {
						$x = $usersArray[$i]; 
						$xn = sizeof($x);
						echo '[';
						for ($j=0; $j < $xn; $j++) { 
							echo '`'.$x[$j].'`,';
						}
						echo '],';
					}
				?>];
				let showArray = arrayUsers;
				function showUsers() {
					let d = `
					<tr>
								<th>#</th>
								<th>Аты - жөнү</th>
								<th> Жалпы акчасы </th>
								<th>Жалпы Заказы</th>
								<th>Бүгүнкү акча</th>
								<th>Бүгүнкү заказдар </th>
								<th>Баштоо</th>
								<th>Аяктоо</th>
							</tr>
					`;
					for (let i = 0; i < showArray.length; i++) {
						let nn = showArray[0].length;
						d += `
							<tr>
								<td>${i+1}</td>
								<td>${showArray[i][1]}</td>
								<td>${showArray[i][nn-2]}</td>
								<td>${showArray[i][nn-1]}</td>
								<td>${showArray[i][nn-4]}</td>
								<td>${showArray[i][nn-3]}</td>
								<td>${showArray[i][2].substr(0,10)} <br> ${showArray[i][2].substr(10,20)}</td>
								<td>${showArray[i][3].substr(0,10)} <br> ${showArray[i][3].substr(10,20)}</td>
							</tr>
						`;
					}
					document.querySelector(".showUsers").innerHTML = d;
				}
				showUsers();
				console.table(arrayUsers);

// 				CKEDITOR.replace( 'editor1', {
// 					filebrowserUploadUrl: "./upload.php"
// });

				
		</script>
	
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
	<?php require('./upload.php');?>
	
</body>
</html>

