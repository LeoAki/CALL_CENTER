
    <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper">
    
<!--      <div class="container">-->

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href=""><i class="icon-th-list icon-white"></i> Call Center</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="index.php"><i class="icon icon-home icon-white"></i> Home</a></li>
                <!--<li><a href="speech.php"><i class="icon-bullhorn icon-white"></i> SPEECH</a></li>-->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> CLIENTES<b class="caret"></b></a>
                  <ul class="dropdown-menu">
<?php if($_SESSION['NIVEL']==1) {?>
                    <li class="divider"></li>
                    <li class="nav-header">MANTENIMIENTO</li>
                    <li><a href="newcli.php"><i class="icon-plus-sign"></i> Agregar</a></li>
                    <li><a href="manteincli.php"><i class="icon-edit"></i> Actualizar/ <i class="icon-minus-sign"></i> Eliminar</a></li>
<?php } ?>
                    
<?php if($_SESSION['NIVEL']==2 || $_SESSION['NIVEL']==3) {?>
                    <li class="divider"></li>
                    <li class="nav-header">POR LLAMAR</li>
                    <li><a href="vendor.php"><i class="icon-hand-right"></i> Por trabajar</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Trabajados</li>
                    <li><a href="vendor2.php"><i class="icon-book"></i> Agendados</a></li>
                    <li><a href="vendor3.php"><i class="icon-thumbs-up"></i> Trabajados</a></li>
<?php } ?>
<?php if($_SESSION['NIVEL']==1 || $_SESSION['NIVEL']==2 ) {?>
                    <li class="divider"></li>
                    <li class="nav-header">LLAMADAS</li>
                    <li><a href="vendor4.php"><i class="icon-hand-right"></i> LLAMADAS REALIZADAS</a></li>
                    
                    <li class="divider"></li>
                    <li class="nav-header">VENTAS EFECTUADAS</li>
                    <li><a href="vendor5.php"><i class="icon-hand-right"></i> VENTAS REALIZADAS</a></li>
<?php } ?>
                  </ul>
                </li>

                <?php if($_SESSION['NIVEL']==1) {?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-eye-open icon-white"></i> USUARIOS<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="newuser.php"><i class="icon-plus-sign"></i> Agregar</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">MANTENIMIENTO</li>
                    <li><a href="manteinuser.php"><i class="icon-edit"></i> Actualizar/ <i class="icon-minus-sign"></i> Eliminar</a></li>
                  </ul>
                </li>
                <?php } 
                if($_SESSION['NIVEL']==1 || $_SESSION['NIVEL']==2) {
                ?>
                <li><a href="inputsystem.php"><i class="icon-road icon-white"></i> INPUT SYSTEM</a></li>
                <?php  }
                ?>
                <li><a href="logout.php"><i class="icon-off icon-white"></i> LOGOUT</a></li>
                <li>
                    <?php
                    require_once "class/Persona.php";
                    $QUIEN= new Persona();
                    $uiui=$QUIEN->QUIENES($_SESSION["codigo"]);
                    if($rowcito=  mysql_fetch_array($uiui)){
                        $paterno=$rowcito["paterno"];
                        $materno=$rowcito["materno"];
                        $nombrestodos=$rowcito["nombres"];
                    }
                    echo "<a><i class='icon-user icon-white'></i> Bienvenido(a) $paterno $materno ,$nombrestodos</a>";?>
               </li>

              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

<!--      </div>  /.container -->
    </div><!-- /.navbar-wrapper -->
