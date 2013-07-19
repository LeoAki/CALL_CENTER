<?php
require_once './class/Llamada.php';
$llam= new Llamada();
#obtengo los gets
$odigo=$_GET['codigo'];
$cliente=$_GET['idcliente'];
$usuario=$_GET['idusuario'];
$tstatus=$_GET['idestado'];
$cription=$_GET['descripcion'];
#asigno los valores
$llam->setCODIGO($odigo);
$llam->setIDCLIENTE($cliente);
$llam->setIDUSUARIO($usuario);
$llam->setIDESTADO($tstatus);
$llam->setDESCRIPCION($cription);
$llam->GRABAR();
echo "<a>CIERRA LA PAGINA, TODO ESTA CONSUMADO</a>";
?>
