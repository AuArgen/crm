<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Заказдар</title>
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
					<a href="index.php">Заказдар</a> 
					<i class="icon-angle-right"></i>
				</li>

			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			<div class="row-fluid">	
				
			
								
			</div><!--/row-->
<br>
			<div class="row-fluid sortable">

				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Заказдар</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<!-- <form action="">
							<h3>Иргөө:</h3>
							<div class=" container">
								<div class="row-fluid">
									<label class="span3 text-center" for="sortAllSumma">Жалпы акчасы менен
										<input type="radio" name="sort" checked  id="sortAllSumma">
									</label>
									<label class="span3 text-center" for="sortThisSumma">Бүгүнкү акчасы менен
										<input type="radio" name="sort" onclick="sortThisSumma()" id="sortThisSumma">
									</label>
									<label class="span3 text-center" for="sortAllCount">Жалпы заказы менен
										<input type="radio" name="sort" onclick="sortAllCount()" id="sortAllCount">
									</label>
									<label class="span3 text-center" for="sortThisCount">Бүгүнкү заказы менен
										<input type="radio" name="sort" onclick="sortThisCount()" id="sortThisCount">
									</label>
								</div>
							</div>

						</form> -->
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
				let arrayOrders = [<?php 
					$n = sizeof($orderArray);
					for ($i=0; $i < $n; $i++) {
						$x = $orderArray[$i]; 
						$xn = sizeof($x);
						echo '[';
						for ($j=0; $j < $xn; $j++) { 
							echo '`'.$x[$j].'`,';
						}
						echo '],';
					}
				?>];
				let yn = arrayUsers.length
				let xn = arrayUsers[0].length
				let summaOrders = 0
				let summaThisOrders = 0
				let countOrders = 0
				let countThisOrders = 0
				let thisDay = new Date();
				let month = ""+(+thisDay.getMonth()+1)
				if (month.length == 1) month = "0"+month
				thisDay = thisDay.getFullYear()+"-"+month+"-"+thisDay.getDate()
				// alert(thisDay)
				for (let i = 0; i < yn; i++) {
					for (let j = 0; j < arrayOrders.length; j++) {
						if (arrayUsers[i][0] == arrayOrders[j][1]) {
							arrayUsers[i][xn-2] = +arrayUsers[i][xn-2] + +arrayOrders[j][6]
							arrayUsers[i][xn-1] = +arrayUsers[i][xn-1] + 1
							summaOrders += +arrayOrders[j][6]
							countOrders++;
                            arrayOrders[j][7] = arrayUsers[i][1];
							if (arrayOrders[j][3].substr(0,10) == thisDay) {
								summaThisOrders += +arrayOrders[j][6]
								countThisOrders++;
								arrayUsers[i][xn-4] = +arrayUsers[i][xn-4] + +arrayOrders[j][6]
								arrayUsers[i][xn-3] = +arrayUsers[i][xn-3] + 1
							}
						}
					}
				}
				// document.querySelector(".summaOrders").innerHTML = summaOrders
				// document.querySelector(".summaThisOrders").innerHTML = summaThisOrders
				// document.querySelector(".countOrders").innerHTML = countOrders
				// document.querySelector(".countThisOrders").innerHTML = countThisOrders
				
				showUsers(arrayOrders)
				function showUsers(showArray) {
					let d = `
					<tr>
								<th>#</th>
								<th>Аты - жөнү</th>
								<th>Жалпы акчасы </th>
								<th>Жалпы Заказы</th>
								<th>Жасаган</th>
								<th>Аяктоо</th>
								<td  style="width: 15px;"><a><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
							</tr>
					`;
					for (let i = 0; i < showArray.length && i < 1200; i++) {
						let nn = showArray[0].length;
						d += `
							<tr>
								<td>${i+1}</td>
								<td>${showArray[i][4]}</td>
								<td>${showArray[i][6]}</td>
								<td>${showArray[i][2]}</td>
								<td>${showArray[i][7]}</td>
								<td>${showArray[i][3]}</td>
								<td  style="width: 15px;"><a href="delete.php?ordersId=${showArray[i][0]}"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
							</tr>
						`;
					}
					document.querySelector(".showUsers").innerHTML = d;
					console.table(arrayOrders);
				}
				// showUsers();

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

