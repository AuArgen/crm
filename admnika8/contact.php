<!DOCTYPE html>
<html lang="RU">
<head>
	
	<meta charset="utf-8">
	<title>Анализ</title>
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
				<li><a href="#">Контакт</a></li>
			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Контакт</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <?php
                                $r = $conn->query("SELECT * FROM contact");
                                if (mysqli_num_rows($r)) {
                                    $row=mysqli_fetch_array($r);
                                    do {
                                        echo'
                                        <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="time01">Иш башталуу</label>
                                            <div class="controls">
                                              <input type="time" required class="input-xlarge" name="time1" id="time01" placeholder = "" value='.$row['start'].'>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="time02">Иш аяктоо</label>
                                            <div class="controls">
                                              <input type="time" required class="input-xlarge" name="time2" id="time02" placeholder = "" value='.$row['end'].'>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="telephon">Телефон </label>
                                            <div class="controls">
                                              <input type="text" value='.$row['phone'].' required class="span6 typeahead" name="telephon" id="telephon"  data-provide="typeahead" data-items="4" >
                                              <p class="help-block">Телефон  номер</p>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="email">Email</label>
                                            <div class="controls">
                                              <input type="text" value='.$row['email'].' required maxLength="100" name = "email" class="span6 typeahead" id="email"  data-provide="typeahead" >
                                              <p class="help-block">Email!</p>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="location">Дарек</label>
                                            <div class="controls">
                                              <input type="text" value='.$row['location'].' required maxLength="100" name = "location" class="span6 typeahead" id="location"  data-provide="typeahead" data-items="4" >
                                              <p class="help-block">Дарек!</p>
                                            </div>
                                          </div>
              
                                          
              
                                              
                                          
                                          <input type="hidden" value="1" name="contentId">
                                          <div class="form-actions">
                                            <button type="submit" name = "saveContact" class="btn btn-primary">Отправить</button>
                                            <button type="reset" class="btn">Отмена</button>
                                          </div>
                                        </fieldset>
                                        ';
                                    } while ($row = mysqli_fetch_array($r) );
                                }
                            
                            ?>
						 
						</form>   

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
