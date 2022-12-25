<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NN550CZQVH"></script>


<!doctype html>
<html class="no-js" lang="">
    <head>
    	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NN550CZQVH"></script>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>САПАТ ДЕПОРТАМЕНТТИ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
		<!-- slicknav.min.css -->
        <link rel="stylesheet" href="assets/css/slicknav.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/calendar.css">

        <style type="text/css">
            body{
                background-image: url("./assets/images/background.jpg");
            }
        </style>
		<!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

		<!-- heared area start -->
             <?php include ("includes/header.php"); ?>
		<!-- heared area end -->

		<!-- slider area start -->
		<!-- <section class="slider-area">
			<div class="slider-active2 slider-next-prev-style">
				<div class="slider-items">
					<img src="assets/images/slider/01.jpg" alt="" class="slider">
					<div class="slider-content text-center">
						<div class="table">
							<div class="table-cell">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-md-8 col-md-offset-2">
											<h2>Биздин сайтка куш келипсиз</h2>
											<p>Программист — бул программанын баштапкы кодун түзүүчү адис. Мындай программа компьютердин иштөө тутуму, видео оюну, веб же мобилдик тиркеме, ал тургай микротолкундуу иштөө алгоритми болушу мүмкүн.</p>
											<ul>
												<li><a href="janylyk.php">Кененирээк окуу</a></li>
												<li><a href="#">Өтүү</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slider-items">
					<img src="assets/images/slider/02.jpg" alt="" class="slider">
					<div class="slider-content text-center">
						<div class="table">
							<div class="table-cell">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-md-8 col-md-offset-2">
											<h2>Биздин сайтка куш келипсиз</h2>
											<p>Бүгүнкү күндө IT тармагындагы адистерге болгон суроо талап күн сайын өсүп бара жатандыгы белгилүү. Көпчүлүк жумуштар санариптешүүгө өтүп, технологиялар коомдо басымдуу роль ойноп жаткандыктан, бул кесиптин алдыңкы 10 жылда келечеги кең. </p>
											<ul>
												<li><a href="#">Кененирээк окуу</a></li>
												<li><a href="#">Өтүү</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    -->
		<!-- slider area end -->

		<!-- center start -->
        <div id="block-left-bg" class="container">
            <div class="row">
               <div class="col-md-12">
                   <?php include("./includes/left-menu.php") ?>

                   <div id="ak-center" class="col-md-9">
                        <!-- blog-area start -->
                    <div class="col-md-12 col-xs-12">
                        <div class="row">

                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="index.php">Башкы бет</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Маалыматтар</li>
                                        </ol>
                                    </nav>
                            <?php
                            if (isset($_POST["btnSearch"])) {
                                $w = $_POST["search"];
                                for ($i = 0; $i < sizeof($names); $i++) {
                                    $getNames = $names[$i];
									$getDataName = $dataName[$i];
									$getLinkName = $linkName[$i];
                                    $r = $conn->query("SELECT * FROM $getDataName where theme like '%$w%' limit 2");
                                    if (mysqli_num_rows($r)) {
                                        $row = mysqli_fetch_array($r);
                                        do {
                                            echo'
                                            <div class="col-sm-6 col-xs-12 col">
                                                <div class="blog-wrap mb-30">
                                                <a href="readMore.php?'.$getLinkName.'='.$row["id"].'">
                                                    <div class="blog-img">
                                                        <img src="./admnika8/'.$row["image"].'" alt="" />
                                                    </div></a>
                                                    <div class="blog-content">
                                                        <div class="blog-meta">
                                                        <a href="./readMore.php?'.$getLinkName.'='.$row["id"].'" style="font-size:15px"> '.substr($row["theme"],0,45).'...
                                                            <p style="font-size:13px">'.substr($row["small__content"],0,90).'</p>
                                                            </a>
                                                            <ul>
                                                                <li><i class="fa fa-eye"></i> '.$row["show__content"].'</li>
                                                                <li><i class="fa fa-comment"></i> '.$row['post_content'].' Пикир</li>
                                                                <li><i class="fa fa-calendar"></i> '.$row["date__content"].'</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            ';
                                        } while ($row = mysqli_fetch_array($r));
                                    }
                                    
                                }
                            }

                            ?>
                                <hr>
                            <?php
                            for ($i = 0; $i < sizeof($names); $i++) {
                                $getNames = $names[$i];
                                $getDataName = $dataName[$i];
                                $getLinkName = $linkName[$i];
                                $r = $conn->query("SELECT * FROM $getDataName where adding='1' order by id desc ");
                                if (mysqli_num_rows($r)) {
                                    $row = mysqli_fetch_array($r);
                                    do {
                                        echo'
                                        <div class="col-sm-6 col-xs-12 col">
                                            <div class="blog-wrap mb-30">
                                            <a href="readMore.php?'.$getLinkName.'='.$row["id"].'">
                                                <div class="blog-img">
                                                    <img src="./admnika8/'.$row["image"].'" alt="" />
                                                </div></a>
                                                <div class="blog-content">
                                                    <div class="blog-meta">
                                                    <a href="./readMore.php?'.$getLinkName.'='.$row["id"].'" style="font-size:15px"> '.substr($row["theme"],0,45).'...
                                                        <p style="font-size:13px">'.substr($row["small__content"],0,90).'...</p>
                                                        </a>
                                                        <ul>
                                                            <li><i class="fa fa-eye"></i> '.$row["show__content"].'</li>
                                                            <li><i class="fa fa-comment"></i> '.$row['post_content'].' Пикир</li>
                                                            <li><i class="fa fa-calendar"></i> '.$row["date__content"].'</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        ';
                                    } while ($row = mysqli_fetch_array($r));
                                }
                            }
                            
                            ?>
                            
                        
                        
                            
                            
                           
                        </div>
                    </div>
        <!-- blog-area end -->

                   </div>

               </div>
           </div>
       </div>

<!-- center start end -->
   

		<!-- fanfact-area start -->
	

		

		<!-- footer-area start  -->
		<?php include ("./includes/footer.php") ?>
		<!-- footer-area end  -->





    </body>
</html>
