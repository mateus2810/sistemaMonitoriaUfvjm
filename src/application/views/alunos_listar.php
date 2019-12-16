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


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $monitoria->nomeDisciplina ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Home/Index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('Monitoria/listar_view/') ?>"></i> Monitoria</a></li>
        <li><a href="<?= site_url('Monitoria/gerenciar/'.$monitoria->id_monitoria) ?>"></i> Gerenciar</a></li>
        <li class="active">Matricular</li>
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Alunos cadastrados</h3>
                </div>
                <!-- /.box-header -->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>

                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Aluno</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($alunos as $usuario) { ?>
                            <tr>

                                <td> <?= $usuario->matricula ?></a></td>
                                <td><?= $usuario->nome ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->perfil ?></td>
                                <td>
                                    <a href="<?= site_url('Monitoria/matricular_aluno/'.$monitoria->id_monitoria.'/'.$usuario->id_usuario) ?>"
                                       class="btn btn-primary">Matricular</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-body">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-2">
                            <a href="<?= site_url('Monitoria/aluno_editar_view_2/'.$monitoria->id_monitoria.'/novo') ?>"
                               class="btn btn-default btn-block btn-flat">Cadastrar Aluno</a>
                        </div><!-- /.col -->
                    </div>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Alunos da Disciplina</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Perfil</th>
                            <th>Aluno</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($matriculados as $usuario) { ?>
                            <tr>

                                <td> <?= $usuario->matricula ?></td>
                                <td><?= $usuario->nome ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->perfil ?></td>
                                <td>
                                    <a href="<?= site_url('Monitoria/desmatricular_matricular_aluno/'.$usuario->id_monitoria.'/'.$usuario->idaluno_monitoria) ?>"
                                       class="btn btn-danger">Desmatricular</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
                <!-- /.box-body -->

                <div class="box-footer">
                    <a href="<?=site_url('Monitoria/gerenciar/'.$monitoria->id_monitoria)?>" class="btn btn-default">Voltar</a>
                </div>
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
<script src="/https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- page script -->
<script>
    $('#example1').DataTable( {<font></font>
    dom: 'Blfrtip',<font></font>
    buttons: [<font></font>
    'selectAll',<font></font>
    'selectNone'<font></font>
    ],<font></font>
    language: {<font></font>
        buttons: {<font></font>
            selectAll: "Select all items",<font></font>
            selectNone: "Select none"<font></font>
        }<font></font>
    }<font></font>
    } );
</script>

<script>
    $(function () {
        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })
    })
</script>
<script>
    $(function () {
        $('#example2').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })
    })
</script>