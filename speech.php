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
SR <abbr title="NOMBRE Y APELLIDO">................</abbr><strong> [Nombre y Apellido]</strong>,  siendo hoy<abbr title="FIJATE QUE DIA ESTAMOS">................</abbr> del 2013  
a las <abbr title="FIJATE LA HORA">................</abbr> estamos procediendo a realizar la grabación de su solicitud 
del servicio <strong>1 PLAY</strong>/<strong>2 PLAY</strong>/<strong>3 PLAY</strong>  a contratar con un cargo fijo mensual de <abbr title="MONEY">................</abbr>
que por una promoción usted obtendrá el 50% de DSCTO durante (1 MES/2MESES/3MESES) correcto:<br><br>
ME CONFIRMA POR FAVOR SU:<br>
<u>
<li><i><strong>NOMBRE Y APELLIDOS COMPLETOS:</strong></i><br></li>
<li><i><strong>DNI:</strong></i><br></li>
<li><i><strong>FECHA DE NACIMIENTO:</strong></i><br></li>
<li><i><strong>REFERENCIA EXACTA:</strong></i><br></li>
<li><i><strong>CORREO ELECTRONICO:</strong></i><br></li>
<li><i><strong>CELULAR DE REFERENCIA:</strong></i></li>
</u>
<h4 class="text-error">HABIENDO SIDO INFORMADO DE LA CARACTERISTICAS DE LA CONTRATACION LE AGRADECERE DIGA PORFAVOR:<br>
"SI ACEPTO"</h4>
<ul>
<li>BIEN  SR./Srta.<abbr title="NOMBRE Y APELLIDO">................</abbr><strong> [Nombre y Apellido]</strong>,  HEMOS REGISTRADO SU AFILIACION CORRECTAMENTE CON EL NUMERO DE PEDIDO DIA/FECHA/HORA : EN EL TRANSCURSO DE LOS DIAS SE PONDRA EN CONTACTO CON USTED  EL AREA TECNICA PARA COORDINAR DIRECTAMENTE LA ISNTALACION. 
<br>DE ACUERDO: <strong>NO OLVIDE TENER COPIA DE DNI Y RECIBO DE LUZ O AGUA</strong></li>
</ul>
<h3 class="text-error">LO FELICITO POR LA DESICI&Oacute;N TOMADA HA SIDO UN PLACER HABER CONVERSADO CON USTED, LE AGRADEZCO POR SU TIEMPO, QUE TENGA UN EXCELENTE D&Iacute;A!!!!!!</h3>
<br><br><br><br><br>
</div>
</center>

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
<?php }?>
</html>
