<?php $this->load->view('header'); ?>
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
                        <h3 class="box-title"><?= $periodo->id_periodo == "" ? "Novo" : "Editar" ?> Semestre</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="<?php echo site_url('Periodo/editar'); ?>" method="post">
                            <div class="box-body">
                                <input type="hidden" name="id_periodo" value="<?=$periodo->id_periodo?>">

                                <div class="form-group">
                                    <label>Semestre</label>
                                    <select class="form-control select2"  name="semestre" style="width: 100%;">
                                        <option  value="1" <?= $periodo->semestre == "1" ? 'selected="selected"' : ''?>>1º</option>
                                        <option  value="2" <?= $periodo->semestre == "2" ? 'selected="selected"' : ''?>>2º</option>
                                    </select>

                                </div>


                                <div class="form-group">
                                    <label>Ano</label>
                                    <input type="text" class="form-control" name="ano" placeholder="Entre com o ano" value="<?=$periodo->ano?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Ativo</label>
                                    <select class="form-control select2" name="ativo">
                                        <option value="0" <?= $periodo->ativo ? "selected" : "" ?> >Não</option>
                                        <option value="1" <?= $periodo->ativo ? "selected" : "" ?> >Sim</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-default" name="opcao" value="salvar" >Salvar</button>
                                <a href="<?=site_url('Periodo/listar_view/')?>" class="btn btn-default">Voltar</a>
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
<?php } ?>

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