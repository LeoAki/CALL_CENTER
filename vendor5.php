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
<style type="text/css">

    @import "Include/DataTables-1.9.4/media/css/demo_table.css";
    @import "Include/DataTables-1.9.4/media2/css/ColReorder.css";
    @import "Include/DataTables-1.9.4/extras/ColVis/media/css/ColVis.css";
    thead input { width: 100% }
    input.search_init { color: #999 }
    .f5{width: 200px; height: 40px; background: #6699FF; color: #ffffff; cursor: pointer; border: 1px; }
</style>
</head>
<?php 
require_once 'class/Usuario.php';
require_once './class/Llamada.php';
require_once './class/Persona.php';
$persona= new Persona();
$llime=new Llamada();
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

<table id='listadocentes' name='listadocentes' class="table table-hover">
        <thead>
            <tr style="color: #FA5882">
                <th class="text-center">IDE</th>
                <th class="text-center">NOMBRE COMPLETO</th>
                <th class="text-center">DNI</th>
                <th class="text-center">SEXO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">INICIO</th>
                <th class="text-center">FIN</th>
                <th class="text-center">USUARIO</th>
                <th class="text-center">CONTRASE&Ntilde;A</th>
                <th class="text-center">NIVEL</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">ULTIMA SESI&Oacute;N</th>
                <th class="text-center">VER VENTAS</th>
            </tr>
        </thead>
        <tbody>
<?php
$retvalue=$persona->Listar();
while ($row = mysql_fetch_array($retvalue)) {
echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[1] $row[2], $row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td>$row[9]</td>
                <td>$row[10]</td>
                <td>$row[11]</td>
                <td>$row[12]</td>
                <td>$row[13]</td>
                <td class='text-center'><a TARGET=_blanck href='vendor6.php?code=$row[0]'>VENTAS</a></td>
            </tr>
    ";
}
?>
        </tbody>
        <tfoot>
            <tr style="color: #FA5882">
                <th class="text-center">IDE</th>
                <th class="text-center">NOMBRE COMPLETO</th>
                <th class="text-center">DNI</th>
                <th class="text-center">SEXO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">INICIO</th>
                <th class="text-center">FIN</th>
                <th class="text-center">USUARIO</th>
                <th class="text-center">CONTRASE&Ntilde;A</th>
                <th class="text-center">NIVEL</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">ULTIMA SESI&Oacute;N</th>
                <th class="text-center">VER VENTAS</th>
            </tr>
        </tfoot>
    </table>
    
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
<script type="text/javascript" src="Include/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="Include/DataTables-1.9.4/media2/js/ColReorder.js"></script>
<script type="text/javascript" src="Include/DataTables-1.9.4/extras/ColVis/media/js/ColVis.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#listadocentes').dataTable( {
        "sPaginationType": "full_numbers"
    } );
} );

</script>
<?php }?>
</html>
