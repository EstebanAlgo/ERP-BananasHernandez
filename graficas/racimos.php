<?php
require('calculos18-19.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/icono-pestaña/logopestaña.ico">
    <title>Gráficas de Racimos</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
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
 <style>
           .a2015{background: #E8F8F5;} .a2015:hover{background: #566573; color: white;}
           .a2016{background: #FDEDEC;} .a2016:hover{background: #566573; color: white;}
           .a2017{background: #EAF2F8;} .a2017:hover{background: #566573; color: white;}
           .a2018{background: #F5EEF8;} .a2018:hover{background: #566573; color: white;}
           .a2019{background: #fef9e7 ;} .a2019:hover{background: #566573; color: white;}
         </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
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
                    <a class="navbar-brand" href="http://platanerosoconusco.com">
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
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>


                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
<?php
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
                                    case 'Productor':
                                          $image_perfil="../assets/images/users/productor.jpg";
                                          $menu="../menus/productor.php";
                                         break;
                                    case 'Contabilidad':
                                          $image_perfil="../assets/images/users/contabilidad.jpg";
                                          $menu="../menus/contabilidad.php";
                                         break;
                                    case 'Pista':
                                          $image_perfil="../assets/images/users/empleados.jpg";
                                          $menu="../menus/pista.php";
                                         break;
                                    case 'Bascula':
                                          $image_perfil="../assets/images/users/empleados.jpg";
                                          $menu="../menus/bascula.php";
                                         break;
                                     
                                 } 
                                 ?>
                                <img src="<?php echo $image_perfil; ?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo $image_perfil; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $usuario; ?></h4>
                                                <p class="text-muted"><?php echo $tipo_usuario; ?></p><a href="../views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-email"></i> Correo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../views/config.php"><i class="ti-settings"></i> Configurar Usuario</a></li>
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
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(../assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../assets/images/users/profile.png" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="true"><?php echo $usuario; ?></a>

                        <div class="dropdown-menu animated flipInY">
                         <a href="../views/perfil-usuario.php" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a> 
                            
                            <a href="#" class="dropdown-item"><i class="ti-email"></i> Correo</a>

                            <div class="dropdown-divider"></div> 
                            <a href="../views/config.php" class="dropdown-item"><i class="ti-settings"></i> Configuracion</a>
                            <div class="dropdown-divider"></div>
                             <a href="../cerrar.php" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
               <div id="barra_navegacion">
           
     </div>

  <script type="text/javascript">
   $("#barra_navegacion").load('<?php echo $menu; ?>');
  </script>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item--><a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
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
                        <h3 class="text-themecolor">Graficación</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficas</a></li>
                            <li class="breadcrumb-item active">Racimos</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row text-center">
                    <div class="col">
                        <table class="table table-responsive-md table-sm color-bordered-table info-bordered-table" id="myTable">
  <thead> 
    <tr>
      <th scope="col" style="background: #EAEDED"></th>
      <th style="background: #1ABC9C" scope="col" class="subtitulos">2015</th>
      <th style="background: #EC7063" scope="col" class="subtitulos">2016</th>
      <th style="background: #5DADE2" scope="col" class="subtitulos">2017</th>
      <th style="background: #BB8FCE" scope="col" class="subtitulos">2018</th>
      <th style="background:  #f4d03f " scope="col" class="subtitulos">2019</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">ENERO</th>
      <td class="a2015 txtinfo4"><?php echo $RAENERO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAENERO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAENERO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAENERO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAENERO19 ?></td>
    </tr>

    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">FEBRERO</th>
      <td class="a2015 txtinfo4"><?php echo $RAFEBRERO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAFEBRERO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAFEBRERO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAFEBRERO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAFEBRERO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">MARZO</th>
      <td class="a2015 txtinfo4"><?php echo $RAMARZO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAMARZO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAMARZO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAMARZO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAMARZO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">ABRIL</th>
      <td class="a2015 txtinfo4"><?php echo $RAABRIL2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAABRIL2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAABRIL2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAABRIL18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAABRIL19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">MAYO</th>
      <td class="a2015 txtinfo4"><?php echo $RAMAYO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAMAYO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAMAYO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAMAYO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAMAYO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">JUNIO</th>
      <td class="a2015 txtinfo4"><?php echo $RAJUNIO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAJUNIO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAJUNIO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAJUNIO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAJUNIO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">JULIO</th>
      <td class="a2015 txtinfo4"><?php echo $RAJULIO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAJULIO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAJULIO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAJULIO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAJULIO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">AGOSTO</th>
      <td class="a2015 txtinfo4"><?php echo $RAAGOSTO2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAAGOSTO2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAAGOSTO2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAAGOSTO18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAAGOSTO19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">SEPTIEMBRE</th>
      <td class="a2015 txtinfo4"><?php echo $RASEPTIEMBRE2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RASEPTIEMBRE2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RASEPTIEMBRE2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRASEPTIEMBRE18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRASEPTIEMBRE19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">OCTUBRE</th>
      <td class="a2015 txtinfo4"><?php echo $RAOCTUBRE2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RAOCTUBRE2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RAOCTUBRE2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRAOCTUBRE18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRAOCTUBRE19 ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">NOVIEMBRE</th>
      <td class="a2015 txtinfo4"><?php echo $RANOVIEMBRE2015  ?></td>
      <td class="a2016 txtinfo4"><?php echo $RANOVIEMBRE2016  ?></td>
      <td class="a2017 txtinfo4"><?php echo $RANOVIEMBRE2017  ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRANOVIEMBRE18  ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRANOVIEMBRE19  ?></td>
    </tr>
    <tr>
      <th scope="row" style="background: #EAEDED" class="subtitulos">DICIEMBRE</th>
      <td class="a2015 txtinfo4"><?php echo $RADICIEMBRE2015 ?></td>
      <td class="a2016 txtinfo4"><?php echo $RADICIEMBRE2016 ?></td>
      <td class="a2017 txtinfo4"><?php echo $RADICIEMBRE2017 ?></td>
      <td class="a2018 txtinfo4"><?php echo $TRADICIEMBRE18 ?></td>
      <td class="a2019 txtinfo4"><?php echo $TRADICIEMBRE19 ?></td>
    </tr>
    <tr>
      <th style="background: #1164F4; color: white;" scope="row">TOTAL</th>
      <td style="background: #A9CCE3; font-weight: bold;" class="txtinfo3"><?php echo $TOTALRACIMOS2015; ?></td>
      <td style="background: #A9CCE3; font-weight: bold;" class="txtinfo3"><?php echo $TOTALRACIMOS2016; ?></td>
      <td style="background: #A9CCE3; font-weight: bold;" class="txtinfo3"><?php echo $TOTALRACIMOS2017; ?></td>
      <td style="background: #A9CCE3; font-weight: bold;" class="txtinfo3"><?php echo $TRA2018; ?></td>
      <td style="background: #A9CCE3; font-weight: bold;" class="txtinfo3"><?php echo $TRA2019; ?></td>
    </tr>
  </tbody>
</table>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <h4 class="card-title">RACIMOS</h4>
                                    <div class="ml-auto">
                                        <ul class="list-inline text-right">
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#55ce63"></i>Ener</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5 text-info"></i>Febr</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5 text-success"></i>Marz</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#FFBF00"></i>Abri</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#8e44ad"></i>May</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#515a5a"></i>Jun</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#d35400"></i>Jul</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#0b5345"></i>Agost</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#b616c6"></i>Sept</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#159393"></i>Oct</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#ee7b14"></i>Nov</h5>
                                            </li>
                                            <li>
                                                <h5 class="m-b-0"><i class="fa fa-circle m-r-5" style="color:#f80f08"></i>Dic</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>

                <!-- END Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 PlataneroSoconusco.com
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
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
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
        Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2015',
            Enero: <?php echo $RAENERO2015; ?>,
                    Febrero: <?php echo $RAFEBRERO2015; ?>,
                    Marzo: <?php echo $RAMARZO2015; ?>,
                    Abril: <?php echo $RAABRIL2015; ?>,
                    Mayo: <?php echo $RAMAYO2015; ?>,
                    Junio: <?php echo $RAJUNIO2015; ?>,
                    Julio: <?php echo $RAJULIO2015; ?>,
                    Agosto:<?php echo $RAAGOSTO2015; ?>,
                    Septiembre:<?php echo $RASEPTIEMBRE2015; ?>,
                    Octubre:<?php echo $RAOCTUBRE2015; ?>,
                    Noviembre:<?php echo $RANOVIEMBRE2015; ?>,
                    Diciembre:<?php echo $RADICIEMBRE2015; ?>
        }, {
            period: '2016',
            Enero: <?php echo $RAENERO2016; ?>,
                    Febrero: <?php echo $RAFEBRERO2016; ?>,
                    Marzo: <?php echo $RAMARZO2016; ?>,
                    Abril: <?php echo $RAABRIL2016; ?>,
                    Mayo: <?php echo $RAMAYO2016; ?>,
                    Junio: <?php echo $RAJUNIO2016; ?>,
                    Julio: <?php echo $RAJULIO2016; ?>,
                    Agosto:<?php echo $RAAGOSTO2016; ?>,
                    Septiembre:<?php echo $RASEPTIEMBRE2016; ?>,
                    Octubre:<?php echo $RAOCTUBRE2016; ?>,
                    Noviembre:<?php echo $RANOVIEMBRE2016; ?>,
                    Diciembre:<?php echo $RADICIEMBRE2016; ?>
        }, {
            period: '2017',
            Enero: <?php echo $RAENERO2017; ?>,
                    Febrero: <?php echo $RAFEBRERO2017; ?>,
                    Marzo: <?php echo $RAMARZO2017; ?>,
                    Abril: <?php echo $RAABRIL2017; ?>,
                    Mayo: <?php echo $RAMAYO2017; ?>,
                    Junio: <?php echo $RAJUNIO2017; ?>,
                    Julio: <?php echo $RAJULIO2017; ?>,
                    Agosto:<?php echo $RAAGOSTO2017; ?>,
                    Septiembre:<?php echo $RASEPTIEMBRE2017; ?>,
                    Octubre:<?php echo $RAOCTUBRE2017; ?>,
                    Noviembre:<?php echo $RANOVIEMBRE2017; ?>,
                    Diciembre:<?php echo $RADICIEMBRE2017; ?>
        }, {
            period: '2018',
            Enero: <?php echo $TRAENERO18; ?>,
                    Febrero: <?php echo $TRAFEBRERO18; ?>,
                    Marzo: <?php echo $TRAMARZO18; ?>,
                    Abril: <?php echo $TRAABRIL18; ?>,
                    Mayo: <?php echo $TRAMAYO18; ?>,
                    Junio: <?php echo $TRAJUNIO18; ?>,
                    Julio: <?php echo $TRAJULIO18; ?>,
                    Agosto:<?php echo $TRAAGOSTO18; ?>,
                    Septiembre:<?php echo $TRASEPTIEMBRE18; ?>,
                    Octubre:<?php echo $TRAOCTUBRE18; ?>,
                    Noviembre:<?php echo $TRANOVIEMBRE18; ?>,
                    Diciembre:<?php echo $TRADICIEMBRE18; ?>
        }, {
            period: '2019',
            Enero: <?php echo $TRAENERO19; ?>,
                    Febrero: <?php echo $TRAFEBRERO19; ?>,
                    Marzo: <?php echo $TRAMARZO19; ?>,
                    Abril: <?php echo $TRAABRIL19; ?>,
                    Mayo: <?php echo $TRAMAYO19; ?>,
                    Junio: <?php echo $TRAJUNIO19; ?>,
                    Julio: <?php echo $TRAJULIO19; ?>,
                    Agosto:<?php echo $TRAAGOSTO19; ?>,
                    Septiembre:<?php echo $TRASEPTIEMBRE19; ?>,
                    Octubre:<?php echo $TRAOCTUBRE19; ?>,
                    Noviembre:<?php echo $TRANOVIEMBRE19; ?>,
                    Diciembre:<?php echo $TRADICIEMBRE19; ?>
        }],
        xkey: 'period',
        ykeys: ['Enero', 'Febrero', 'Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        labels: ['Enero', 'Febrero', 'Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63', '#009efb', '#4ed6eb ','#FFBF00','#8e44ad','#515a5a','#d35400','#0b5345','#b616c6','#159393','#ee7b14',' #f80f08'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#55ce63', '#009efb', ' #4ed6eb ','#FFBF00','#8e44ad','#515a5a','#d35400','#0b5345','#b616c6','#159393','#ee7b14',' #f80f08'],
        resize: true
        
    });
    </script>
</body>

</html>