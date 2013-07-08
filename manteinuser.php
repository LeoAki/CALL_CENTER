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
    @import url("static/css/moment.css");
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
<header>
    <div class="circle"><div class="face"><div id="hour"></div><div id="minute"></div><div id="second"></div></div></div>
    <div class="title">
		<div class="title-inset">
                <h1>Moment.js<span>2.1.0</span></h1>
                <h2>
		A  javascript date library for parsing, validating, manipulating, and formatting dates.
                <pre id="js-format"></pre>
                </h2>
		</div>
    </div>
</header>
<div id="lista"></div>

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
<script src="static/js/moment.js"></script>
<script src="static/js/moment1.js"></script>
<script src="static/js/moment3.js"></script>
<script>
$(document).ready(function(){
   window.onload=(function(evento){
      evento.preventDefault();
      $("#lista").load("userslist.php");
   });
})
</script>
<?php }?>
</html>
