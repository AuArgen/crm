<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Биз</title>
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
				<li><a href="#">Биз</a></li>
			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Биз</h2>
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
							  <label class="control-label" for="fio">Аты жөнү </label>
							  <div class="controls">
								<input type="text" required class="span6 typeahead" name="fio" id="fio"  data-provide="typeahead" >
								<p class="help-block">Аты жөнү </p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="status">Статусу</label>
							  <div class="controls">
								<select name="status" id="">
									<option value="graphAndAdmin">График дизайнер и админ</option>
									<option value="graph">График дизайнер</option>
									<option value="cashier">Кассир</option>
								</select>
								<p class="help-block">Статусу</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="phone">Телефон номер</label>
							  <div class="controls">
								<input type="text" required maxLength="100" name = "phone" class="span6 status" id="phone"  data-provide="typeahead" >
								<p class="help-block">Телефон номер</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="login">Логин</label>
							  <div class="controls">
								<input type="text" required maxLength="100" name = "login" class="span6 status" id="login"  data-provide="typeahead" >
								<p class="help-block">Логин</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="password">Сыр сөз</label>
							  <div class="controls">
								<input type="text" required maxLength="100" name = "password" class="span6 status" id="password"  data-provide="typeahead" >
								<p class="help-block">Сыр сөз</p>
							  </div>
							</div>

						

							<div class="control-group">
							  <label class="control-label" for="fileInput">Сүрөттү</label>
							  <div class="controls">
								<input class="" id="" type="file" name="images"  />
							  </div>
							</div>        
							
                            <input type="hidden" value="1" name="contentId">
							<div class="form-actions">
							  <button type="submit" name = "saveDeveloper" class="btn btn-primary">Сактоо</button>
							  <button type="reset" class="btn">Жокко чыгаруу</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
				<h1>Биз</h1>
	<table class="table" border="1">
		<thead>
		  <tr>
			<th scope="col">№</th>
			<th scope="col">ФИО</th>
			<th scope="col">Статусу</th>
			<th scope="col">Телефон</th>
			<th scope="col">Сүрөттү</th>
			<th scope="col">Өзгөртүү</th>
			<th scope="col">Өчүрүү</th>
	
		  </tr>
		</thead>
		<tbody>
			<?php 
				require("./php/conn.php");
				$r = $conn -> query("select * from developers order by id desc ");
				if (mysqli_num_rows($r)) {
					$row = mysqli_fetch_array($r);
					$count=1;
					do {
						echo'
						<tr>
							<th scope="row">'.$count++.'</th>
							<td>'.$row["fio"].'</td>
							<td>'.($statusArray[$row['status']]).'</td>
							<td>'.$row["phone"].'</td>
							<td><img src="./'.$row["image"].'" style="width:100px"></td>
							<td style="width: 15px;"><a href="./update.php?developers='.$row["id"].'"><button class="btn btn-warning"> Өзгөртүү</a></button></td>
							<td  style="width: 15px;"><a href="./delete.php?developers='.$row["id"].'"><button class="btn btn-danger">Өчүрүү</button></a></td>
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
			<span style="text-align:left;float:left">&copy; 2023 <a href="http://github.com/itkyrgyz" alt="Bootstrap_Metro_Dashboard">ITKYRGYZ@gmail.com</a></span>
			
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
