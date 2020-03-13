<?php $this->load->view('header'); ?>
<?php
//carrega a traducao em portugues para as tabelas
$ci =& get_instance();
$ci->load->model('Util_model');
$datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
?>


<!-- DataTables -->
<link rel="stylesheet"
      href="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<meta content="width=device-width, initial-scale=1, maximum-scale=0.5, user-scalable=no" name="viewport">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Vinculação de professores ao processo de monitoria
    </h1>
    <ol class="breadcrumb">
        <li><a  href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Professores</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box table-responsive">
                <div class="box-header">
                    <h3 class="box-title">Professores não vinculados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Siape</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Professor</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($profNaoHabilitado as $usuario) { ?>
                            <tr>

                                <td><?= $usuario->matricula ?></td>
                                <td><?= $usuario->nome ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->perfil ?></td>
                                <td>
                                    <a href="<?= site_url('Usuarios/professor_habilitado_editar_view/'.$usuario->id_usuario) ?>"
                                       class="btn btn-primary">Habilitar</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->


                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box table-responsive">
                <div class="box-header">
                    <h3 class="box-title">Professores vinculados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($profHabilitado as $usuario) { ?>
                            <tr>

                                <td> <?= $usuario->matricula ?></a></td>
                                <td><?= $usuario->nome ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->perfil ?></td>
                                <td>
                                    <a href="<?= site_url('Usuarios/professor_nao_habilitado_editar_view/'.$usuario->id_usuario) ?>"
                                       class="btn btn-primary">Desvincular</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->


                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


<?php $this->load->view('footer'); ?>


<!-- DataTables -->
<script src="<?php echo base_url(); ?>/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })
    })
</script>
