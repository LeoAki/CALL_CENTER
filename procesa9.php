<?php
require_once './class/VENTAREALIZADA.php';
$ventahecha=new VENTAREALIZADA();
#obtengo los gets
$codigo1=$_GET['codigo'];
$paterno1=$_GET['paterno'];
$materno1=$_GET['materno'];
$nombres1=$_GET['nombres'];
$dni1=$_GET['dni'];
$fechanac1=$_GET['fechanac'];
$domicilio1=$_GET['domicilio'];
$distrito1=$_GET['distrito'];
$referencia1=$_GET['referencia'];
$email1=$_GET['email'];
$cel1=$_GET['cel'];
$plan1=$_GET['plan'];
$vendedor1=$_GET['vendedor'];
#asigno los valores
$ventahecha->setCODIGO($codigo1);
$ventahecha->setPATERNO($paterno1);
$ventahecha->setMATERNO($materno1);
$ventahecha->setNOMBRES($nombres1);
$ventahecha->setDNI($dni1);
$ventahecha->setFECHA_NAC($fechanac1);
$ventahecha->setDOMICILIO($domicilio1);
$ventahecha->setDISTRITO($distrito1);
$ventahecha->setREFERENCIA($referencia1);
$ventahecha->setMAIL($email1);
$ventahecha->setCELULAR_REFERENCIA($cel1);
$ventahecha->setPLAN($plan1);
$ventahecha->setVENDEDOR($vendedor1);

$ventahecha->Grabar();
echo "<a style='color:white;'>VENTA LLAMADA DE FORMA CORRECTA, PORFAVOR CIERRE LA PESTA&NtildeA</a>";

?>
