<!DOCTYPE HTML>
<!--Diseño: Ing. Esteban Almanza González-->
<html>
	<head>
		<link rel="shortcut icon" href="images/icono-pestaña/logopestaña.ico" />
		<title>Contacto</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--Formulario-->
		<link rel="stylesheet" href="css/estilosform.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <meta name="viewport" content="width=device-width, user-scalable=no,
	 initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/estilos.css">



		<!--/formulario-->
	</head>
	<body class="no-sidebar">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<picture> <a href="#"><img class="logoprincipal" src="images/logo-pagina/logo.png" alt=""></a></picture>
					</div>
				
				<!-- Nav -->
               <div id="barra_navegacion">
           
              </div>

              <script type="text/javascript">
   
    	             $("#barra_navegacion").load('php/menu_nav.php div#iniciar-sesion');
   
              </script>
   <!-- /Nav -->

			</div>
		</div>
	<!-- Header -->

	<!-- Banner -->
		<div id="banner">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->
		

	<!-- formulario -->
		<div id="page">
       
        <div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		<hr class="border">

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>
	</div>

    


		</div>
	<!-- /formulario -->

	

	<!-- Copyright -->
		<div id="copyright" class="container">
			 <a href="platanerosoconusco.com">Asociación Agrícola de Productores de Plátano del Soconusco</a> <br>
			 contacto@platanerosoconusco.com <br>
			 +(52) 9626264013

		</div>


	</body>
</html>