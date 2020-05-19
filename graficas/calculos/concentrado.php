<?php 
require('../../php/conexion.php');

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
{    
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
{ 
  $codigo_grafica=$fila['grafica'];
}
      
      
      
      
      switch ($codigo_grafica) {
        case 'C':
             if($fechas[$x]=="2018-01")
             {
                     $TCENERO18=$TCENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TCFEBRERO18=$TCFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TCMARZO18=$TCMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TCABRIL18=$TCABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TCMAYO18=$TCMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TCJUNIO18=$TCJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TCJULIO18=$TCJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TCAGOSTO18=$TCAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TCSEPTIEMBRE18=$TCSEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TCOCTUBRE18=$TCOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TCNOVIEMBRE18=$TCNOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TCDICIEMBRE18=$TCDICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TCENERO19=$TCENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TCFEBRERO19=$TCFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TCMARZO19=$TCMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TCABRIL19=$TCABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TCMAYO19=$TCMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TCJUNIO19=$TCJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TCJULIO19=$TCJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TCAGOSTO19=$TCAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TCSEPTIEMBRE19=$TCSEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TCOCTUBRE19=$TCOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TCNOVIEMBRE19=$TCNOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TCDICIEMBRE19=$TCDICIEMBRE19+$pivotecantidad;
             }
         
          break;
          //INICIA SECCIÓN DE REJAS------------------------------------------
        case 'RE':
          if($fechas[$x]=="2018-01")
             {
                     $TREENERO18=$TREENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREFEBRERO18=$TREFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREMARZO18=$TREMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREABRIL18=$TREABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREMAYO18=$TREMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREJUNIO18=$TREJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREJULIO18=$TREJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREAGOSTO18=$TREAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TRESEPTIEMBRE18=$TRESEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREOCTUBRE18=$TREOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TRENOVIEMBRE18=$TRENOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREDICIEMBRE18=$TREDICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREENERO19=$TREENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREFEBRERO19=$TREFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREMARZO19=$TREMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREABRIL19=$TREABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREMAYO19=$TREMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREJUNIO19=$TREJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREJULIO19=$TREJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREAGOSTO19=$TREAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TRESEPTIEMBRE19=$TRESEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREOCTUBRE19=$TREOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TRENOVIEMBRE19=$TRENOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREDICIEMBRE19=$TREDICIEMBRE19+$pivotecantidad;
             }
          break;
        case 'RA':
          if($fechas[$x]=="2018-01")
             {
                     $TRAENERO18=$TRAENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TRAFEBRERO18=$TRAFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TRAMARZO18=$TRAMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TRAABRIL18=$TRAABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TRAMAYO18=$TRAMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TRAJUNIO18=$TRAJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TRAJULIO18=$TRAJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TRAAGOSTO18=$TRAAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TRASEPTIEMBRE18=$TRASEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TRAOCTUBRE18=$TRAOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TRANOVIEMBRE18=$TRANOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TRADICIEMBRE18=$TRADICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TRAENERO19=$TRAENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TRAFEBRERO19=$TRAFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TRAMARZO19=$TRAMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TRAABRIL19=$TRAABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TRAMAYO19=$TRAMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TRAJUNIO19=$TRAJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TRAJULIO19=$TRAJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TRAAGOSTO19=$TRAAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TRASEPTIEMBRE19=$TRASEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TRAOCTUBRE19=$TRAOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TRANOVIEMBRE19=$TRANOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TRADICIEMBRE19=$TRADICIEMBRE19+$pivotecantidad;
             }
          break;
        case 'DEDO':
          if($fechas[$x]=="2018-01")
             {
                     $TDEDOENERO18=$TDEDOENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TDEDOFEBRERO18=$TDEDOFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TDEDOMARZO18=$TDEDOMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TDEDOABRIL18=$TDEDOABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TDEDOMAYO18=$TDEDOMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TDEDOJUNIO18=$TDEDOJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TDEDOJULIO18=$TDEDOJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TDEDOAGOSTO18=$TDEDOAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TDEDOSEPTIEMBRE18=$TDEDOSEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TDEDOOCTUBRE18=$TDEDOOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TDEDONOVIEMBRE18=$TDEDONOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TDEDODICIEMBRE18=$TDEDODICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TDEDOENERO19=$TDEDOENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TDEDOFEBRERO19=$TDEDOFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TDEDOMARZO19=$TDEDOMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TDEDOABRIL19=$TDEDOABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TDEDOMAYO19=$TDEDOMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TDEDOJUNIO19=$TDEDOJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TDEDOJULIO19=$TDEDOJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TDEDOAGOSTO19=$TDEDOAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TDEDOSEPTIEMBRE19=$TDEDOSEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TDEDOOCTUBRE19=$TDEDOOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TDEDONOVIEMBRE19=$TDEDONOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TDEDODICIEMBRE19=$TDEDODICIEMBRE19+$pivotecantidad;
             }
          break;
        case 'REPLAS':
          if($fechas[$x]=="2018-01")
             {
                     $TREPLASENERO18=$TREPLASENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREPLASFEBRERO18=$TREPLASFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREPLASMARZO18=$TREPLASMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREPLASABRIL18=$TREPLASABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREPLASMAYO18=$TREPLASMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREPLASJUNIO18=$TREPLASJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREPLASJULIO18=$TREPLASJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREPLASAGOSTO18=$TREPLASAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TREPLASSEPTIEMBRE18=$TREPLASSEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREPLASOCTUBRE18=$TREPLASOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TREPLASNOVIEMBRE18=$TREPLASNOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREPLASDICIEMBRE18=$TREPLASDICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREPLASENERO19=$TREPLASENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREPLASFEBRERO19=$TREPLASFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREPLASMARZO19=$TREPLASMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREPLASABRIL19=$TREPLASABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREPLASMAYO19=$TREPLASMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREPLASJUNIO19=$TREPLASJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREPLASJULIO19=$TREPLASJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREPLASAGOSTO19=$TREPLASAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TREPLASSEPTIEMBRE19=$TREPLASSEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREPLASOCTUBRE19=$TREPLASOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TREPLASNOVIEMBRE19=$TREPLASNOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREPLASDICIEMBRE19=$TREPLASDICIEMBRE19+$pivotecantidad;
             }
          break;
        case 'REMA':
          if($fechas[$x]=="2018-01")
             {
                     $TREMAENERO18=$TREMAENERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-02")
             {
                     $TREMAFEBRERO18=$TREMAFEBRERO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-03")
             {
                     $TREMAMARZO18=$TREMAMARZO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-04")
             {
                     $TREMAABRIL18=$TREMAABRIL18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-05")
             {
                     $TREMAMAYO18=$TREMAMAYO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-06")
             {
                     $TREMAJUNIO18=$TREMAJUNIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-07")
             {
                     $TREMAJULIO18=$TREMAJULIO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-08")
             {
                     $TREMAAGOSTO18=$TREMAAGOSTO18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-09")
             {
                     $TREMASEPTIEMBRE18=$TREMASEPTIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-10")
             {
                     $TREMAOCTUBRE18=$TREMAOCTUBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-11")
             {
                     $TREMANOVIEMBRE18=$TREMANOVIEMBRE18+$pivotecantidad;
             }
             if($fechas[$x]=="2018-12")
             {
                     $TREMADICIEMBRE18=$TREMADICIEMBRE18+$pivotecantidad;
             }
             //-------------------------------------------------------

             if($fechas[$x]=="2019-01")
             {
                     $TREMAENERO19=$TREMAENERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-02")
             {
                     $TREMAFEBRERO19=$TREMAFEBRERO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-03")
             {
                     $TREMAMARZO19=$TREMAMARZO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-04")
             {
                     $TREMAABRIL19=$TREMAABRIL19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-05")
             {
                     $TREMAMAYO19=$TREMAMAYO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-06")
             {
                     $TREMAJUNIO19=$TREMAJUNIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-07")
             {
                     $TREMAJULIO19=$TREMAJULIO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-08")
             {
                     $TREMAAGOSTO19=$TREMAAGOSTO19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-09")
             {
                     $TREMASEPTIEMBRE19=$TREMASEPTIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-10")
             {
                     $TREMAOCTUBRE19=$TREMAOCTUBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-11")
             {
                     $TREMANOVIEMBRE19=$TREMANOVIEMBRE19+$pivotecantidad;
             }
             if($fechas[$x]=="2019-12")
             {
                     $TREMADICIEMBRE19=$TREMADICIEMBRE19+$pivotecantidad;
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



echo "CAJAS ENERO 2018: ".$TCENERO18.' TOTAL CAJAS ENERO 2019: '.$TCENERO19.'<br>'.
     "CAJAS FEBRERO 2018: ".$TCFEBRERO18.' TOTAL CAJAS FEBRERO 2019: '.$TCFEBRERO19.'<br>'.
     "CAJAS MARZO 2018: ".$TCMARZO18.' TOTAL CAJAS MARZO 2019: '.$TCMARZO19.'<br>'.
     "CAJAS ABRIL 2018: ".$TCABRIL18.' TOTAL CAJAS ABRIL 2019: '.$TCABRIL19.'<br>'.
     "CAJAS MAYO 2018: ".$TCMAYO18.' TOTAL CAJAS MAYO 2019: '.$TCMAYO19.'<br>'.
     "CAJAS JUNIO 2018: ".$TCJUNIO18.' TOTAL CAJAS JUNIO 2019: '.$TCJUNIO19.'<br>'.
     "CAJAS JULIO 2018: ".$TCJULIO18.' TOTAL CAJAS JULIO 2019: '.$TCJULIO19.'<br>'.
     "CAJAS AGOSTO 2018: ".$TCAGOSTO18.' TOTAL CAJAS AGOSTO 2019: '.$TCAGOSTO19.'<br>'.
     "CAJAS SEPTIEMBRE 2018: ".$TCSEPTIEMBRE18.' TOTAL CAJAS SEPTIEMBRE 2019: '.$TCSEPTIEMBRE19.'<br>'.
     "CAJAS OCTUBRE 2018: ".$TCOCTUBRE18.' TOTAL CAJAS OCTUBRE 2019: '.$TCOCTUBRE19.'<br>'.
     "CAJAS NOVIEMBRE 2018: ".$TCNOVIEMBRE18.' TOTAL CAJAS NOVIEMBRE 2019: '.$TCNOVIEMBRE19.'<br>'.
     "CAJAS DICIEMBRE 2018: ".$TCDICIEMBRE18.' TOTAL CAJAS DICIEMBRE 2019: '.$TCDICIEMBRE19.'<br><br><br><br><br>'.

     "TOTAL DE REJAS ENERO 2018: ".$TREENERO18.          ' TOTAL DE REJAS ENERO 2019: '.$TREENERO19.'<br>'.
     "TOTAL DE REJAS FEBRERO 2018: ".$TREFEBRERO18.      ' TOTAL DE REJAS FEBRERO 2019: '.$TREFEBRERO19.'<br>'.
     "TOTAL DE REJAS MARZO 2018: ".$TREMARZO18.          ' TOTAL DE REJAS MARZO 2019: '.$TREMARZO19.'<br>'.
     "TOTAL DE REJAS ABRIL 2018: ".$TREABRIL18.          ' TOTAL DE REJAS ABRIL 2019: '.$TREABRIL19.'<br>'.
     "TOTAL DE REJAS MAYO 2018: ".$TREMAYO18.            ' TOTAL DE REJAS MAYO 2019: '.$TREMAYO19.'<br>'.
     "TOTAL DE REJAS JUNIO 2018: ".$TREJUNIO18.          ' TOTAL DE REJAS JUNIO 2019: '.$TREJUNIO19.'<br>'.
     "TOTAL DE REJAS JULIO 2018: ".$TREJULIO18.          ' TOTAL DE REJAS JULIO 2019: '.$TREJULIO19.'<br>'.
     "TOTAL DE REJAS AGOSTO 2018: ".$TREAGOSTO18.        ' TOTAL DE REJAS AGOSTO 2019: '.$TREAGOSTO19.'<br>'.
     "TOTAL DE REJAS SEPTIEMBRE 2018: ".$TRESEPTIEMBRE18.' TOTAL DE REJAS SEPTIEMBRE 2019: '.$TRESEPTIEMBRE19.'<br>'.
     "TOTAL DE REJAS OCTUBRE 2018: ".$TREOCTUBRE18.      ' TOTAL DE REJAS OCTUBRE 2019: '.$TREOCTUBRE19.'<br>'.
     "TOTAL DE REJAS NOVIEMBRE 2018: ".$TRENOVIEMBRE18.  ' TOTAL DE REJAS NOVIEMBRE 2019: '.$TRENOVIEMBRE19.'<br>'.
     "TOTAL DE REJAS DICIEMBRE 2018: ".$TREDICIEMBRE18.  ' TOTAL DE REJAS DICIEMBRE 2019: '.$TREDICIEMBRE19.'<br><br><br><br><br>'.

     "TOTAL DE RACIMOS ENERO 2018: ".$TRAENERO18.          ' TOTAL DE RACIMOS ENERO 2019: '.$TRAENERO19.'<br>'.
     "TOTAL DE RACIMOS FEBRERO 2018: ".$TRAFEBRERO18.      ' TOTAL DE RACIMOS FEBRERO 2019: '.$TRAFEBRERO19.'<br>'.
     "TOTAL DE RACIMOS MARZO 2018: ".$TRAMARZO18.          ' TOTAL DE RACIMOS MARZO 2019: '.$TRAMARZO19.'<br>'.
     "TOTAL DE RACIMOS ABRIL 2018: ".$TRAABRIL18.          ' TOTAL DE RACIMOS ABRIL 2019: '.$TRAABRIL19.'<br>'.
     "TOTAL DE RACIMOS MAYO 2018: ".$TRAMAYO18.            ' TOTAL DE RACIMOS MAYO 2019: '.$TRAMAYO19.'<br>'.
     "TOTAL DE RACIMOS JUNIO 2018: ".$TRAJUNIO18.          ' TOTAL DE RACIMOS JUNIO 2019: '.$TRAJUNIO19.'<br>'.
     "TOTAL DE RACIMOS JULIO 2018: ".$TRAJULIO18.          ' TOTAL DE RACIMOS JULIO 2019: '.$TRAJULIO19.'<br>'.
     "TOTAL DE RACIMOS AGOSTO 2018: ".$TRAAGOSTO18.        ' TOTAL DE RACIMOS AGOSTO 2019: '.$TRAAGOSTO19.'<br>'.
     "TOTAL DE RACIMOS SEPTIEMBRE 2018: ".$TRASEPTIEMBRE18.' TOTAL DE RACIMOS SEPTIEMBRE 2019: '.$TRASEPTIEMBRE19.'<br>'.
     "TOTAL DE RACIMOS OCTUBRE 2018: ".$TRAOCTUBRE18.      ' TOTAL DE RACIMOS OCTUBRE 2019: '.$TRAOCTUBRE19.'<br>'.
     "TOTAL DE RACIMOS NOVIEMBRE 2018: ".$TRANOVIEMBRE18.  ' TOTAL DE RACIMOS NOVIEMBRE 2019: '.$TRANOVIEMBRE19.'<br>'.
     "TOTAL DE RACIMOS DICIEMBRE 2018: ".$TRADICIEMBRE18.  ' TOTAL DE RACIMOS DICIEMBRE 2019: '.$TRADICIEMBRE19.'<br><br><br><br><br>'.

     "TOTAL DE DEDO SUELTO ENERO 2018: ".$TDEDOENERO18.          ' TOTAL DE DEDO SUELTO ENERO 2019: '.$TDEDOENERO19.'<br>'.
     "TOTAL DE DEDO SUELTO FEBRERO 2018: ".$TDEDOFEBRERO18.      ' TOTAL DE DEDO SUELTO FEBRERO 2019: '.$TDEDOFEBRERO19.'<br>'.
     "TOTAL DE DEDO SUELTO MARZO 2018: ".$TDEDOMARZO18.          ' TOTAL DE DEDO SUELTO MARZO 2019: '.$TDEDOMARZO19.'<br>'.
     "TOTAL DE DEDO SUELTO ABRIL 2018: ".$TDEDOABRIL18.          ' TOTAL DE DEDO SUELTO ABRIL 2019: '.$TDEDOABRIL19.'<br>'.
     "TOTAL DE DEDO SUELTO MAYO 2018: ".$TDEDOMAYO18.            ' TOTAL DE DEDO SUELTO MAYO 2019: '.$TDEDOMAYO19.'<br>'.
     "TOTAL DE DEDO SUELTO JUNIO 2018: ".$TDEDOJUNIO18.          ' TOTAL DE DEDO SUELTO JUNIO 2019: '.$TDEDOJUNIO19.'<br>'.
     "TOTAL DE DEDO SUELTO JULIO 2018: ".$TDEDOJULIO18.          ' TOTAL DE DEDO SUELTO JULIO 2019: '.$TDEDOJULIO19.'<br>'.
     "TOTAL DE DEDO SUELTO AGOSTO 2018: ".$TDEDOAGOSTO18.        ' TOTAL DE DEDO SUELTO AGOSTO 2019: '.$TDEDOAGOSTO19.'<br>'.
     "TOTAL DE DEDO SUELTO SEPTIEMBRE 2018: ".$TDEDOSEPTIEMBRE18.' TOTAL DE DEDO SUELTO SEPTIEMBRE 2019: '.$TDEDOSEPTIEMBRE19.'<br>'.
     "TOTAL DE DEDO SUELTO OCTUBRE 2018: ".$TDEDOOCTUBRE18.      ' TOTAL DE DEDO SUELTO OCTUBRE 2019: '.$TDEDOOCTUBRE19.'<br>'.
     "TOTAL DE DEDO SUELTO NOVIEMBRE 2018: ".$TDEDONOVIEMBRE18.  ' TOTAL DE DEDO SUELTO NOVIEMBRE 2019: '.$TDEDONOVIEMBRE19.'<br>'.
     "TOTAL DE DEDO SUELTO DICIEMBRE 2018: ".$TDEDODICIEMBRE18.  ' TOTAL DE DEDO SUELTO DICIEMBRE 2019: '.$TDEDODICIEMBRE19.'<br><br><br><br><br>'.

     "TOTAL DE REJAS DE PLASTICO ENERO 2018: ".$TREPLASENERO18.          ' TOTAL DE REJAS ENERO 2019: '.$TREPLASENERO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO FEBRERO 2018: ".$TREPLASFEBRERO18.      ' TOTAL DE REJAS FEBRERO 2019: '.$TREPLASFEBRERO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO MARZO 2018: ".$TREPLASMARZO18.          ' TOTAL DE REJAS MARZO 2019: '.$TREPLASMARZO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO ABRIL 2018: ".$TREPLASABRIL18.          ' TOTAL DE REJAS ABRIL 2019: '.$TREPLASABRIL19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO MAYO 2018: ".$TREPLASMAYO18.            ' TOTAL DE REJAS MAYO 2019: '.$TREPLASMAYO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO JUNIO 2018: ".$TREPLASJUNIO18.          ' TOTAL DE REJAS JUNIO 2019: '.$TREPLASJUNIO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO JULIO 2018: ".$TREPLASJULIO18.          ' TOTAL DE REJAS JULIO 2019: '.$TREPLASJULIO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO AGOSTO 2018: ".$TREPLASAGOSTO18.        ' TOTAL DE REJAS AGOSTO 2019: '.$TREPLASAGOSTO19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO SEPTIEMBRE 2018: ".$TREPLASSEPTIEMBRE18.' TOTAL DE REJAS SEPTIEMBRE 2019: '.$TREPLASSEPTIEMBRE19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO OCTUBRE 2018: ".$TREPLASOCTUBRE18.      ' TOTAL DE REJAS OCTUBRE 2019: '.$TREPLASOCTUBRE19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO NOVIEMBRE 2018: ".$TREPLASNOVIEMBRE18.  ' TOTAL DE REJAS NOVIEMBRE 2019: '.$TREPLASNOVIEMBRE19.'<br>'.
     "TOTAL DE REJAS DE PLASTICO DICIEMBRE 2018: ".$TREPLASDICIEMBRE18.  ' TOTAL DE REJAS DICIEMBRE 2019: '.$TREPLASDICIEMBRE19.'<br><br><br><br><br>'.

     "TOTAL DE REJAS DE MADERA ENERO 2018: ".$TREMAENERO18.          ' TOTAL DE REJAS ENERO 2019: '.$TREMAENERO19.'<br>'.
     "TOTAL DE REJAS DE MADERA FEBRERO 2018: ".$TREMAFEBRERO18.      ' TOTAL DE REJAS FEBRERO 2019: '.$TREMAFEBRERO19.'<br>'.
     "TOTAL DE REJAS DE MADERA MARZO 2018: ".$TREMAMARZO18.          ' TOTAL DE REJAS MARZO 2019: '.$TREMAMARZO19.'<br>'.
     "TOTAL DE REJAS DE MADERA ABRIL 2018: ".$TREMAABRIL18.          ' TOTAL DE REJAS ABRIL 2019: '.$TREMAABRIL19.'<br>'.
     "TOTAL DE REJAS DE MADERA MAYO 2018: ".$TREMAMAYO18.            ' TOTAL DE REJAS MAYO 2019: '.$TREMAMAYO19.'<br>'.
     "TOTAL DE REJAS DE MADERA JUNIO 2018: ".$TREMAJUNIO18.          ' TOTAL DE REJAS JUNIO 2019: '.$TREMAJUNIO19.'<br>'.
     "TOTAL DE REJAS DE MADERA JULIO 2018: ".$TREMAJULIO18.          ' TOTAL DE REJAS JULIO 2019: '.$TREMAJULIO19.'<br>'.
     "TOTAL DE REJAS DE MADERA AGOSTO 2018: ".$TREMAAGOSTO18.        ' TOTAL DE REJAS AGOSTO 2019: '.$TREMAAGOSTO19.'<br>'.
     "TOTAL DE REJAS DE MADERA SEPTIEMBRE 2018: ".$TREMASEPTIEMBRE18.' TOTAL DE REJAS SEPTIEMBRE 2019: '.$TREMASEPTIEMBRE19.'<br>'.
     "TOTAL DE REJAS DE MADERA OCTUBRE 2018: ".$TREMAOCTUBRE18.      ' TOTAL DE REJAS OCTUBRE 2019: '.$TREMAOCTUBRE19.'<br>'.
     "TOTAL DE REJAS DE MADERA NOVIEMBRE 2018: ".$TREMANOVIEMBRE18.  ' TOTAL DE REJAS NOVIEMBRE 2019: '.$TREMANOVIEMBRE19.'<br>'.
     "TOTAL DE REJAS DE MADERA DICIEMBRE 2018: ".$TREMADICIEMBRE18.  ' TOTAL DE REJAS DICIEMBRE 2019: '.$TREMADICIEMBRE19.'<br><br><br><br><br>'
     ;

 ?>
