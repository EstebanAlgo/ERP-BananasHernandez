<?php 
require('../php/conexion.php');

 if ($tipo_usuario=="Administrador" OR $tipo_usuario=="Bascula" OR $tipo_usuario=="Administrativo") 
 {
       
 }
 else{header('Location: ../index.php');}

 if($_POST)
 {

       $estado=$_POST['estado'];
       $municipio=$_POST['municipio'];
       $lugar_registro=$municipio.', '.$estado;
       $folio=$_POST['folio'];
       $cliente=$_POST['cliente'];
       $producto=$_POST['producto'];
       $cont_producto=$_POST['cont_producto'];
       $variedades="(".$cont_producto.")";
       $productos=""; 
       $cantidades=""; 
       $pesos="";  
       $volumenes="";

       $producto1="[".$_POST['producto1']."]"; $productos=$productos.$producto1;
       $cantidad1="[".$_POST['cantidad1']."]"; $cantidades=$cantidades.$cantidad1;
       $peso1="[".$_POST['peso1']."]"; $pesos=$pesos.$peso1;
       $variedad1="[".$_POST['variedad1']."]"; $variedades=$variedades.$variedad1;
       $volumen1="[".$_POST['volumen1']."]"; $volumenes=$volumenes.$volumen1;

       if($cont_producto>1)
       {
       $producto2="[".$_POST['producto2']."]"; $productos=$productos.$producto2;
       $cantidad2="[".$_POST['cantidad2']."]"; $cantidades=$cantidades.$cantidad2;
       $peso2="[".$_POST['peso2']."]"; $pesos=$pesos.$peso2;
       $variedad2="[".$_POST['variedad2']."]"; $variedades=$variedades.$variedad2;
       $volumen2="[".$_POST['volumen2']."]"; $volumenes=$volumenes.$volumen2;
         if($cont_producto>2)
         {
       $producto3="[".$_POST['producto3']."]"; $productos=$productos.$producto3;
       $cantidad3="[".$_POST['cantidad3']."]"; $cantidades=$cantidades.$cantidad3;
       $peso3="[".$_POST['peso3']."]"; $pesos=$pesos.$peso3;
       $variedad3="[".$_POST['variedad3']."]"; $variedades=$variedades.$variedad3;
       $volumen3="[".$_POST['volumen3']."]"; $volumenes=$volumenes.$volumen3;
              if($cont_producto>3)
              {
       $producto4="[".$_POST['producto4']."]"; $productos=$productos.$producto4;
       $cantidad4="[".$_POST['cantidad4']."]"; $cantidades=$cantidades.$cantidad4;
       $peso4="[".$_POST['peso4']."]"; $pesos=$pesos.$peso4;
       $variedad4="[".$_POST['variedad4']."]"; $variedades=$variedades.$variedad4;
       $volumen4="[".$_POST['volumen4']."]"; $volumenes=$volumenes.$volumen4;
                 if($cont_producto>4)
                 {
       $producto5="[".$_POST['producto5']."]"; $productos=$productos.$producto5;
       $cantidad5="[".$_POST['cantidad5']."]"; $cantidades=$cantidades.$cantidad5;
       $peso5="[".$_POST['peso5']."]"; $pesos=$pesos.$peso5;
       $variedad5="[".$_POST['variedad5']."]"; $variedades=$variedades.$variedad5;
       $volumen5="[".$_POST['volumen5']."]"; $volumenes=$volumenes.$volumen5;      
                     if($cont_producto>5)
                     {
       $producto6="[".$_POST['producto6']."]"; $productos=$productos.$producto6;
       $cantidad6="[".$_POST['cantidad6']."]"; $cantidades=$cantidades.$cantidad6;
       $peso6="[".$_POST['peso6']."]"; $pesos=$pesos.$peso6;
       $variedad6="[".$_POST['variedad6']."]"; $variedades=$variedades.$variedad6;
       $volumen6="[".$_POST['volumen6']."]"; $volumenes=$volumenes.$volumen6;

       if($cont_producto>6)
                     {
       $producto7="[".$_POST['producto7']."]"; $productos=$productos.$producto7;
       $cantidad7="[".$_POST['cantidad7']."]"; $cantidades=$cantidades.$cantidad7;
       $peso7="[".$_POST['peso7']."]"; $pesos=$pesos.$peso7;
       $variedad7="[".$_POST['variedad7']."]"; $variedades=$variedades.$variedad7;
       $volumen7="[".$_POST['volumen7']."]"; $volumenes=$volumenes.$volumen7;

       if($cont_producto>7)
                     {
       $producto8="[".$_POST['producto8']."]"; $productos=$productos.$producto8;
       $cantidad8="[".$_POST['cantidad8']."]"; $cantidades=$cantidades.$cantidad8;
       $peso8="[".$_POST['peso8']."]"; $pesos=$pesos.$peso8;
       $variedad8="[".$_POST['variedad8']."]"; $variedades=$variedades.$variedad8;
       $volumen8="[".$_POST['volumen8']."]"; $volumenes=$volumenes.$volumen8;

       if($cont_producto>8)
                     {
       $producto9="[".$_POST['producto9']."]"; $productos=$productos.$producto9;
       $cantidad9="[".$_POST['cantidad9']."]"; $cantidades=$cantidades.$cantidad9;
       $peso9="[".$_POST['peso9']."]"; $pesos=$pesos.$peso9;
       $variedad9="[".$_POST['variedad9']."]"; $variedades=$variedades.$variedad9;
       $volumen9="[".$_POST['volumen9']."]"; $volumenes=$volumenes.$volumen9;

       if($cont_producto>9)
                     {
       $producto10="[".$_POST['producto10']."]"; $productos=$productos.$producto10;
       $cantidad10="[".$_POST['cantidad10']."]"; $cantidades=$cantidades.$cantidad10;
       $peso10="[".$_POST['peso10']."]"; $pesos=$pesos.$peso10;
       $variedad10="[".$_POST['variedad10']."]"; $variedades=$variedades.$variedad10;
       $volumen10="[".$_POST['volumen10']."]"; $volumenes=$volumenes.$volumen10;
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
       $origenes="(".$cont_origen.")"; 
       $empacadoras=""; 
       $direcciones="";
       $predio1="[".$_POST['predio1']."]"; $origenes=$origenes.$predio1;
       $empacadora1="[".$_POST['empacadora1']."]"; $empacadoras=$empacadoras.$empacadora1;
       $direccion1="[".$_POST['direccion1']."]";   $direcciones=$direcciones.$direccion1;
       if ($cont_origen>1)
       {
       $predio2="[".$_POST['predio2']."]"; $origenes=$origenes.$predio2;
       $empacadora2="[".$_POST['empacadora2']."]"; $empacadoras=$empacadoras.$empacadora2;
       $direccion2="[".$_POST['direccion2']."]";   $direcciones=$direcciones.$direccion2;
              if ($cont_origen>2)
              {
       $predio3="[".$_POST['predio3']."]"; $origenes=$origenes.$predio3;
       $empacadora3="[".$_POST['empacadora3']."]"; $empacadoras=$empacadoras.$empacadora3;
       $direccion3="[".$_POST['direccion3']."]";   $direcciones=$direcciones.$direccion3;
                  if($cont_origen>3)
                  {
       $predio4="[".$_POST['predio4']."]"; $origenes=$origenes.$predio4;
       $empacadora4="[".$_POST['empacadora4']."]"; $empacadoras=$empacadoras.$empacadora4;
       $direccion4="[".$_POST['direccion4']."]";   $direcciones=$direcciones.$direccion4;
                   if($cont_origen>4)
                   {
       $predio5="[".$_POST['predio5']."]"; $origenes=$origenes.$predio5;
       $empacadora5="[".$_POST['empacadora5']."]"; $empacadoras=$empacadoras.$empacadora5;
       $direccion5="[".$_POST['direccion5']."]";   $direcciones=$direcciones.$direccion5;
                    if($cont_origen>5)
                    {
       $predio6="[".$_POST['predio6']."]"; $origenes=$origenes.$predio6;
       $empacadora6="[".$_POST['empacadora6']."]"; $empacadoras=$empacadoras.$empacadora6;
       $direccion6="[".$_POST['direccion6']."]";   $direcciones=$direcciones.$direccion6;
                     if($cont_origen>6)
                     {
       $predio7="[".$_POST['predio7']."]"; $origenes=$origenes.$predio7;
       $empacadora7="[".$_POST['empacadora7']."]"; $empacadoras=$empacadoras.$empacadora7;
       $direccion7="[".$_POST['direccion7']."]";   $direcciones=$direcciones.$direccion7;
                       if($cont_origen>7)
                       {
       $predio8="[".$_POST['predio8']."]"; $origenes=$origenes.$predio8;
       $empacadora8="[".$_POST['empacadora8']."]"; $empacadoras=$empacadoras.$empacadora8;
       $direccion8="[".$_POST['direccion8']."]";   $direcciones=$direcciones.$direccion8;
                      if($cont_origen>8)
                       {
       $predio9="[".$_POST['predio9']."]"; $origenes=$origenes.$predio9;
       $empacadora9="[".$_POST['empacadora9']."]"; $empacadoras=$empacadoras.$empacadora9;
       $direccion9="[".$_POST['direccion9']."]";   $direcciones=$direcciones.$direccion9;
                      if($cont_origen>9)
                       {
       $predio10="[".$_POST['predio10']."]"; $origenes=$origenes.$predio10;
       $empacadora10="[".$_POST['empacadora10']."]"; $empacadoras=$empacadoras.$empacadora10;
       $direccion10="[".$_POST['direccion10']."]";   $direcciones=$direcciones.$direccion10;

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
       $folio_responsiva=$_POST['folio_responsiva'];
       $color=$_POST['color'];
       $placas_caja=$_POST['placas_caja'];
       $linea=$_POST['linea'];
       $clase=$_POST['clase'];

       $destino=$_POST['destino'];
       $direccion_destino=$_POST['direccion_destino'];
       $ciudad_destino=$_POST['ciudad_destino'];
       $pais_destino=$_POST['pais_destino'];
       $clorinacion=$_POST['clorinacion'];
       $folio_clorinacion=$_POST['folio_clorinacion'];
       $responsable=$_POST['responsable'];

       if($tipo_usuario!='Bascula')
       {
          $hora_fecha=$_POST['hora_fecha'];
          $registrar_certificado=$conexion->prepare("INSERT INTO certificados(id_certificado,folio,lugar_registro,remitente,producto,variedad,envase,cantidad,peso,volumen,uso,origen,empacadora,municipio,medio_transporte,marca_vehiculo,placas,nombre_chofer,no_licencia,destino,direccion_destino,ciudad_destino,pais_destino,responsable,fecha_registro,id_usuario)VALUES(null,'$folio','$lugar_registro','$cliente','$producto','$variedades','$productos','$cantidades','$pesos','$volumenes','$uso','$origenes','$empacadoras','$direcciones','$medio_transporte','$vehiculo','$placas','$nombre_chofer','$no_licencia','$destino','$direccion_destino','$ciudad_destino','$pais_destino','$responsable','$hora_fecha','$id_usuario')");
          $registrar_certificado->execute();



       }
       else
       {
        $registrar_certificado=$conexion->prepare("INSERT INTO certificados(id_certificado,folio,lugar_registro,remitente,producto,variedad,envase,cantidad,peso,volumen,uso,origen,empacadora,municipio,medio_transporte,marca_vehiculo,placas,nombre_chofer,no_licencia,destino,direccion_destino,ciudad_destino,pais_destino,responsable,fecha_registro,id_usuario)VALUES(null,'$folio','$lugar_registro','$cliente','$producto','$variedades','$productos','$cantidades','$pesos','$volumenes','$uso','$origenes','$empacadoras','$direcciones','$medio_transporte','$vehiculo','$placas','$nombre_chofer','$no_licencia','$destino','$direccion_destino','$ciudad_destino','$pais_destino','$responsable',null,'$id_usuario')");
        $registrar_certificado->execute();
       }

        $statement=$conexion->prepare("SELECT * FROM certificados WHERE folio='$folio' LIMIT 1");
        $statement->execute();
        $certificados=$statement->fetchAll();
        foreach ($certificados as $fila) 
        {
        $registrar_carta_responsiva=$conexion->prepare("INSERT INTO responsiva(id_responsiva,nombre_chofer,direccion,estado,no_licencia,servicio,modelo,color,placas_caja,clase,linea,folio_certificado)VALUES('$folio_responsiva','$nombre_chofer','$direccion_chofer','$estado_chofer','$no_licencia','$servicio','$modelo','$color','$placas_caja','$clase','$linea','$folio')");
        $registrar_carta_responsiva->execute();
        $registrar_constancia_clorinacion=$conexion->prepare("INSERT INTO constancia_clorinacion(id_clorinacion,grado,folio_certificado)VALUES('$folio_clorinacion','$clorinacion','$folio')");
        $registrar_constancia_clorinacion->execute();
        } 

       

       header('Location: certificados.php');
    


 }


//------------------------------------------------------------------------------------------------------
 ?>



