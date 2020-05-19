<?php  
      require('../php/conexion.php');

       $image_perfil='';
                                $menu="";
                                switch ($tipo_usuario) {
                                     case 'Administrador':
                                         $image_perfil="../assets/images/users/administrador.png";
                                         $menu="../menus/administrador.php";
                                         break;
                                     case 'Administrativo':
                                         $image_perfil="../assets/images/users/administrativo.png";
                                         $menu="../menus/administrativo.php";
                                         break;
                                     
                                 } 
?>
<!DOCTYPE html>
<html lang="en">
<!-- DISEÑADOR Y PROGRAMADORES ING. ESTEBAN ALMANZA GONZÁLEZ, GABRIELA RUIZ DE LEÓN
     EMAIL: almanza_1811@hotmail.com, garudele@gmail.com
      -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.ico">
    <title>INICIO</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/box-estilos.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://bananashernandez.com">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> 
                                    <?php

                                     if ($cont_alerta>0) {
                                    echo "<span class='heartbit'></span> <span class='point'></span> </div>";
                                     }
                                     else{
                                         echo "<span class=''></span> <span class=''></span> </div>";
                                     } ?>
                                
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Tienes <?php echo $cont_alerta ?> nuevas notificaciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <?php

                                            for ($i=0; $i < $cont_alerta; $i++) { 

                                                $dia= substr($fecha[$i], 8,2);
                                                $mes= substr($fecha[$i], 5,2);
                                                $año= substr($fecha[$i], 0,4);
                                                $hora= substr($fecha[$i], 11,5);
                                                

                                                echo "
                                            <!-- Message -->
                                                <a href='../mensajes/mensaje.php?id_mensaje=$id_alerta[$i]&destinatario=$destinatario[$i]'>
                                                <div class='user-img'> <img src='../assets/images/users/$id_emisario[$i].jpg' alt='user' class='img-circle'> <span class='profile-status online pull-right'></span> </div>
                                                <div class='mail-contnet'>
                                                    <h5>$emisario[$i]</h5> <span class='mail-desc'>$titulo[$i]</span> <span class='time'>$dia/$mes/$año $hora</span> </div>
                                                </a>
                                            <!-- Message -->
                                                      ";
                                                 
                                             } 

                                             ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="../mensajes/"> <strong>Ver Todos</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/<?php echo $id_usuario ?>.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $usuario ?></h4>
                                                <p class="text-muted"><?php echo $nombre.' '.$p_apellido ?></p><a href="../views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../views/config.php"><i class="ti-settings"></i> Configuración</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../cerrar.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- MENú - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
     <div id="barra_navegacion">
           
     </div>

  <script type="text/javascript">
   $("#barra_navegacion").load('<?php echo $menu; ?>');
  </script>
        <!-- ============================================================== -->
        <!-- End MENú - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">PANEL</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Bananas Hernández</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
               <div class="container ">
                <h3 class="title">DOCUMENTACIÓN</h3>
                                <div class="row">
                                    
                                    <div class="col-12 col-md-4 m-t-10">
                                          <div class="contenedor-img ejemplo-1" style="border-radius: 10px; border: 2px solid #000000;">  
                                               <img style="width: 100%; height: 100%;" class="img" src="../assets/images/gallery/certificados.jpg" />  
                                               <div class="mascara">  
                                                   <h2>Certificados de Origen</h2>  
                                                   <p>Bananas Hernández</p>
                                                   <a href="../certificados/certificados.php" class="link">Visitar</a>  
                                               </div>  
                                          </div>
                                    </div>
                                    <div class="col-12 col-md-4 m-t-10">
                                          <div class="contenedor-img ejemplo-3" style="border-radius: 10px; border: 2px solid #000000;">  
                                               <img style="width: 100%; height: 100%;" class="img" src="../assets/images/gallery/costos.jpg" />  
                                               <div class="mascara">  
                                                   <h2>Costes de Actividades</h2>  
                                                   <p>Bananas Hernández</p>
                                                   <a href="../actividades/" class="link">Registrar</a>  
                                               </div>  
                                          </div>
                                    </div>
                                    <div class="col-12 col-md-4 m-t-10">
                                          <div class="contenedor-img ejemplo-5" style="border-radius: 10px; border: 2px solid #000000;">  
                                               <img style="width: 100%; height: 100%;" class="img" src="../assets/images/gallery/material.png" />  
                                               <div class="mascara">  
                                                   <h2>Solicitude de Material</h2>  
                                                   <p>Bananas Hernández</p>
                                                   <a href="../materiales/solicitudes.php" class="link">Imprimir</a>  
                                               </div>  
                                          </div>
                                    </div>
    
                                </div>
                            </div>

                            <?php 
                            if ($tipo_usuario=="Administrador")
                            {
                               echo "<div class='container card m-t-30'>
                              <div class='row  m-b-20'>
                                <div class='col-12'>
                                        <h4 class='card-title m-t-20'>Herramientas</h4>
                                        <h6 class='card-subtitle'>Las herramientas toman como objeto de análisis la información capturada actualmente en el sistema.</h6>
                                        <div id='carouselExampleIndicators3' class='carousel slide mt-4' data-ride='carousel'>
                                            <ol class='carousel-indicators'>
                                                <li data-target='#carouselExampleIndicators3' data-slide-to='0' class='active'></li>
                                                <li data-target='#carouselExampleIndicators3' data-slide-to='1'></li>
                                                <li data-target='#carouselExampleIndicators3' data-slide-to='2'></li>
                                            </ol>
                                            <div class='carousel-inner' role='listbox'>
                                                <div class='carousel-item active'>
                                                    <a href='../graficas/graficacion_personalizada.php?tipo=cajas'><img class='img-responsive' src='../assets/images/gallery/slide-graficar.jpg' alt='First slide'></a>
                                                    <div class='carousel-caption d-none d-md-block' style='background: black; border-radius: 10px; opacity: 0.8;'>
                                                        <h3 class='text-white'>GRÁFICAS</h3>
                                                        <p>Realiza gráficas de producción mediante cajas, rejas o racimos. Puedes seleccionar la finca a graficar y su medio de graficación.</p>
                                                    </div>
                                                </div>
                                                <div class='carousel-item'>
                                                    <a href='../certificados/busqueda_avanzada.php'><img class='img-responsive' src='../assets/images/gallery/slide-reportes.jpg' alt='Second slide'></a>
                                                    <div class='carousel-caption d-none d-md-block' style='background: black; border-radius: 10px; opacity: 0.8;'>
                                                        <h3 class='text-white'>REPORTES</h3>
                                                        <p>Reportes personalizados de producción mediante remitentes, fincas y destinos.</p>
                                                    </div>
                                                </div>
                                                <div class='carousel-item'>
                                                    <a href='../correcciones/'><img class='img-responsive' src='../assets/images/gallery/slide-buscar.jpg' alt='Third slide'></a>
                                                    <div class='carousel-caption d-none d-md-block' style='background: black; border-radius: 10px; opacity: 0.8;'>
                                                        <h3 class='text-white'>BÚSQUEDAS</h3>
                                                        <p>Busqueda certificados en el histórico de los registros.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class='carousel-control-prev' href='#carouselExampleIndicators3' role='button' data-slide='prev'>
                                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Previous</span>
                                            </a>
                                            <a class='carousel-control-next' href='#carouselExampleIndicators3' role='button' data-slide='next'>
                                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Next</span>
                                            </a>
                                        </div>
                                    </div>
                              </div>
                            </div>";
                            } 
                            ?>
                              
                            

               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
               <?php echo $footer ?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/popper/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--Morris JavaScript -->
    <script src="../assets/plugins/raphael/raphael-min.js"></script>
    <script src="../assets/plugins/morrisjs/morris.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        // Dashboard 1 Morris-chart
$(function () {
    "use strict";
 // Morris donut chart
        
    Morris.Donut({
        element: 'morris-donut-chart-fijo',
        data: [{
            label: "Contenedores Confirmados",
            value: <?php echo $contador_fijo ?>,

        }, {
            label: "Pendientes",
            value: <?php echo $pendientes_fijo ?>
        }],
        resize: true,
        colors:['#55ce63', '#2f3d4a']
    });

    Morris.Donut({
        element: 'morris-donut-chart-macho',
        data: [{
            label: "Contenedores Confirmados",
            value: <?php echo $contador_macho ?>
        }, {
            label: "Pendientes",
            value: <?php echo $pendientes_macho ?>
        }],
        
        colors:['#e5b309', '#2f3d4a']
    });

    Morris.Donut({
        element: 'morris-donut-chart-spot',
        data: [{
            label: "Contenedores Confirmados",
            value: <?php echo $contador_spot ?>
        }, {
            label: "Pendientes",
            value: <?php echo $pendientes_spot ?>
        }],
        resize: true,
        colors:[' #449ff5 ', '#2f3d4a']
    });


 });    
    </script>
</body>

</html>