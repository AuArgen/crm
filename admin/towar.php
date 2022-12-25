<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Товар</title>
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
	
	<script src="http://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
		
		
		
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
					<a href="index.php">Главная</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Товар</a></li>
			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Товар</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="name">Товардын аталышы </label>
							  <div class="controls">
								<input type="text" required class="span6 name" name="name" id="name"  data-provide="name" data-items="4">
								<p class="help-block">Товардын аталышы !</p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="price">Товардын баасы...</label>
							  <div class="controls">
								<input type="text" required maxLength="100" name = "price" class="span6 price" id="price"  data-provide="price" data-items="4">
								<p class="help-block">Товардын баасы!</p>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Товардын сүрөттү</label>
							  <div class="controls">
								<input class="" id="" type="file" name="images"/>
							  </div>
							</div>         
                            <input type="hidden" value="0" name="contentId">

							
							<div class="form-actions">
							  <button type="submit" name = "saveProduct" class="btn btn-primary">Сактоо</button>
							  <button type="reset" class="btn">Жокко чыгаруу</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<h1>Товар</h1>
	<table class="table" border="1">
		<thead>
		  <tr>
			<th scope="col">№</th>
			<th scope="col">Аталышы</th>
			<th scope="col">Баасы</th>
			<th scope="col">Артикул</th>
			<th scope="col">Картинка</th>
			<th scope="col">Өзгөртүү</th>
			<th scope="col">Өчүрүү</th>
	
		  </tr>
		</thead>
		<tbody>
			<?php 
				require("./php/conn.php");
				$r = $conn -> query("select * from product order by id desc ");
				if (mysqli_num_rows($r)) {
					$row = mysqli_fetch_array($r);
					$count=1;
					do {
						echo'
						<tr>
							<th scope="row">'.$count++.'</th>
							<td>'.$row["name"].'</td>
							<td>'.$row['price'].'</td>
							<td>'.$row["artikul"].'</td>
							<td><img src="./'.$row["image"].'" style="width:100px"></td>
							<td style="width: 15px;"><a href="./updateTowar.php?product='.$row["id"].'"><button class="btn btn-warning"> Өзгөртүү</a></button></td>
							<td  style="width: 15px;"><a href="./delete.php?product='.$row["id"].'"><button class="btn btn-danger">Өчүрүү</button></a></td>
					  	</tr>
						';
					} while ($row = mysqli_fetch_array($r));

				}
			?>
		 
		 
		</tbody>
	  </table>
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
                

				CKEDITOR.replace( 'editor1', {
					filebrowserUploadUrl: "./upload.php"
});

				
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
