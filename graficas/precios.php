<?php
require('../php/conexion.php');
?>

<!-- DISEÑADOR Y PROGRAMADOR ING. ESTEBAN ALMANZA GONZÁLEZ 
     EMAIL: almanza_1811@hotmail.com -->

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
    <title>Gráficas de precios</title>
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
                                <img src="<?php echo $image_perfil; ?>" alt="user" class="profile-pic" />
                            </a>
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
                                    <li><a href="#"><i class="ti-settings"></i> Configurar Usuario</a></li>
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
        <!-- Barra lateral derecha - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
     <div id="barra_navegacion">
           
     </div>

  <script type="text/javascript">
   $("#barra_navegacion").load('<?php echo $menu; ?>');
  </script>
        <!-- ============================================================== -->
        <!-- End Barra lateral derecha - style you can find in sidebar.scss  -->
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
                        <h3 class="text-themecolor">FRUTAS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gráficas</a></li>
                            <li class="breadcrumb-item active">Precios</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Inicio de contenido de la página -->
                <!-- ============================================================== -->
               




<div class="row">
 <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Precios de los últimos 6 meses</h4>
                                <div id="bar-chart" style="width:100%; height:600px;"></div>
                                <h3 class="text-danger" style="text-align: center;">Semanas</h3>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
</div>


<div class="row">
 <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Precios semana 1 - 52 DE Plátano de Primera</h4>
                                <div id="bar-chart2" style="width:100%; height:600px;"></div>
                                <h3 class="text-danger" style="text-align: center;">Semanas</h3>
                            </div>
                        </div>
                    </div>
<!-- column -->
</div>

<div class="row">
 <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Precios semana 1 - 52 DE Plátano de Segunda</h4>
                                <div id="bar-chart3" style="width:100%; height:600px;"></div>
                                <h3 class="text-danger" style="text-align: center;">Semanas</h3>
                            </div>
                        </div>
                    </div>
<!-- column -->
</div>

<div class="row">
 <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Precios semana 1 - 52 de Racimos</h4>
                                <div id="bar-chart4" style="width:100%; height:600px;"></div>
                                <h3 class="text-danger" style="text-align: center;">Semanas</h3>
                            </div>
                        </div>
                    </div>
<!-- column -->
</div>

<div class="row">
 <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gráfica de Precios semana 1 - 52 de Plátano Macho</h4>
                                <div id="bar-chart5" style="width:100%; height:600px;"></div>
                                <h3 class="text-danger" style="text-align: center;">Semanas</h3>
                            </div>
                        </div>
                    </div>
<!-- column -->
</div>


<script>
    
</script>


                
                <!-- ============================================================== -->
                <!-- Fin de contenido de la Página -->
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
                © 2019 Asociación Agrícola de Productores de Plátano del Soconusco
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
    <!-- Chart JS -->
    <script src="../assets/plugins/echarts/echarts-all.js"></script>
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <?php 
    $contador=0;
    $contadorprimera2015=0; $contadorprimera2016=0; $contadorprimera2017=0; $contadorprimera2018=0; $contadorprimera2019=0;
    $contadorsegunda2015=0; $contadorsegunda2016=0; $contadorsegunda2017=0; $contadorsegunda2018=0; $contadorsegunda2019=0;
    $contadorracimo2015=0; $contadorracimo2016=0; $contadorracimo2017=0; $contadorracimo2018=0; $contadorracimo2019=0;
    $contadormacho2015=0; $contadormacho2016=0; $contadormacho2017=0; $contadormacho2018=0; $contadormacho2019=0;
    $cantidadesprimera2015="";

                                      $precio=$conexion2->prepare("SELECT * FROM precios"); 
                                      $precio->execute();
                                      $lista_precios=$precio->fetchAll();
                                      foreach ($lista_precios as $fila) {
                                  
                                             $id[]=$fila['id'];
                                             $año[]=$fila['anio'];
                                             $semana[]=$fila['semana'];
                                             $primera[]=$fila['primera'];
                                             $segunda[]=$fila['segunda'];
                                             $racimo[]=$fila['racimo'];
                                             $macho[]=$fila['macho'];
                                             $contador++;
                                         }
    for ($i=0; $i < $contador ; $i++) { 

         switch ($año[$i]) {
             case '2015':
                 $primera2015[$contadorprimera2015++]=$primera[$i];
                 $segunda2015[$contadorsegunda2015++]=$segunda[$i];
                 $racimo2015[$contadorracimo2015++]=$racimo[$i];
                 $macho2015[$contadormacho2015++]=$macho[$i];
                 break;
            case '2016':
                 $primera2016[$contadorprimera2016++]=$primera[$i];
                 $segunda2016[$contadorsegunda2016++]=$segunda[$i];
                 $racimo2016[$contadorracimo2016++]=$racimo[$i];
                 $macho2016[$contadormacho2016++]=$macho[$i];
                 break;
            case '2017':
                 $primera2017[$contadorprimera2017++]=$primera[$i];
                 $segunda2017[$contadorsegunda2017++]=$segunda[$i];
                 $racimo2017[$contadorracimo2017++]=$racimo[$i];
                 $macho2017[$contadormacho2017++]=$macho[$i];
                 break;
            case '2018':
                 $primera2018[$contadorprimera2018++]=$primera[$i];
                 $segunda2018[$contadorsegunda2018++]=$segunda[$i];
                 $racimo2018[$contadorracimo2018++]=$racimo[$i];
                 $macho2018[$contadormacho2018++]=$macho[$i];
                 break;
            case '2019':
                 $primera2019[$contadorprimera2019++]=$primera[$i];
                 $segunda2019[$contadorsegunda2019++]=$segunda[$i];
                 $racimo2019[$contadorracimo2019++]=$racimo[$i];
                 $macho2019[$contadormacho2019++]=$macho[$i];
                 break;
         }
     } 

    ?>
    <script>
        
// ============================================================== 
// Bar chart option
// ============================================================== 
var myChart1 = echarts.init(document.getElementById('bar-chart'));

// specify chart configuration item and data
option1 = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['Primera', 'Segunda','Macho', 'Racimos']
    },
    toolbox: {
        show: true,
        feature: {

            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ["#55ce63", "#009efb"," #9640d9"," #ec1d1d "],
    calculable: true,
    xAxis: [{
        type: 'category',
        data: ['<?php echo $semana[$contador-25]; ?>', '<?php echo $semana[$contador-24]; ?>', '<?php echo $semana[$contador-23]; ?>', '<?php echo $semana[$contador-22]; ?>', '<?php echo $semana[$contador-21]; ?>', '<?php echo $semana[$contador-20]; ?>', '<?php echo $semana[$contador-19]; ?>', '<?php echo $semana[$contador-18]; ?>', '<?php echo $semana[$contador-17]; ?>', '<?php echo $semana[$contador-16]; ?>', '<?php echo $semana[$contador-15]; ?>', '<?php echo $semana[$contador-14]; ?>', '<?php echo $semana[$contador-13]; ?>', '<?php echo $semana[$contador-12]; ?>', '<?php echo $semana[$contador-11]; ?>', '<?php echo $semana[$contador-10]; ?>', '<?php echo $semana[$contador-9]; ?>',  '<?php echo $semana[$contador-8]; ?>',  '<?php echo $semana[$contador-7]; ?>',  '<?php echo $semana[$contador-6]; ?>',  '<?php echo $semana[$contador-5]; ?>',  '<?php echo $semana[$contador-4]; ?>',  '<?php echo $semana[$contador-3]; ?>', '<?php echo $semana[$contador-2]; ?>', '  <?php echo $semana[$contador-1]; ?>']
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: 'Primera',
            type: 'bar',
    data: ['<?php echo $primera[$contador-25]; ?>', '<?php echo $primera[$contador-24]; ?>', '<?php echo $primera[$contador-23]; ?>', '<?php echo $primera[$contador-22]; ?>', '<?php echo $primera[$contador-21]; ?>', '<?php echo $primera[$contador-20]; ?>', '<?php echo $primera[$contador-19]; ?>', '<?php echo $primera[$contador-18]; ?>', '<?php echo $primera[$contador-17]; ?>', '<?php echo $primera[$contador-16]; ?>', '<?php echo $primera[$contador-15]; ?>', '<?php echo $primera[$contador-14]; ?>', '<?php echo $primera[$contador-13]; ?>', '<?php echo $primera[$contador-12]; ?>', '<?php echo $primera[$contador-11]; ?>', '<?php echo $primera[$contador-10]; ?>', '<?php echo $primera[$contador-9]; ?>',  '<?php echo $primera[$contador-8]; ?>',  '<?php echo $primera[$contador-7]; ?>',  '<?php echo $primera[$contador-6]; ?>',  '<?php echo $primera[$contador-5]; ?>',  '<?php echo $primera[$contador-4]; ?>',  '<?php echo $primera[$contador-3]; ?>',  '<?php echo $primera[$contador-2]; ?>', ' <?php echo $primera[$contador-1]; ?>'],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: 'Segunda',
            type: 'bar',
    data: ['<?php echo $segunda[$contador-25]; ?>', '<?php echo $segunda[$contador-24]; ?>', '<?php echo $segunda[$contador-23]; ?>', '<?php echo $segunda[$contador-22]; ?>', '<?php echo $segunda[$contador-21]; ?>', '<?php echo $segunda[$contador-20]; ?>', '<?php echo $segunda[$contador-19]; ?>', '<?php echo $segunda[$contador-18]; ?>', '<?php echo $segunda[$contador-17]; ?>', '<?php echo $segunda[$contador-16]; ?>', '<?php echo $segunda[$contador-15]; ?>', '<?php echo $segunda[$contador-14]; ?>', '<?php echo $segunda[$contador-13]; ?>', '<?php echo $segunda[$contador-12]; ?>', '<?php echo $segunda[$contador-11]; ?>', '<?php echo $segunda[$contador-10]; ?>', '<?php echo $segunda[$contador-9]; ?>',  '<?php echo $segunda[$contador-8]; ?>',  '<?php echo $segunda[$contador-7]; ?>',  '<?php echo $segunda[$contador-6]; ?>',  '<?php echo $segunda[$contador-5]; ?>',  '<?php echo $segunda[$contador-4]; ?>',  '<?php echo $segunda[$contador-3]; ?>',  '<?php echo $segunda[$contador-2]; ?>', ' <?php echo $segunda[$contador-1]; ?>'],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: 'Macho',
            type: 'bar',
    data: ['<?php echo $macho[$contador-25]; ?>', '<?php echo $macho[$contador-24]; ?>', '<?php echo $macho[$contador-23]; ?>', '<?php echo $macho[$contador-22]; ?>',
           '<?php echo $macho[$contador-21]; ?>', '<?php echo $macho[$contador-20]; ?>', '<?php echo $macho[$contador-19]; ?>', '<?php echo $macho[$contador-18]; ?>', 
           '<?php echo $macho[$contador-17]; ?>', '<?php echo $macho[$contador-16]; ?>', '<?php echo $macho[$contador-15]; ?>', '<?php echo $macho[$contador-14]; ?>', 
           '<?php echo $macho[$contador-13]; ?>', '<?php echo $macho[$contador-12]; ?>', '<?php echo $macho[$contador-11]; ?>', '<?php echo $macho[$contador-10]; ?>', 
           '<?php echo $macho[$contador-9]; ?>',  '<?php echo $macho[$contador-8]; ?>',  '<?php echo $macho[$contador-7]; ?>',  '<?php echo $macho[$contador-6]; ?>',  
           '<?php echo $macho[$contador-5]; ?>',  '<?php echo $macho[$contador-4]; ?>',  '<?php echo $macho[$contador-3]; ?>',  '<?php echo $macho[$contador-2]; ?>', 
           '<?php echo $macho[$contador-1]; ?>'],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: 'Racimos',
            type: 'bar',
    data: ['<?php echo $racimo[$contador-25]; ?>', '<?php echo $racimo[$contador-24]; ?>', '<?php echo $racimo[$contador-23]; ?>', '<?php echo $racimo[$contador-22]; ?>', '<?php echo $racimo[$contador-21]; ?>', '<?php echo $racimo[$contador-20]; ?>', '<?php echo $racimo[$contador-19]; ?>', '<?php echo $racimo[$contador-18]; ?>', '<?php echo $racimo[$contador-17]; ?>', '<?php echo $racimo[$contador-16]; ?>', '<?php echo $racimo[$contador-15]; ?>', '<?php echo $racimo[$contador-14]; ?>', '<?php echo $racimo[$contador-13]; ?>', '<?php echo $racimo[$contador-12]; ?>', '<?php echo $racimo[$contador-11]; ?>', '<?php echo $racimo[$contador-10]; ?>', '<?php echo $racimo[$contador-9]; ?>',  '<?php echo $racimo[$contador-8]; ?>',  '<?php echo $racimo[$contador-7]; ?>',  '<?php echo $racimo[$contador-6]; ?>',  '<?php echo $racimo[$contador-5]; ?>',  '<?php echo $racimo[$contador-4]; ?>',  '<?php echo $racimo[$contador-3]; ?>',  '<?php echo $racimo[$contador-2]; ?>', ' <?php echo $racimo[$contador-1]; ?>'],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};


// use configuration item and data specified to show chart
myChart1.setOption(option1, true), $(function() {
    function resize() {
        setTimeout(function() {
            myChart1.resize()
        }, 100)
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
});


    </script>


    <script>
        
// ============================================================== 
// Bar chart plátano de primera
// ============================================================== 
var myChart2 = echarts.init(document.getElementById('bar-chart2'));

// specify chart configuration item and data
option2 = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['2015', '2016','2017', '2018','2019']
    },
    toolbox: {
        show: true,
        feature: {

            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ["#186a3b", "#45b39d","#0b5345","#58d68d","#4caf50"],
    calculable: true,
    xAxis: [{
        type: 'category',
        data: [1,
        <?php for ($i=2; $i < 53; $i++) { 
            echo $i.',';
        } ?>
        53]
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: '2015',
            type: 'bar',
    data: [
  //INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $primera2015[0]; ?>,
    <?php for ($i=1; $i < $contadorprimera2015-1; $i++) { 
          echo $primera2015[$i].",";
    } 
    echo $primera2015[$contadorprimera2015-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2016',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $primera2016[0]; ?>,
    <?php for ($i=1; $i < $contadorprimera2016-1; $i++) { 
          echo $primera2016[$i].",";
    } 
    echo $primera2016[$contadorprimera2016-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2017',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $primera2017[0]; ?>,
    <?php for ($i=1; $i < $contadorprimera2017-1; $i++) { 
          echo $primera2017[$i].",";
    } 
    echo $primera2017[$contadorprimera2017-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2018',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $primera2018[0]; ?>,
    <?php for ($i=1; $i < $contadorprimera2018-1; $i++) { 
          echo $primera2018[$i].",";
    } 
    echo $primera2018[$contadorprimera2018-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2019',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $primera2019[0]; ?>,
    <?php for ($i=1; $i < $contadorprimera2019-1; $i++) { 
          echo $primera2019[$i].",";
    } 
    echo $primera2019[$contadorprimera2019-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};


// use configuration item and data specified to show chart
myChart2.setOption(option2, true), $(function() {
    function resize() {
        setTimeout(function() {
            myChart2.resize()
        }, 100)
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
});
    </script>

<script>
        
// ============================================================== 
// Bar chart plátano de Segunda
// ============================================================== 
var myChart3 = echarts.init(document.getElementById('bar-chart3'));

// specify chart configuration item and data
option3 = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['2015', '2016','2017', '2018','2019']
    },
    toolbox: {
        show: true,
        feature: {

            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ["#1b4f72", "#45b39d"," #0926fe","#7fb3d5","#06a7fe","#477bb1"],
    calculable: true,
    xAxis: [{
        type: 'category',
        data: [1,
        <?php for ($i=2; $i < 53; $i++) { 
            echo $i.',';
        } ?>
        53]
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: '2015',
            type: 'bar',
    data: [
  //INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $segunda2015[0]; ?>,
    <?php for ($i=1; $i < $contadorsegunda2015-1; $i++) { 
          echo $segunda2015[$i].",";
    } 
    echo $segunda2015[$contadorsegunda2015-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2016',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $segunda2016[0]; ?>,
    <?php for ($i=1; $i < $contadorsegunda2016-1; $i++) { 
          echo $segunda2016[$i].",";
    } 
    echo $segunda2016[$contadorsegunda2016-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2017',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $segunda2017[0]; ?>,
    <?php for ($i=1; $i < $contadorsegunda2017-1; $i++) { 
          echo $segunda2017[$i].",";
    } 
    echo $segunda2017[$contadorsegunda2017-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2018',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $segunda2018[0]; ?>,
    <?php for ($i=1; $i < $contadorsegunda2018-1; $i++) { 
          echo $segunda2018[$i].",";
    } 
    echo $segunda2018[$contadorsegunda2018-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2019',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $segunda2019[0]; ?>,
    <?php for ($i=1; $i < $contadorsegunda2019-1; $i++) { 
          echo $segunda2019[$i].",";
    } 
    echo $segunda2019[$contadorsegunda2019-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};


// use configuration item and data specified to show chart
myChart3.setOption(option3, true), $(function() {
    function resize() {
        setTimeout(function() {
            myChart3.resize()
        }, 100)
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
});
    </script>

<script>
        
// ============================================================== 
// Bar chart RACIMOS
// ============================================================== 
var myChart4 = echarts.init(document.getElementById('bar-chart4'));

// specify chart configuration item and data
option4 = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['2015', '2016','2017', '2018','2019']
    },
    toolbox: {
        show: true,
        feature: {

            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ["#6609fe", "#b39ddb"," #0926fe"," #6a1b9a "," #5c6bc0 "],
    calculable: true,
    xAxis: [{
        type: 'category',
        data: [1,
        <?php for ($i=2; $i < 53; $i++) { 
            echo $i.',';
        } ?>
        53]
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: '2015',
            type: 'bar',
    data: [
  //INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $racimo2015[0]; ?>,
    <?php for ($i=1; $i < $contadorracimo2015-1; $i++) { 
          echo $racimo2015[$i].",";
    } 
    echo $racimo2015[$contadorracimo2015-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2016',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $racimo2016[0]; ?>,
    <?php for ($i=1; $i < $contadorracimo2016-1; $i++) { 
          echo $racimo2016[$i].",";
    } 
    echo $racimo2016[$contadorracimo2016-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2017',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $racimo2017[0]; ?>,
    <?php for ($i=1; $i < $contadorracimo2017-1; $i++) { 
          echo $racimo2017[$i].",";
    } 
    echo $racimo2017[$contadorracimo2017-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2018',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $racimo2018[0]; ?>,
    <?php for ($i=1; $i < $contadorracimo2018-1; $i++) { 
          echo $racimo2018[$i].",";
    } 
    echo $racimo2018[$contadorracimo2018-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2019',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $racimo2019[0]; ?>,
    <?php for ($i=1; $i < $contadorracimo2019-1; $i++) { 
          echo $racimo2019[$i].",";
    } 
    echo $racimo2019[$contadorracimo2019-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};


// use configuration item and data specified to show chart
myChart4.setOption(option4, true), $(function() {
    function resize() {
        setTimeout(function() {
            myChart4.resize()
        }, 100)
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
});
    </script>

<script>
        
// ============================================================== 
// Bar chart PLÁTANO MACHO
// ============================================================== 
var myChart5 = echarts.init(document.getElementById('bar-chart5'));

// specify chart configuration item and data
option5 = {
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['2015', '2016','2017', '2018','2019']
    },
    toolbox: {
        show: true,
        feature: {

            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ["#d81b60", "#f48fb1","#ff7043"," #fc0404"," #fca204"],
    calculable: true,
    xAxis: [{
        type: 'category',
        data: [1,
        <?php for ($i=2; $i < 53; $i++) { 
            echo $i.',';
        } ?>
        53]
    }],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: '2015',
            type: 'bar',
    data: [
  //INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $macho2015[0]; ?>,
    <?php for ($i=1; $i < $contadormacho2015-1; $i++) { 
          echo $macho2015[$i].",";
    } 
    echo $macho2015[$contadormacho2015-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2016',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $macho2016[0]; ?>,
    <?php for ($i=1; $i < $contadormacho2016-1; $i++) { 
          echo $macho2016[$i].",";
    } 
    echo $macho2016[$contadormacho2016-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2017',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $macho2017[0]; ?>,
    <?php for ($i=1; $i < $contadormacho2017-1; $i++) { 
          echo $macho2017[$i].",";
    } 
    echo $macho2017[$contadormacho2017-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2018',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $macho2018[0]; ?>,
    <?php for ($i=1; $i < $contadormacho2018-1; $i++) { 
          echo $macho2018[$i].",";
    } 
    echo $macho2018[$contadormacho2018-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2019',
            type: 'bar',
    data: [
//INICIA SECCIÓN DE PHP PARA IMPRESIÓN DE DATOS
    <?php echo $macho2019[0]; ?>,
    <?php for ($i=1; $i < $contadormacho2019-1; $i++) { 
          echo $macho2019[$i].",";
    } 
    echo $macho2019[$contadormacho2019-1];
    ?>
  //TERMINA PHP
    ],
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};


// use configuration item and data specified to show chart
myChart5.setOption(option5, true), $(function() {
    function resize() {
        setTimeout(function() {
            myChart5.resize()
        }, 100)
    }
    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
});
    </script>



</body>

</html>