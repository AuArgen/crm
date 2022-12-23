<!DOCTYPE html>
<html lang="RU">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Анализ</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
	
		<!-- start: Header -->
	<?php
require("./header.php");
?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<!-- <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Главная</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Приборная</a></li>
			</ul> -->
			
			<!-- start: Content -->
			<!-- <div id="content" class="span10"> -->
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Главная</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Сообшение	</a></li>
			</ul>


			<div class="row-fluid">
				
				<div class="span7">
					<h1>Inbox</h1>
					
					<ul class="messagesList">
						
						<?php
							$r = $conn -> query("SELECT * FROM mesages order by id desc");
							if (mysqli_num_rows($r)) {
								$row = mysqli_fetch_array($r);
								do {
									if ($row["see__content"] == '1')
										echo'
										<li>
											<a href="./messages.php?message='.$row["id"].'"><span class="from"><span class="glyphicons dislikes "><i></i></span> '.$row["fio"].'</span><span class="title">'.substr($row["message"],0,70).'...</span><span class="date">'.substr($row["dates"],0,10).', <b>'.substr($row["dates"],11,18).'</b></span>
										</li>';
									else 
									echo'
										<li>
											<a href="./messages.php?message='.$row["id"].'"><span class="from"><span class="glyphicons star"><i></i></span> '.$row["fio"].'</span><span class="glyphicons paperclip">'.substr($row["message"],0,70).'...</span><span class="date">'.substr($row["dates"],0,10).', <b>'.substr($row["dates"],11,18).'</b></span>
										</li>';
								} while ($row = mysqli_fetch_array($r));
							}
						?>
						
						
					</ul>
					<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-content">
							<ul class="list-inline item-details">
								<li><a href="http://themifycloud.com">Admin templates</a></li>
								<li><a href="http://themescloud.org">Bootstrap themes</a></li>
							</ul>
						</div>
					</div>	
				</div>
				<div class="span5 noMarginLeft">
					
					<div class="message dark">
						<?php 
							if ($_GET["message"]) {
								$id = $_GET["message"];
								$r = $conn->query("SELECT * from mesages where id ='$id'");
								if (mysqli_num_rows($r)) {
									$conn->query("UPDATE mesages SET see__content='1' WHERE id='$id'");
									$row=mysqli_fetch_array($r);
									do {
										echo'
										<div class="header">
											<h1>"'.substr($row["message"],0,70).'"...</h1>
											<div class="from"><i class="halflings-icon user"></i> <b>'.$row["fio"].'</b> / '.$row["email"].'</div>
											<div class="date"><i class="halflings-icon time"></i> '.substr($row["dates"],0,10).', <b>'.substr($row["dates"],11,18).'</b></div>
											
											<div class="menu"></div>
											
										</div>
										
										<div class="content">
										'.($row["message"]).'
										</div>
						
										
										';
									} while ($row=mysqli_fetch_array($r));
								}
							}
						?>
						
						<!-- <div class="attachments">
							<ul>
								<li>
									<span class="label label-important">zip</span> <b>bootstrap.zip</b> <i>(2,5MB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
								<li>
									<span class="label label-info">txt</span> <b>readme.txt</b> <i>(7KB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
								<li>
									<span class="label label-success">xls</span> <b>spreadsheet.xls</b> <i>(984KB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
							</ul>		
						</div> -->
						
						<form class="replyForm"method="post" action="">

							<fieldset>
								<textarea tabindex="3" class="input-xlarge span12" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>

								<div class="actions">
									
									<button tabindex="3" type="submit" class="btn btn-success">Send message</button>
									
								</div>

							</fieldset>

						</form>	
						
					</div>	
					
				</div>
						
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
