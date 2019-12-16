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

    <style> 
        .autocomplete {
            /*the container must be positioned relative:*/
            position: relative;
            display: inline-block;
        } 
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        } 
        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff; 
            border-bottom: 1px solid #d4d4d4; 
        } 
        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: #e9e9e9; 
        } 
        .autocomplete-active {
            /*when navigating through the items using the arrow keys:*/
            background-color: DodgerBlue !important; 
            color: #ffffff; 
        }
    </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black-light layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>Gestão de Monitorias</b> </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

            <form class="navbar-form navbar-left" role="search"  >
                <div class="autocomplete" >

                    <input id="navbar-search-input"  style="width:300px;" type="text" class="form-control"  placeholder="Buscar Monitoria"  name="myCountry">

                </div>

  
          </form>
        </div>

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <?php if(false){?>   
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=base_url('/AdminLTE-2.4.3/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?=$NOME_USUARIO?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?=base_url('/AdminLTE-2.4.3/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                        <p>
                        <?=$NOME_USUARIO?> 
                        </p>
                    </li> 
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <form id="form_edit_user" action="<?php echo site_url('usuarios/editar_view'); ?>" method="post">   
                                <input type="hidden" name='id_usuario' value="<?=$ID_USUARIO?>">
                                <a  href="#" onclick="document.getElementById('form_edit_user').submit()" class="btn btn-default btn-flat">Editar</a>
                            </form>
                        </div>
                        <div class="pull-right">
                        <a href="<?=site_url('Home/logout'); ?>" class="btn btn-default btn-flat">Sair</a>
                        </div>
                    </li>
                </ul>
            </li> 
            <?php } else{ ?>
            <li class="dropdown user user-menu">
                <a href="<?php echo site_url('Home/login'); ?>" >
                     <span class="hidden-xs">Login</span>
                </a> 
            </li> 
            <?php } ?>  
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </nav>
  </header>
 

