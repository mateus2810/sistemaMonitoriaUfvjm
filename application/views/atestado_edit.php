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
            Atestado de Frequência
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
                        <h3 class="box-title"> Cadastro de Atestado de Frequência</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="<?php echo
                        site_url('Relatorio/editar'); ?>" method="post">
                            <div class="box-body">

        <div class="row">
        <div class="col-md-4">
        <label>Semestre/Ano</label>
        <select name="id_periodo" class="form-control select2" style="width: 100%;">

            <?php foreach ($periodos as $periodo) { ?>
                <option value="<?= $periodo->id_periodo ?>" <?= $periodo->id_periodo == $periodo->id_periodo ?
                    'selected="selected"' : '' ?>>
                    <?= $periodo->semestre.'/'.$periodo->ano ?>
                </option>
            <?php } ?>


        </select>
    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Data Início:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon" id="data" >
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control pull-right" value="<?php echo date('Y-m-d');?>"
                                                       type="date"  name="data_inicio" required>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Data Fim:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon" id="data" >
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input class="form-control pull-right"value="<?php echo date('Y-m-d');?>" type="date"  name="data_fim" required>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-default" name="opcao" value="salvar" >Salvar</button>
                                <a href="<?=site_url('Relatorio/listar_view/')?>" class="btn btn-default">Voltar</a>
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



        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        });


        //Timepicker
        $('#horario_inicio').timepicker({
            showMeridian: false,
            showInputs: false,
            showSeconds: false,
            interval: 15
        });

        //Timepicker
        $('#horario_fim').timepicker({
            showMeridian: false,
            showInputs: false,
            showSeconds: false,
            interval: 15
        });
        $(function () {
            $('#data').datetimepicker({
                inline: true,
                sideBySide: true
            });
        });

    })
</script>
