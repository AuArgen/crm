<?php
	require("./ok.php");

?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span style="font-size:20px; font-weight:900">Админ панел: <?php echo $_SESSION["name_office"];?></span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Админ
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Настройки учетной записи</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i><?php echo $_SESSION["fio_creater"];?></a></li>
								<li><a href="./quit.php"><i class="halflings-icon off"></i>Выйти</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Башкы бет</span></a></li>	
						<!-- <li><a href="messages.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Сообшение</span></a></li> -->
						<li><a href="./we.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Биз</span></a></li>
						<!-- <li><a href="./contact.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Контакт</span></a></li> -->
						<!-- <li><a href="tasks.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Задачи</span></a></li> -->
						<li><a href="towar.php"><i class="icon-edit"></i><span class="hidden-tablet"> Товар</span></a></li>
						<li><a href="orders.php"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Заказдар</span></a></li>
						<!-- <li><a href="seminar.php"><i class="icon-edit"></i><span class="hidden-tablet"> Семинар</span></a></li> -->
						<li><a href="admin.php"><i class="icon-edit"></i><span class="hidden-tablet"> Админ</span></a></li>
						<!-- <li><a href="form second.php"><i class="icon-edit"></i><span class="hidden-tablet"> Формы2</span></a></li> -->
						<!-- <li><a href="chart.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Чаты</span></a></li> -->
						<!-- <li><a href="gallery.php"><i class="icon-picture"></i><span class="hidden-tablet"> Галерея</span></a></li> -->
						<!-- <li><a href="calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Календарь</span></a></li> -->
						<!-- <li><a href="file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> Файловй менеджер</span></a></li> -->
						<!-- <li><a href="login.php"><i class="icon-lock"></i><span class="hidden-tablet"> </span></a></li> -->
					</ul>
				</div>
			</div>