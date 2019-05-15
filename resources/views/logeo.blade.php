<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <title>DevArt - Comunica tu talento sin perderlo</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    <script src="js/login.js"></script>

    </head>

<body>

    <div class="login-page">
    <div class="form">
        <form class="login-form" role="form" method="post" action="/login" accept-charset="UTF-8" id="login-nav">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail2">Correo Electronico</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="exampleInputEmail2" placeholder="Correo Electronico" required/>
            </div>
            @if ($errors->any())
                <span class="help-block">
                    <strong class="danger">{{ $errors->first() }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Contraseña" required>
                <div class="help-block text-right"><a href="">Olvide la contraseña</a></div>
            </div>
            @if ($errors->any())
                <span class="help-block">
                    <!-- <strong>{{ $errors->first() }}</strong> -->
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
        </div>
        </form>
        <p class="message">¿Aun no tienes cuenta? <a href="/signup">Create an account</a></p>
    </div>
    <!-- copyright -->
		<div class="colorlibcopy-agile">
			<!--<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>-->
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
    </div>

</body>

</html>