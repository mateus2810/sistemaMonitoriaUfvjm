<?php 
    $this->load->helper('url');  
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('/AdminLTE-2.4.3/plugins/iCheck/square/blue.css');?>">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Gestão</b> Monitorias</a>
    </div>
    <div class="login-box-body">


        <form class="form-horizontal" role="form" method="POST" action="<?=site_url('Home/recuperaSenha/')?>">
            <input type="hidden" name="email" value="email">
            <p class="login-box-msg">Preencha corretamente com seu email</p>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="E-mail" value="">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Recuperar minha senha</button>
                </div>
            </div>
        </form>
        <br />
        <a href="<?=site_url('Home/login')?>">Voltar para tela de entrada</a>


    </div>
</div>



<!-- jQuery 3 -->
<script src="<?=base_url('/AdminLTE-2.4.3/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('/AdminLTE-2.4.3/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
 
</body>
</html>
