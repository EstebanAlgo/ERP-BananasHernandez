<?php 
require('extraccion15-17.php');

$tipo="";
$finca="";
$subtitulo="";
$resultado="";
$valor_grafica2018="";
$valor_grafica2019="";
$tabla="";
if ($_POST) {
    $tipo=$_POST['tipo'];
    $finca=$_POST['finca'];

    switch ($tipo) {
        case 'cajas':
            $subtitulo="Datos de producción de CAJAS  de la finca ".$finca;
            break;
        case 'racimo':
            $subtitulo="Datos de producción de RACIMOS  de la finca ".$finca;
            break;
        case 'rema':
            $subtitulo="Datos de producción de REJAS DE MADERA  de la finca ".$finca;
            break;
        case 'replas':
            $subtitulo="Datos de producción de REJAS DE PLÁSTICO  de la finca ".$finca;
            break;
        case 're':
            $subtitulo="Datos de producción de REJAS de la finca ".$finca;
            break;
        case 'dedo':
            $subtitulo="Datos de producción de DEDO SUELTO de la finca ".$finca;
            break;
        
        default:
            # code...
            break;
    }
}

$TCENERO18=0; $TCFEBRERO18=0; $TCMARZO18=0; $TCABRIL18=0; $TCMAYO18=0; $TCJUNIO18=0; 
$TCJULIO18=0; $TCAGOSTO18=0; $TCSEPTIEMBRE18=0; $TCOCTUBRE18=0; $TCNOVIEMBRE18=0; $TCDICIEMBRE18=0;

$TREENERO18=0; $TREFEBRERO18=0; $TREMARZO18=0; $TREABRIL18=0; $TREMAYO18=0; $TREJUNIO18=0; 
$TREJULIO18=0; $TREAGOSTO18=0; $TRESEPTIEMBRE18=0; $TREOCTUBRE18=0; $TRENOVIEMBRE18=0; $TREDICIEMBRE18=0;

$TRAENERO18=0; $TRAFEBRERO18=0; $TRAMARZO18=0; $TRAABRIL18=0; $TRAMAYO18=0; $TRAJUNIO18=0; 
$TRAJULIO18=0; $TRAAGOSTO18=0; $TRASEPTIEMBRE18=0; $TRAOCTUBRE18=0; $TRANOVIEMBRE18=0; $TRADICIEMBRE18=0;

$TDEDOENERO18=0; $TDEDOFEBRERO18=0; $TDEDOMARZO18=0; $TDEDOABRIL18=0; $TDEDOMAYO18=0; $TDEDOJUNIO18=0; 
$TDEDOJULIO18=0; $TDEDOAGOSTO18=0; $TDEDOSEPTIEMBRE18=0; $TDEDOOCTUBRE18=0; $TDEDONOVIEMBRE18=0; $TDEDODICIEMBRE18=0;

$TREPLASENERO18=0; $TREPLASFEBRERO18=0; $TREPLASMARZO18=0; $TREPLASABRIL18=0; $TREPLASMAYO18=0; $TREPLASJUNIO18=0; 
$TREPLASJULIO18=0; $TREPLASAGOSTO18=0; $TREPLASSEPTIEMBRE18=0; $TREPLASOCTUBRE18=0; $TREPLASNOVIEMBRE18=0; $TREPLASDICIEMBRE18=0;

$TREMAENERO18=0; $TREMAFEBRERO18=0; $TREMAMARZO18=0; $TREMAABRIL18=0; $TREMAMAYO18=0; $TREMAJUNIO18=0; 
$TREMAJULIO18=0; $TREMAAGOSTO18=0; $TREMASEPTIEMBRE18=0; $TREMAOCTUBRE18=0; $TREMANOVIEMBRE18=0; $TREMADICIEMBRE18=0;


//-----------------------------------------------

$TCENERO19=0; $TCFEBRERO19=0; $TCMARZO19=0; $TCABRIL19=0; $TCMAYO19=0; $TCJUNIO19=0; 
$TCJULIO19=0; $TCAGOSTO19=0; $TCSEPTIEMBRE19=0; $TCOCTUBRE19=0; $TCNOVIEMBRE19=0; $TCDICIEMBRE19=0;

$TREENERO19=0; $TREFEBRERO19=0; $TREMARZO19=0; $TREABRIL19=0; $TREMAYO19=0; $TREJUNIO19=0; 
$TREJULIO19=0; $TREAGOSTO19=0; $TRESEPTIEMBRE19=0; $TREOCTUBRE19=0; $TRENOVIEMBRE19=0; $TREDICIEMBRE19=0;

$TRAENERO19=0; $TRAFEBRERO19=0; $TRAMARZO19=0; $TRAABRIL19=0; $TRAMAYO19=0; $TRAJUNIO19=0; 
$TRAJULIO19=0; $TRAAGOSTO19=0; $TRASEPTIEMBRE19=0; $TRAOCTUBRE19=0; $TRANOVIEMBRE19=0; $TRADICIEMBRE19=0;

$TDEDOENERO19=0; $TDEDOFEBRERO19=0; $TDEDOMARZO19=0; $TDEDOABRIL19=0; $TDEDOMAYO19=0; $TDEDOJUNIO19=0; 
$TDEDOJULIO19=0; $TDEDOAGOSTO19=0; $TDEDOSEPTIEMBRE19=0; $TDEDOOCTUBRE19=0; $TDEDONOVIEMBRE19=0; $TDEDODICIEMBRE19=0;

$TREPLASENERO19=0; $TREPLASFEBRERO19=0; $TREPLASMARZO19=0; $TREPLASABRIL19=0; $TREPLASMAYO19=0; $TREPLASJUNIO19=0; 
$TREPLASJULIO19=0; $TREPLASAGOSTO19=0; $TREPLASSEPTIEMBRE19=0; $TREPLASOCTUBRE19=0; $TREPLASNOVIEMBRE19=0; $TREPLASDICIEMBRE19=0;

$TREMAENERO19=0; $TREMAFEBRERO19=0; $TREMAMARZO19=0; $TREMAABRIL19=0; $TREMAMAYO19=0; $TREMAJUNIO19=0; 
$TREMAJULIO19=0; $TREMAAGOSTO19=0; $TREMASEPTIEMBRE19=0; $TREMAOCTUBRE19=0; $TREMANOVIEMBRE19=0; $TREMADICIEMBRE19=0;


$TC2018=0; $TC2019=0; $TRE2018=0; $TRE2019=0; $TRA2018=0; $TRA2019=0; $TDEDO2018=0; $TDEDO2019=0; $TREPLAS2018=0; $TREPLAS2019=0; $TREMA2018=0; $TREMA2019=0;

$cajas=0; $rejas=0; $racimos=0; $dedo=0; $rejas_plastico=0; $rejas_madera=0; $faltante=0;
$codigo_grafica="";

$fechas = array('2018-01','2018-02','2018-03','2018-04','2018-05','2018-06','2018-07','2018-08','2018-09','2018-10','2018-11','2018-12',
                '2019-01','2019-02','2019-03','2019-04','2019-05','2019-06','2019-07','2019-08','2019-09','2019-10','2019-11','2019-12');


for($x=0;$x<24;$x++)
{
$statement=$conexion->prepare("SELECT *FROM certificados WHERE origen LIKE '%$finca%' AND fecha_registro LIKE '%".$fechas[$x]."%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
 { 
    
  $pivotecantidad="";  
  $pivoteorigen="";   
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];
  $origen=$fila['origen'];
  $folio=$fila['folio'];
  $envase=$fila['envase'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

  $coincidencia_origen = strpos($origen, $cadena_buscada);//método de búsqueda de caracteres
  $tamaño_origen=strlen($origen);
  $origen= substr($origen, $coincidencia_origen+1,$tamaño_origen);
  
    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);

      $coincidencia_envase = strpos($envase, $cadena_buscada);
      $tamaño_envase=strlen($envase);
      $pivoteenvase= substr($envase, 1,$coincidencia_envase-1);

      $coincidencia_origen = strpos($origen, $cadena_buscada);
      $tamaño_origen=strlen($origen);
      $pivoteorigen= substr($origen, 1,$coincidencia_origen-1);

                if($pivoteorigen==$finca)//-------------------------------------INICIO DEL CICLO PARA CONFIRMAR LA FINCA
                    {
$statement=$conexion->prepare("SELECT *FROM envases WHERE envase='$pivoteenvase'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{ $codigo_grafica="";
  $codigo_grafica=$fila['grafica'];
}
    
    $envase=substr($envase,$coincidencia_envase+1,$tamaño_envase-1);

switch ($codigo_grafica) {
        case 'C':

             if($fechas[$x]=="2018-01")
             {
                     $TCENERO18=$TCENERO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TCFEBRERO18=$TCFEBRERO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TCMARZO18=$TCMARZO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TCABRIL18=$TCABRIL18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TCMAYO18=$TCMAYO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TCJUNIO18=$TCJUNIO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TCJULIO18=$TCJULIO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TCAGOSTO18=$TCAGOSTO18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TCSEPTIEMBRE18=$TCSEPTIEMBRE18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TCOCTUBRE18=$TCOCTUBRE18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TCNOVIEMBRE18=$TCNOVIEMBRE18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TCDICIEMBRE18=$TCDICIEMBRE18+$pivotecantidad;
                     $TC2018=$TC2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TCENERO19=$TCENERO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TCFEBRERO19=$TCFEBRERO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TCMARZO19=$TCMARZO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TCABRIL19=$TCABRIL19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TCMAYO19=$TCMAYO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TCJUNIO19=$TCJUNIO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TCJULIO19=$TCJULIO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TCAGOSTO19=$TCAGOSTO19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;

             }
             if($fechas[$x]=="2019-09")
             {
                     $TCSEPTIEMBRE19=$TCSEPTIEMBRE19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TCOCTUBRE19=$TCOCTUBRE19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TCNOVIEMBRE19=$TCNOVIEMBRE19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TCDICIEMBRE19=$TCDICIEMBRE19+$pivotecantidad;
                     $TC2019=$TC2019+$pivotecantidad;

                     
             }
         
          break;
          //INICIA SECCIÓN DE REJAS------------------------------------------
        case 'RE':
          if($fechas[$x]=="2018-01")
             {
                     $TREENERO18=$TREENERO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREFEBRERO18=$TREFEBRERO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREMARZO18=$TREMARZO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREABRIL18=$TREABRIL18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREMAYO18=$TREMAYO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREJUNIO18=$TREJUNIO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREJULIO18=$TREJULIO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREAGOSTO18=$TREAGOSTO18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TRESEPTIEMBRE18=$TRESEPTIEMBRE18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREOCTUBRE18=$TREOCTUBRE18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TRENOVIEMBRE18=$TRENOVIEMBRE18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREDICIEMBRE18=$TREDICIEMBRE18+$pivotecantidad;
                     $TRE2018=$TRE2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREENERO19=$TREENERO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREFEBRERO19=$TREFEBRERO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREMARZO19=$TREMARZO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREABRIL19=$TREABRIL19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREMAYO19=$TREMAYO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREJUNIO19=$TREJUNIO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREJULIO19=$TREJULIO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREAGOSTO19=$TREAGOSTO19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TRESEPTIEMBRE19=$TRESEPTIEMBRE19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREOCTUBRE19=$TREOCTUBRE19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TRENOVIEMBRE19=$TRENOVIEMBRE19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREDICIEMBRE19=$TREDICIEMBRE19+$pivotecantidad;
                     $TRE2019=$TRE2019+$pivotecantidad;
             }
          break;
        case 'RA':
          if($fechas[$x]=="2018-01")
             {
                     $TRAENERO18=$TRAENERO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TRAFEBRERO18=$TRAFEBRERO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TRAMARZO18=$TRAMARZO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TRAABRIL18=$TRAABRIL18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TRAMAYO18=$TRAMAYO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TRAJUNIO18=$TRAJUNIO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TRAJULIO18=$TRAJULIO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TRAAGOSTO18=$TRAAGOSTO18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TRASEPTIEMBRE18=$TRASEPTIEMBRE18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TRAOCTUBRE18=$TRAOCTUBRE18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TRANOVIEMBRE18=$TRANOVIEMBRE18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TRADICIEMBRE18=$TRADICIEMBRE18+$pivotecantidad;
                     $TRA2018=$TRA2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TRAENERO19=$TRAENERO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TRAFEBRERO19=$TRAFEBRERO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TRAMARZO19=$TRAMARZO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TRAABRIL19=$TRAABRIL19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TRAMAYO19=$TRAMAYO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TRAJUNIO19=$TRAJUNIO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TRAJULIO19=$TRAJULIO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TRAAGOSTO19=$TRAAGOSTO19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TRASEPTIEMBRE19=$TRASEPTIEMBRE19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TRAOCTUBRE19=$TRAOCTUBRE19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TRANOVIEMBRE19=$TRANOVIEMBRE19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TRADICIEMBRE19=$TRADICIEMBRE19+$pivotecantidad;
                     $TRA2019=$TRA2019+$pivotecantidad;
             }
          break;
        case 'DEDO':
          if($fechas[$x]=="2018-01")
             {
                     $TDEDOENERO18=$TDEDOENERO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TDEDOFEBRERO18=$TDEDOFEBRERO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TDEDOMARZO18=$TDEDOMARZO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TDEDOABRIL18=$TDEDOABRIL18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TDEDOMAYO18=$TDEDOMAYO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TDEDOJUNIO18=$TDEDOJUNIO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TDEDOJULIO18=$TDEDOJULIO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TDEDOAGOSTO18=$TDEDOAGOSTO18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TDEDOSEPTIEMBRE18=$TDEDOSEPTIEMBRE18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TDEDOOCTUBRE18=$TDEDOOCTUBRE18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TDEDONOVIEMBRE18=$TDEDONOVIEMBRE18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TDEDODICIEMBRE18=$TDEDODICIEMBRE18+$pivotecantidad;
                     $TDEDO2018=$TDEDO2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TDEDOENERO19=$TDEDOENERO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TDEDOFEBRERO19=$TDEDOFEBRERO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TDEDOMARZO19=$TDEDOMARZO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TDEDOABRIL19=$TDEDOABRIL19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TDEDOMAYO19=$TDEDOMAYO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TDEDOJUNIO19=$TDEDOJUNIO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TDEDOJULIO19=$TDEDOJULIO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TDEDOAGOSTO19=$TDEDOAGOSTO19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TDEDOSEPTIEMBRE19=$TDEDOSEPTIEMBRE19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TDEDOOCTUBRE19=$TDEDOOCTUBRE19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TDEDONOVIEMBRE19=$TDEDONOVIEMBRE19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TDEDODICIEMBRE19=$TDEDODICIEMBRE19+$pivotecantidad;
                     $TDEDO2019=$TDEDO2019+$pivotecantidad;
             }
          break;
        case 'REPLAS':
          if($fechas[$x]=="2018-01")
             {
                     $TREPLASENERO18=$TREPLASENERO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREPLASFEBRERO18=$TREPLASFEBRERO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREPLASMARZO18=$TREPLASMARZO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREPLASABRIL18=$TREPLASABRIL18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREPLASMAYO18=$TREPLASMAYO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREPLASJUNIO18=$TREPLASJUNIO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREPLASJULIO18=$TREPLASJULIO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREPLASAGOSTO18=$TREPLASAGOSTO18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TREPLASSEPTIEMBRE18=$TREPLASSEPTIEMBRE18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREPLASOCTUBRE18=$TREPLASOCTUBRE18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TREPLASNOVIEMBRE18=$TREPLASNOVIEMBRE18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREPLASDICIEMBRE18=$TREPLASDICIEMBRE18+$pivotecantidad;
                     $TREPLAS2018=$TREPLAS2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREPLASENERO19=$TREPLASENERO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREPLASFEBRERO19=$TREPLASFEBRERO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREPLASMARZO19=$TREPLASMARZO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREPLASABRIL19=$TREPLASABRIL19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREPLASMAYO19=$TREPLASMAYO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREPLASJUNIO19=$TREPLASJUNIO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREPLASJULIO19=$TREPLASJULIO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREPLASAGOSTO19=$TREPLASAGOSTO19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TREPLASSEPTIEMBRE19=$TREPLASSEPTIEMBRE19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREPLASOCTUBRE19=$TREPLASOCTUBRE19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TREPLASNOVIEMBRE19=$TREPLASNOVIEMBRE19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREPLASDICIEMBRE19=$TREPLASDICIEMBRE19+$pivotecantidad;
                     $TREPLAS2019=$TREPLAS2019+$pivotecantidad;
             }
          break;
        case 'REMA':
          if($fechas[$x]=="2018-01")
             {
                     $TREMAENERO18=$TREMAENERO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREMAFEBRERO18=$TREMAFEBRERO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREMAMARZO18=$TREMAMARZO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREMAABRIL18=$TREMAABRIL18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREMAMAYO18=$TREMAMAYO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREMAJUNIO18=$TREMAJUNIO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREMAJULIO18=$TREMAJULIO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREMAAGOSTO18=$TREMAAGOSTO18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TREMASEPTIEMBRE18=$TREMASEPTIEMBRE18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREMAOCTUBRE18=$TREMAOCTUBRE18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TREMANOVIEMBRE18=$TREMANOVIEMBRE18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREMADICIEMBRE18=$TREMADICIEMBRE18+$pivotecantidad;
                     $TREMA2018=$TREMA2018+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREMAENERO19=$TREMAENERO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREMAFEBRERO19=$TREMAFEBRERO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREMAMARZO19=$TREMAMARZO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREMAABRIL19=$TREMAABRIL19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREMAMAYO19=$TREMAMAYO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREMAJUNIO19=$TREMAJUNIO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREMAJULIO19=$TREMAJULIO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREMAAGOSTO19=$TREMAAGOSTO19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TREMASEPTIEMBRE19=$TREMASEPTIEMBRE19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREMAOCTUBRE19=$TREMAOCTUBRE19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TREMANOVIEMBRE19=$TREMANOVIEMBRE19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREMADICIEMBRE19=$TREMADICIEMBRE19+$pivotecantidad;
                     $TREMA2019=$TREMA2019+$pivotecantidad;
             }
          break;
        default:
          $faltante=$faltante+$pivotecantidad;
          echo 'Numero de folio: '.$folio.' Faltante: '.$pivotecantidad.'<br>';
          break;


      }
                    }//------------------------------------------------------------------FIN DEL CICLO DE LA FINCA

    }

  }
 
}

switch ($tipo) {
    case 'cajas':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TCENERO18</td>
                                                <td>$TCENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TCJULIO18</td>
                                                <td>$TCJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TCFEBRERO18</td>
                                                <td>$TCFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TCAGOSTO18</td>
                                                <td>$TCAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TCMARZO18</td>
                                                <td>$TCMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TCSEPTIEMBRE18</td>
                                                <td>$TCSEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TCABRIL18</td>
                                                <td>$TCABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TCOCTUBRE18</td>
                                                <td>$TCOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TCMAYO18</td>
                                                <td>$TCMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TCNOVIEMBRE18</td>
                                                <td>$TCNOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TCJUNIO18</td>
                                                <td>$TCJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TCDICIEMBRE18</td>
                                                <td>$TCDICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";

$valor_grafica2018="$TCENERO18,$TCFEBRERO18,$TCMARZO18,$TCABRIL18,$TCMAYO18,$TCJUNIO18,$TCJULIO18,$TCAGOSTO18,$TCSEPTIEMBRE18,$TCOCTUBRE18,$TCNOVIEMBRE18,$TCDICIEMBRE18";
$valor_grafica2019="$TCENERO19,$TCFEBRERO19,$TCMARZO19,$TCABRIL19,$TCMAYO19,$TCJUNIO19,$TCJULIO19,$TCAGOSTO19,$TCSEPTIEMBRE19,$TCOCTUBRE19,$TCNOVIEMBRE19,$TCDICIEMBRE19";
            break;
        case 'racimo':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TRAENERO18</td>
                                                <td>$TRAENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TRAJULIO18</td>
                                                <td>$TRAJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TRAFEBRERO18</td>
                                                <td>$TRAFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TRAAGOSTO18</td>
                                                <td>$TRAAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TRAMARZO18</td>
                                                <td>$TRAMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TRASEPTIEMBRE18</td>
                                                <td>$TRASEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TRAABRIL18</td>
                                                <td>$TRAABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TRAOCTUBRE18</td>
                                                <td>$TRAOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TRAMAYO18</td>
                                                <td>$TRAMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TRANOVIEMBRE18</td>
                                                <td>$TRANOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TRAJUNIO18</td>
                                                <td>$TRAJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TRADICIEMBRE18</td>
                                                <td>$TRADICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";
$valor_grafica2018="$TRAENERO18,$TRAFEBRERO18,$TRAMARZO18,$TRAABRIL18,$TRAMAYO18,$TRAJUNIO18,$TRAJULIO18,$TRAAGOSTO18,$TRASEPTIEMBRE18,$TRAOCTUBRE18,$TRANOVIEMBRE18,$TRADICIEMBRE18";
$valor_grafica2019="$TRAENERO19,$TRAFEBRERO19,$TRAMARZO19,$TRAABRIL19,$TRAMAYO19,$TRAJUNIO19,$TRAJULIO19,$TRAAGOSTO19,$TRASEPTIEMBRE19,$TRAOCTUBRE19,$TRANOVIEMBRE19,$TRADICIEMBRE19";

            break;
        case 'rema':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TREMAENERO18</td>
                                                <td>$TREMAENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TREMAJULIO18</td>
                                                <td>$TREMAJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TREMAFEBRERO18</td>
                                                <td>$TREMAFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TREMAAGOSTO18</td>
                                                <td>$TREMAAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TREMAMARZO18</td>
                                                <td>$TREMAMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TREMASEPTIEMBRE18</td>
                                                <td>$TREMASEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TREMAABRIL18</td>
                                                <td>$TREMAABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TREMAOCTUBRE18</td>
                                                <td>$TREMAOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TREMAMAYO18</td>
                                                <td>$TREMAMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TREMANOVIEMBRE18</td>
                                                <td>$TREMANOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TREMAJUNIO18</td>
                                                <td>$TREMAJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TREMADICIEMBRE18</td>
                                                <td>$TREMADICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";

$valor_grafica2018="$TREMAENERO18,$TREMAFEBRERO18,$TREMAMARZO18,$TREMAABRIL18,$TREMAMAYO18,$TREMAJUNIO18,$TREMAJULIO18,$TREMAAGOSTO18,$TREMASEPTIEMBRE18,$TREMAOCTUBRE18,$TREMANOVIEMBRE18,$TREMADICIEMBRE18";
$valor_grafica2019="$TREMAENERO19,$TREMAFEBRERO19,$TREMAMARZO19,$TREMAABRIL19,$TREMAMAYO19,$TREMAJUNIO19,$TREMAJULIO19,$TREMAAGOSTO19,$TREMASEPTIEMBRE19,$TREMAOCTUBRE19,$TREMANOVIEMBRE19,$TREMADICIEMBRE19";
            break;
        case 'replas':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TREPLASENERO18</td>
                                                <td>$TREPLASENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TREPLASJULIO18</td>
                                                <td>$TREPLASJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TREPLASFEBRERO18</td>
                                                <td>$TREPLASFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TREPLASAGOSTO18</td>
                                                <td>$TREPLASAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TREPLASMARZO18</td>
                                                <td>$TREPLASMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TREPLASSEPTIEMBRE18</td>
                                                <td>$TREPLASSEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TREPLASABRIL18</td>
                                                <td>$TREPLASABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TREPLASOCTUBRE18</td>
                                                <td>$TREPLASOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TREPLASMAYO18</td>
                                                <td>$TREPLASMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TREPLASNOVIEMBRE18</td>
                                                <td>$TREPLASNOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TREPLASJUNIO18</td>
                                                <td>$TREPLASJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TREPLASDICIEMBRE18</td>
                                                <td>$TREPLASDICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";

$valor_grafica2018="$TREPLASENERO18,$TREPLASFEBRERO18,$TREPLASMARZO18,$TREPLASABRIL18,$TREPLASMAYO18,$TREPLASJUNIO18,$TREPLASJULIO18,$TREPLASAGOSTO18,$TREPLASSEPTIEMBRE18,$TREPLASOCTUBRE18,$TREPLASNOVIEMBRE18,$TREPLASDICIEMBRE18";
$valor_grafica2019="$TREPLASENERO19,$TREPLASFEBRERO19,$TREPLASMARZO19,$TREPLASABRIL19,$TREPLASMAYO19,$TREPLASJUNIO19,$TREPLASJULIO19,$TREPLASAGOSTO19,$TREPLASSEPTIEMBRE19,$TREPLASOCTUBRE19,$TREPLASNOVIEMBRE19,$TREPLASDICIEMBRE19";
            break;
        case 're':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TREENERO18</td>
                                                <td>$TREENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TREJULIO18</td>
                                                <td>$TREJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TREFEBRERO18</td>
                                                <td>$TREFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TREAGOSTO18</td>
                                                <td>$TREAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TREMARZO18</td>
                                                <td>$TREMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TRESEPTIEMBRE18</td>
                                                <td>$TRESEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TREABRIL18</td>
                                                <td>$TREABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TREOCTUBRE18</td>
                                                <td>$TREOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TREMAYO18</td>
                                                <td>$TREMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TRENOVIEMBRE18</td>
                                                <td>$TRENOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TREJUNIO18</td>
                                                <td>$TREJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TREDICIEMBRE18</td>
                                                <td>$TREDICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";

$valor_grafica2018="$TREENERO18,$TREFEBRERO18,$TREMARZO18,$TREABRIL18,$TREMAYO18,$TREJUNIO18,$TREJULIO18,$TREAGOSTO18,$TRESEPTIEMBRE18,$TREOCTUBRE18,$TRENOVIEMBRE18,$TREDICIEMBRE18";
$valor_grafica2019="$TREENERO19,$TREFEBRERO19,$TREMARZO19,$TREABRIL19,$TREMAYO19,$TREJUNIO19,$TREJULIO19,$TREAGOSTO19,$TRESEPTIEMBRE19,$TREOCTUBRE19,$TRENOVIEMBRE19,$TREDICIEMBRE19";
            break;
        case 'dedo':
            $tabla="<!-- row -->
                <div class='row'>
                    <div class='col'>
                        <div class='card'>
                            <div class='card-body'>
                                <h2 class='card-title'>$finca</h2>
                                <h4 class='card-subtitle'>$subtitulo</h4>
                                <div class='table-responsive'>
                                    <table class='table color-table danger-table color-bordered-table danger-bordered-table full-color-table'>
                                        <thead>
                                            <tr>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                                <th>MES</th>
                                                <th>2018</th>
                                                <th>2019</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ENERO</td>
                                                <td>$TDEDOENERO18</td>
                                                <td>$TDEDOENERO19</td>
                                                <td>JULIO</td>
                                                <td>$TDEDOJULIO18</td>
                                                <td>$TDEDOJULIO19</td>
                                            </tr>
                                            <tr>
                                                <td>FEBRERO</td>
                                                <td>$TDEDOFEBRERO18</td>
                                                <td>$TDEDOFEBRERO19</td>
                                                <td>AGOSTO</td>
                                                <td>$TDEDOAGOSTO18</td>
                                                <td>$TDEDOAGOSTO19</td>
                                            </tr>
                                            <tr>
                                                <td>MARZO</td>
                                                <td>$TDEDOMARZO18</td>
                                                <td>$TDEDOMARZO19</td>
                                                <td>SEPTIEMBRE</td>
                                                <td>$TDEDOSEPTIEMBRE18</td>
                                                <td>$TDEDOSEPTIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>ABRIL</td>
                                                <td>$TDEDOABRIL18</td>
                                                <td>$TDEDOABRIL19</td>
                                                <td>OCTUBRE</td>
                                                <td>$TDEDOOCTUBRE18</td>
                                                <td>$TDEDOOCTUBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>MAYO</td>
                                                <td>$TDEDOMAYO18</td>
                                                <td>$TDEDOMAYO19</td>
                                                <td>NOVIEMBRE</td>
                                                <td>$TDEDONOVIEMBRE18</td>
                                                <td>$TDEDONOVIEMBRE19</td>
                                            </tr>
                                            <tr>
                                                <td>JUNIO</td>
                                                <td>$TDEDOJUNIO18</td>
                                                <td>$TDEDOJUNIO19</td>
                                                <td>DICIEMBRE</td>
                                                <td>$TDEDODICIEMBRE18</td>
                                                <td>$TDEDODICIEMBRE19</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>$subtitulo</h4>
                                <div id='main' style='width:100%; height:400px;''></div>
                            </div>
                        </div>
                    </div>
                </div>
";

$valor_grafica2018="$TDEDOENERO18,$TDEDOFEBRERO18,$TDEDOMARZO18,$TDEDOABRIL18,$TDEDOMAYO18,$TDEDOJUNIO18,$TDEDOJULIO18,$TDEDOAGOSTO18,$TDEDOSEPTIEMBRE18,$TDEDOOCTUBRE18,$TDEDONOVIEMBRE18,$TDEDODICIEMBRE18";
$valor_grafica2019="$TDEDOENERO19,$TDEDOFEBRERO19,$TDEDOMARZO19,$TDEDOABRIL19,$TDEDOMAYO19,$TDEDOJUNIO19,$TDEDOJULIO19,$TDEDOAGOSTO19,$TDEDOSEPTIEMBRE19,$TDEDOOCTUBRE19,$TDEDONOVIEMBRE19,$TDEDODICIEMBRE19";
            break;
}



$resultado=$tabla."
<script>
// ============================================================== 
// Line chart
// ============================================================== 
var dom = document.getElementById('main');
var mytempChart = echarts.init(dom);
var app = {};
option = null;
option = {

    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data: ['2018', '2019']
    },
    toolbox: {
        show: true,
        feature: {
            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true }
        }
    },
    color: ['#55ce63', '#009efb'],
    calculable: true,
    xAxis: [{
        type: 'category',

        boundaryGap: false,
        data: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Sep','Oct','Nov','Dic']
    }],
    yAxis: [{
        type: 'value',
        axisLabel: {
            formatter: '{value} '
        }
    }],

    series: [{
            name: '2018',
            type: 'line',
            color: ['#000'],
            data: [$valor_grafica2018],
            markPoint: {
                data: [
                    { type: 'max', name: 'Max' },
                    { type: 'min', name: 'Min' }
                ]
            },
            itemStyle: {
                normal: {
                    lineStyle: {
                        shadowColor: 'rgba(0,0,0,0.3)',
                        shadowBlur: 10,
                        shadowOffsetX: 8,
                        shadowOffsetY: 8
                    }
                }
            },
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        },
        {
            name: '2019',
            type: 'line',
            data: [$valor_grafica2019],
            markPoint: {
                data: [
                    { type: 'max', name: 'Max' },
                    { type: 'min', name: 'Min' }
                ]
            },
            itemStyle: {
                normal: {
                    lineStyle: {
                        shadowColor: 'rgba(0,0,0,0.3)',
                        shadowBlur: 10,
                        shadowOffsetX: 8,
                        shadowOffsetY: 8
                    }
                }
            },
            markLine: {
                data: [
                    { type: 'average', name: 'Average' }
                ]
            }
        }
    ]
};

if (option && typeof option === 'object') {
    mytempChart.setOption(option, true), $(function() {
        function resize() {
            setTimeout(function() {
                mytempChart.resize()
            }, 100)
        }
        $(window).on('resize', resize), $('.sidebartoggler').on('click', resize)
    });
}

// =====
    </script>";
    echo $resultado;
 ?>
