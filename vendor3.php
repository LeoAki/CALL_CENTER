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
<?php 
require_once 'class/Usuario.php';
require_once './class/Llamada.php';
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

    <table class="table">
        <thead>
            <tr>
                <th class="text-center">CODIGO</th>
                <th class="text-center">CLIENTE</th>
                <th class="text-center">VENDEDOR</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
            <?php 
$lsta=$llime->ListarMiTrabajo($_SESSION['codigo']);
while ($roww = mysql_fetch_array($lsta)) {
            echo "
                <tr>
                <td>$roww[0]</td>
                <td>$roww[1]</td>
                <td>$roww[2]</td>
                <td>$roww[3]</td>
                <td>$roww[4]</td>
                </tr>
                ";
}
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">CODIGO</th>
                <th class="text-center">CLIENTE</th>
                <th class="text-center">VENDEDOR</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">DESCRIPCION</th>
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
<?php }?>
</html>
