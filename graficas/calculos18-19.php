<?php 
require('extraccion15-17.php');

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
 
$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%".$fechas[$x]."%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{ $pivotecantidad="";   
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];
  $folio=$fila['folio'];
  $envase=$fila['envase'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 
  
  
    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);

      $coincidencia_envase = strpos($envase, $cadena_buscada);
      $tamaño_envase=strlen($envase);
      $pivoteenvase= substr($envase, 1,$coincidencia_envase-1);
      

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
    }

}
 
}


 ?>
