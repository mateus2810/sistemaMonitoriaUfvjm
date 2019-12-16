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
        <a href=""><b>Recuperar</b> Senha</a>
    </div>
    <div class="login-box-body">


        <form class="form-horizontal" role="form" method="POST" action="<?=site_url('Home/alterar_senha/')?>">
            <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
            <input type="hidden" name="email" value="email">
            <p class="login-box-msg">Preencha corretamente sua nova senha</p>
            <div class="form-group has-feedback">
                <input type="password" class="form-control"id=“senha” name="senha" placeholder="Nova Senha" value="">
                <span class="glyphicon glyphicon-education form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id=“senha2” name="senha2" placeholder="Confirme sua Senha" value="">
                <span class="glyphicon glyphicon-education form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" >Recuperar minha senha</button>
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

<script>

        var s1 = document.getElementById("senha");
        var s2 = document.getElementById("senha2");
        var resultDefaultText = "Variaveis iguais";

        text.addEventListener("keyup",function () {
            var value = this.value;

            s2.innerText = value !== "" ? value : resultDefaultText;

        })


</script>
</body>
</html>
