<?php
session_start();
require_once './class/Persona.php';
$personita=new Persona();
$personita->LOGOUT($_SESSION['codigo']);
session_destroy();
header('location: index.php');
?>