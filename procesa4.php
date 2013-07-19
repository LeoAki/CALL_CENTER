<?php
require_once './class/Cliente.php';
$clicli= new Cliente();
#obtengo en un get
$codd=$_GET['code'];
$msnn=$_GET['msn'];
$patt=$_GET['pat'];
$matt=$_GET['mat'];
$nomm=$_GET['nom'];
$dnii=$_GET['dni'];
$respp=$_GET['resp'];
$cell=$_GET['cel'];
$fijoo=$_GET['fijo'];
$diree=$_GET['dire'];
$distritoo=$_GET['distrito'];
#asigno los valores
$clicli->setCODIGO($codd);
$clicli->setMENSAJE($msnn);
$clicli->setPATERNO($patt);
$clicli->setMATERNO($matt);
$clicli->setNOMBRES($nomm);
$clicli->setDNI($dnii);
$clicli->setRESPONSABLES($respp);
$clicli->setCELULAR($cell);
$clicli->setFIJO($fijoo);
$clicli->setDIRECCION($diree);
$clicli->setDISTRITO($distritoo);
#paso a guardar
$clicli->GRABAR();
echo 'Cliente registrado correctamente.';
?>
