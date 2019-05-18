<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>DevArt - Mi Perfil</title>
	<!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Project-Plugins-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Project-Main-Stylesheets -->
	<link rel="stylesheet" href="css/normalize.css">
	<!-- Window-Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">
	<!-- Window-Stylesheets -->
	<link href="common-css/ionicons.css" rel="stylesheet">
	<link href="common-css/fluidbox.min.css" rel="stylesheet">
	<link href="css/stylesCV.css" rel="stylesheet">
	<link href="css/responsiveCV.css" rel="stylesheet">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	
</head>
<body data-spy="scroll" data-target=".mainmenu-area">
	<!-- Preloader-content -->
    <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div>
	<!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="images/DEVART Logo.png" alt="Logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li><a href="/trends">Inicio</a></li>
                    <li><a href="/profile">Mi Perfil</a></li>
                    <li>
                        <a href="/logout"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Cerrar Sesion
                        </a>
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
	<!-- intro-section -->
	<section class="intro-section">
		<div class="container">
		<form method="post" action="/editprofilefirst" role="form">
			<div class="heading-wrapper">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-location-outline"></i>
							<div class="right-area">
							<!-- Ubicacion -->
								<input class="text" type="text" name="city_cp" value="{{ old('adress') }}" placeholder="Ciudad y C.P.">
								<input class="text" type="text" name="country" value="{{ old('adressInfo') }}" placeholder="Municipio y Estado">
								<!-- <h5>3008 Sarah Drive</h5>
								<h5>Franklin,LA 70538</h5> -->
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->
					
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-telephone-outline"></i>
							<div class="right-area">
							<!-- Telefono -->
								<input class="text" type="nunmber" name="cellphone" value="{{ old('cellphone') }}" placeholder="Telefono" pattern="/d*">
								<input class="text" type="text" name="shedule" value="{{ old('cellphoneInfo') }}" placeholder="Horarios de atencion">
								<!-- <h5>337-4139538</h5>
								<h6>MIN - FRI,8AM - 7PM</h6> -->
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->
					
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="info">
							<i class="icon ion-ios-chatboxes-outline"></i>
							<div class="right-area">
							<!-- Correo -->
								<h5>{{$dataUser->email}}</h5>
								<input class="text" type="text" name="reply" value="{{ old('reply') }}" placeholder="Respondo en 24 horas">
								<!-- <h6>REPLY IN 24 HOURS</h6> -->
							</div><!-- right-area -->
						</div><!-- info -->
					</div><!-- col-sm-4 -->
				</div><!-- row -->
			</div><!-- heading-wrapper -->
			
		
		
			<div class="intro">
				<div class="row">
				
					<div class="col-sm-8 col-md-4 col-lg-3">
						<div class="profile-img margin-b-30"><img src="images/profile-1-250x250.jpg" alt=""></div>
					</div><!-- col-sm-8 -->
					
					<div class="col-sm-10 col-md-5 col-lg-6">	
						
							<h2><b>{{$dataUser->name}}</b></h2>
								<input class="text" type="text" name="position" value="{{ old('position') }}" placeholder="Puesto que desempeño (Ing, Lic, etc)">
							<!-- <h4 class="font-yellow">Key Account Manager</h4> -->
							<ul class="information margin-tb-30">
								<li><b class="font-yellow">FECHA DE NACIMIENTO</b> :  <input class="text" type="date" name="birthdate" value="{{ old('birthdate') }}" placeholder="Date" required="" onfocus="(this.type='date')"></li>
								<li><b class="font-yellow">EMAIL</b> : {{$dataUser->email}}</li>
								<li><b class="font-yellow">SITUACION MARITAL</b> : <input class="text" type="text" name="statusmarital" value="{{ old('statusmarital') }}" placeholder="Casado(a), soltero(a), viudo(a), etc"></li>
							</ul>
							<ul class="social-icons">
								<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
								<li><a href="#"><i class="ion-social-linkedin"></i></a></li>
								<li><a href="#"><i class="ion-social-instagram"></i></a></li>
								<li><a href="#"><i class="ion-social-facebook"></i></a></li>
								<li><a href="#"><i class="ion-social-twitter"></i></a></li>
								<div id="Edit_SN">
									<input style="width:350px; display: block;" class="text" type="text" name="urlPinterest" value="{{ old('urlPinterest') }}" placeholder="Coloca el link directo a tu perfil Pinterest"></b>
									<input style="width:350px; display: block;" class="text" type="text" name="urlLinkedin" value="{{ old('urlLinkedin') }}" placeholder="Coloca el link directo a tu perfil LinkedIn"></b>
									<input style="width:350px; display: block;" class="text" type="text" name="urlInstagram" value="{{ old('urlInstagram') }}" placeholder="Coloca el link directo a tu perfil Instagram"></b>
									<input style="width:350px; display: block;" class="text" type="text" name="urlFacebook" value="{{ old('urlFacebook') }}" placeholder="Coloca el link directo a tu perfil Facebook"></b>
									<input style="width:350px; display: block;" class="text" type="text" name="urlTwitter" value="{{ old('urlTwitter') }}" placeholder="Coloca el link directo a tu perfil Twitter"></b>
								</div>
							</ul>
					</div><!-- col-sm-8 -->
					
					<div class="col-sm-10 col-md-3 col-lg-3">
						<!-- <a class="downlad-btn" href="#">Download CV</a> -->
					</div><!-- col-lg-2 -->
			
				</div><!-- row -->
			
			</div><!-- intro -->
		</div><!-- container -->
	</section><!-- intro-section -->
	
	<section id="applng" class="about-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<div class="heading">
						<h3><b>Acerca de mi</b></h3>
						<h6 class="font-lite-black"><b>AMBITO PROFESIONAL</b></h6>
					</div>
				</div><!-- col-sm-3 -->
				<div class="col-sm-12 col-md-9">

					<programming-lng :email="'{{$dataUser->email}}'"></programming-lng>
				
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- about-section -->
	
	<section id="appXperience" class="experience-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<div class="heading">
						<h3><b>Experiencia de Trabajo</b></h3>
						<h6 class="font-lite-black"><b>TRABAJOS PREVIOS</b></h6>
					</div>
				</div><!-- col-sm-3 -->
				<div class="col-sm-12 col-md-9">
				
				<work-xperience :email="'{{$dataUser->email}}'"></work-xperience>
					
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- experience-section -->
	
	<section class="portfolio-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<div class="heading">
						<h3><b>Portfolio</b></h3>
						<h6 class="font-lite-black"><b>MY WORK</b></h6>
					</div>
				</div><!-- col-sm-3 -->
				
				<div class="col-sm-12 col-md-9">
					<div class="portfolioFilter clearfix margin-b-80">
						<a href="#" data-filter="*" class="current"><b>ALL</b></a>
						<a href="#" data-filter=".web-design"><b>WEB DESIGN</b></a>
						<a href="#" data-filter=".branding"><b>BRANDING</b></a>
						<a href="#" data-filter=".graphic-design"><b>GRAPHIC DESIGN</b></a>
					</div><!-- portfolioFilter -->
				</div><!-- col-sm-8 -->
			</div><!-- row -->
			
			<div class="portfolioContainer  margin-b-50">
				
				<div class="p-item web-design">
					<a href="images/portfolio-13-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-13-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item branding graphic-design">
					<a href="images/portfolio-14-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-14-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item web-design">
					<a href="images/portfolio-15-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-15-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item graphic-design">
					<a class="img" href="images/portfolio-16-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-16-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item branding graphic-design">
					<a href="images/portfolio-17-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-17-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item graphic-design web-design">
					<a href="images/portfolio-18-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-18-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
				
				<div class="p-item  graphic-design branding">
					<a href="images/portfolio-19-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-19-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
					
				<div class="p-item web-design branding">
					<a href="images/portfolio-20-400x400.jpg" data-fluidbox>
						<img src="images/portfolio-20-400x400.jpg" alt=""></a>
				</div><!-- p-item -->
			
			</div><!-- portfolioContainer -->
		</div><!-- container -->
	</section><!-- portfolio-section -->
	
	<section id="appEducation" class="education-section section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<div class="heading">
						<h3><b>Education</b></h3>
						<h6 class="font-lite-black"><b>ACADEMIC CAREER</b></h6>
					</div>
				</div><!-- col-sm-3 -->
				<div class="col-sm-12 col-md-9">
				<education :email="'{{$dataUser->email}}'"></education>
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
		
	</section><!-- education-section -->
	
	<input type="submit" value="SIGNUP">
	</form>
	
	<footer>
		<p class="copyright">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</p>
	</footer>
	
	
	<!-- SCIPTS -->
	<script src="common-js/jquery-3.2.1.min.js"></script>
	
	<script src="common-js/tether.min.js"></script>
	
	<script src="common-js/bootstrap.js"></script>
	
	<script src="common-js/isotope.pkgd.min.js"></script>
	
	<script src="common-js/jquery.waypoints.min.js"></script>
	
	<script src="common-js/progressbar.min.js"></script>
	
	<script src="common-js/jquery.fluidbox.min.js"></script>
	
	<script src="common-js/scripts.js"></script>

	<!--Vendor-JS-->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/jquery-ui.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/ajaxchimp.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="js/main.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	
</body>
</html>