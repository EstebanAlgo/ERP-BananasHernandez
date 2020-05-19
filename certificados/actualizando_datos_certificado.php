<?php 
require('../php/conexion.php');	
       $id_certificado=$_POST['id_certificado'];
       $id_responsiva=$_POST['id_responsiva'];
       $id_clorinacion=$_POST['id_clorinacion'];
       $cliente=$_POST['cliente'];
       $producto=$_POST['producto'];
       $cont_producto=$_POST['cont_producto'];
       $variedad=""; $envase=""; $cantidad=""; $peso=""; $volumen="";
       $producto1=$_POST['producto1']; $cantidad1=$_POST['cantidad1']; $peso1=$_POST['peso1']; $variedad1=$_POST['variedad1'];

       $variedad.='('.$cont_producto.')'.'['.$variedad1.']';
       $envase.='['.$producto1.']';
       $cantidad.='['.$cantidad1.']';
       $peso.='['.$peso1.']';
       $volumen.='['.$cantidad1*$peso1.']';
       if($cont_producto>1)
       {
       $producto2=$_POST['producto2']; $cantidad2=$_POST['cantidad2']; $peso2=$_POST['peso2']; $variedad2=$_POST['variedad2'];
       $variedad.='['.$variedad2.']';
       $envase.='['.$producto2.']';
       $cantidad.='['.$cantidad2.']';
       $peso.='['.$peso2.']';
       $volumen.='['.$cantidad2*$peso2.']';
         if($cont_producto>2)
         {
       $producto3=$_POST['producto3']; $cantidad3=$_POST['cantidad3']; $peso3=$_POST['peso3']; $variedad3=$_POST['variedad3'];
       $variedad.='['.$variedad3.']';
       $envase.='['.$producto3.']';
       $cantidad.='['.$cantidad3.']';
       $peso.='['.$peso3.']';
       $volumen.='['.$cantidad3*$peso3.']';
              if($cont_producto>3)
              {
       $producto4=$_POST['producto4']; $cantidad4=$_POST['cantidad4']; $peso4=$_POST['peso4']; $variedad4=$_POST['variedad4'];
       $variedad.='['.$variedad4.']';
       $envase.='['.$producto4.']';
       $cantidad.='['.$cantidad4.']';
       $peso.='['.$peso4.']';
       $volumen.='['.$cantidad4*$peso4.']';
                 if($cont_producto>4)
                 {
       $producto5=$_POST['producto5']; $cantidad5=$_POST['cantidad5']; $peso5=$_POST['peso5']; $variedad5=$_POST['variedad5'];
       $variedad.='['.$variedad5.']';
       $envase.='['.$producto5.']';
       $cantidad.='['.$cantidad5.']';
       $peso.='['.$peso5.']';
       $volumen.='['.$cantidad5*$peso5.']';       
                     if($cont_producto>5)
                     {
       $producto6=$_POST['producto6']; $cantidad6=$_POST['cantidad6']; $peso6=$_POST['peso6']; $variedad6=$_POST['variedad6'];
       $variedad.='['.$variedad6.']';
       $envase.='['.$producto6.']';
       $cantidad.='['.$cantidad6.']';
       $peso.='['.$peso6.']';
       $volumen.='['.$cantidad6*$peso6.']'; 
                    if($cont_producto>6)
                     {
       $producto7=$_POST['producto7']; $cantidad7=$_POST['cantidad7']; $peso7=$_POST['peso7']; $variedad7=$_POST['variedad7'];
       $variedad.='['.$variedad7.']';
       $envase.='['.$producto7.']';
       $cantidad.='['.$cantidad7.']';
       $peso.='['.$peso7.']';
       $volumen.='['.$cantidad7*$peso7.']';
                    if($cont_producto>7)
                     {
       $producto8=$_POST['producto8']; $cantidad8=$_POST['cantidad8']; $peso8=$_POST['peso8']; $variedad8=$_POST['variedad8'];
       $variedad.='['.$variedad8.']';
       $envase.='['.$producto8.']';
       $cantidad.='['.$cantidad8.']';
       $peso.='['.$peso8.']';
       $volumen.='['.$cantidad8*$peso8.']';
                    if($cont_producto>8)
                     {
       $producto9=$_POST['producto9']; $cantidad9=$_POST['cantidad9']; $peso9=$_POST['peso9']; $variedad9=$_POST['variedad9'];
       $variedad.='['.$variedad9.']';
       $envase.='['.$producto9.']';
       $cantidad.='['.$cantidad9.']';
       $peso.='['.$peso9.']';
       $volumen.='['.$cantidad9*$peso9.']'; 
                     if($cont_producto>9)
                     {
       $producto10=$_POST['producto10']; $cantidad10=$_POST['cantidad10']; $peso10=$_POST['peso10']; $variedad10=$_POST['variedad10'];
       $variedad.='['.$variedad10.']';
       $envase.='['.$producto10.']';
       $cantidad.='['.$cantidad10.']';
       $peso.='['.$peso6.']';
       $volumen.='['.$cantidad10*$peso10.']'; 
              
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
       $origen="(".$cont_origen.")"; $empacadora=""; $direcion_empacadora="";
       $origen.='['.$_POST['predio1'].']';
       $empacadora.='['.$_POST['empacadora1'].']';
       $direcion_empacadora.='['.$_POST['direccion1'].']';
       if ($cont_origen>1)
       {
              $origen.='['.$_POST['predio2'].']';
              $empacadora.='['.$_POST['empacadora2'].']';
              $direcion_empacadora.='['.$_POST['direccion2'].']';
              if ($cont_origen>2)
              {
                 $origen.='['.$_POST['predio3'].']';
                 $empacadora.='['.$_POST['empacadora3'].']';
                 $direcion_empacadora.='['.$_POST['direccion3'].']';;
                  if($cont_origen>3)
                  {
                   $origen.='['.$_POST['predio4'].']';
                   $empacadora.='['.$_POST['empacadora4'].']';
                   $direcion_empacadora.='['.$_POST['direccion4'].']';
                   if($cont_origen>4)
                   {
                    $origen.='['.$_POST['predio5'].']';
                    $empacadora.='['.$_POST['empacadora5'].']';
                    $direcion_empacadora.='['.$_POST['direccion5'].']';
                    if($cont_origen>5)
                   {
                    $origen.='['.$_POST['predio6'].']';
                    $empacadora.='['.$_POST['empacadora6'].']';
                    $direcion_empacadora.='['.$_POST['direccion6'].']';
                    if($cont_origen>6)
                   {
                    $origen.='['.$_POST['predio7'].']';
                    $empacadora.='['.$_POST['empacadora7'].']';
                    $direcion_empacadora.='['.$_POST['direccion7'].']';
                    if($cont_origen>7)
                   {
                    $origen.='['.$_POST['predio8'].']';
                    $empacadora.='['.$_POST['empacadora8'].']';
                    $direcion_empacadora.='['.$_POST['direccion8'].']';
                    if($cont_origen>8)
                   {
                    $origen.='['.$_POST['predio9'].']';
                    $empacadora.='['.$_POST['empacadora9'].']';
                    $direcion_empacadora.='['.$_POST['direccion9'].']';
                    if($cont_origen>9)
                   {
                    $origen.='['.$_POST['predio10'].']';
                    $empacadora.='['.$_POST['empacadora10'].']';
                    $direcion_empacadora.='['.$_POST['direccion10'].']';
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
       $estado_chofer=$_POST['estado_chofer'];
       $no_licencia=$_POST['no_licencia'];
       $servicio=$_POST['servicio'];  
       $destino=$_POST['destino'];
       $direccion_destino=$_POST['direccion_destino'];
       $ciudad_destino=$_POST['ciudad_destino'];
       $pais_destino=$_POST['pais_destino'];
       $clorinacion=$_POST['clorinacion'];

         


    if ($tipo_usuario=="Administrador") {
       
      $folio=$_POST['folio'];
      $folio_responsiva=$_POST['folio_responsiva'];
      $folio_clorinacion=$_POST['folio_clorinacion'];

      $actualizar_certificado=$conexion->prepare("UPDATE certificados SET folio='$folio',remitente='$cliente', producto='$producto', variedad='$variedad', envase='$envase', cantidad='$cantidad', peso='$peso', volumen='$volumen', uso='$uso', origen='$origen', empacadora='$empacadora', municipio='$direcion_empacadora', medio_transporte='$medio_transporte', marca_vehiculo='$vehiculo', placas='$placas', nombre_chofer='$nombre_chofer', no_licencia='$no_licencia', destino='$destino', direccion_destino='$direccion_destino', ciudad_destino='$ciudad_destino', pais_destino='$pais_destino' WHERE id_certificado='$id_certificado'");
   $actualizar_certificado->execute();

   $actualizar_responsiva=$conexion->prepare("UPDATE responsiva SET id_responsiva='$folio_responsiva',nombre_chofer='$nombre_chofer', direccion='$direccion_chofer', estado='$estado_chofer', no_licencia='$no_licencia', servicio='$servicio', modelo='$modelo' WHERE id_responsiva='$id_responsiva'");
   $actualizar_responsiva->execute();


   $actualizar_constancia=$conexion->prepare("UPDATE constancia_clorinacion SET id_clorinacion='$folio_clorinacion', grado='$clorinacion'  WHERE id_clorinacion='$id_clorinacion'");
    $actualizar_constancia->execute();
          # code...
        }
        
        else
        {
          $actualizar_certificado=$conexion->prepare("UPDATE certificados SET remitente='$cliente', producto='$producto', variedad='$variedad', envase='$envase', cantidad='$cantidad', peso='$peso', volumen='$volumen', uso='$uso', origen='$origen', empacadora='$empacadora', municipio='$direcion_empacadora', medio_transporte='$medio_transporte', marca_vehiculo='$vehiculo', placas='$placas', nombre_chofer='$nombre_chofer', no_licencia='$no_licencia', destino='$destino', direccion_destino='$direccion_destino', ciudad_destino='$ciudad_destino', pais_destino='$pais_destino' WHERE id_certificado='$id_certificado'");
   $actualizar_certificado->execute();


   $actualizar_responsiva=$conexion->prepare("UPDATE responsiva SET nombre_chofer='$nombre_chofer', direccion='$direccion_chofer', estado='$estado_chofer', no_licencia='$no_licencia', servicio='$servicio', modelo='$modelo' WHERE id_responsiva='$id_responsiva'");
   $actualizar_responsiva->execute();


   $actualizar_constancia=$conexion->prepare("UPDATE constancia_clorinacion SET grado='$clorinacion'  WHERE id_clorinacion='$id_clorinacion'");
    $actualizar_constancia->execute();

        }    
 
   
   header('Location: certificados.php');


  ?>