<?php $this->load->view('header'); ?>
<?php
//carrega a traducao em portugues para as tabelas
$ci =& get_instance();
$ci->load->model('Util_model');
$datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();

$PERFIL_USUARIO = $this->session->userdata('perfil');


    ?>


    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

    <!-- daterange picker -->
    <link rel="stylesheet"href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/plugins/iCheck/all.css'); ?>">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'); ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/plugins/timepicker/bootstrap-timepicker.min.css'); ?>">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/select2/dist/css/select2.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/dist/css/skins/_all-skins.min.css'); ?>">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
        </h1>
        <ol class="breadcrumb">
            <li><a  href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a  href="<?= site_url('Usuarios/listar_view') ?>"> Usuarios</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?= $usuario->id_usuario == "" ? "Novo" : "Editar" ?> Usuário</h3>
                    </div>

                    <?php if ($usuario->id_usuario == "novo") { ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('usuarios/editar'); ?>" method="post">
                            <div class="box-body">
                                <input type="hidden" name="id_usuario" value="<?=$usuario->id_usuario?>">


                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Entre com o nome" value="<?=$usuario->nome?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Matricula/Siape</label>
                                    <input type="text" class="form-control" name="matricula" placeholder="Entre com a matricula" value="<?=$usuario->matricula?>" required>
                                </div>


                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" name="email" placeholder="Entre com o e-mail" value="<?=$usuario->email?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" name="telefone" placeholder="Entre com o telefone" value="<?=$usuario->telefone?>" >
                                </div>

                                <?php if (strpos("Administrador", $this->session->userdata('perfil')) !== false) {  ?>
                                    <div class="form-group">
                                        <label>Perfil</label>
                                        <select class="form-control select2" name="perfil">
                                            <option value="Monitor" <?= $usuario->perfil == "Monitor" ? "selected" : "" ?> >Monitor</option>
                                            <option value="Administrador" <?= $usuario->perfil == "Administrador" ? "selected" : "" ?> >Administrador</option>
                                            <option value="Professor" <?= $usuario->perfil == "Professor" ? "selected" : "" ?> >Professor</option>
                                            <option value="Aluno" <?= $usuario->perfil == "Aluno" ? "selected" : "" ?> >Aluno</option>
                                        </select>
                                    </div>
                                <?php } ?>


                            </div>
                    <?php } else { ?>
                            <div class="box-body">
                                <form role="form" action="<?php echo site_url('usuarios/editar'); ?>" method="post">
                                    <div class="box-body">
                                        <input type="hidden" name="id_usuario" value="<?=$usuario->id_usuario?>">


                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="nome" placeholder="Entre com o nome" value="<?=$usuario->nome?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Matricula/Siape</label>
                                            <input type="text" class="form-control" name="matricula" placeholder="Entre com a matricula" value="<?=$usuario->matricula?>" readonly>
                                        </div>


                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="email" placeholder="Entre com o e-mail" value="<?=$usuario->email?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name="telefone" placeholder="Entre com o telefone" value="<?=$usuario->telefone?>" >
                                        </div>

                                        <?php if (strpos("Administrador", $this->session->userdata('perfil')) !== false) {  ?>
                                            <div class="form-group">
                                                <label>Perfil</label>
                                                <select class="form-control select2" name="perfil">
                                                    <option value="Monitor" <?= $usuario->perfil == "Monitor" ? "selected" : "" ?> >Monitor</option>
                                                    <option value="Administrador" <?= $usuario->perfil == "Administrador" ? "selected" : "" ?> >Administrador</option>
                                                    <option value="Professor" <?= $usuario->perfil == "Professor" ? "selected" : "" ?> >Professor</option>
                                                    <option value="Aluno" <?= $usuario->perfil == "Aluno" ? "selected" : "" ?> >Aluno</option>
                                                </select>
                                            </div>
                                        <?php } ?>


                                    </div>



                    <?php } ?>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-default" name="opcao" value="salvar" >Salvar</button>

                                <?php if ($usuario->id_usuario != "novo") { ?>
                                <a href="<?=site_url('usuarios/alterar_senha_view/'.$usuario->id_usuario)?>" class="btn btn-default">Alterar Senha</a>
                                <?php } ?>
                                <a href="<?=site_url('Home/Index')?>" class="btn btn-default">Voltar</a>

                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


    <?php $this->load->view('footer'); ?>


<!-- DataTables -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>


<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })
    })
</script>


<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2();

        //Date picker
        $('#data').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
        });

        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        });


    })
</script>
