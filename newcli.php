<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>App Call_Center</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="App para Call Center">
<meta name="author" content="Leo_Aki">
<meta charset="utf-8">
<!-- Bootstrap -->
<style type="text/css">
    @import url("static/css/bootstrap.css");
    @import url("static/css/bootstrap-responsive.css");
    @import url("static/css/mystyle.css");
    @import url("Include/jquery_iu/css/smoothness/jquery-ui-1.10.3.custom.css");
</style>
<style>

.multicolumna5columnas{
    -moz-column-count: 2;
    -moz-column-gap: 2em;
    -moz-column-rule: 1px solid #ccf;
    -webkit-column-count: 2;
    -webkit-column-gap: 2em;
    -webkit-column-rule: 1px solid #ccf;
}
.demo-description {
	clear: both;
	padding: 12px;
	font-size: 1.3em;
	line-height: 1.4em;
}

.ui-draggable, .ui-droppable {
	background-position: top;
}
</style>
</head>
<?php
require_once 'class/Cliente.php';
$cli=new Cliente();
if(!$_SESSION['USERINPUT'])
{
session_start();
session_destroy();
header('location: index.php');
}else{
    require_once 'includes/header.php';
?>
<body>
<center>
<div style="width: 95%; text-align: justify" id="divmain">
    <h3 class="text-error">AGREGA A UN NUEVO CLIENTE</h3>
<form id="frm1" name="frm1" action="" method="POST">

<div class="multicolumna5columnas">
    <div class="control-group" style="display: none;">
    <span class="control-label">CODIGO : </span> 
    <input type="text" id="txtcode" name="txtcode" placeholder="CODIGO">
</div>
<div class="control-group">
    <span class="control-label">MENSAJE : </span>
    <input type="text" id="txtmsn" name="txtmsn" placeholder="MENSAJE">
    <a id="ejemplo2"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">PATERNO : </span>
    <input type="text" id="txtpat" name="txtpat" placeholder="APELLIDO PATERNO">
    <a id="ejemplo3"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">MATERNO : </span>
    <input type="text" id="txtmat" name="txtmat" placeholder="APELLIDO MATERNO">
    <a id="ejemplo4"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">NOMBRES : </span>
    <input type="text" id="txtname" name="txtname" placeholder="NOMBRES">
    <a id="ejemplo5"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">DNI : </span>
    <input type="text" id="txtdni" name="txtdni" placeholder="DNI" maxlength="8">
    <a id="ejemplo6"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">RESPONSABLE : </span>
    <select class="span3" id="txtresp" name="txtresp">
    <?php 
    $lis2=$cli->ListUser();
    while ($rowdis2 = mysql_fetch_array($lis2)) {
        echo "<option value='$rowdis2[0]'>$rowdis2[1] $rowdis2[2], $rowdis2[3]</option>";
    }
    ?>
    </select>
</div>
<div class="control-group">
    <span class="control-label">CELULAR : </span>
    <input type="text" id="txtcel" name="txtcel" placeholder="CELULAR" class="span4">
    <a id="ejemplo7"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">FIJO : </span>
    <input type="text" id="txtfijo" name="txtfijo" placeholder="TELEFONO DE CASA" class="span4">
    <a id="ejemplo8"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">DIRECCION : </span>
    <input type="text" id="txtdire" name="txtdire" class="span5"/>
    <a id="ejemplo9"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">DISTRITO : </span>
    <select class="span3" id="txtdistrito" name="txtdistrito">
    <?php 
    $lis=$cli->ListDistritos();
    while ($rowdis = mysql_fetch_array($lis)) {
        echo "<option value='$rowdis[0]'>$rowdis[1]</option>";
    }
    ?>
    </select>
</div>
<div class="control-group">
    <span class="label label-important" id="msj"></span>
    <span class="label label-success" id="msjsucces"></span>
</div>
    
    
</div>
    <br>
    <center><button class="btn btn-danger" id="btnsend" name="btnsend"  onclick='agregarPais();'>AGREGAR UN CLIENTE</button></center>
</form>
</div>
</center>

<?php require_once 'includes/footer.php'; ?>
    </body>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="static/js/ajax.js"></script>
<script src="static/js/bootstrap-affix.js"></script>
<script src="static/js/bootstrap-alert.js"></script>
<script src="static/js/bootstrap-button.js"></script>
<script src="static/js/bootstrap-carousel.js"></script>
<script src="static/js/bootstrap-collapse.js"></script>
<script src="static/js/bootstrap-dropdown.js"></script>
<script src="static/js/bootstrap-modal.js"></script>
<script src="static/js/bootstrap-popover.js"></script>
<script src="static/js/bootstrap-scrollspy.js"></script>
<script src="static/js/bootstrap-tab.js"></script>
<script src="static/js/bootstrap-tooltip.js"></script>
<script src="static/js/bootstrap-transition.js"></script>
<script src="static/js/bootstrap-typeahead.js"></script>
<script src="Include/jquery_iu/development-bundle/ui/jquery.ui.core.js"></script>
<script src="Include/jquery_iu/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

     $('#ejemplo2').tooltip({title:"Mensaje dirigido",placement:'right'});
     $('#ejemplo3').tooltip({title:"APELLIDO PATERNO",placement:'right'});
     $('#ejemplo4').tooltip({title:"APELLIDO MATERNO",placement:'right'});
     $('#ejemplo5').tooltip({title:"NOMBRE",placement:'right'});
     $('#ejemplo6').tooltip({title:"DNI",placement:'right'});
     $('#ejemplo7').tooltip({title:"CELULAR",placement:'right'});
     $('#ejemplo8').tooltip({title:"TELEFONO FIJO",placement:'right'});
     $('#ejemplo9').tooltip({title:"DIRECCION",placement:'right'});
});
</script>
<script type="text/javascript">
function agregarPais(){
  var CODIGO=$("#txtcode").val();
  var MENSAJE=$('#txtmsn').val();
  var PATERNO=$("#txtpat").val();
  var MATERNO=$("#txtmat").val();
  var NOMBRES=$("#txtname").val();
  var DNI=$("#txtdni").val();
  var RESPONSABLE=$('#txtresp').val();
  var CELULAR=$("#txtcel").val();
  var FIJO=$("#txtfijo").val();
  var DIRECCION=$("#txtdire").val();
  var DISTRITO=$("#txtdistrito").val();

if (PATERNO=="")
 {
  $("#msj").html("Es requerido escribir el apellido paterno");
  $("#txtpat").focus();
  return false;
 }
 
if (MATERNO=="")
 {
  $("#msj").html("Es requerido escribir el apellido materno");
  $("#txtmat").focus();
  return false;
 }
 
if (NOMBRES=="")
 {
  $("#msj").html("Es requerido escribir el nombre");
  $("#txtname").focus();
  return false;
 }
 
if (DNI=="")
 {
  $("#msj").html("Es requerido escribir el DNI");
  $("#txtdni").focus();
  return false;
 }else
 {
   if(isNaN(DNI))
    {
     $("#msj").html("Es requerido un valor numérico");
     $("#txtdni").focus();
     $("#txtdni").select();
     return false;
    }
   if(DNI.length<8)
    {
     $("#msj").html("El dni debe tener 8 digitos");
     $("#txtdni").focus();
     $("#txtdni").select();
     return false;
    } 
   }

if (DIRECCION=="")
{
 $("#msj").html("Es requerido escribir la direccion del nuevo cliente");
 $("#txtdire").focus();
 return false;
}
ajaxcli(CODIGO,MENSAJE,PATERNO,MATERNO,NOMBRES,DNI,RESPONSABLE,CELULAR,FIJO,DIRECCION,DISTRITO)
alert("Cliente grabado correctamente");

}
</script>
<?php }?>
</html>
