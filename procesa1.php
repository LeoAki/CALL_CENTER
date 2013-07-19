<?php 
require_once 'class/Persona.php';
$personavariable= new Persona();
$codee=$_GET['code'];
$patt=$_GET['pat'];
$matt=$_GET['mat'];
$nomm=$_GET['nom'];
$dnii=$_GET['dni'];
$sexx=$_GET['sex'];
$emaa=$_GET['ema'];
$ingg=$_GET['ing'];
$sall=$_GET['sal'];
$usuu=$_GET['usu'];
$contt=$_GET['cont'];
$nivv=$_GET['niv'];
$estt=$_GET['est'];
#add set values
$personavariable->setCODIGO($codee);
$personavariable->setPATERNO($patt);
$personavariable->setMATERNO($matt);
$personavariable->setNOMBRES($nomm);
$personavariable->setDNI($dnii);
$personavariable->setSEXO($sexx);
$personavariable->setEMAIL($emaa);
$personavariable->setINICIO($ingg);
$personavariable->setFIN($sall);
$personavariable->setUSUARIO($usuu);
$personavariable->setCONTRASENA($contt);
$personavariable->setNIVEL($nivv);
$personavariable->setESTADO($estt);
$personavariable->setULTIMASESION("");
echo $ingg;
$personavariable->GRABAR();
echo 'Usuario registrado correctamente.';
?>