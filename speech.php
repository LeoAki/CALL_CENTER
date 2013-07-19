<?php 
session_start();
$codigo_viene=$_GET['codecli'];
require_once './class/Cliente.php';
$clien= new Cliente();
require_once './class/PLANES.php';
$plannes= new PLANES();
$validauser=$clien->BUSCAR($codigo_viene);
$fecha=date("Y-m-d");
$hora=date("H:i:s");
?>
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
</head>
<?php require_once 'class/Usuario.php';
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
<div style="width: 95%; text-align: justify">
<h3 class='text-info'>Para continuar vamos a realizar una breve grabación de voz para confirmar su deseo de  adquirir este  servicio correcto:<br>
<p class="text-error">Le recordamos que por su seguridad esta llamada está siendo Grabada.</p></h3>
SR <abbr title="NOMBRE Y APELLIDO"><strong><?php echo $validauser->getPATERNO()." ".$validauser->getMATERNO()." ,".$validauser->getNOMBRES(); ?></strong></abbr>
,  siendo hoy <abbr title="FIJATE QUE DIA ESTAMOS"><strong><?php echo $fecha; ?></strong></abbr>  del 2013  
a las <abbr title="FIJATE LA HORA"><strong><?php echo $hora; ?></strong></abbr> estamos procediendo a realizar la grabación de su solicitud 
del servicio <strong>1 PLAY</strong>/<strong>2 PLAY</strong>/<strong>3 PLAY</strong>  a contratar con un cargo fijo mensual de <abbr title="MONEY">................</abbr>
que por una promoción usted obtendrá el 50% de DSCTO durante (1 MES/2MESES/3MESES) correcto:<br><br>
ME CONFIRMA POR FAVOR SU:<br>
<center><h3>**************************** *********FORMULARIO>********* ****************************</h3></center>
<u>
<li><i><strong>APELLIDO PATERNO: </strong></i> <input type="text" id="txtpaterno" name="txtpaterno" value="<?php echo $validauser->getPATERNO();?>"/><br></li>
<li><i><strong>APELLIDO MATERNO: </strong></i> <input type="text" id="txtmaterno" name="txtmaterno" value="<?php echo $validauser->getMATERNO();?>"/><br></li>
<li><i><strong>NOMBRES: </strong></i> <input type="text" id="txtname" name="txtname" value="<?php echo $validauser->getNOMBRES(); ?>"/><br></li>
<li><i><strong>DNI: </strong></i> <input type="text" id="txtdni" name="txtdni" value="<?php echo $validauser->getDNI(); ?>"/><br></li>
<li><i><strong>FECHA DE NACIMIENTO: </strong></i> <input type="text" id="datepicker" name="datepicker" size="30" placeholder="YEAR-MES-DIA"/><br></li>
<li><i><strong>DOMICILIO: </strong></i> <input type="text" class="span4" id="txtdomicilio" name="txtdomicilio" value="<?php echo $validauser->getDIRECCION(); ?>"/><br></li>
<li><div class="control-group">
<i><strong>DISTRITO: </strong></i>
    <select class="span3" id="txtdistrito" name="txtdistrito">
    <?php 
    $lis=$clien->ListDistritos();
    while ($rowdis = mysql_fetch_array($lis)) {
        echo "<option value='$rowdis[0]'>$rowdis[1]</option>";
    }
    ?>
    </select>
</div></li>
<li style="display: none;"><strong><i>VENDEDOR :</i> </strong><input type="text" class="span4" id="txtvendedor" name="txtvendedor" value="<?php echo $_SESSION['codigo'];?>"/><br></li>
<li><strong><i>REFERENCIA EXACTA:</i> </strong><input type="text" class="span4" id="txtreferencia" name="txtreferencia"/><br></li>
<li><i><strong>CORREO ELECTRONICO: </strong></i><input type="text" class="span3" id="txtmail" name="txtmail"/><br></li>
<li><i><strong>CELULAR DE REFERENCIA: </strong></i><input type="text" class="span3" id="txtcelreferencia" name="txtcelreferencia"/><br></li>
<li><div class="control-group">
<i><strong>PLANES: </strong></i>
    <select class="span8" id="txtplanes" name="txtplanes">
    <?php 
    $listaplan=$plannes->ListarPlanes();
    while ($rowdis = mysql_fetch_array($listaplan)) {
        echo "<option value='$rowdis[0]'>$rowdis[1] ------>  $rowdis[2]</option>";
    }
    ?>
    </select>
</div></li>
</u>
<h4 class="text-error">HABIENDO SIDO INFORMADO DE LA CARACTERISTICAS DE LA CONTRATACION LE AGRADECERE DIGA PORFAVOR:<br>
"SI ACEPTO"</h4>
<ul>
<li>BIEN  SR./Srta.<abbr title="NOMBRE Y APELLIDO">................</abbr><strong> [Nombre y Apellido]</strong>,  HEMOS REGISTRADO SU AFILIACION CORRECTAMENTE CON EL NUMERO DE PEDIDO DIA/FECHA/HORA : EN EL TRANSCURSO DE LOS DIAS SE PONDRA EN CONTACTO CON USTED  EL AREA TECNICA PARA COORDINAR DIRECTAMENTE LA ISNTALACION. 
<br>DE ACUERDO: <strong>NO OLVIDE TENER COPIA DE DNI Y RECIBO DE LUZ O AGUA</strong></li>
</ul>
<h3 class="text-error">LO FELICITO POR LA DESICI&Oacute;N TOMADA HA SIDO UN PLACER HABER CONVERSADO CON USTED, LE AGRADEZCO POR SU TIEMPO, QUE TENGA UN EXCELENTE D&Iacute;A!!!!!!</h3>
<br><br>
</div>
    <span class="label label-important" id="msj"></span>
    <button class="btn btn-danger" id="btnn" name="btnn">GRABAR VENTA</button>
</center>
<br><br><br>
        <?php
        require_once 'includes/footer.php';        
        ?>
    </body>
<script src="http://code.jquery.com/jquery.js"></script>
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
<script type="text/javascript" src="static/js/ajax.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

});
</script>
<script type="text/javascript">
$('#btnn').click(function (evento){
    var CODIGO="";
    var PATERNO=$("#txtpaterno").val();
    var MATERNO=$("#txtmaterno").val();
    var NOMBRES=$("#txtname").val();
    var DNI=$("#txtdni").val();
    var FECHANAC=$("#datepicker").val();
    var DOMICILIO=$("#txtdomicilio").val();
    var DISTRITO=$("#txtdistrito").val();
    var REFERENCIA=$("#txtreferencia").val();
    var EMAIL=$("#txtmail").val();
    var CELREFERENCIA=$("#txtcelreferencia").val();
    var PLANE=$("#txtplanes").val();
    var VENDEDOR=$("#txtvendedor").val();
    if(FECHANAC==""){
        $("#msj").html("Es requerido escribir una fecha de Nacimiento");
        $("#datepicker").focus();
        return false;
    }
    if(REFERENCIA==""){
        $("#msj").html("Es requerido escribir una referencia de la direcci&oacute;n");
        $("#txtreferencia").focus();
        return false;
    }
    if(EMAIL==""){
        $("#msj").html("Es requerido escribir un email");
        $("#txtmail").focus();
        return false;
    }
//    ajaxllamada(CODIGO,IDCLIENTE,IDUSUARIO,IDESTADO,DESCRIPCION);
ventaefectuada(CODIGO,PATERNO,MATERNO,NOMBRES,DNI,FECHANAC,DOMICILIO,DISTRITO,REFERENCIA,EMAIL,CELREFERENCIA,PLANE,VENDEDOR);
alert("CORRECTO");
});
</script>
<?php }?>
</html>
