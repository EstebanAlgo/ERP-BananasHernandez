<?php require('../php/conexion.php') ?>
<!DOCTYPE HTML>
<!--Diseño: Ing. Esteban Almanza González-->
<html>
	<head>
		<link rel="shortcut icon" href="../images/icono-pestaña/logopestaña.ico" />
		<title><?php echo "$usuario"; ?></title>
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



		<!--/formulario-->
	</head>
	<body class="no-sidebar">

	<!-- Header -->
		<div id="header">
			<div class="container">
					
				<!-- Logo -->
					<div id="logo">
						<picture> <a href="#"><img class="logoprincipal" src="../images/logo-pagina/logo.png" alt=""></a></picture>
					</div>
				
				<!-- Nav -->
               <div id="barra_navegacion">
           
              </div>

              <script type="text/javascript">
   
    	             $("#barra_navegacion").load('../php/menu_nav.php div#perfil');
   
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
       <div class="container">
       	<div class="row">
       		<div class="-1u 10u">
       			<section class="seccion-perfil">
       				<h1 class="titulo"><i class="fas fa-user"></i>  <?php echo $usuario;?></h1>
       				<p class="usuario">
       					<i class="far fa-address-card"></i>    
       					<b>Nombre: </b><?php  echo $nombre.' '.$p_apellido.' '.$s_apellido; ?> <br><br>
       					<i class="fas fa-users"></i>
       					<b>Tipo de usuario: </b><?php echo $tipo_usuario; ?><br><br>
       					<i class="fas fa-road"></i> 
       					<b>Dirección: </b><?php echo $direccion; ?><br><br>
       					<i class="fas fa-briefcase"></i>
       					<b>RFC: </b><?php echo $rfc; ?><br><br>
       					<i class="far fa-hospital"></i> 
       					<b>Número de seguro Social: </b><?php echo $no_seguro; ?><br><br>
       					<i class="fas fa-calendar-alt"></i>
       					<b>Fecha de registro: </b><?php echo $fecha_registro; ?>
       				</p>
       		</div>
       		</section>
       	</div>
       </div>

    


		</div>
	<!-- /formulario -->

	

	<!-- Copyright -->
		<div id="copyright" class="container">
			 Asociación Agrícola de Productores de Plátano del Soconusco <br>
			 contacto@platanerosoconusco.com <br>
			 +(52) 9626264013

		</div>


	</body>
</html>