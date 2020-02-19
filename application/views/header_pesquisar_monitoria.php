<?php
$this->load->helper('url');
$this->load->library('session');
$ID_USUARIO = $this->session->userdata('id_usuario');
$NOME_USUARIO = $this->session->userdata('nome');
$PERFIL_USUARIO = $this->session->userdata('perfil');

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        span{
            color:black;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestão de Monitorias</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/dist/css/skins/_all-skins.min.css');?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/morris.js/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/jvectormap/jquery-jvectormap.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <header class="main-header">
        <!-- Logo -->
        <a href="http://localhost:8098/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>G</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span >Gestão de Monitorias</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://localhost:8098/AdminLTE-2.4.3/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Usuário Aluno	</span>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="http://localhost:8098/AdminLTE-2.4.3/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Usuário Aluno	                </p>
                            </li>
                            <!-- Menu Footer-->
                            <!--              <li class="user-footer">-->
                            <!--                      <div class="pull-left">-->
                            <!---->
                            <!--                    <form id="form_edit_user" action="--><!--" method="post">-->
                            <!--                        <input type="hidden" name='id_usuario' value="--><!--">-->
                            <!--                        <a  href="#" onclick="document.getElementById('form_edit_user').submit()" class="btn btn-default btn-flat">Editar</a>-->
                            <!--                    </form>-->
                            <!--                </div>-->

                            <div class="pull-right">
                                <a href="http://localhost:8098/Home/logout" class="btn btn-default btn-flat">Sair</a>
                            </div>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

</head>



</header>
</html>
