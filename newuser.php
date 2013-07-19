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
require_once 'class/Persona.php';
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
    <h3 class="text-error">AGREGA A UN NUEVO USUARIO</h3>
<form>

<div class="multicolumna5columnas">
    <div class="control-group" style="display: none;">
    <span class="control-label">CODIGO : </span> 
    <input type="text" id="txtcode" name="txtcode" placeholder="CODIGO">
    <a id="ejemplo1"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">PATERNO : </span>
    <input type="text" id="txtpat" name="txtpat" placeholder="APELLIDO PATERNO">
    <a id="ejemplo2"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">MATERNO : </span>
    <input type="text" id="txtmat" name="txtmat" placeholder="APELLIDO MATERNO">
    <a id="ejemplo3"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">NOMBRES : </span>
    <input type="text" id="txtname" name="txtname" placeholder="NOMBRES">
    <a id="ejemplo4"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">DNI : </span>
    <input type="text" id="txtdni" name="txtdni" placeholder="DNI" maxlength="8">
    <a id="ejemplo5"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">SEXO : </span>
    <select class="span2" id="txtsexo" name="txtsexo">
        <option value="M">MASCULINO</option>
        <option value="F">FEMENINO</option>
    </select>
</div>
    <span class="control-label">MAIL : </span>
    <div class="input-prepend input-append">
    <input class="span2" id="txtmail1" name="txtmail1" type="text" placeholder="mail user">
    <span class="add-on">@</span>
    <input class="span2" id="txtmail2" name="txtmail2" type="text" placeholder="gmail/hotmail/yahoo">
    <a id="ejemplo6"> <i class="icon-asterisk"></i> </a>
    </div>
<div class="control-group">
    <span class="control-label">INGRESO AL CALL : </span> 
    <input type="text" id="datepicker" name="datepicker" size="30"/>
    <a id="ejemplo7"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">FIN DE LA CAMPA&Ntilde;A : </span>
    <input type="text" id="datepicker2" name="datepicker2" size="30"/>
    <a id="ejemplo8"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">USUARIO : </span>
    <input type="text" id="txtuser" name="txtuser" placeholder="USUARIO">
    <a id="ejemplo9"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">CONTRASE&Ntilde;A : </span>
    <input type="text" id="txtcontra" name="txtcontra" placeholder="CONTRASENA">
    <a id="ejemplo10"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">ESTADO : </span>
    <input type="checkbox" id="txtstatus" name="txtstatus" checked>
    <a id="ejemplo12"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="control-label">NIVEL DE USUARIO : </span>
    <select class="span2" id="txtlevel" name="txtlevel">
        <option value="3">VENDEDOR</option>
        <option value="2">INSPECTOR</option>
        <option value="1">ADMINISTRADOR</option>
    </select>
    <a id="ejemplo13"> <i class="icon-asterisk"></i> </a>
</div>
<div class="control-group">
    <span class="label label-important" id="msj"></span>
    <span class="label label-success" id="msjsucces"></span>
</div>
    
    
</div>
    <br>
    <center><button class="btn btn-danger" id="btnsend" name="btnsend" onclick="agregarPais();">AGREGAR UN NUEVO USUARIO</button></center>
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
    $( "#datepicker2" ).datepicker();
    $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    
     $('#ejemplo1').tooltip({title:"CODIGO POR DEFECTO",placement:'right'});
     $('#ejemplo2').tooltip({title:"APELLIDO PATERNO",placement:'right'});
     $('#ejemplo3').tooltip({title:"APELLIDO MATERNO",placement:'right'});
     $('#ejemplo4').tooltip({title:"NOMBRE COMPLETO",placement:'right'});
     $('#ejemplo5').tooltip({title:"DNI",placement:'right'});
     $('#ejemplo6').tooltip({title:"CORREO ELECTRONICO",placement:'right'});
     $('#ejemplo7').tooltip({title:"DIA QUE EMPIEZA",placement:'right'});
     $('#ejemplo8').tooltip({title:"DIA QUE TERMINA",placement:'right'});
     $('#ejemplo9').tooltip({title:"USUARIO",placement:'right'});
     $('#ejemplo10').tooltip({title:"CONTRASENA",placement:'right'});
     $('#ejemplo12').tooltip({title:"PUEDE SER ACTIVO O SUSPENDIDO",placement:'right'});
     $('#ejemplo13').tooltip({title:"PUEDE SER DE TIPO VENDEDOR, DE TIPO VISOR O TIPO ADMINISTRADOR",placement:'right'});

$("#txtdni").focusout(function () {
    valor=document.getElementById("txtdni").value;
    $("#txtcontra").val(valor);
});
$("#txtname").focusout(function(){
    paterno=document.getElementById("txtpat").value;
    name=document.getElementById("txtname").value;
    name2=name.charAt(0);
    $("#txtuser").val(name2+paterno);
});
});
</script>
<script type="text/javascript">
function agregarPais(){
  var CODIGO=$("#txtcode").val();
  var PATERNO=$("#txtpat").val();
  var MATERNO=$("#txtmat").val();
  var NOMBRES=$("#txtname").val();
  var DNI=$("#txtdni").val();
  var SEXO=$("#txtsexo").val();
  var uno=$("#txtmail1").val();
  var dos=$("#txtmail2").val();
  var MAIL=uno+"@"+dos;
  var INGRESO=$("#datepicker").val();
  var SALIDA=$("#datepicker2").val();
  var USUARIO=$("#txtuser").val();
  var CONTRASENA=$("#txtcontra").val();

  var STADO=$("#txtstatus").val();
  var LEVEL=$("#txtlevel").val();
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
if (uno=="")
{
 $("#msj").html("Es requerido escribir el usuario del email");
 $("#txtmail1").focus();
 return false;
}
if (dos=="")
{
 $("#msj").html("Es requerido escribir el dominio del email: gmail-hotmail-yahoo");
 $("#txtmail2").focus();
 return false;
}
if (INGRESO=="")
{
 $("#msj").html("Es requerido escribir la fecha de ingreso");
 $("#datepicker").focus();
 return false;
}
if (SALIDA=="")
{
 $("#msj").html("Es requerido escribir la fecha de salida");
 $("#datepicker2").focus();
 return false;
}
if (USUARIO=="")
 {
  $("#msj").html("Es requerido escribir el usuario");
  $("#txtuser").focus();
  return false;
 }
if (CONTRASENA=="")
 {
  $("#msj").html("Es requerido escribir una contrasena para el usuario");
  $("#txtcontra").focus();
  return false;
 }
ajaxveamos(CODIGO,PATERNO,MATERNO,NOMBRES,DNI,SEXO,MAIL,INGRESO,SALIDA,USUARIO,CONTRASENA,LEVEL,STADO);
alert("USUARIO GRABADO CORRECTAMENTE");
$("#msj").html("Si deseas puedes agregar otro usuario");
}
</script>
<?php }?>
</html>
