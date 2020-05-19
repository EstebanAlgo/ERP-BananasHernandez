<?php 
require('../php/conexion.php');

$CENERO2015=0; $CFEBRERO2015=0; $CMARZO2015=0; $CABRIL2015=0; $CMAYO2015=0; $CJUNIO2015=0; $CJULIO2015=0; $CAGOSTO2015=0;
$CSEPTIEMBRE2015=0; $COCTUBRE2015=0; $CNOVIEMBRE2015=0; $CDICIEMBRE2015=0;

$CENERO2016=0; $CFEBRERO2016=0; $CMARZO2016=0; $CABRIL2016=0; $CMAYO2016=0; $CJUNIO2016=0; $CJULIO2016=0; $CAGOSTO2016=0;
$CSEPTIEMBRE2016=0; $COCTUBRE2016=0; $CNOVIEMBRE2016=0; $CDICIEMBRE2016=0;

$CENERO2017=0; $CFEBRERO2017=0; $CMARZO2017=0; $CABRIL2017=0; $CMAYO2017=0; $CJUNIO2017=0; $CJULIO2017=0; $CAGOSTO2017=0;
$CSEPTIEMBRE2017=0; $COCTUBRE2017=0; $CNOVIEMBRE2017=0; $CDICIEMBRE2017=0;

$TOTALCAJAS2015=0; $TOTALCAJAS2016=0; $TOTALCAJAS2017=0; 

 
$statement=$conexion2->prepare("SELECT *FROM cajas");
$statement->execute();
$cajas=$statement->fetchAll();
foreach ($cajas as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $CENERO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $CFEBRERO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $CMARZO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $CABRIL2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $CMAYO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $CJUNIO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $CJULIO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $CAGOSTO2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $CSEPTIEMBRE2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $COCTUBRE2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $CNOVIEMBRE2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $CDICIEMBRE2015=$fila['cantidad'];
                $TOTALCAJAS2015=$TOTALCAJAS2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $CENERO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $CFEBRERO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $CMARZO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $CABRIL2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $CMAYO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $CJUNIO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $CJULIO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $CAGOSTO2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $CSEPTIEMBRE2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $COCTUBRE2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $CNOVIEMBRE2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $CDICIEMBRE2016=$fila['cantidad'];
                $TOTALCAJAS2016=$TOTALCAJAS2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $CENERO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $CFEBRERO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $CMARZO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $CABRIL2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $CMAYO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $CJUNIO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $CJULIO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $CAGOSTO2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $CSEPTIEMBRE2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $COCTUBRE2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $CNOVIEMBRE2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $CDICIEMBRE2017=$fila['cantidad'];
                $TOTALCAJAS2017=$TOTALCAJAS2017+$fila['cantidad'];
            }
            break;
        
    }

}


//seccion de rejas------------------------------------------------------------------------------------------------------------

$REENERO2015=0; $REFEBRERO2015=0; $REMARZO2015=0; $REABRIL2015=0; $REMAYO2015=0; $REJUNIO2015=0; $REJULIO2015=0; $REAGOSTO2015=0;
$RESEPTIEMBRE2015=0; $REOCTUBRE2015=0; $RENOVIEMBRE2015=0; $REDICIEMBRE2015=0;

$REENERO2016=0; $REFEBRERO2016=0; $REMARZO2016=0; $REABRIL2016=0; $REMAYO2016=0; $REJUNIO2016=0; $REJULIO2016=0; $REAGOSTO2016=0;
$RESEPTIEMBRE2016=0; $REOCTUBRE2016=0; $RENOVIEMBRE2016=0; $REDICIEMBRE2016=0;

$REENERO2017=0; $REFEBRERO2017=0; $REMARZO2017=0; $REABRIL2017=0; $REMAYO2017=0; $REJUNIO2017=0; $REJULIO2017=0; $REAGOSTO2017=0;
$RESEPTIEMBRE2017=0; $REOCTUBRE2017=0; $RENOVIEMBRE2017=0; $REDICIEMBRE2017=0;


$TOTALREJAS2015=0; $TOTALREJAS2016=0; $TOTALREJAS2017=0; 

 
$statement=$conexion2->prepare("SELECT *FROM rejas");
$statement->execute();
$rejas=$statement->fetchAll();
foreach ($rejas as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $REENERO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REFEBRERO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMARZO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REABRIL2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAYO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REJUNIO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REJULIO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REAGOSTO2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RESEPTIEMBRE2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REOCTUBRE2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RENOVIEMBRE2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REDICIEMBRE2015=$fila['cantidad'];
                $TOTALREJAS2015=$TOTALREJAS2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $REENERO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REFEBRERO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMARZO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REABRIL2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAYO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REJUNIO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REJULIO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REAGOSTO2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RESEPTIEMBRE2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REOCTUBRE2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RENOVIEMBRE2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REDICIEMBRE2016=$fila['cantidad'];
                $TOTALREJAS2016=$TOTALREJAS2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $REENERO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REFEBRERO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMARZO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REABRIL2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAYO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REJUNIO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REJULIO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REAGOSTO2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RESEPTIEMBRE2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REOCTUBRE2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RENOVIEMBRE2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REDICIEMBRE2017=$fila['cantidad'];
                $TOTALREJAS2017=$TOTALREJAS2017+$fila['cantidad'];
            }
            break;
    }

}

//seccion de RACIMOS------------------------------------------------------------------------------------------------------------

$RAENERO2015=0; $RAFEBRERO2015=0; $RAMARZO2015=0; $RAABRIL2015=0; $RAMAYO2015=0; $RAJUNIO2015=0; $RAJULIO2015=0; $RAAGOSTO2015=0;
$RASEPTIEMBRE2015=0; $RAOCTUBRE2015=0; $RANOVIEMBRE2015=0; $RADICIEMBRE2015=0;

$RAENERO2016=0; $RAFEBRERO2016=0; $RAMARZO2016=0; $RAABRIL2016=0; $RAMAYO2016=0; $RAJUNIO2016=0; $RAJULIO2016=0; $RAAGOSTO2016=0;
$RASEPTIEMBRE2016=0; $RAOCTUBRE2016=0; $RANOVIEMBRE2016=0; $RADICIEMBRE2016=0;

$RAENERO2017=0; $RAFEBRERO2017=0; $RAMARZO2017=0; $RAABRIL2017=0; $RAMAYO2017=0; $RAJUNIO2017=0; $RAJULIO2017=0; $RAAGOSTO2017=0;
$RASEPTIEMBRE2017=0; $RAOCTUBRE2017=0; $RANOVIEMBRE2017=0; $RADICIEMBRE2017=0;


$TOTALRACIMOS2015=0; $TOTALRACIMOS2016=0; $TOTALRACIMOS2017=0; 

 
$statement=$conexion2->prepare("SELECT *FROM  racimos");
$statement->execute();
$racimos=$statement->fetchAll();
foreach ($racimos as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $RAENERO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $RAFEBRERO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $RAMARZO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $RAABRIL2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $RAMAYO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $RAJUNIO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $RAJULIO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $RAAGOSTO2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RASEPTIEMBRE2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $RAOCTUBRE2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RANOVIEMBRE2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $RADICIEMBRE2015=$fila['cantidad'];
                $TOTALRACIMOS2015=$TOTALRACIMOS2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $RAENERO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $RAFEBRERO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $RAMARZO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $RAABRIL2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $RAMAYO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $RAJUNIO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $RAJULIO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $RAAGOSTO2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RASEPTIEMBRE2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $RAOCTUBRE2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RANOVIEMBRE2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $RADICIEMBRE2016=$fila['cantidad'];
                $TOTALRACIMOS2016=$TOTALRACIMOS2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $RAENERO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $RAFEBRERO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $RAMARZO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $RAABRIL2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $RAMAYO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $RAJUNIO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $RAJULIO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $RAAGOSTO2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $RASEPTIEMBRE2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $RAOCTUBRE2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $RANOVIEMBRE2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $RADICIEMBRE2017=$fila['cantidad'];
                $TOTALRACIMOS2017=$TOTALRACIMOS2017+$fila['cantidad'];
            }
            break;
    }

}

//seccion de dedo suelto------------------------------------------------------------------------------------------------------------

$DEDOENERO2015=0; $DEDOFEBRERO2015=0; $DEDOMARZO2015=0; $DEDOABRIL2015=0; $DEDOMAYO2015=0; $DEDOJUNIO2015=0; $DEDOJULIO2015=0; 
$DEDOAGOSTO2015=0; $DEDOSEPTIEMBRE2015=0; $DEDOOCTUBRE2015=0; $DEDONOVIEMBRE2015=0; $DEDODICIEMBRE2015=0;

$DEDOENERO2016=0; $DEDOFEBRERO2016=0; $DEDOMARZO2016=0; $DEDOABRIL2016=0; $DEDOMAYO2016=0; $DEDOJUNIO2016=0; $DEDOJULIO2016=0; 
$DEDOAGOSTO2016=0; $DEDOSEPTIEMBRE2016=0; $DEDOOCTUBRE2016=0; $DEDONOVIEMBRE2016=0; $DEDODICIEMBRE2016=0;

$DEDOENERO2017=0; $DEDOFEBRERO2017=0; $DEDOMARZO2017=0; $DEDOABRIL2017=0; $DEDOMAYO2017=0; $DEDOJUNIO2017=0; $DEDOJULIO2017=0; 
$DEDOAGOSTO2017=0; $DEDOSEPTIEMBRE2017=0; $DEDOOCTUBRE2017=0; $DEDONOVIEMBRE2017=0; $DEDODICIEMBRE2017=0;


$TOTALDEDO2015=0; $TOTALDEDO2016=0; $TOTALDEDO2017=0; 

 
$statement=$conexion2->prepare("SELECT *FROM dedo");
$statement->execute();
$dedos=$statement->fetchAll();
foreach ($dedos as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $DEDOENERO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $DEDOFEBRERO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $DEDOMARZO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $DEDOABRIL2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $DEDOMAYO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $DEDOJUNIO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $DEDOJULIO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $DEDOAGOSTO2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $DEDOSEPTIEMBRE2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $DEDOOCTUBRE2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $DEDONOVIEMBRE2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $DEDODICIEMBRE2015=$fila['cantidad'];
                $TOTALDEDO2015=$TOTALDEDO2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $DEDOENERO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $DEDOFEBRERO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $DEDOMARZO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $DEDOABRIL2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $DEDOMAYO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $DEDOJUNIO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $DEDOJULIO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $DEDOAGOSTO2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $DEDOSEPTIEMBRE2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $DEDOOCTUBRE2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $DEDONOVIEMBRE2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $DEDODICIEMBRE2016=$fila['cantidad'];
                $TOTALDEDO2016=$TOTALDEDO2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $DEDOENERO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $DEDOFEBRERO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $DEDOMARZO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $DEDOABRIL2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $DEDOMAYO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $DEDOJUNIO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $DEDOJULIO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $DEDOAGOSTO2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $DEDOSEPTIEMBRE2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $DEDOOCTUBRE2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $DEDONOVIEMBRE2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $DEDODICIEMBRE2017=$fila['cantidad'];
                $TOTALDEDO2017=$TOTALDEDO2017+$fila['cantidad'];
            }
            break;
    }

}

//seccion de rejas de plastico------------------------------------------------------------------------------------------------------------

$REPLASENERO2015=0; $REPLASFEBRERO2015=0; $REPLASMARZO2015=0; $REPLASABRIL2015=0; $REPLASMAYO2015=0; $REPLASJUNIO2015=0; 
$REPLASJULIO2015=0; $REPLASAGOSTO2015=0; $REPLASSEPTIEMBRE2015=0; $REPLASOCTUBRE2015=0; $REPLASNOVIEMBRE2015=0; $REPLASDICIEMBRE2015=0;

$REPLASENERO2016=0; $REPLASFEBRERO2016=0; $REPLASMARZO2016=0; $REPLASABRIL2016=0; $REPLASMAYO2016=0; $REPLASJUNIO2016=0; 
$REPLASJULIO2016=0; $REPLASAGOSTO2016=0; $REPLASSEPTIEMBRE2016=0; $REPLASOCTUBRE2016=0; $REPLASNOVIEMBRE2016=0; $REPLASDICIEMBRE2016=0;

$REPLASENERO2017=0; $REPLASFEBRERO2017=0; $REPLASMARZO2017=0; $REPLASABRIL2017=0; $REPLASMAYO2017=0; $REPLASJUNIO2017=0; 
$REPLASJULIO2017=0; $REPLASAGOSTO2017=0; $REPLASSEPTIEMBRE2017=0; $REPLASOCTUBRE2017=0; $REPLASNOVIEMBRE2017=0; $REPLASDICIEMBRE2017=0;

$TOTALREPLAS2015=0; $TOTALREPLAS2016=0; $TOTALREPLAS2017=0;

 
$statement=$conexion2->prepare("SELECT *FROM replas");
$statement->execute();
$replas=$statement->fetchAll();
foreach ($replas as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $REPLASENERO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REPLASFEBRERO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REPLASMARZO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REPLASABRIL2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REPLASMAYO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REPLASJUNIO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REPLASJULIO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REPLASAGOSTO2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REPLASSEPTIEMBRE2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REPLASOCTUBRE2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REPLASNOVIEMBRE2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REPLASDICIEMBRE2015=$fila['cantidad'];
                $TOTALREPLAS2015=$TOTALREPLAS2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $REPLASENERO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REPLASFEBRERO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REPLASMARZO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REPLASABRIL2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REPLASMAYO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REPLASJUNIO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REPLASJULIO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REPLASAGOSTO2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REPLASSEPTIEMBRE2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REPLASOCTUBRE2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REPLASNOVIEMBRE2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REPLASDICIEMBRE2016=$fila['cantidad'];
                $TOTALREPLAS2016=$TOTALREPLAS2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $REPLASENERO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REPLASFEBRERO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REPLASMARZO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REPLASABRIL2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REPLASMAYO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REPLASJUNIO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REPLASJULIO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REPLASAGOSTO2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REPLASSEPTIEMBRE2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REPLASOCTUBRE2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REPLASNOVIEMBRE2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REPLASDICIEMBRE2017=$fila['cantidad'];
                $TOTALREPLAS2017=$TOTALREPLAS2017+$fila['cantidad'];
            }
            break;
    }

}

//seccion de rejas DE MADERA--------------------------------------------------------------------------------------------------------

$REMAENERO2015=0; $REMAFEBRERO2015=0; $REMAMARZO2015=0; $REMAABRIL2015=0; $REMAMAYO2015=0; $REMAJUNIO2015=0; $REMAJULIO2015=0; 
$REMAAGOSTO2015=0; $REMASEPTIEMBRE2015=0; $REMAOCTUBRE2015=0; $REMANOVIEMBRE2015=0; $REMADICIEMBRE2015=0;

$REMAENERO2016=0; $REMAFEBRERO2016=0; $REMAMARZO2016=0; $REMAABRIL2016=0; $REMAMAYO2016=0; $REMAJUNIO2016=0; $REMAJULIO2016=0; 
$REMAAGOSTO2016=0; $REMASEPTIEMBRE2016=0; $REMAOCTUBRE2016=0; $REMANOVIEMBRE2016=0; $REMADICIEMBRE2016=0;

$REMAENERO2017=0; $REMAFEBRERO2017=0; $REMAMARZO2017=0; $REMAABRIL2017=0; $REMAMAYO2017=0; $REMAJUNIO2017=0; $REMAJULIO2017=0; 
$REMAAGOSTO2017=0; $REMASEPTIEMBRE2017=0; $REMAOCTUBRE2017=0; $REMANOVIEMBRE2017=0; $REMADICIEMBRE2017=0;

$TOTALREMA2015=0; $TOTALREMA2016=0; $TOTALREMA2017=0; 

 
$statement=$conexion2->prepare("SELECT *FROM rema");
$statement->execute();
$rejas=$statement->fetchAll();
foreach ($rejas as $fila) 
{
    switch ($fila['anio']) {
        case '2015':
            if($fila['mes']=="enero")
            {
                $REMAENERO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REMAFEBRERO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMAMARZO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REMAABRIL2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAMAYO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REMAJUNIO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REMAJULIO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REMAAGOSTO2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REMASEPTIEMBRE2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REMAOCTUBRE2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REMANOVIEMBRE2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REMADICIEMBRE2015=$fila['cantidad'];
                $TOTALREMA2015=$TOTALREMA2015+$fila['cantidad'];
            }
            break;
        case '2016':
            if($fila['mes']=="enero")
            {
                $REMAENERO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REMAFEBRERO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMAMARZO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REMAABRIL2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAMAYO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REMAJUNIO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REMAJULIO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REMAAGOSTO2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REMASEPTIEMBRE2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REMAOCTUBRE2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REMANOVIEMBRE2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REMADICIEMBRE2016=$fila['cantidad'];
                $TOTALREMA2016=$TOTALREMA2016+$fila['cantidad'];
            }
            break;
        case '2017':
            if($fila['mes']=="enero")
            {
                $REMAENERO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="febrero")
            {
                $REMAFEBRERO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="marzo")
            {
                $REMAMARZO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="abril")
            {
                $REMAABRIL2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="mayo")
            {
                $REMAMAYO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="junio")
            {
                $REMAJUNIO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="julio")
            {
                $REMAJULIO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="agosto")
            {
                $REMAAGOSTO2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="septiembre")
            {
                $REMASEPTIEMBRE2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="octubre")
            {
                $REMAOCTUBRE2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="noviembre")
            {
                $REMANOVIEMBRE2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            if($fila['mes']=="diciembre")
            {
                $REMADICIEMBRE2017=$fila['cantidad'];
                $TOTALREMA2017=$TOTALREMA2017+$fila['cantidad'];
            }
            break;
    }

}
 ?>