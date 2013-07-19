<?php 
session_start(); 
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
</style>
</head>
<?php 
require_once 'class/Validador.php';
require_once 'class/Persona.php';

if(!$_SESSION['USERINPUT'])
{
    if(isset($_POST['login']))
    {
        $user=$_REQUEST["usuario"];$contra=$_REQUEST["contrasena"];#variables
        $usuariocall= new Persona();
        
        if($usuariocall->Validar($user, $contra)>0){
                    $_SESSION['USERINPUT']=$usuariocall;
                    $_SESSION['codigo']=$usuariocall->getCODIGO();
                    $_SESSION['paterno']=$usuariocall->getPATERNO();
                    $_SESSION['materno']=$usuariocall->getMATERNO();
                    $_SESSION['nombres']=$usuariocall->getNOMBRES();
                    $_SESSION['dni']=$usuariocall->getDNI();
                    $_SESSION['sexo']=$usuariocall->getSEXO();
                    $_SESSION['email']=$usuariocall->getEMAIL();
                    $_SESSION['inicio']=$usuariocall->getINICIO();
                    $_SESSION['fin']==$usuariocall->getFIN();
                    $_SESSION['USER']=$usuariocall->getUSUARIO();
                    $_SESSION['CONTR']=$usuariocall->getCONTRASENA();
                    $_SESSION['NIVEL']=$usuariocall->getNIVEL();
                    $_SESSION['ESTADO']=$usuariocall->getESTADO();
                    $_SESSION['ENDSESSION']=$usuariocall->getULTIMASESION();                 
                    $users=$_SESSION['codigo'];
                    $usuariocall->SESIONBEGIN($users);
                    $usuariocall->INPUT($users);
            header("location:index.php");
        }
        else
        {
            echo '<div style="color: red;font-weight: bold;margin: 10px;text-align: center;">Su usuario es incorrecto, intente nuevamente.<br>Recuerde que la contrase&ntilde;a es su DNI</div>';
        }
    }
?>
<body>
<div id="wrapper">
    <div class="container">

      <form action='' method='post' name='formulario' class="form-signin">
        <h2 class="form-signin-heading" style="text-align: center">INICIA SESI&Oacute;N</h2>
        <input type="text" class="input-block-level" placeholder="usuario" id='usuario' name='usuario'>
        <input type="password" class="input-block-level" placeholder="contrasena" id='contrasena' name='contrasena'>
        <center><button class="btn btn-large btn btn-danger" name="login" type="submit">INGRESAR</button></center>
      </form>

    </div>
</div>

<?php

}else {
include 'includes/header.php';
echo "
<div class='container marketing'>
    <div class='featurette'>
      <img class='featurette-image pull-right' src='static/img/claro.png' style='height: 285px;'>
      <h2 class='featurette-heading'>Bienvenidos al Sistema de Call Center. 
      <span class='muted'>Recuerda hacer bien tu trabajo.</span></h2>
      <p class='lead'><strong>Un Centro de Llamadas</strong> (<i>en ingl&eacute;s:</i> 'Call Center') es un &aacute;rea donde agentes, asesores, supervisores o ejecutivos, especialmente entrenados, realizan llamadas (llamadas salientes o en ingl&eacute;s, outbound) y/o reciben llamadas (llamadas entrantes o inbound) desde o hacia: clientes (externos o internos), socios comerciales, compa&ntilde;&iacute;as asociadas u otros.</br>
      <strong>Un Centro de Contacto</strong> (<i>en ingl&eacute;s:</i> 'Contact Center') es una oficina centralizada usada con el prop&oacute;sito de recibir y transmitir una amplia cantidad de llamados y pedidos a trav&eacute;s del tel&eacute;fono, los cuales se pueden realizar por canales adicionales al tel&eacute;fono,
      tales como fax, correo-e, mensajer&iacute;a instant&aacute;nea, mensajes de texto y mensajes multimedia, entre otros.</p>
    </div>
    <hr class='featurette-divider'>
</div";  
}
?>
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
</html>