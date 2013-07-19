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
    @import "static/css/bootstrap.css";
    @import "static/css/bootstrap-responsive.css";
    @import "static/css/mystyle.css";
    @import "Include/DataTables-1.9.4/media/css/demo_table.css";
    @import "Include/DataTables-1.9.4/media2/css/ColReorder.css";
    @import "Include/DataTables-1.9.4/extras/ColVis/media/css/ColVis.css";
    thead input { width: 100% }
    input.search_init { color: #999 }
    .f5{width: 200px; height: 40px; background: #6699FF; color: #ffffff; cursor: pointer; border: 1px; }
</style>
</head>
<?php
 require_once 'class/Persona.php';
 $userid=new Persona();
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
<div style="width: 75%; text-align: justify">
<a class="f5" href="javascript:location.reload()">ACTUALIZAR LISTA</a>
<center>
        <table id='listadocentes' name='listadocentes' class="table table-hover">
            <thead>
                <tr class="gradeU">
                    <th style="width: 5%;"><center>CODIGO</center></th>
                    <th><center>USUARIO</center></th>
                    <th><center>DESCRIPCION</center></th>
                    <th>FECHA Y HORA(a&ntilde;o/ mes/ d&iacute;a)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista=$userid->Ingresos();
                while ($row1 = mysql_fetch_array($lista)) {
                    echo "
                        <tr class='gradeA'>
                            <td> $row1[0] </td>
                            <td> $row1[1] </td>
                            <td> $row1[2] </td>
                            <td> $row1[3] </td>
                        </tr>
                        ";
                }
                ?>
            </tbody>
            <tfoot>
            <tr>
<!--                    <th><center>C&Oacute;DIGO</center></th>-->
                    <th style="width: 5%;"><center>CODIGO</center></th>
                    <th><center>USUARIO</center></th>
                    <th><center>DESCRIPCION</center></th>
                    <th>FECHA Y HORA(a&ntilde;o/ mes/ d&iacute;a)</th>
            </tr>
            </tfoot>
        </table>
</center>
<br><br><br><br><br><br>

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
