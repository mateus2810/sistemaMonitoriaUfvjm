[08:07, 13/02/2020] Mateus Amaral Si: <?php $this->load->view('header'); ?>
<?php
//carrega a traducao em portugues para as tabelas
$ci =& get_instance();
$ci->load->model('Util_model');
$datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();

$PERFIL_USUARIO = $this->session->userdata('perfil');

if ($PERFIL_USUARIO == "Administrador") {
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
        Semestres
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url('/Periodo/listar_view');?>"> Semestres </a></li>
        <li class="active">Editar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $periodo->id_periodo == "" ? "Novo" : "Editar" ?> Cadastro de Atestados de Frequência</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" action="<?php echo site_url('Periodo/editar'); ?>" method="post">
                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-4">
                                    <label>Selecione o período(puxar periodos no banco)</label>
                                    <select class="form-control select2"  name="semestre" style="width: 100%;">
                                        <option  value="1" <?= $periodo->ano == "1" ? 'selected="selected"' : ''?>>1º</option>
                                        <option  value="2" <?= $periodo->semestre == "2" ? 'selected="selected"' : ''?>>2º</option>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Data Inicio:</label>
                                        <div class="input-group date">
                                            …
                                            [08:07, 13/02/2020] Mateus Amaral Si: atestado_edit
                                            [08:08, 13/02/2020] Mateus Amaral Si: <?php $this->load->view('header');?>
                                            <?php
                                            //carrega a traducao em portugues para as tabelas
                                            $ci =& get_instance();
                                            $ci->load->model('Util_model');
                                            $datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
                                            ?>



                                            <!-- DataTables -->
                                            <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">


                                            <!-- Content Header (Page header) -->
                                            <section class="content-header">
                                                <h1>
                                                    Semestres
                                                </h1>
                                                <ol class="breadcrumb">
                                                    <li><a href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                                                    <li class="active">Semestres </li>
                                                </ol>
                                            </section>

                                            <!-- Main content -->
                                            <section class="content">
                                                <div class="row">
                                                    <div class="col-xs-12">

                                                        <div class="box">
                                                            <div class="box-header">
                                                                <h3 class="box-title">Atestados de Frequência Cadastrados</h3>
                                                            </div>
                                                            <!-- /.box-header -->
                                                            <div class="box-body">
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Semestre</th>
                                                                        <th>Ativo</th>
                                                                        <th>Ações</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    <?php foreach ($periodos as $periodo) { ?>
                                                                        <tr>
                                                                            <td><?= $periodo->semestre.'/'.$periodo->ano ?></td>
                                                                            <td><?= ($periodo->ativo ? 'Sim' : 'Não')?></td>
                                                                            <td>
                                                                                <a href="<?=site_url('Periodo/editar_view/'.$periodo->id_periodo)?>">
                                                                                    <span class="glyphicon glyphicon-edit"title="Editar semestre"></span>
                                                                                </a>
                                                                                <a href="<?= site_url('Periodo/excluir_periodo_bd/'.$periodo->id_periodo) ?>"
                                                                                   onclick="return confirm('Deseja realmente excluir?')" class="glyphicon glyphicon-trash"title="Excluir semestre"></a>
                                                                            </td>
                                                                        </tr>

                                                                    <?php }?>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                            <!-- /.box-body -->

                                                            <div class="box-body">
                                                                <div class="row">
                                                                    <!-- /.col -->
                                                                    <div class="col-xs-2">
                                                                        <a href="<?=site_url('Relatorio/editar_view/novo')?>" class="btn btn-default btn-block btn-flat">Novo atestado</a>
                                                                    </div>
                                                                    <!-- /.col -->
                                                                </div>
                                                            </div>
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
                                            <script src="<?php echo base_url();?>/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
                                            <script src="<?php echo base_url();?>/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


                                            <!-- page script -->
                                            <script>
                                                $(function () {
                                                    $('#example1').DataTable({
                                                        'language': <?= $datatablesPortugueseBrasil?>
                                                    })
                                                })
                                            </script>
