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
					<a href="./">Главная</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Новости</a></li>
			</ul>
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			

			<div class="row-fluid sortable">
				<?php
				echo'
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Новости</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <fieldset>

							  ';
				
								if ($_GET["news"]) {
									$id = $_GET["news"];
									$r = $conn -> query("select * from id where id =$id");
									$n = mysqli_num_rows($r);
								}else if ($_GET["seminar"]) {
									$id = $_GET["seminar"];
									$r = $conn -> query("select * from seminar where id =$id");
									$n = mysqli_num_rows($r);
								}else if ($_GET["konferensia"]) {
									$id = $_GET["konferensia"];
									$r = $conn -> query("select * from konferensia where id =$id");
									$n = mysqli_num_rows($r);
								}else if ($_GET["teacher"]) {
									$id = $_GET["teacher"];
									$r = $conn -> query("select * from we where id =$id");
									$n = mysqli_num_rows($r);
								}
							  
							  if (mysqli_num_rows($r)>0) {

								$row = mysqli_fetch_array($r);
								if ($_GET["teacher"]) {
									do {
										# code...
									
									echo'
									<div class="control-group">
							  <label class="control-label" for="fio">Аты жөнү </label>
							  <div class="controls">
								<input type="text" required class="span6 typeahead" name="fio" id="fio"  data-provide="typeahead" data-items="4" value="'.$row["fio"].'">
								<p class="help-block">Аты жөнү </p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="lesson">Берген сабакгы</label>
							  <div class="controls">
								<input type="text" required maxLength="" name = "lesson" class="span6 lesson" id="lesson"  data-provide="typeahead" data-items="4" value="'.$row["lesson"].'">
								<p class="help-block">Берген сабакгы</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="instagram">Instagram</label>
							  <div class="controls">
								<input type="text" required maxLength="" name = "instagram" class="span6 lesson" id="instagram"  data-provide="typeahead" data-items="4" value="'.$row["instagram"].'">
								<p class="help-block">Instagram</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="whatsapp">Whatsapp</label>
							  <div class="controls">
								<input type="text" required maxLength="" name = "whatsapp" class="span6 lesson" id="whatsapp"  data-provide="typeahead" data-items="4" value="'.$row["whatsapp"].'">
								<p class="help-block">Whatsapp</p>
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="facebook">Facebook</label>
							  <div class="controls">
								<input type="text" required maxLength="" name = "facebook" class="span6 lesson" id="facebook"  data-provide="typeahead" data-items="4" value="'.$row["facebook"].'">
								<p class="help-block">Facebook</p>
							  </div>
							</div>

						

							<div class="control-group">
							  <label class="control-label" for="fileInput">Сүрөттү</label>
							  <div class="controls">
								<input class="" id="" type="file" name="images"  />
								<img src="./'.$row["image"].'" width=340>
								<input type="hidden" value="'.$row["image"].'" name="dontUpImg">
								<input type="hidden" value="'.$row["file"].'" name="dontUpFile">
							  </div>
							</div>       
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Резюме</label>
							  <div class="controls">
								<input class="" id="" type="file" name="uploaded"  />
								<a href="./'.$row["file"].'" target="_blank"> Резюме</a>
							  </div>
							</div>   
							
                            <input type="hidden" value="1" name="contentId">
							<div class="form-actions">
							  <button type="submit" name = "updateTeacher" class="btn btn-primary">Отправить</button>
							  <button type="reset" class="btn">Отмена</button>
							</div>
									
									';
								} while ($row=mysqli_fetch_array($r));
								}
								else
								do {
									echo'
									<div class="control-group">
									<label class="control-label" for="typeahead">Заголовок </label>
									<div class="controls">
								<input type="text" value="'.$row["theme"].'" required class="span6 typeahead" name="theme__content" id="typeahead"  data-provide="typeahead" data-items="4" value="'.$row["fio"].'"data-source="["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]">
								<p class="help-block">Заголовок вашего текста!</p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Коротко текст...</label>
							  <div class="controls">
								<input type="text" value="'.$row["small__content"].'" required maxLength="100" name = "small__content" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="'.$row["fio"].'"data-source="["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]">
								<p class="help-block">Коротко текст вашего контентта!</p>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Дата</label>
							  <div class="controls">
								<input type="text" value="'.$row["date__content"].'" required class="input-xlarge datepicker" name="date" id="date01" placeholder = "31.12.2022">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Загрузите избражение для контентта</label>
							  <div class="controls">
								<input class="" id="file" type="file" name="images"  />
								<span id = "fileImg">
								<img src="./'.$row["image"].'" width= 300>
								<input type="hidden" value = "'.$row["image"].'" name="dontUpImg">
								</span>
							</div>

							</div>          
							<div class=" hidden-phone">
							  <div class="">
								<textarea value="" required class="" id="editor1" name="full__content" placeholder = "Больще информация">
								'.$row["full__content"].'
								</textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" name = "saveUpdate" class="btn btn-primary">Отправить</button>
							  <button type="reset" class="btn">Отмена</button>
							</div>';
						} while ($row = mysqli_fetch_array($r));
					} 

							echo '
						  </fieldset>
						</form>   

					</div>
				</div>';

	
	
	
	
	
	
	
	
	
				?>
	
	
	
				
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
		document.querySelector("#file").onchange = ()=> {
			document.querySelector("#fileImg").innerHTML = ""
		}
                

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
