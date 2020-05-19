<?php
require('php/conexion.php');
if ($tipo_usuario=="null") {
 header('Location: http://platanerosoconusco.com');
}
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.ico">
    <title>Añadir Certificado</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page CSS -->
    <link href="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloscertificados.css">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema; ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--Scrips Certificados -->
    <script type="text/javascript" src="js/scripscertificados.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<style>
      hr{height: 2px; background-color: gray; width: 80%; margin: 1% 10%;}
      .row{font-size: 1em;}
      .formato{margin-top: 1em; margin-bottom: 1em;}
      .botonenvio{margin: 1em;}
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
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                                         $image_perfil="assets/images/users/administrador.png";
                                         $menu="menus/administradorlevel1.php";
                                         break;
                                     case 'Administrativo':
                                         $image_perfil="assets/images/users/administrativo.png";
                                         $menu="menus/administrativolevel1.php";
                                         break;
                                    case 'Productor':
                                          $image_perfil="assets/images/users/productor.jpg";
                                          $menu="menus/productorlevel1.php";
                                         break;
                                    case 'Contabilidad':
                                          $image_perfil="assets/images/users/contabilidad.jpg";
                                          $menu="menus/contabilidadlevel1.php";
                                         break;
                                    case 'Pista':
                                          $image_perfil="assets/images/users/empleados.jpg";
                                          $menu="menus/pistalevel1.php";
                                         break;
                                    case 'Bascula':
                                          $image_perfil="assets/images/users/empleados.jpg";
                                          $menu="menus/basculalevel1.php";
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
                                                <p class="text-muted"><?php echo $tipo_usuario; ?></p><a href="views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="views/config.php"><i class="ti-settings"></i> Configurar Usuario</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="cerrar.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
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
                        <h3 class="text-themecolor">PRODUCTOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Certificados</a></li>
                            <li class="breadcrumb-item active">Añadir Certificado</li>

                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Inicio de contenido de la página -->
                <!-- ============================================================== -->
                

<div class="container formato" style="text-align: center;">
      <h1 class="titulo">Bananas Hernández</h1>
      <div class="row">
        <div class="col">
          <form action="certificados/verificar_datos.php" method="post">
            <div class="row">
              <?php  
                        if($tipo_usuario=="Bascula")
                        {
                          echo "
                      <div style='font-size: 1.2em;padding-left: 5%;' class='col'> 
                       <span style='text-align:center;'>Tapachula, Chiapas</span>
                       <input type='hidden' name='estado' value='Chiapas'>
                       <input type='hidden' name='municipio' value='Tapachula'>
                        
                       </div>";

                        }
                        else
                        {
                           echo "
                      <div class='col-6 col-md-4 offset-md-2'> 
                        <select class='input_pro' name='estado' id='estado' required></select>
                        </div>
                        <div class='col-6 col-md-4'>
                            <select class='input_pro' name='municipio' id='municipio' required>
                              <option value=''>Selecciona un estado:</option>
                            </select>
                       </div>";

                        }

                        ?>
            </div>
            <div class="row">
              <div class="col-12 col-md-4   order-2  order-md-1">
                  <div style="margin-top: 1em;"  class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text div-folio-origen" id="basic-addon1">Folio de certificado</span>
                       </div>
                        <input type="number" class="form-control" placeholder="Folio" aria-label="Folio" aria-describedby="basic-addon1" name="folio" required>
                  </div>
              </div>
              <div class="col-12 col-md-4  order-1  order-md-2">
                      <strong><p class="titulocentral">
                        EXTIENDE EL PRESENTE<br>
                        CERTIFICADO DE ORIGEN
                      </p></strong>
              </div>

              <div style='text-align: center;margin-top: 1em;' class='col-12 col-md-4  order-3  order-md-3'>
                   <input class='fecha' type='date' name='fecha' value="<?php echo date('Y-m-d') ?>" required>
                   <input class='hora' type='time' name='hora' value="<?php echo date('H:i:s') ?>" required>  

              </div>

            </div>

            <!--******************************* solicitante y producto*************************************************-->

            <div class="row">
              <div class="col-12 col-md-5 offset-md-1">
                <b>Al C.</b><select class="select2 btn btn-inverse" style="width: 60%" name="cliente" id="cliente"></select>                 
    <a title="AGREGAR REMITENTE" class="boton_agregar" href="certificados/registro_remitente.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
    <a title="ACTUALIZAR LISTA DE REMITENTES" id="actualizar_remitente" class="boton_actualizar"><i class="fas fa-sync"></i></a>
              </div>
              <div class="col-12 col-md-5">
                <b>Transportará:</b><select class="select2 btn btn-inverse" style="width: 50%" name="producto" id="producto"></select>
    <a title="AGREGAR NUEVO PRODUCTO" class="boton_agregar" href="certificados/registro_producto.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
    <a  title="ACTUALIZAR LISTA DE PRODUCTOS A TRANSPORTAR" id="actualizar_producto" class="boton_actualizar"><i class="fas fa-sync"></i></a>
              </div>
            </div>
            
            <!--*******************************DATOS DEL PRODUCTO*************************************************-->
            <div class="row">
              <div class="col-12"><h4>DATOS DEL PRODUCTO <i class="fas fa-balance-scale"></i> Y PROCEDENCIA <i class="fas fa-home"></i></h4></div>
              <div class="col-12 col-md-4 offset-md-2"><button type="button" class="btn btn-info btn-lg btn-block" id="add">Añadir</button></div>
              <div class="col-12 col-md-4"><button type="button" class="btn btn-inverse btn-lg btn-block" id="eliminar_producto">Eliminar</button></div>
            </div>
           
            <div class="row">
              <div class="col">

                 <!--*Producto 1-->
                <div class="row" id="datos1">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto1" id='envases1'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 1" name="cantidad1" required /></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 1 en kg" name="peso1" required /></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 1" name="variedad1" required/></div>
              <div class="col-12 col-md-2" style="text-align: center;">
<a title="AGREGAR NUEVO ENVASE" class="boton_agregar_producto" href="certificados/registro_envase.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
<a title="ACTUALIZAR LISTA DE ENVASES" id="actualizar_envase" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>

                 
              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio1" id="fincas1"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora"><input class='input_pro' type="text" name="empacadora1"  placeholder="Registro de Empacadora" ></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen"><input class='input_pro' type="text" name="direccion1" placeholder="Dirección de Origen"      ></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
<a title="AGREGAR ORIGEN" class="boton_agregar_producto" href="certificados/registro_origen.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
<a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen1" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 2-->
              <div class="row" id="datos2">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto2" id='envases2'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 2" name="cantidad2"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 2 en kg" name="peso2"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 2" name="variedad2"/></div>


              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio2"  id="fincas2"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora2"><input class='input_pro' type="text" name="empacadora2" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen2"><input class='input_pro' type="text" name="direccion2" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                  <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen2" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 3-->
                <div class="row" id="datos3">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto3" id='envases3'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 3" name="cantidad3"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 3 en kg" name="peso3"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 3" name="variedad3"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio3" id="fincas3"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora3"><input class='input_pro' type="text" name="empacadora3" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen3"><input class='input_pro' type="text" name="direccion3" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen3" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 4-->
                <div class="row" id="datos4">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto4" id='envases4'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 4" name="cantidad4"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 4 en kg" name="peso4"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 4" name="variedad4"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio4"  id="fincas4"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora4"><input class='input_pro' type="text" name="empacadora4" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen4"><input class='input_pro' type="text" name="direccion4" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
               <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen4" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
                <hr>
              </div> 

                 <!--*Producto 5-->
                <div class="row" id="datos5">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto5" id='envases5'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 5" name="cantidad5"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 5 en kg" name="peso5"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 5" name="variedad5"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio5"  id="fincas5"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora5"><input class='input_pro' type="text" name="empacadora5" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen5"><input class='input_pro' type="text" name="direccion5" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen5" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 6-->
                <div class="row" id="datos6">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto6" id='envases6'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 6" name="cantidad6"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 6 en kg" name="peso6"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 6" name="variedad6"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio6" id="fincas6"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora6"><input class='input_pro' type="text" name="empacadora6" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen6"><input class='input_pro' type="text" name="direccion6" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen6" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 7-->
                <div class="row" id="datos7">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto7" id='envases7'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 7" name="cantidad7"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 7 en kg" name="peso7"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 7" name="variedad7"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro' name="predio7" id="fincas7"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora7"><input class='input_pro' type="text" name="empacadora7" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen7"><input class='input_pro' type="text" name="direccion7" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                  <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen7" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
                <hr>
               </div> 

                 <!--*Producto 8-->
                <div class="row" id="datos8">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto8" id='envases8'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 8" name="cantidad8"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 8 en kg" name="peso8"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 8" name="variedad8"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro'  name="predio8" id="fincas8"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora8"><input class='input_pro' type="text" name="empacadora8" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen8"><input class='input_pro' type="text" name="direccion8" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                  <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen8" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
                <hr>
                </div> 

                 <!--*Producto 9-->
                <div class="row" id="datos9">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto9" id='envases9'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 9" name="cantidad9"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 9 en kg" name="peso9"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 9" name="variedad9"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro'  name="predio9" id="fincas9"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora9"><input class='input_pro' type="text" name="empacadora9" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen9"><input class='input_pro' type="text" name="direccion9" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                  <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen9" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
              <hr>
                </div> 

                 <!--*Producto 10-->
                <div class="row" id="datos10">
              <div class='col-12 col-md-2 offset-md-1'><select style='padding:0.2em 0em;' class='input_pro' name="producto10" id='envases10'></select></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' placeholder="Cantidad 10" name="cantidad10"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='number' step="0.01" placeholder="Peso 10 en kg" name="peso10"/></div>
              <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder="Variedad 10" name="variedad10"/></div>

              <div class="col-12 col-md-3 offset-md-1"><select style="padding:0.2em 0em;" class='input_pro'  name="predio10" id="fincas10"></select></div>
              <div class="col-12 col-md-3"><p id="reg_empacadora10"><input class='input_pro' type="text" name="empacadora10" placeholder="Registro de Empacadora"></p></div>
              <div class="col-12 col-md-2"><p id="direccion_origen10"><input class='input_pro' type="text" name="direccion10" placeholder="Dirección de Origen"></p></div>
              <div class="col-12 col-md-2" style="text-align: center;">
                <a title="ACTUALIZAR LISTA DE ORÍGENES" id="actualizar_origen10" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
                  <hr>
                </div>
                <div class="row">
                   <div class="col-12 col-md-8 offset-md-2"><input  class="input_pro" name="uso" id="uso" type="text" placeholder="USO" value="CONSUMO HUMANO" required></div>
                 </div> 
              </div>
            </div>

            <!--*******************************DATOS DE TRANSPORTE*************************************************-->
            <div class="row">
              <div class="col-12"><h4>DATOS DE TRANSPORTE <i class="fas fa-truck"></i></h4></div>
              <div class="col-12 col-md-2 offset-md-1">
              	<input type="text" name="medio_transporte" class="input_pro" placeholder="Medio de Transporte" value="TERRESTRE">
              </div>
              <div class="col-12 col-md-2">
              	<select  id="vehiculo" class="input_pro">
              		<option selected>VEHÍCULO*</option>
              		<?php
              		$statement=$conexion->prepare("SELECT * FROM vehiculos ORDER BY vehiculo ASC");
              		$statement->execute();
              		$vehiculos=$statement->fetchAll();
              		foreach ($vehiculos as $fila) {
              			$nombre_vehiculo=$fila['vehiculo'];
              			$id_vehiculo=$fila['id_vehiculo'];
              		 	echo "<option value='$id_vehiculo'>$nombre_vehiculo</option>";
              		 } 

              		 ?>

              	</select>
              </div>
              <div class="col-12 col-md-2" id="placas">
              	<input class='input_pro' type="text" name="placas" placeholder="Placas y/o números">
              </div>
              <div class="col-12 col-md-2" id="modelo">
              	<input class='input_pro' type="text" name="modelo" placeholder="Modelo">
              </div>
              <div class="col-12 col-md-2" style="text-align: center;">
<a title="AGREGAR VEHÍCULO" class="boton_agregar_producto " href="certificados/registro_vehiculo.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
<a title="ACTUALIZAR VEHÍCULO" id="actualizar_vehiculos" class="boton_actualizar_producto "><i class="fas fa-sync"></i></a>
              </div>

              <div class="col-12 col-md-2 offset-md-1">
              	<select id="chofer" class="input_pro">
              		<option selected>CHOFER*</option>
              		<?php
              		$statement=$conexion->prepare('SELECT * FROM conductor ORDER BY nombre ASC');
              		$statement->execute();
              		$conductores=$statement->fetchAll();
              		foreach ($conductores as $fila) {
              			$nombre_conductor=$fila['nombre'];
              			$id_conductor=$fila['id_conductor'];
              		 	echo "<option value='$id_conductor'>$nombre_conductor</option>";
              		 } 

              		 ?>
              	</select>
              </div>
           <div class="col-12 col-md-2" id="direccion_chofer">
           	<input class='input_chofer' type="text" placeholder="Dirección" name="direccion_chofer">
           </div>
           <div class="col-12 col-md-2" id="estado_chofer2">
           	<input class='input_chofer' type="text" placeholder="Estado" name="estado_chofer">
           </div>
           <div class="col-12 col-md-2" id="licencia_chofer">
           	<input class='input_chofer' type="text" placeholder="Número de licencia" name="no_licencia">
           </div>
           <div class="col-12 col-md-2" style="text-align: center;">
<a title="AGREGAR CHOFER" class="boton_agregar_producto " href="certificados/registro_chofer.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
<a title="ACTUALIZAR CHOFER" id="actualizar_chofer" class="boton_actualizar_producto "><i class="fas fa-sync"></i></a>
              </div>

            <div class="col-12 col-md-2 offset-md-1">
            <input class='input_chofer' type="text" placeholder="Color" name="color">
           </div>
           <div class="col-12 col-md-2">
            <input class='input_chofer' type="text" placeholder="Placas de la Caja" name="placas_caja">
           </div>
           <div class="col-12 col-md-2">
            <input class='input_chofer' type="text" placeholder="Clase/Tipo" name="clase">
           </div>
           <div class="col-12 col-md-2">
            <input class='input_chofer' type="text" placeholder="Linea" name="linea">
           </div>

              <div class="col-12 col-md-6 offset-md-1"><input class='input_chofer' type="text" placeholder="Al servicio de" name="servicio"></div>
              <div class="col-12 col-md-4">
                <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text div-folio-responsiva" id="basic-addon1">Folio responsiva</span>
                       </div>
                        <input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_responsiva' required>
                  </div>
              </div>
            </div>

            <!--*******************************DATOS DE DESTINO*************************************************-->
        <div class="row">
          <div class="col-12"><h4>DESTINO <i class="fas fa-map-marker-alt"></i></h4></div>

          <div class="col-12 col-md-3"><b>Destino:</b><select  class="select2 input_pro" style="width: 100%" name="destino" id="destinos"></select>
          </div>
                <div class="col-12 col-md-3">
                  <p id="direc_destino"><br>
                    <input placeholder="Dirección de destino" class='input_pro' type="text" name="direccion_destino">
                  </p>
                </div>
                <div class="col-12 col-md-2">
                  <p id="ciudad_destino"><br>
                    <input placeholder="Ciudad" class='input_pro' type="text" name="ciudad_destino">
                  </p>
                  </div>
                <div class="col-12 col-md-2">
                  <p id="pais_destino"><br>
                    <input placeholder="País"  class='input_pro' type="text" name="pais_destino">
                  </p>
                  </div>
            <div class="col-12 col-md-2" style="text-align: center;"><br>
<a title="AGREGAR DESTINO" class="boton_agregar_producto" href="certificados/registro_destino.php" target="_blank"><i class="fas fa-plus-circle"></i></a>
<a title="ACTUALIZAR DESTINOS" id="actualizar_destino" class="boton_actualizar_producto"><i class="fas fa-sync"></i></a>
              </div>
        </div>
        <!--*******************************DATOS DE CLORINACIÓN*************************************************-->

        <div class="row">
          <div class="col-12"><h4>DATOS DE CLORINACIÓN <i class="fas fa-vial"></i></h4></div>
          <div class="col-12 col-md-5 offset-md-1">
                  <b>Procedimiento: </b> INMERCIÓN CLORADA AL <input  style="text-align: center;" class="clorinacion" type="number" value="6" name="clorinacion"> %
          </div>
          <div class="col-12 col-md-4">
                <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text div-folio-clorinacion" id="basic-addon1">Folio Clorinación</span>
                       </div>
                        <input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_clorinacion' required>
                  </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-12 col-md-8 offset-md-2">
            <b>RESPONSABLE: </b>
            <select class='input_usuario' name='responsable'>
            	<option value="Jaime Gerardo Vázquez Marroquín">Jaime Gerardo Vázquez Marroquín</option>
            	<option value="Pedro Rios Aguilar">Pedro Rios Aguilar</option>
              <option value="Emanuel Cigarroa Vázquez">Emanuel Cigarroa Vázquez</option>
            </select>
          </div>
          <div class="col-12 col-md-3 offset-md-9">
            <button class="botonenvio" id="enviar"><i class="fas fa-arrow-circle-right icono-enviar"></i><br> Continuar</button>
          </div> 
        </div>
        <input type="hidden" id="contador_fincas" value="1" name="cont_origen">
        <input type="hidden" id="contador_productos" value="1" name="cont_producto">



          </form>
        </div>
      </div>
    </div>

                
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
                © 2019 Bananas Hernández
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/popper/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/plugins/d3/d3.min.js"></script>
    <script src="assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
   <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="assets/plugins/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script>
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
    </script>
   
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>