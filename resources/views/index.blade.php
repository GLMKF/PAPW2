<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>DevArt - Comunica tu talento sin perderlo</title>
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
            <a class="navbar-brand" href="/"><img src="images/DEVART Logo.png" alt="Logo"></a>

                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><a href="/">Pagina Principal</a></li>
                    <li><a href="#about_page">Nosotros</a></li>
                    <li><a href="#features_page">Flujo de trabajo</a></li>
                    <li><a href="#gallery_page">App</a></li>
                    <!--<li><a href="#price_page">Roles</a></li>-->
                    <li><a href="#questions_page">FAQ</a></li>
                    <li><a href="/trends">Tendencias</a></li>
                    <li><a href="#contact_page">Contacto</a></li>
                </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Acceder</b> <span class="caret"></span></a>
			        <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                    <div class="col-md-12">
                                        Accede via
                                        <!-- <div class="social-buttons">
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        o -->
                                        <form class="form" role="form" method="post" action="{{ route('login') }}" accept-charset="UTF-8" id="login-nav">
                                            {{ csrf_field() }}
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Correo Electronico</label>
                                                    <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Email address" required>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                    <div class="help-block text-right"><a href="">Olvide la contraseña</a></div>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
                                                </div>
                                                <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        ¿Eres nuevo? <a href="/signup"><b>Unete</b></a>
                                    </div>
                            </div>
                        </li>
			        </ul>
                </li>
        <ul class="nav navbar-nav navbar-right">
        </ul>
                <!-- <div class="right-button hidden-xs">
                    <form action="/login">
                        <input type="text" placeholder="Logeate" name="username">
                        <input type="text" placeholder="Password" name="psw">
                        <button type="submit">Acceder</button>
                    </form>
                    <a href="/signup">¿No tienes cuenta? Registrate</a>
                </div> -->
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-sm col-md-5">
                    <figure class="mobile-image wow fadeInUp" data-wow-delay="0.2s">
                        <img src="images/header-mobile.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="space-80 hidden-xs"></div>
                    <h1 class="wow fadeInUp" data-wow-delay="0.4s">Comienza tu portafolio ahora o busca gente para tu negocio.</h1>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>La red social que te permite crear un portafolio de todo tu contenido de trabajo facilitando la visualizacion
                         de éste a personas que andan buscando talento.</p>
                    </div>
                    <div class="space-20"></div>
                    <a href="#" class="bttn-white wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-user"></i>¡Registrate ahora!</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Home-Area-End -->
    <!-- About-Area -->
    <section class="section-padding" id="about_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="page-title text-center">
                        <img src="images/DEVART-App-Logo.png" alt="About Logo">
                        <div class="space-20"></div>
                        <h5 class="title">Acerca de DevArt</h5>
                        <div class="space-30"></div>
                        <h3 class="blue-color">Somos la herramienta que ajusta el contenido que creas por hobby o necesidad para que 
                        otros puedan verlo, organizarse en equipo y ayudar a emprender un negocio.</h3>
                        <div class="space-20"></div>
                        <p>Nuestro compromiso es generar equipos de trabajo proporcionando una muestra del talento de cada usuario 
                        centralizado en su perfil de forma que se adapte a su contenido ya sea arte o programacion, todo esto a 
                        traves de un entorno amistoso en una red social que lo cubra acertadamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-Area-End -->
    <!-- Progress-Area -->
    <section class="progress-area gray-bg" id="progress_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="page-title section-padding">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Nuestra Mision</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Ser la red social de trabajo mas comoda de internet</h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <p>La idea de nuestro sitio es que te sientas tranquilo subiendo tu contenido proporcionando seguridad a tu
                             proyecto si tu asi lo deseas o, si lo tuyo es compartir soluciones con los demas, hacer tus proyectos publicos.</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-users"></i>!Unete ya!</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <figure class="mobile-image">
                        <img src="images/progress-phone.png" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- Progress-Area-End -->
    <!-- Video-Area -->
    <section class="video-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="video-photo">
                        <img src="images/video-image.jpg" alt="">
                        <a href="https://www.youtube.com/watch?v=ScrDhTsX0EQ" class="popup video-button">
                            <img src="images/play-button.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">El flujo de nuestra plataforma</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Comoda y facil forma de crecer</h3>
                        <div class="space-20"></div>
                        <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                            <p>En DevArt buscamos proporcionar las herramientas que necesitas para llegar a otro nivel de relaciones 
                            con los demas. !Por eso nos encargamos de brindarte un ambiente amistoso con gente como tu!</p>
                        </div>
                        <div class="space-50"></div>
                        <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-home"></i>Informate sobre nosotros</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video-Area-End -->
    <!-- Feature-Area -->
    <section class="feature-area section-padding-top" id="features_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h5 class="title">Caracteristicas del portal</h5>
                        <div class="space-10"></div>
                        <h3>Somos de alcance mundial</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-rocket"></i>
                        </div>
                        <h4>Visualizaciones rapidas y eficientes</h4>
                        <p>Todo tu contenido es mostrado en una forma de burbuja-poligono en base a tu configuracion de seguridad.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-paperclip"></i>
                        </div>
                        <h4>Comparte tu perfil como Curriculum</h4>
                        <p>¡Tu perfil tambien funciona como portafolio, aprovechalo!</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cloud-download"></i>
                        </div>
                        <h4>Enlaza tu nube</h4>
                        <p>Puedes enlazar tus proyectos a la nube para mayor seguridad.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
                <div class="hidden-xs hidden-sm col-md-4">
                    <figure class="mobile-image">
                        <img src="images/feature-image-copia.png" alt="Feature Photo">
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Notificaciones de trabajo</h4>
                        <p>Empresas y equipos pueden solicitar tus habilidades y reclutarte.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Pagina responsiva</h4>
                        <p>Nuestra pagina esta preparada para usarse tanto en celulares como en equipos de computo.</p>
                    </div>
                    <div class="space-60"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Edita y limita tu informacion</h4>
                        <p>Puedes escoger a que mercados quieres hacerte conocer si buscan gente.</p>
                    </div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature-Area-End -->
    <!-- Testimonial-Area -->
    <section class="testimonial-area" id="testimonial_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Ultimos equipos conformados</h5>
                        <h3 class="dark-color">¡Cada dia hay nuevos equipos!</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="team-slide">
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Pets World - Minimalist.jpg" alt="">
                            </div>
                            <h4>Pets World - Minimalist</h4>
                            <h6 class="position">Art Directors Team</h6>
                            <p>Equipo de arte enfocado a crear dibujos de mascotas minimalistas</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Today's Code.jpg" alt="">
                            </div>
                            <h4>Today's Code</h4>
                            <h6 class="position">Software Dev Team</h6>
                            <p>Grupo para realizar codigo cada semana para herramientas de hoy en dia.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Sunflower Corp.png" alt="">
                            </div>
                            <h4>Sunflower Corp.</h4>
                            <h6 class="position">Software Dev Team</h6>
                            <p>Nuestro grupo busca desarrollar codigo a partir de la logica de programacion orientada a objetos.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Mini wild goats studio.jpg" alt="">
                            </div>
                            <h4>Mini wild Goats Studio</h4>
                            <h6 class="position">Software & Art Studio</h6>
                            <p>Organismo de personas para la creacion de videojuegos en computadora</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Atavistic Paws Corp.png" alt="">
                            </div>
                            <h4>Atavistic Paws Org.</h4>
                            <h6 class="position">Organization</h6>
                            <p>Organismo de personas dedicadas al estudio de videojuegos y el desarrollo de los mismos.</p>
                        </div>
                        <div class="team-box">
                            <div class="team-image">
                                <img src="images/Digital models.jfif" alt="">
                            </div>
                            <h4>Digital models</h4>
                            <h6 class="position">Digital Art Team</h6>
                            <p>Equipo de trabajo especializado en vectorizaciones y dibujos hechos en wacom.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial-Area-End -->
    <!-- Gallery-Area -->
    <section class="gallery-area section-padding" id="gallery_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 gallery-slider">
                    <div class="gallery-slide">
                        <div class="item"><img src="images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-3.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-4.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-1.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-2.jpg" alt=""></div>
                        <div class="item"><img src="images/gallery-3.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-3">
                    <div class="page-title">
                        <h5 class="white-color title wow fadeInUp" data-wow-delay="0.2s">¡Aplicacion movil proximamente!</h5>
                        <div class="space-10"></div>
                        <h3 class="white-color wow fadeInUp" data-wow-delay="0.4s">Muy pronto nuestra aplicacion llegara a ti con mejoras al sitio</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>La aplicacion esta en construccion pero eso no limita el desempeño ya que desde el navegador de tu smartphone puedes acceder
                         y es totalmente comodo.</p>
                    </div>
                    <div class="space-50"></div>
                    <a class="bttn-default wow fadeInUp" data-wow-delay="0.8s">Esperalo</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery-Area-End -->
    <!-- How-To-Use -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="page-title">
                        <h5 class="title wow fadeInUp" data-wow-delay="0.2s">Nuestro Sitio</h5>
                        <div class="space-10"></div>
                        <h3 class="dark-color wow fadeInUp" data-wow-delay="0.4s">Nuestra vision es mostrarte un diseño simple y claro</h3>
                    </div>
                    <div class="space-20"></div>
                    <div class="desc wow fadeInUp" data-wow-delay="0.6s">
                        <p>El sitio fue diseñado para que estes comodo durante tu estadia en los grupos que en la red social te puedes encontrar
                         y ser lo suficientemente claro para todos.</p>
                    </div>
                    <div class="space-50"></div>
                    <a href="#" class="bttn-default wow fadeInUp" data-wow-delay="0.8s"><i class="lnr lnr-eye"></i>Consulta nuestras bases</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
                    <div class="space-60 hidden visible-xs"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-clock"></i>
                        </div>
                        <h4>Notificaciones inteligentes</h4>
                        <p>Sabemos lo importante que son tus proyectos por eso te notificamos si hubo cambios en ellos.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-laptop-phone"></i>
                        </div>
                        <h4>Totalmente responsivo</h4>
                        <p>Al ser totalmente responsiva no tendras problemas de visualizar tu perfil en cualquier dispositivo.</p>
                    </div>
                    <div class="space-50"></div>
                    <div class="service-box wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="lnr lnr-cog"></i>
                        </div>
                        <h4>Configuracion ajustable</h4>
                        <p>Puedes cambiar configuraciones personales o incluso de los grupos dentro de la red social.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How-To-Use-End -->
    <!-- Download-Area -->
    <div class="download-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 hidden-sm">
                    <figure class="mobile-image">
                        <img src="images/download-image.png" alt="">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-6 section-padding">
                    <h3 class="white-color">Proximamente nuestra app</h3>
                    <div class="space-20"></div>
                    <p>Cuando este disponible nuestra app podras descargarla de los siguientes destinos:</p>
                    <div class="space-60"></div>
                    <!--<a href="#" class="bttn-white sq">-->
                    <a class="bttn-white sq"><img src="images/apple-icon.png" alt="apple icon"> Apple Store</a>
                    <!--<a href="#" class="bttn-white sq">-->
                    <a class="bttn-white sq"><img src="images/play-store-icon.png" alt="Play Store Icon"> Play Store</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Download-Area-End -->
    <!--Price-Area -->
    <!--<section class="section-padding price-area" id="price_page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Pricing Plan</h5>
                        <h3 class="dark-color">Our Awesome Pricing Plan</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-rocket"></span>
                            </div>
                            <h4 class="upper">Free</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Uniqe Elements</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">0</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-diamond"></span>
                            </div>
                            <h4 class="upper">Medium</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Free Forever</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">49</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-box">
                        <div class="price-header">
                            <div class="price-icon">
                                <span class="lnr lnr-pie-chart"></span>
                            </div>
                            <h4 class="upper">Business</h4>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li>Easy Installations</li>
                                <li>Unlimited support</li>
                                <li>Free Forever</li>
                            </ul>
                        </div>
                        <div class="price-rate">
                            <sup>&#36;</sup> <span class="rate">99</span> <small>/Month</small>
                        </div>
                        <div class="price-footer">
                            <a href="#" class="bttn-white">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Price-Area-End -->
    <!--Questions-Area -->
    <section id="questions_page" class="questions-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">FAQ</h5>
                        <h3 class="dark-color">Frequently Asked Questions</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="toggole-boxs">
                        <h3>¿Quienes somos?</h3>
                        <div>
                            <p>Somos una entidad en internet que facilita tu portafolio y tus esfuerzos de encontrar gente como tu para trabajos con el mismo giro que el tuyo</p>
                        </div>
                        <h3>¿Como genero mi portafolio?</h3>
                        <div>
                            <p>La red social se encarga de permitirte compartir codigo entre tus listas de amigos permitiendo mostrar tus destrezas en las areas que dominas o incursionas.</p>
                        </div>
                        <h3>¿La pagina permite ver aportes de mi portafolio en linea?</h3>
                        <div>
                            <p>Si, tu portafolio puede ser compartido con nuestra pagina de inicio y tendencias siempre y cuando tengas habilitada la opcion en tu cuenta, de otra forma el material que aportes solo sera visible a tu lista de amigos y equipos de trabajo.</p>
                        </div>
                        <h3>¿Solo puedo ser artista o desarrollador?</h3>
                        <div>
                            <p>Tu elijes que ser, lo ideal seria destacar tu mejor lado ya que puedes ser buscado para un trabajo en cualquier momento pero el objetivo de la pagina es eliminar los foros para dar paso a una red de personas que te ayude a mejorar o realicen cosas juntos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="space-20 hidden visible-xs"></div>
                    <div class="toggole-boxs">
                        <h3>¿Quien puede ver mi portafolio?</h3>
                        <div>
                            <p>Existen 2 modalidades, publica y privada, dependiendo de tu giro puedes escoger cualquiera de las 2.</p>
                        </div>
                        <h3>¿Existen empresar reclutadoras?</h3>
                        <div>
                            <p>Si existen y son las principales cuentas que solicitan perfiles de usuarios para posibles reclutaciones, puedes permitir o denegar que las empresas soliciten tu apoyo.</p>
                        </div>
                        <h3>¿Como funcionan los equipos de trabajo?</h3>
                        <div>
                            <p>Cada equipo de trabajo puede relacionarse acorde a tu lista de amigos y entre tus amigos puedes crear un equipo de trabajo commo si se tratara de un grupo con descripcion y giro.</p>
                        </div>
                        <h3>¿Existe algun costo en algun tipo de cuenta en especifico?</h3>
                        <div>
                            <p>Por el momento no existe costo por ninguna de las diferentes cuentas que se pueden crear, por lo que te puedes registrar sin costo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Questions-Area-End -->
    <!-- Subscribe-Form -->
    <div class="subscribe-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="subscribe-form text-center">
                        <h3 class="blue-color">Subscribete a nuestro boletin diario</h3>
                        <div class="space-20"></div>
                        <form id="mc-form">
                            <input type="email" class="control" placeholder="Introduce tu correo" required="required" id="mc-email">
                            <button class="bttn-white active" type="submit"><span class="lnr lnr-location"></span> Subscribir</button>
                            <label class="mt10" for="mc-email"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe-Form-Area -->
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Contacto</h5>
                            <h3 class="dark-color">- Contactanos -</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p>Av. Vicente Guerrero 2004 <br /> Monterrey N.L. Mexico </p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p>+52 8111831493</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p>gamalama050496@gmail.com <br /> gamalama050496@hotmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="lnr lnr-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></span>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Acerca de</a></li>
                                <li><a href="#">Servicios</a></li>
                                <li><a href="#">Caracteristicas</a></li>
                                <li><a href="#">Costos</a></li>
                                <li><a href="#">Asociados</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
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
</body>

</html>
