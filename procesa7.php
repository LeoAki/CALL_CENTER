<?php
session_start();
$codigo_viene=$_GET['codecli'];
require_once './class/Cliente.php';
$clien= new Cliente();
require_once './class/ESTADOS.php';
$estuts= new ESTADOS();
$validauser=$clien->BUSCAR($codigo_viene);
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
require_once 'class/Usuario.php';
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

<h4 style="color: red;">SALUDO: </h4>
Buenos días/ tardes/. Le saluda el Sr. / la Srta <strong><?php echo $_SESSION['paterno']." ". $_SESSION['materno']." ,". $_SESSION['nombres']; ?></strong> 
Asesor comercial de Claro, me podría comunicar con el Sr. / la Srta. <strong><?php echo $validauser->getPATERNO()." ".$validauser->getMATERNO()." ,".$validauser->getNOMBRES(); ?></strong>.
<br><br>
<h4 style="color: red;">ARGUMENTO, SONDEO Y CIERRE</h4>
<strong>AL CONTACTAR AL CLIENTE</strong><br>
Sr. / Srta <strong><?php echo $validauser->getPATERNO()." ".$validauser->getMATERNO()." ,".$validauser->getNOMBRES(); ?></strong>  , que gusto poder saludarlo estamos llamando de Claro para  informarle que Ud. ya puede digitalizar sus servicios en casa de Telefonía, Internet, Claro TV.
<br>
<ul>
    <li>Ud. suele realizar llamadas al extranjero, con que frecuencia y a que países? </li>
    <li>Y que velocidad Ud. tiene en el internet?  entonces a Ud. le gustaría duplicar su velocidad de internet que significaría una navegación, mas rápida y confiable sin implicar un aumento en su recibo.</li>
    <li>Dígame cuantos Tv tiene Ud. en casa conectados al cable.</li>
    <li>(explicamos al cliente todos los beneficios de la señal digital)</li>
</ul>
Entonces sr <strong><?php echo $_SESSION['paterno']." ". $_SESSION['materno']." ,". $_SESSION['nombres']; ?></strong> permítame recomendarle el paquete 3 play <strong>……..…..</strong> . Con los siguientes beneficios:
<ul>
    <li>Con una línea telefónica controlada de <strong>……..…..</strong>. Minutos multidestino para que pueda llamar a todos los fijos de Perú y el extranjero de cualquier operador olvídese de comprar tarjetas que con claro no los va necesitar.</li>
    <li>En el internet obtendrá una velocidad mejorada, le incluimos conexión Wifi y 1 antivirus gratis por un años para 3 PC.</li>
    <li>En claro tv un paquete de canales de <strong>……..…..</strong> 100% digitales, con decodificadores  digitales que le permitirán interactuar su programación con su servicio.</li>
</ul>
<br>
Ahora el costo de todo este paquete es de solo s/ <strong>……..…..</strong> Mensuales.

Y si Ud. tomara la decisión de contratar este paquete económico y mas atractivo con mayores beneficios el día de hoy, se llevara la promoción del 50% de descuento por los 3 primeros meses.

El costo de instalación es s/.0,00
<br><br>
<h4 style="color: red;">RESULTADO: </h4>
<center>
<span>ESTADO DE LA LLAMADA: </span>
<select id="slct1" name="slct1">
    <option value="0">-----------ELIGE PES-----------</option>
    <?php 
    $listcombo=$estuts->ListEstaus();
    while ($row1 = mysql_fetch_array($listcombo)) {
        echo "<option value=$row1[0]>$row1[1]</option>";
    }
    ?>
</select>
</center>
<br>
</div>
    <div id="divtexto" style="display: none;">
        <span>OBSERVACION: </span><textarea id="txtotrorespuesta" name="txtotrorespuesta" cols="150" rows="8"> </textarea> 
    </div>
    <div id="divbutton" style="display: none;"><button class="btn btn-danger">DEJAR REGISTRADA LA LLAMADA</button></div>
    <div id="divsucces" style="display: none;">
	<a href="speech.php?codecli=<?php echo $codigo_viene;?>">IR A LA GRABACI&Oacute;N</a>

    </div>
    <br><br>
    <div id="divajax" style="color: olivedrab;"></div>
    <input type="text" id="txtidcliente" name='txtidcliente' value="<?php echo $codigo_viene; ?>" style="display: none;"/>
    <input type="text" id="txtidusuario" name="txtidusuario" value="<?php echo $_SESSION['codigo'];?>" style="display: none;"/>
    
</center>
<br><br><br><br>

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
<script type="text/javascript" src="static/js/ajax.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    
$('#slct1').change(function (evento){
    var respuesta=$(this).val();
    if(respuesta==0){
        $("#divbutton").css("display", "none");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","none");
    }
    if(respuesta==1){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="2"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="3"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","");
    }
    if(respuesta=="4"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="5"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="6"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="7"){
        $("#divbutton").css("display","");
        $("#divtexto").css("display","");
        $("#divsucces").css("display","none");
    }
    if(respuesta=="8"){
        $("#divbutton").css("display","none");
        $("#divtexto").css("display","none");
        $("#divsucces").css("display","");
    }
}); 

    
});
</script>
<script type="text/javascript">
$('#divbutton').click(function (evento){
    var CODIGO="";
    var IDCLIENTE=$("#txtidcliente").val();
    var IDUSUARIO=$("#txtidusuario").val();
    var IDESTADO=$("#slct1").val();
    var DESCRIPCION=$("#txtotrorespuesta").val();
    
    ajaxllamada(CODIGO,IDCLIENTE,IDUSUARIO,IDESTADO,DESCRIPCION);
    alert('Llamada guardada correctamente');
});
</script>
<script type='text/javascript'>
$('#mensajefull').click(function (evento){
   window.close(); 
});
</script>
<?php }?>
</html>
