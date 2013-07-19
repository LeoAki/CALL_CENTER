<?php
require_once 'class/Persona.php';
$personavariable= new Persona();
$code=$_GET['codigo'];
$personavariable->ELIMINO($code);
?>
