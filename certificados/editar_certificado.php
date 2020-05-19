<?php 
require('../php/conexion.php');

$id_certificado=$_POST['id_certificado'];

                                 
                         $statement=$conexion->prepare('SELECT *FROM certificados WHERE id_certificado=:id');
                         $statement->execute( array(':id' => $id_certificado));
                         $certificado=$statement->fetchAll();

                         foreach ($certificado as $fila) 
                         {  
                          $folio=$fila['folio'];
                          $lugar_registro=$fila['lugar_registro'];
                          $remitente=$fila['remitente'];
                          $producto=$fila['producto'];
                          $variedad=$fila['variedad'];
                          $envase=$fila['envase'];
                          $cantidad=$fila['cantidad'];
                          $peso=$fila['peso'];
                          $volumen=$fila['volumen'];
                          $uso=$fila['uso'];
                          $origen=$fila['origen'];
                          $empacadora=$fila['empacadora'];
                          $municipio=$fila['municipio'];
                          $medio_transporte=$fila['medio_transporte'];
                          $marca_vehiculo=$fila['marca_vehiculo'];
                          $placas=$fila['placas'];
                          $nombre_chofer=$fila['nombre_chofer'];
                          $no_licencia=$fila['no_licencia'];
                          $destino=$fila['destino'];
                          $direccion_destino=$fila['direccion_destino'];
                          $ciudad_destino=$fila['ciudad_destino'];
                          $pais_destino=$fila['pais_destino'];
                          $responsable=$fila['responsable'];
                          $fecha_registro=$fila['fecha_registro'];   
                         }

                         $statement=$conexion->prepare('SELECT *FROM responsiva WHERE folio_certificado=:id');
                         $statement->execute( array(':id' => $folio));
                         $certificado=$statement->fetchAll();

                         foreach ($certificado as $fila) 
                         { 
                          $folio_responsiva=$fila['id_responsiva']; 
                          $modelo=$fila['modelo'];
                          $direccion_chofer=$fila['direccion'];
                          $estado_chofer=$fila['estado'];
                          $servicio=$fila['servicio'];  
                         }

                         $statement=$conexion->prepare('SELECT *FROM constancia_clorinacion WHERE folio_certificado=:id');
                         $statement->execute( array(':id' => $folio));
                         $certificado=$statement->fetchAll();

                         foreach ($certificado as $fila) 
                         { 
                          $folio_clorinacion=$fila['id_clorinacion'];
                          $grado=$fila['grado']; 
                         
                         }


$cadena_buscada   = ')';
$cad_envases="";
$procedencia_clorinacion="";
$procedencia_clorinacion2="";
$cad_cantidad="";
$cad_pesos="";
$coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
$cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 
$tamaño_variedad=strlen($variedad);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$coincidencia_origen = strpos($origen, $cadena_buscada);//método de búsqueda de caracteres
$cont_origen= substr($origen, 1,$coincidencia_origen-1);//extracción del contador del 
$tamaño_origen=strlen($origen);
$origen=substr($origen,$coincidencia_origen+1,$tamaño_origen); 


for ($i=0; $i <$cont_variedad ; $i++) { //define elk vector que contiene los orígenes
   $cadena_buscada   = ']';
   $coincidencia_variedad = strpos($variedad, $cadena_buscada);
   $coincidencia_envase = strpos($envase, $cadena_buscada);
   $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
   $coincidencia_peso = strpos($peso, $cadena_buscada);
   $coincidencia_volumen = strpos($volumen, $cadena_buscada);
   
   $tamaño_variedad=strlen($variedad);
   $tamaño_envase=strlen($envase);
   $tamaño_cantidad=strlen($cantidad);
   $tamaño_peso=strlen($peso);
   $tamaño_volumen=strlen($volumen);
 
   $pivotevariedad= substr($variedad, 1,$coincidencia_variedad-1);
   $pivoteenvase= substr($envase, 1,$coincidencia_envase-1);
   $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
   $pivotepeso= substr($peso, 1,$coincidencia_peso-1);
   $pivotevolumen= substr($volumen, 1,$coincidencia_volumen-1);
  
   $variedades[$i]=$pivotevariedad;
   $envases[$i]=$pivoteenvase;
   $cad_envases.=$variedades[$i].', ';//almacena los envases para la carta respnsiva
   $cantidades[$i]=$pivotecantidad;
     $cad_cantidad.=$cantidades[$i].' '.$envases[$i].', ';//almacena las cantidades para la carta respnsiva
   $pesos[$i]=$pivotepeso;
     $cad_pesos.=$pesos[$i].', ';//almacena los pesos para la carta respnsiva
   $volumenes[$i]=$pivotevolumen;
   $variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad);
   $envase=substr($envase,$coincidencia_envase+1,$tamaño_envase);
   $cantidad=substr($cantidad,$coincidencia_cantidad+1,$tamaño_cantidad);
   $peso=substr($peso,$coincidencia_peso+1,$tamaño_peso);
   $volumen=substr($volumen,$coincidencia_volumen+1,$tamaño_volumen);
}

for ($i=0; $i <$cont_origen ; $i++) { //define elk vector que contiene los orígenes
   $cadena_buscada   = ']';
   $coincidencia_origen = strpos($origen, $cadena_buscada);
   $coincidencia_empacadora = strpos($empacadora, $cadena_buscada);
   $coincidencia_municipio = strpos($municipio, $cadena_buscada);
   $tamaño_origen=strlen($origen);
     $tamaño_empacadora=strlen($empacadora);
     $tamaño_municipio=strlen($municipio);
   $pivoteorigen= substr($origen, 1,$coincidencia_origen-1);
   $pivoteempacadora= substr($empacadora, 1,$coincidencia_empacadora-1);
   $pivotemunicipio= substr($municipio, 1,$coincidencia_municipio-1);
   $origenes[$i]=$pivoteorigen;
   $empacadoras[$i]=$pivoteempacadora;
   $municipios[$i]=$pivotemunicipio;
   $origen=substr($origen,$coincidencia_origen+1,$tamaño_origen);
     $empacadora=substr($empacadora,$coincidencia_empacadora+1,$tamaño_empacadora);
     $municipio=substr($municipio,$coincidencia_municipio+1,$tamaño_municipio);
}

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <!--Ícono Pestaña-->
   <link rel="shortcut icon" href="../images/icono-pestaña/logopestaña.ico" />
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
    <link href="<?php echo $tema; ?>" id="theme" rel="stylesheet">
    <!-- Estilos -->
   <link rel="stylesheet" type="text/css" href="../css/estilosnivel2.css">
   <link rel="stylesheet" href="../css/estiloscertificados.css">
    <!--Íconos Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <title>Editar Certificado</title>
  </head>
  <body>

<div id="barra_navegacion">
           
              </div>

              <script type="text/javascript">
   
                   $("#barra_navegacion").load('../php/menu_nav.php div#nivel2');
   
              </script>

    <!--banner -->
    <div id="banner">
     </div>
     <!--/banner -->
  <!-- formulario -->

      <div class="container formato">
        <h1 class="titulo">BANANAS HERNÁNDEZ</h1>
        <section>
          
           <form action="actualizando_datos_certificado.php" method="post">
            <!--<img class="seccion_icono" src="images/logo-pagina/logo.png" alt="">-->
            <div class="row">
            <div style="font-size: 1.2em;text-align: center;" class="col-12 col-md-8 offset-md-2"> 
                   <h4><?php echo $lugar_registro; ?></h4>  
            </div>
                  <div class="row">

            <div class="col-12 col-md-10 offset-md-2">
                  <div style="margin-top: 1em;"  class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text div-folio-origen" id="basic-addon1">Folio de certificado</span>
                       </div>
                        <?php 
                        if ($tipo_usuario=="Administrador") {
                         echo "<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio'  value='$folio' required>";
                        }
                        else
                        {
                         echo "<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio'  value='$folio' readOnly required>";
                        }

                         ?>
                  </div>
              </div>

                       
                  </div>
<div class="row">
 <!--******************************* solicitante y producto*************************************************-->
    <div class="col-12 col-md-5 offset-md-1" style="text-align: center;">
                            <b>Al C.</b>
                            <input type="text" class='input_pro' name="cliente" value="<?php echo $remitente; ?>">
                      </div>
    <div class="col-12 col-md-5" style="text-align: center;">
                          <b>Transportará:</b> 
                          <input type="text" class='input_pro' name="producto" value="<?php echo $producto; ?>">
                      </div>

<!--*******************************DATOS DEL PRODUCTO*************************************************-->
 <div class="col-12"><h4 style="text-align: center;">DATOS DEL PRODUCTO <i class="fas fa-balance-scale"></i> Y PROCEDENCIA <i class="fas fa-home"></i></h4></div>                                                              
  <div class="container">
    <div class="row">

      <?php  
       $n=1; 
       for ($i=0; $i <$cont_variedad ; $i++) {
      
         echo "
<div class='col-12'>
   <div class='row'>
   <div  class='col-12 offset-md-2 col-md-2'><input class='input_pro' type='text' placeholder='Producto $n' name='producto$n' value='$envases[$i]' required /></div>
   <div  class='col-12 col-md-2'><input class='input_pro' type='number' placeholder='Cantidad $n' name='cantidad$n' value='$cantidades[$i]' required /></div>
   <div class='col-12 col-md-2'><input class='input_pro' type='number' step='0.01' placeholder='Peso $n en kg' name='peso$n' value='$pesos[$i]' required /></div>
   <div class='col-12 col-md-2'><input class='input_pro' type='text' placeholder='Variedad $n' name='variedad$n' value='$variedades[$i]' required/></div>

   <div class='col-12 offset-md-1 col-md-4'><input class='input_pro' type='text' name='predio$n'  placeholder='Finca $n' value='$origenes[$i]' required></div>
    <div class='col-12 col-md-3'><input class='input_pro' type='text' name='empacadora$n'  placeholder='Registro de Empacadora $n' value='$empacadoras[$i]' required></div>
    <div class='col-12 col-md-3'><input class='input_pro' type='text' name='direccion$n' placeholder='Dirección de Origen $n' value='$municipios[$i]' required></div>
   </div>            
</div>";
          $n++;
       }

      ?>
                                        
     <div class="col-12 offset-md-2 col-md-8" style="text-align: center;">
          <input  class="input_pro" name="uso" id="uso" type="text" placeholder="USO" value="<?php echo $uso; ?>" required>
    </div>
  </div>
           </div> 
                          

<!--*******************************DATOS DE TRANSPORTE*************************************************-->
 <div class="container">
      <div class="row">
         <div class="col-12"><h4 style="text-align: center;">DATOS DE TRANSPORTE <i class="fas fa-truck"></i></h4></div>

  <div class="col-12 offset-md-1 col-md-2"><input class='input_pro' type="text" name="medio_transporte" placeholder="Medio de Transporte" value="<?php echo $medio_transporte; ?>"></div>
  <div class="col-12 col-md-3"><input class='input_pro' type="text" name="vehiculo" placeholder="Marca del vehículo" value="<?php echo $marca_vehiculo; ?>"></div>
  <div class="col-12 col-md-3"><input class='input_pro' type="text" name="placas" placeholder="Placas y/o números" value="<?php echo $placas;?>"></div>
  <div class="col-12 col-md-2"><input class='input_pro' type="text" name="modelo" placeholder="Modelo" value="<?php echo $modelo;?>"></div>


  <div class="col-12 col-md-4"><input class='input_chofer' type="text" placeholder="Nombre del Chofer" name="nombre_chofer" value="<?php echo $nombre_chofer;?>"></div>
  <div class="col-12 col-md-4"><input class='input_chofer' type="text" placeholder="Dirección" name="direccion_chofer" value="<?php echo $direccion_chofer;?>"></div>
 
  <div class="col-12 col-md-2"><input class='input_chofer' type="text" placeholder="Estado" name="estado_chofer" value="<?php echo $estado_chofer;?>"></div>
  <div class="col-12 col-md-2"><input class='input_chofer' type="text" placeholder="Número de licencia" name="no_licencia" value="<?php echo $no_licencia;?>"></div>


  <div class="col-12 col-md-7 offset-md-1">
    <input class='input_chofer' type="text" placeholder="Al servicio de" name="servicio" value="<?php echo $servicio;?>">
  </div>

<?php 
    if ($tipo_usuario=="Administrador") {
     $input_responsiva="<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_responsiva' value='$folio_responsiva' max='$folio_responsiva' required>";
      }
      else
        {
           $input_responsiva="<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_responsiva' value='$folio_responsiva' max='$folio_responsiva' readOnly required>";
      }
?> 

   <div class="col-12 col-md-3">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text div-folio-responsiva" id="basic-addon1">Folio responsiva</span>
      </div>
        <?php echo $input_responsiva; ?>
    </div>
   </div>

  </div>
      
</div> 
                            


                            
<!--*******************************DATOS DE DESTINO*************************************************-->


  <div class="container">
    <div class="row">
      <div class="col-12"><h4 style="text-align: center;">DESTINO <i class="fas fa-map-marker-alt"></i></h4></div>

         <div class="col-12 col-md-3 offset-md-1">
                    <input placeholder="Destino" class='input_pro' type="text" name="destino" value="<?php echo $destino;?>">        
          </div>
      <div class="col-12 col-md-4">
        <input placeholder="Dirección de destino" class='input_pro' type="text" name="direccion_destino" value="<?php echo $direccion_destino;?>" >
      </div>
      <div class="col-12 col-md-2">
        <input placeholder="Ciudad" class='input_pro' type="text" name="ciudad_destino" value="<?php echo $ciudad_destino;?>">
      </div>
      <div class="col-12 col-md-2">
        <input placeholder="País"  class='input_pro' type="text" name="pais_destino" value="<?php echo $pais_destino;?>">
      </div>
  </div>


 <div class="row">
    <div class="col-12"><h4 style="text-align: center;">DATOS DE CLORINACIÓN <i class="fas fa-vial"></i></h4></div>

  <div style="text-align: center;" class="col-12 col-md-6 offset-md-1">
  <b>Procedimiento empleado: </b> INMERCIÓN CLORADA AL 
  <input style="width: 10%" type="text" value="<?php echo $grado;?>" name="clorinacion">%.
  </div>

    <?php 
     if ($tipo_usuario=="Administrador") {
       $input_clorinacion="<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_clorinacion' value='$folio_clorinacion' required>";
    }
    else
      {
      $input_clorinacion="<input type='number' class='form-control' placeholder='Folio' aria-label='Folio' aria-describedby='basic-addon1' name='folio_clorinacion' readOnly required>";
    }
                         ?>

  <div class="col-12 col-md-3">
                <div class="input-group mb-3">
                       <div class="input-group-prepend">
                           <span class="input-group-text div-folio-clorinacion" id="basic-addon1">Folio Clorinación</span>
                       </div>
                        <?php echo $input_clorinacion; ?>
                  </div>
  </div>
 </div>
 <div class="row">
   <div class="col-12 col-md-4 offset-md-4">
        <b>RESPONSABLE: <?php echo $responsable; ?></b>
    </div>
           <input type="hidden" id="contador_fincas" value="<?php echo $cont_variedad;?>" name="cont_origen">
           <input type="hidden" id="contador_productos" value="<?php echo $cont_origen;?>" name="cont_producto">
           <input type="hidden" value="<?php echo $id_certificado;?>" name="id_certificado">
           <input type="hidden" value="<?php echo $folio_responsiva;?>" name="id_responsiva">
           <input type="hidden" value="<?php echo $folio_clorinacion;?>" name="id_clorinacion">

    <div style="margin-bottom: 3%;" class="col-12 col-md-4 offset-md-8">
        <button class="botonenvio" id="enviar"><i class="fas fa-check-circle icono-enviar"></i>Actualizar</button>
    </div>
   
 </div>
              
            
          
<!--*******************************DATOS DE CLORINACIÓN*************************************************--> 

 

    </div>
  </div>
    
 
 

           




                    </div>

            
          </form>
        </section>
        
      </div>
  <!-- /formulario -->
    
    <div id="copyright">
      <?php echo $footer ?>
    </div>

 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>