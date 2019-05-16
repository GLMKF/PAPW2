<!DOCTYPE html>
<html>
<head>
    <title>DEVART - Crea una cuenta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/stylesignup.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Crea tu cuenta</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post" action="/signup" role="form">
					{{ csrf_field() }}

					<div class="form-group">
						@if ($errors->first('name'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="name" class="col-md-4 control-label">Nombre</label>

						@if ($errors->any())
							<span class="help-block">
								<strong style="color:#ff0";>{{ $errors->first('name') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input class="text" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de usuario" required="">
						
						</div>
					</div>

					<div class="form-group">
						@if ($errors->first('profile'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="profile" class="col-md-4 control-label">Escoje el tipo de perfil</label>

						@if ($errors->any())
							<span class="help-block">
								<strong style="color:#ff0";>{{ $errors->first('profile') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input type="hidden" name="default" value="default" class="form-control">
						<input class="radio" type="radio" name="profile" value="normal" required>Persona fisica (Perfil Normal)<br>
						<input class="radio" type="radio" name="profile" value="empresarial">Perfil Empresarial<br>
						
						</div>
					</div>

					<div class="form-group">
						@if ($errors->first('speciality'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="speciality" class="col-md-4 control-label">Escoje tu especialidad</label>

						@if ($errors->any())
							<span class="help-block">
								<strong style="color:#ff0";>{{ $errors->first('speciality') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input type="hidden" name="default" value="default" class="form-control">
						<input class="radio" type="radio" name="speciality" value="artista" required>Arista<br>
						<input class="radio" type="radio" name="speciality" value="desarrollador">Desarrollador<br>
						
						</div>
					</div>

					<div class="form-group">
						@if ($errors->first('email'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="email" class="col-md-4 control-label">Direccion de correo</label>

						@if ($errors->any())
							<span class="help-block">
								<strong style="color:#ff0";>{{ $errors->first('email') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input class="text" type="email" name="email" value="{{ old('email') }}" placeholder="Correo electronico" required="">
						
						</div>
					</div>

					<div class="form-group">
						@if ($errors->first('password'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="password" class="col-md-4 control-label">Contraseña</label>

						@if ($errors->any())
							<span class="help-block">
								<!-- <strong style="color:#f00";>{{ $errors->first() }}</strong> -->
								<strong style="color:#ff0";>{{ $errors->first('password') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input class="text" type="password" name="password" placeholder="Contraseña" required="">

						</div>
					</div>

					<div class="form-group">
						@if ($errors->first('password_confirmation'))
						<span style="color:#f00;">*</span>
						@endif
						<label for="password-confirmation" class="col-md-4 control-label">Confirma tu Contraseña</label>

						@if ($errors->any())
							<span class="help-block">
								<strong style="color:#ff0";>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif

						<div class="col-md-6">
						<input class="text" type="password" name="password_confirmation" placeholder="Confirma tu contraseña" required="">

						</div>
					</div>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>Acepto lo terminos y condiciones de servicio</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>¿Ya tienes cuenta? <a href="/login"> ¡Logeate!</a></p>
			</div>
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
	<!-- //main -->
</body>
</html>