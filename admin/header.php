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
				<a class="brand" href="index.html"><span>Админ панел <?php echo $_SESSION["name_office"];?></span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								7 </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>У вас 11 новых сообшении</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">Новая регистрация аккаунта</span>
										<span class="time">1 мин</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">Новый коментарии</span>
										<span class="time">7 мин</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">Новая регистрация аккаунта</span>
										<span class="time">вчера</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>Просмотреть все уведомления</a>
								</li>	
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>У вас есть 17 задач в работе</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS разработка</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android разработка</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM разработка</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM разработка</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM разработка</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">Посмотреть все задачи</a>
								</li>	
							</ul>
						</li>
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>У вас 9 сообщений</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 мин
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                        
								<li>
                            		<a class="dropdown-menu-sub-footer">Просмотреть все сообщения</a>
								</li>	
							</ul>
						</li>
						
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