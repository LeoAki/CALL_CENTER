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
</style>
<style>
    /* GLOBAL STYLES
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */
    body {
      padding-bottom: 40px;
      /*color: #5a5a5a;*/
    }
    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */
    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {
        width: 100%;
    }
    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }
    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }
    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }
    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }
    /* MARKETING CONTENT
    -------------------------------------------------- */
    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }
    /* Featurettes
    ------------------------- */
    .featurette-divider {
      margin: 80px 0; /* Space out the Bootstrap <hr> more */
    }
    .featurette {
      padding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
      overflow: hidden; /* Vertically center images part 2: clear their floats. */
    }
    .featurette-image {
      margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
    }
    /* Give some space on the sides of the floated elements so text doesn't run right into it. */
    .featurette-image.pull-left {
      margin-right: 40px;
    }
    .featurette-image.pull-right {
      margin-left: 40px;
    }
    /* Thin out the marketing headings */
    .featurette-heading {
      font-size: 50px;
      font-weight: 300;
      line-height: 1;
      letter-spacing: -1px;
    }
    /* RESPONSIVE CSS
    -------------------------------------------------- */
    @media (max-width: 979px) {
      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }
      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }
    @media (max-width: 767px) {
      .navbar-inner {
        margin: -20px;
      }
      .marketing .span4 + .span4 {
        margin-top: 40px;
      }
      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }
    }
    </style>
</head>
<body>
<?php 
include 'includes/header.php';?>

<div class="container marketing">

    <hr class="featurette-divider">
    <div class="featurette">
      <img class="featurette-image pull-right" src="static/img/claro.png" style="height: 285px;">
      <h2 class="featurette-heading">Bienvenidos al Sistema de Call Center. 
      <span class="muted">Recuerda hacer bien tu trabajo.</span></h2>
      <p class="lead"><strong>Un Centro de Llamadas</strong> (<i>en ingl&eacute;s:</i> "Call Center") es un &aacute;rea donde agentes, asesores, supervisores o ejecutivos, especialmente entrenados, realizan llamadas (llamadas salientes o en ingl&eacute;s, outbound) y/o reciben llamadas (llamadas entrantes o inbound) desde o hacia: clientes (externos o internos), socios comerciales, compa&ntilde;&iacute;as asociadas u otros.</br>
      <strong>Un Centro de Contacto</strong> (<i>en ingl&eacute;s:</i> "Contact Center") es una oficina centralizada usada con el prop&oacute;sito de recibir y transmitir una amplia cantidad de llamados y pedidos a trav&eacute;s del tel&eacute;fono, los cuales se pueden realizar por canales adicionales al tel&eacute;fono,
      tales como fax, correo-e, mensajer&iacute;a instant&aacute;nea, mensajes de texto y mensajes multimedia, entre otros.</p>
    </div>
    <hr class="featurette-divider">
</div>
<?php include 'includes/footer.php';?>
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