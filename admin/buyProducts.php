<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Сатып алынган товарлар</title>
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
					<a href="index.php">Алынган товарлар</a> 
					<i class="icon-angle-right"></i>
				</li>

			</ul>			
			<div class="row-fluid sortable">

				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Алынган товарлар</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						<table class="table showBuy" style="font-size:12px;" border=1>
							    
						</table>

					</div>
				</div><!--/span-->
				
				</div>
						
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2023 <a href="http://github.com/itkyrgyz" alt="Bootstrap_Metro_Dashboard">ITKYRGYZ@gmail.com</a></span>
			
		</p>

	</footer>
    <script src="js/jquery-1.9.1.min.js"></script>
	<script>
        let getArray = []
        function showGet() {
                let get = "getBuy"
                $.ajax({
                  url:'./req.php',
                  type:'POST',
                  cache:false,
                  data:{get},
                  dataType:'html',
                  success: function (data) {
                    getArray = JSON.parse(data)
                    // console.table(getArray)
                    show();
                  }
                });	
        } showGet()
        function show() {
            let d = `<tr>
                        <th>#</th>
                        <th>Аты</th>
                        <th>Жекече баасы </th>
                        <th>Саны </th>
                        <th>Жалпы баасы </th>
                        <th>Күнү</th>
                        <th  style="width: 15px;"><a><button class="btn btn-danger"><i class="icon-trash"></i></button></a></th>
                    </tr>  `;
            for (let i = 0; i < getArray.length-1 && i < 1000; i++) {
                let date = getArray[i];
                d += `
                    <tr>
                        <td>${i+1}</td>
                        <td>${date["name_product"]}</td>
                        <td>${date["price_product"]}</td>
                        <td>${date["count_product"]}</td>
                        <td>${date["all_price_product"]}</td>
                        <td>${date["date_product"]}</td>
                        <td  style="width: 15px;"><a href="delete.php?buyId=${date["id"]}"><button class="btn btn-danger"><i class="icon-trash"></i></button></a></td>
                    </tr>
                `;
            }
            document.querySelector(".showBuy").innerHTML = d;
        }
	</script>
	<!-- start: JavaScript-->

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

