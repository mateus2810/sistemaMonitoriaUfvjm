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
        Disciplinas
      </h1>
      <ol class="breadcrumb">
          <li><a  href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a  href="<?= site_url('Disciplinas/listar_view') ?>"> Disciplinas</a></li>
          <li class="active">Editar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $disciplina->id_disciplina == "" ? "Nova" : "Editar" ?> Disciplina</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" action="<?php echo site_url('disciplinas/editar'); ?>" method="post">
                    <div class="box-body">
                        <input type="hidden" name="id_disciplina" value="<?=$disciplina->id_disciplina?>">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Entre com o nome da disciplina" value="<?=$disciplina->nome?>" required>
                        </div>


                        <div class="form-group">
                            <label>Curso</label>
                            <select class="form-control select2" name="curso">
                                <option value="Ciência e Tecnologia" <?= $disciplina->curso == "Ciência e Tecnologia" ? 'selected="selected"' : ''?> >Ciência e Tecnologia</option>
                                <option value="Engenharia de Alimentos" <?= $disciplina->curso == "Engenharia de Alimentos" ? 'selected="selected"' : ''?>>Engenharia de Alimentos</option>
                                <option value="Engenharia Mecânica" <?= $disciplina->curso == "Engenharia Mecânica" ? 'selected="selected"' : ''?> >Engenharia Mecânica</option>
                                <option value="Engenharia Química" <?= $disciplina->curso == "Engenharia Química" ? 'selected="selected"' : ''?>>Engenharia Química</option>
                                <option value="Engenharia Geológica" <?= $disciplina->curso == "Engenharia Geológica" ? 'selected="selected"' : ''?> >Engenharia Geológica</option>
                                <option value="Sistemas de Informação" <?= $disciplina->curso == "Sistemas de Informação" ? 'selected="selected"' : ''?> >Sistemas de Informação</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Unidade</label>
                            <select class="form-control select2" name="unidade_academica">
                                <option value="DECOM" <?= $disciplina->unidade_academica == "Departamento de Computação (Decom)" ? 'selected="selected"' : ''?> >Departamento de Computação (Decom)</option>
                                <option value="ICT" <?= $disciplina->unidade_academica == "Instituto de Ciência e Tecnologia (ICT)" ? 'selected="selected"' : ''?>>Instituto de Ciência e Tecnologia (ICT)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Campus</label>
                            <select class="form-control select2"  name="campus">
                                <option  value="Campus JK" <?= $disciplina->campus == "Campus JK" ? 'selected="selected"' : ''?>>Campus JK</option>
                                <option  value="Campus 1" <?= $disciplina->campus == "Campus 1" ? 'selected="selected"' : ''?>  >Campus 1</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" class="form-control" name="codigo" placeholder="Entre com o código da disciplina" value="<?=$disciplina->codigo?>" required>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default" name="opcao" value="salvar" >Salvar</button>
                        <a href="<?=site_url('Disciplinas/listar_view/')?>" class="btn btn-default">Voltar</a>
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
