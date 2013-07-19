<?php
require_once 'class/Cliente.php';
$personavariable= new Cliente();
$code=$_GET['codigo'];
$personavariable->ELIMINO($code);
?>
