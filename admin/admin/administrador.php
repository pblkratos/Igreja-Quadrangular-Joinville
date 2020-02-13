<?php
include 'conexao.php';
session_start();

?>
 <!DOCTYPE html
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Liberty Administrador</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">

<script src="js/jquery-3.4.0.min.js" ></script>
</head>
<style>
.sidebar-nav{
  position: fixed;
}
.navbar-header {
  position: fixed;
}

.bg-title {
    padding: 20px 15px 10px;
}

.navbar-header{
  background: linear-gradient(to right, #ff5e62, #ff9966);
}

.sidebar{
  background-color: #00000099;
}

.btn2{
  background: linear-gradient(to right, #ff5e62, #ff9966);
  border: none;
}

.btn2:hover{
  background: linear-gradient(to right, #ff5e62, #ff9966);
  border: none;

}
</style>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="administrador.php?folder=page&file=inicio.php"><b>Liberty</b><span class="hidden-xs"></span></a></div>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><?php echo " " . $_SESSION['nome']; ?></a>
                        <ul class="dropdown-menu animated flipInY">
                           <li><a href="administrador.php?folder=page&file=profile.php"><i class="ti-user"></i> Meu perfil</a></li>
                           <li><a href="#"><i class="ti-wallet"></i> Meus eventos</a></li>
                           <li><a href="#"><i class="ti-email"></i> Alguma coisa</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="#"><i class="ti-settings"></i> Editar Perfil</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="http://localhost/igreja/security/logout.php"><i class="fa fa-power-off"></i> Sair</a></li>
                        </ul> </a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                  <br>
                    <li><a href="administrador.php?folder=page&file=inicio.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> <span class="hide-menu">inicio</span></a> </li>
                      <li>
                         <a href="javascript:void(0)" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i> <span class="hide-menu">Eventos<span class="fa arrow"></span></span></a>
                         <ul class="nav nav-second-level">
                            <li><a href="administrador.php?folder=page&file=criarEvento.php">Criar Eventos</a></li>
                            <li><a href="administrador.php?folder=page&file=editarEvento.php">Gerenciar Eventos</a></li>
                         </ul>
                      </li>
                      <li>
                         <a href="javascript:void(0)" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i> <span class="hide-menu">Celulas<span class="fa arrow"></span></span></a>
                         <ul class="nav nav-second-level">
                            <li> <a href="administrador.php?folder=page&file=cadastroCelula.php">Cadastrar Celula</a> </li>
                            <li> <a href="administrador.php?folder=page&file=editarCelula.php">Gerenciar Celula</a> </li>
                         </ul>
                      </li>
                      <li><a href="administrador.php?folder=page&file=gerenciarMembros.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Gerenciar Membros</span></a> </li>
                </ul>
                <div class="center p-20">
                    <span class="hide-menu"><a href="../../security/logout.php"  class="btn btn2 btn-danger btn-block btn-rounded waves-effect waves-light">SAIR</a></span>
                </div>
            </div>
        </div>
        <div id="page-wrapper">

           <?php

           if(isset($_GET['folder'])&&isset($_GET['file'])){
             if(@!include $_GET['folder']."/".$_GET['file'])
             include "page/404.php";
           }
           else{
             include "page/inicio.php";
           }

            ?>

            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2019 &copy; Igreja do povo de Deus</footer>
        </div>
    </div>
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>

</body>

</html>
