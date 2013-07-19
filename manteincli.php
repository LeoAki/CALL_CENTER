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
//require_once './class/Cliente.php';
//$clirte= new Cliente();
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
<div id="lista"></div>
<div id="lista2"></div>
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
<script>
$(document).ready(function(){
   window.onload=(function(evento){
      evento.preventDefault();
      $("#lista").load("clilist.php");
   });
})
</script>
<?php }?>
</html>
