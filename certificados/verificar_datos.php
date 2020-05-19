<?php
require('../php/conexion.php');
if($_POST)
 {

       $folio=$_POST['folio'];
       $id_responsiva=$_POST['folio_responsiva'];
       $id_clorinacion=$_POST['folio_clorinacion'];
       $v=0;
       $mensaje="";


       $statement=$conexion->prepare("SELECT *FROM certificados WHERE folio ='$folio' LIMIT 1");
       $statement->execute();
       $v_certificado=$statement->fetchAll();
       foreach ($v_certificado as $fila) 
        {
            $mensaje.='El folio <b>"'.$folio.'"</b> del certificado ya ha sido registrado el día '.$fila['fecha_registro'].'*<br>';
            $v++;
        }


       $statement=$conexion->prepare("SELECT *FROM responsiva WHERE id_responsiva ='$id_responsiva' LIMIT 1");
       $statement->execute();
       $v_responsiva=$statement->fetchAll();
       foreach ($v_responsiva as $fila) 
        {
            $mensaje.='El folio <b>"'.$id_responsiva.'"</b> de la carta responsiva ya ha sido registrado en el certificado '.$fila['folio_certificado'].'*<br>';
            $v++;
        }


      $statement=$conexion->prepare("SELECT *FROM constancia_clorinacion WHERE id_clorinacion ='$id_clorinacion' LIMIT 1");
       $statement->execute();
       $v_constancia=$statement->fetchAll();
       foreach ($v_constancia as $fila) 
        {
            $mensaje.='El folio <b>"'.$id_clorinacion.'"</b> de la constancia de clorinación ya ha sido registrado en el certificado '.$fila['folio_certificado'].'*<br>';
            $v++;
        }
     


   

       $estado=$_POST['estado'];
       $statement=$conexion->prepare("SELECT *FROM estados WHERE idEstado ='$estado'");
       $statement->execute();
       $estados=$statement->fetchAll();
       foreach ($estados as $fila) 
        {
            $estado=$fila['estado'];
        }
       $municipio=$_POST['municipio'];
       
       $cliente=$_POST['cliente'];
       $producto=$_POST['producto'];
       $cont_producto=$_POST['cont_producto'];
       
      
       $producto1=$_POST['producto1']; $cantidad1=$_POST['cantidad1']; $peso1=$_POST['peso1']; $variedad1=$_POST['variedad1'];
       if($cont_producto>1)
       {
       $producto2=$_POST['producto2']; $cantidad2=$_POST['cantidad2']; $peso2=$_POST['peso2']; $variedad2=$_POST['variedad2'];
         if($cont_producto>2)
         {
       $producto3=$_POST['producto3']; $cantidad3=$_POST['cantidad3']; $peso3=$_POST['peso3']; $variedad3=$_POST['variedad3'];
              if($cont_producto>3)
              {
       $producto4=$_POST['producto4']; $cantidad4=$_POST['cantidad4']; $peso4=$_POST['peso4']; $variedad4=$_POST['variedad4'];
                 if($cont_producto>4)
                 {
                   $producto5=$_POST['producto5']; $cantidad5=$_POST['cantidad5']; $peso5=$_POST['peso5']; $variedad5=$_POST['variedad5'];       
                     if($cont_producto>5)
                     {
                  $producto6=$_POST['producto6']; $cantidad6=$_POST['cantidad6']; $peso6=$_POST['peso6']; $variedad6=$_POST['variedad6'];
                  if($cont_producto>6)
                     {
                  $producto7=$_POST['producto7']; $cantidad7=$_POST['cantidad7']; $peso7=$_POST['peso7']; $variedad7=$_POST['variedad7'];
                  if($cont_producto>7)
                     {
                  $producto8=$_POST['producto8']; $cantidad8=$_POST['cantidad8']; $peso8=$_POST['peso8']; $variedad8=$_POST['variedad8'];
                  if($cont_producto>8)
                     {
                  $producto9=$_POST['producto9']; $cantidad9=$_POST['cantidad9']; $peso9=$_POST['peso9']; $variedad9=$_POST['variedad9'];
                  if($cont_producto>9)
                     {
                  $producto10=$_POST['producto10']; $cantidad10=$_POST['cantidad10']; $peso10=$_POST['peso10']; $variedad10=$_POST['variedad10'];
              
                     }
              
                     }
              
                     }
              
                     }
              
                     } 
                 }
              }
         }
       }
       
        
      
       $uso=$_POST['uso'];
    
       $cont_origen=$_POST['cont_origen'];
       $predio1=nombre_finca($_POST['predio1'],$conexion);
       $empacadora1=$_POST['empacadora1']; $direccion1=$_POST['direccion1'];
       if ($cont_origen>1)
       {
              $predio2=nombre_finca($_POST['predio2'],$conexion);
              $empacadora2=$_POST['empacadora2']; $direccion2=$_POST['direccion2'];
              if ($cont_origen>2)
              {
                  $predio3=nombre_finca($_POST['predio3'],$conexion);
                   $empacadora3=$_POST['empacadora3']; $direccion3=$_POST['direccion3'];
                  if($cont_origen>3)
                  {
                   $predio4=nombre_finca($_POST['predio4'],$conexion);
                   $empacadora4=$_POST['empacadora4']; $direccion4=$_POST['direccion4'];
                   if($cont_origen>4)
                   {
                    $predio5=nombre_finca($_POST['predio5'],$conexion); 
                    $empacadora5=$_POST['empacadora5']; $direccion5=$_POST['direccion5'];
                    if($cont_origen>5)
                    {
                     $predio6=nombre_finca($_POST['predio6'],$conexion);
                     $empacadora6=$_POST['empacadora6']; $direccion6=$_POST['direccion6'];
                     if($cont_origen>6)
                     {
                       $predio7=nombre_finca($_POST['predio7'],$conexion); 
                       $empacadora7=$_POST['empacadora7']; $direccion7=$_POST['direccion7'];
                       if($cont_origen>7)
                       {
                             $predio8=nombre_finca($_POST['predio8'],$conexion); 
                             $empacadora8=$_POST['empacadora8']; $direccion8=$_POST['direccion8'];
                        if($cont_origen>8)
                       {
                             $predio9=nombre_finca($_POST['predio9'],$conexion); 
                             $empacadora9=$_POST['empacadora9']; $direccion9=$_POST['direccion9'];

                             if($cont_origen>9)
                       {
                             $predio10=nombre_finca($_POST['predio10'],$conexion); 
                             $empacadora10=$_POST['empacadora10']; $direccion10=$_POST['direccion10'];

                       }

                       }

                       }
                     }
                    }
                   }
                  }
              }

       }
       
      
       $medio_transporte=$_POST['medio_transporte'];
       $vehiculo=$_POST['vehiculo'];
       $placas=$_POST['placas'];
       $modelo=$_POST['modelo'];
       $nombre_chofer=$_POST['nombre_chofer'];
       $direccion_chofer=$_POST['direccion_chofer'];
       $color=$_POST['color'];
       $placas_caja=$_POST['placas_caja'];
       $clase=$_POST['clase'];
       $linea=$_POST['linea'];
       $estado_chofer=$_POST['estado_chofer'];
       $statement=$conexion->prepare("SELECT *FROM estados WHERE idEstado ='$estado_chofer'");
       $statement->execute();
       $estados=$statement->fetchAll();
       foreach ($estados as $fila) 
        {
            $estado_chofer=$fila['estado'];
        }
       $no_licencia=$_POST['no_licencia'];
       $servicio=$_POST['servicio'];
       $responsable=$_POST['responsable'];
       $folio_responsiva=$_POST['folio_responsiva'];

       $destino=$_POST['destino'];
       $statement=$conexion->prepare("SELECT *FROM destinos WHERE id_destino ='$destino'");
       $statement->execute();
       $destinos=$statement->fetchAll();
       foreach ($destinos as $fila) 
        {
            $destino=$fila['destino'];
        }
       $direccion_destino=$_POST['direccion_destino'];
       $ciudad_destino=$_POST['ciudad_destino'];
       $pais_destino=$_POST['pais_destino'];
       if($tipo_usuario!='Bascula')
       {
        $fecha=$_POST['fecha'];
        $hora=$_POST['hora'];
       }

       $clorinacion=$_POST['clorinacion'];
       $folio_clorinacion=$_POST['folio_clorinacion'];

       //header('Location: http://localhost/p%C3%A1gina/certificados/registro_usuarios.php');
    
   /* $envase=$_POST['envase'];
    $registrar_envase=$conexion->prepare("INSERT INTO envases(id_envase,envase) VALUES (null,'$envase')");
    $registrar_envase->execute();
    echo "<script>alert('Envase Registrado');</script>";*/

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
    <link rel="icon" type="image/png" sizes="16x16" href="../images/icono-pestaña/logopestaña.ico">
    <title>Verificar Datos</title>
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
    <link rel="stylesheet" href="css/estilosformsregistros.css">
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
      .col-12{
        margin-top: : 1em;
        margin-bottom: 1em;
      }
      .camposdestino{
        margin-top: 1em;
      }
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
                        <h3 class="text-themecolor">PRODUCTOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Certificados</a></li>
                            <li class="breadcrumb-item active">Verificar Datos</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Inicio de contenido de la página -->
                <!-- ============================================================== -->
<form action="agregar_certificado.php" method="post">
    <div class="container">
      
      <div class="row">
        <div class="col-12">
          <div class="row">
             <?php 

                                    if($v>0)
                                   {
                                     echo "
                                         <div class='col-12'>
                                         <p style='color:red; font-size:1.8em; text-align:center; text-decoration: blink;'>$mensaje</p>
                                         </div>
                                       ";
                                   }

                                    if($tipo_usuario!='Bascula')
                                    {
                                      echo "
                                      <div class='col-12'>
                                      <input type='hidden' name='hora_fecha' value='$fecha $hora:00'>
                                      </div>";
                                    }
                                     ?>
          </div>
          <div class="row">
            <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="social-widget">
                                        <div class="soc-header box-facebook"><i class="fas fa-user"></i> <?php echo $cliente ?></div>
                                        <div class="soc-content">
                                            <div class="col-3 b-r">
                                                <h3 class="font-medium">Lugar y Fecha</h3>
                                                <h5 class="text-muted"><?php echo $municipio.', '.$estado."   |     ". $fecha."  ".$hora; ?></h5></div>
                                            <div class="col-3 b-r">
                                                <h3 class="font-medium">Producto</h3>
                                                <h5 class="text-muted"><?php echo $producto; ?></h5>
                                            </div>
                                            <div class="col-2 b-r">
                                                <h3 class="font-medium">Folio Origen</h3>
                                                <h5 class="text-muted"><?php echo $folio; ?></h5>
                                            </div>
                                            <div class="col-2 b-r">
                                                <h3 class="font-medium">Responsiva</h3>
                                                <h5 class="text-muted"><?php echo $folio_responsiva; ?></h5>
                                            </div>
                                            <div class="col-2">
                                                <h3 class="font-medium">Clorinación</h3>
                                                <h5 class="text-muted"><?php echo $folio_clorinacion; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
            <input type="hidden" name="cliente" value="<?php echo $cliente; ?>">
            <input type="hidden" name="producto" value="<?php echo $producto; ?>">
            <input type="hidden" name="municipio" value="<?php echo $municipio; ?>">
            <input type="hidden" name="estado" value="<?php echo $estado; ?>">
            <input type="hidden" name="folio" value="<?php echo $folio; ?>">

            
          </div>

          <div class="row">
             <!-- column -->
                    <div class="col-12">
                        <div class="card card-outline-inverse">
                          <div class="card-header">
                            <h2 class="card-title text-white">INFORMACIÓN DE CERTIFICADO</h2>
                          </div>
                            <div class="card-body">
                                <h4 class="card-title text-inverse">PRODUCTO PARA USO: <b class="text-inverse"><?php echo $uso ?></b></h4>
                                <h4 class="card-title text-inverse">Grado de clorinación: <b class="text-inverse"><?php echo $clorinacion ?>%</b></h4>
                                <h4 class="card-title text-inverse">Responsable: <b class="text-inverse"><?php echo $responsable ?></b></h4>
                              
                                <input type="hidden" name="cont_producto" value="<?php echo $cont_producto; ?>">
                                <h6 class="card-subtitle"><?php echo '<b>Número de productos a Registrar:</b> '.$cont_producto; ?></h6>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered text-center color-table success-table
">
                                        <thead>
                                            <tr>
                                                <th>VARIEDAD</th>
                                                <th>ENVASE</th>
                                                <th>CANTIDAD</th>
                                                <th>P/U (Kg)</th>
                                                <th>VOLUMEN</th>
                                                <th>FINCA</th>
                                                <th>EMPACADORA</th>
                                                <th>ORIGEN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <?php $volumen1=$cantidad1*$peso1; ?>
                                                <td><?php echo $variedad1; ?></td>
                                                <td><?php echo $producto1 ?></td>
                                                <td><?php echo $cantidad1 ?></td>
                                                <td><?php echo $peso1?></td>
                                                <td><?php echo $volumen1." Kgs" ?></td>
                                                <td><?php echo $predio1 ?></td>
                                                <td><?php echo $empacadora1 ?></td>
                                                <td><?php echo $direccion1 ?></td>
                                                <input type="hidden" name="variedad1" value="<?php echo $variedad1; ?>">
                                                 <input type="hidden" name="producto1" value="<?php echo $producto1; ?>">
                                                 <input type="hidden" name="cantidad1" value="<?php echo $cantidad1; ?>">
                                                 <input type="hidden" name="peso1" value="<?php echo $peso1; ?>">
                                                 <input type="hidden" name="volumen1" value="<?php echo $volumen1; ?>">
                                                 <input type="hidden" name="predio1" value="<?php echo $predio1 ?>">
                                                 <input type="hidden" name="empacadora1" value="<?php echo $empacadora1 ?>">
                                                 <input type="hidden" name="direccion1" value="<?php echo $direccion1 ?>">
                                            </tr>

                                            <?php
  
if($cont_producto>1)
       {
       $volumen2=$cantidad2*$peso2;
       
       echo "                               <tr>
                                                <td>$variedad2</td>
                                                <td>$producto2</td>
                                                <td>$cantidad2</td>
                                                <td>$peso2</td>
                                                <td>$volumen2  Kgs</td>
                                                <td>$predio2</td>
                                                <td>$empacadora2</td>
                                                <td>$direccion2</td>
                                            </tr>";


       echo "<input type='hidden' name='variedad2' value='$variedad2'>
             <input type='hidden' name='producto2' value='$producto2'>
             <input type='hidden' name='cantidad2' value='$cantidad2'>
             <input type='hidden' name='peso2' value='$peso2'>
             <input type='hidden' name='volumen2' value='$volumen2'>

             <input type='hidden' name='predio2' value='$predio2'>
             <input type='hidden' name='empacadora2' value='$empacadora2'>
             <input type='hidden' name='direccion2' value='$direccion2'>";
         if($cont_producto>2)
         {
              $volumen3=$cantidad3*$peso3;
        echo "                               <tr>
                                                <td>$variedad3</td>
                                                <td>$producto3</td>
                                                <td>$cantidad3</td>
                                                <td>$peso3</td>
                                                <td>$volumen3  Kgs</td>
                                                <td>$predio3</td>
                                                <td>$empacadora3</td>
                                                <td>$direccion3</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad3' value='$variedad3'>
             <input type='hidden' name='producto3' value='$producto3'>
             <input type='hidden' name='cantidad3' value='$cantidad3'>
             <input type='hidden' name='peso3' value='$peso3'>
             <input type='hidden' name='volumen3' value='$volumen3'>

             <input type='hidden' name='predio3' value='$predio3'>
             <input type='hidden' name='empacadora3' value='$empacadora3'>
             <input type='hidden' name='direccion3' value='$direccion3'>";
              if($cont_producto>3)
              {
                $volumen4=$cantidad4*$peso4;
        echo "                               <tr>
                                                <td>$variedad4</td>
                                                <td>$producto4</td>
                                                <td>$cantidad4</td>
                                                <td>$peso4</td>
                                                <td>$volumen4  Kgs</td>
                                                <td>$predio4</td>
                                                <td>$empacadora4</td>
                                                <td>$direccion4</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad4' value='$variedad4'>
             <input type='hidden' name='producto4' value='$producto4'>
             <input type='hidden' name='cantidad4' value='$cantidad4'>
             <input type='hidden' name='peso4' value='$peso4'>
             <input type='hidden' name='volumen4' value='$volumen4'>

             <input type='hidden' name='predio4' value='$predio4'>
             <input type='hidden' name='empacadora4' value='$empacadora4'>
             <input type='hidden' name='direccion4' value='$direccion4'>";
                 if($cont_producto>4)
                 {
                     $volumen5=$cantidad5*$peso5;
        echo "                               <tr>
                                                <td>$variedad5</td>
                                                <td>$producto5</td>
                                                <td>$cantidad5</td>
                                                <td>$peso5</td>
                                                <td>$volumen5  Kgs</td>
                                                <td>$predio5</td>
                                                <td>$empacadora5</td>
                                                <td>$direccion5</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad5' value='$variedad5'>
             <input type='hidden' name='producto5' value='$producto5'>
             <input type='hidden' name='cantidad5' value='$cantidad5'>
             <input type='hidden' name='peso5' value='$peso5'>
             <input type='hidden' name='volumen5' value='$volumen5'>

             <input type='hidden' name='predio5' value='$predio5'>
             <input type='hidden' name='empacadora5' value='$empacadora5'>
             <input type='hidden' name='direccion5' value='$direccion5'>";

             if($cont_producto>5)
                 {
                     $volumen6=$cantidad6*$peso6;
        echo "                               <tr>
                                                <td>$variedad6</td>
                                                <td>$producto6</td>
                                                <td>$cantidad6</td>
                                                <td>$peso6</td>
                                                <td>$volumen6  Kgs</td>
                                                <td>$predio6</td>
                                                <td>$empacadora6</td>
                                                <td>$direccion6</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad6' value='$variedad6'>
             <input type='hidden' name='producto6' value='$producto6'>
             <input type='hidden' name='cantidad6' value='$cantidad6'>
             <input type='hidden' name='peso6' value='$peso6'>
             <input type='hidden' name='volumen6' value='$volumen6'>

             <input type='hidden' name='predio6' value='$predio6'>
             <input type='hidden' name='empacadora6' value='$empacadora6'>
             <input type='hidden' name='direccion6' value='$direccion6'>";

              if($cont_producto>6)
                 {
                     $volumen7=$cantidad7*$peso7;
        echo "                               <tr>
                                                <td>$variedad7</td>
                                                <td>$producto7</td>
                                                <td>$cantidad7</td>
                                                <td>$peso7</td>
                                                <td>$volumen7  Kgs</td>
                                                <td>$predio7</td>
                                                <td>$empacadora7</td>
                                                <td>$direccion7</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad7' value='$variedad7'>
             <input type='hidden' name='producto7' value='$producto7'>
             <input type='hidden' name='cantidad7' value='$cantidad7'>
             <input type='hidden' name='peso7' value='$peso7'>
             <input type='hidden' name='volumen7' value='$volumen7'>

             <input type='hidden' name='predio7' value='$predio7'>
             <input type='hidden' name='empacadora7' value='$empacadora7'>
             <input type='hidden' name='direccion7' value='$direccion7'>";

             if($cont_producto>7)
                 {
                     $volumen8=$cantidad8*$peso8;
        echo "                               <tr>
                                                <td>$variedad8</td>
                                                <td>$producto8</td>
                                                <td>$cantidad8</td>
                                                <td>$peso8</td>
                                                <td>$volumen8  Kgs</td>
                                                <td>$predio8</td>
                                                <td>$empacadora8</td>
                                                <td>$direccion8</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad8' value='$variedad8'>
             <input type='hidden' name='producto8' value='$producto8'>
             <input type='hidden' name='cantidad8' value='$cantidad8'>
             <input type='hidden' name='peso8' value='$peso8'>
             <input type='hidden' name='volumen8' value='$volumen8'>

             <input type='hidden' name='predio8' value='$predio8'>
             <input type='hidden' name='empacadora8' value='$empacadora8'>
             <input type='hidden' name='direccion8' value='$direccion8'>";

             if($cont_producto>8)
                 {
                     $volumen9=$cantidad9*$peso9;
        echo "                               <tr>
                                                <td>$variedad9</td>
                                                <td>$producto9</td>
                                                <td>$cantidad9</td>
                                                <td>$peso9</td>
                                                <td>$volumen9  Kgs</td>
                                                <td>$predio9</td>
                                                <td>$empacadora9</td>
                                                <td>$direccion9</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad9' value='$variedad9'>
             <input type='hidden' name='producto9' value='$producto9'>
             <input type='hidden' name='cantidad9' value='$cantidad9'>
             <input type='hidden' name='peso9' value='$peso9'>
             <input type='hidden' name='volumen9' value='$volumen9'>

             <input type='hidden' name='predio9' value='$predio9'>
             <input type='hidden' name='empacadora9' value='$empacadora9'>
             <input type='hidden' name='direccion9' value='$direccion9'>";

             if($cont_producto>9)
                 {
                     $volumen10=$cantidad10*$peso10;
        echo "                               <tr>
                                                <td>$variedad10</td>
                                                <td>$producto10</td>
                                                <td>$cantidad10</td>
                                                <td>$peso10</td>
                                                <td>$volumen10  Kgs</td>
                                                <td>$predio10</td>
                                                <td>$empacadora10</td>
                                                <td>$direccion10</td>
                                            </tr>";
       echo "<input type='hidden' name='variedad10' value='$variedad10'>
             <input type='hidden' name='producto10' value='$producto10'>
             <input type='hidden' name='cantidad10' value='$cantidad10'>
             <input type='hidden' name='peso10' value='$peso10'>
             <input type='hidden' name='volumen10' value='$volumen10'>

             <input type='hidden' name='predio10' value='$predio10'>
             <input type='hidden' name='empacadora10' value='$empacadora10'>
             <input type='hidden' name='direccion10' value='$direccion10'>";
                 }
                 echo "</div>";
                 }
                 }
                 }
                 }
                 }
              }
         }
       }

?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
          </div>

          <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top img-responsive" src="../assets/images/certificados/transporte.JPG" alt="Card image cap" style="height: 250px;">
                            <div class="card-body">
                                <h3 class="font-normal text-center">MEDIO DE TRANSPORTE</h3>
                                <p class="m-b-0 m-t-10">
                                  <label class="label label-inverse text-center" style="width: 100%"><?php echo $medio_transporte ?></label> <br>
                                  vehículo: <label class="label label-light-inverse"><?php echo $vehiculo ?></label>
                                  Color: <label class="label label-light-inverse"><?php echo $color ?></label> <br>
                                  Placas: <label class="label label-light-inverse"><?php echo $placas ?></label>
                                  Placas Caja: <label class="label label-light-inverse"><?php echo $placas_caja ?></label><br>
                                  Modelo: <label class="label label-light-inverse"><?php echo $modelo ?></label>
                                  Clase/tipo: <label class="label label-light-inverse"><?php echo $clase ?></label><br>
                                  Línea: <label class="label label-light-inverse"><?php echo $linea ?></label> 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top img-responsive" src="../assets/images/certificados/transportista.JPG" alt="Card image cap" style="height: 250px;">
                            <div class="card-body">
                                <h3 class="font-normal text-center">TRANSPORTISTA</h3>
                                <p class="m-b-0 m-t-10">
                                 <label class="label label-info text-center" style="width: 100%"><?php echo $nombre_chofer ?></label> <br>
                                  Dirección: <label class="label label-light-info"><?php echo $direccion_chofer ?></label> <br>
                                  Estado: <label class="label label-light-info"><?php echo $estado_chofer ?></label>
                                  N° Licencia: <label class="label label-light-info"><?php echo $no_licencia ?></label> <br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top img-responsive" src="../assets/images/certificados/destino.JPG" alt="Card image cap" style="height: 250px;">
                            <div class="card-body">
                                <h3 class="font-normal text-center">DESTINO</h3>
                                <p class="m-b-0 m-t-10">
                                 <label class="label label-danger text-center" style="width: 100%"><?php echo $destino ?></label>
                                  Dirección: <label class="label label-light-danger"><?php echo $direccion_destino ?></label><br>
                                  Ciudad: <label class="label label-light-danger"><?php echo $ciudad_destino ?></label><br>
                                  Pais: <label class="label label-light-danger"><?php echo $pais_destino ?></label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                </div>

<!-- DATOS DEL PRODUCTO -->
<input type="hidden" name="uso" value="<?php echo $uso; ?>">
<input type="hidden" name="cont_origen" value="<?php echo $cont_origen; ?> ">
<input type="hidden" name="medio_transporte" value="<?php echo $medio_transporte; ?>">
<input type="hidden" name="vehiculo" value="<?php echo $vehiculo; ?>">
<input type="hidden" name="placas" value="<?php echo $placas; ?>">
<input type="hidden" name="modelo" value="<?php echo $modelo; ?>">
<input type="hidden" name="nombre_chofer" value="<?php echo $nombre_chofer; ?>">
<input type="hidden" name="direccion_chofer" value="<?php echo $direccion_chofer; ?>">
<input type="hidden" name="estado_chofer" value="<?php echo $estado_chofer; ?>">
<input type="hidden" name="no_licencia" value="<?php echo $no_licencia; ?>">
<input type="hidden" name="servicio" value="<?php echo $servicio; ?>">
<input type="hidden" name="folio_responsiva" value="<?php echo $folio_responsiva; ?>">
<input type="hidden" name="destino" value="<?php echo $destino; ?>">
<input type="hidden" name="direccion_destino" value="<?php echo $direccion_destino; ?>">
<input type="hidden" name="ciudad_destino" value="<?php echo $ciudad_destino; ?>">
<input type="hidden" name="pais_destino" value="<?php echo $pais_destino; ?>">
<input type="hidden" name="clorinacion" value="<?php echo $clorinacion; ?>">
<input type="hidden" name="folio_clorinacion" value="<?php echo $folio_clorinacion; ?>">
<input type="hidden" name="responsable" value="<?php echo $responsable; ?>">
<input type="hidden" name="color" value="<?php echo $color; ?>">
<input type="hidden" name="placas_caja" value="<?php echo $placas_caja; ?>">
<input type="hidden" name="linea" value="<?php echo $linea; ?>">
<input type="hidden" name="clase" value="<?php echo $clase; ?>">
      </div>


<dil class="col-12">
  <div class="row">
    <?php 
   if($v>0)
     {
       echo "
           <div class='col-12 col-md-5 offset-md-7'>
           <p style='font-size:1.5em; text-align:center;'>Por favor verifica la información antes de continuar</p>
           </div>";
     }
     else{
      echo "<div class='col-12 col-md-3 offset-md-9'>
          <button class='btn btn-info btn-block' style='font-size:2em;'>Guardar <i class='far fa-save icono'></i></button>
       </div>";

     }

        ?>
  </div>
</dil>
      </div>
    </div>
   </form> 
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
</body>

</html>
<?php 

function nombre_finca($buscar_finca,$conexion)
{ 
  
$statement=$conexion->prepare("SELECT *FROM origen WHERE id_origen ='$buscar_finca'");
$statement->execute();
$fincas=$statement->fetchAll();
foreach ($fincas as $fila) 
{
$finca=$fila['nombre_finca'];
}

  return $finca;
}
?>