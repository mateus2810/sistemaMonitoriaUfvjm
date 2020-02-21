<?php $this->load->view('header');?>
<?php
    //carrega a traducao em portugues para as tabelas
    $ci =& get_instance();
    $ci->load->model('Util_model');
    $datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
?>
 
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
 
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/plugins/iCheck/all.css');?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css');?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/plugins/timepicker/bootstrap-timepicker.min.css');?>">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/bower_components/select2/dist/css/select2.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('/AdminLTE-2.4.3/dist/css/skins/_all-skins.min.css');?>">


   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aula <?= date('d/m/Y', strtotime($aula->data)) ?>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?= site_url('Home/Index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?= site_url('Monitoria/listar_view/') ?>"></i> Monitoria</a></li>
          <li><a href="<?= site_url('Monitoria/gerenciar/'.$aula->id_monitoria) ?>"></i> Gerenciar</a></li>
          <li class="active">Frequencia</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Frequências</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Matrícula</th>
                  <th>Nome</th>
                  <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($frequencias as $frequencia) { ?>
                <tr>
                  <td><?= $frequencia->matricula?></td>
                  <td><?= $frequencia->nome?></td>
                    <td style="vertical-align: middle;"><a
                                href="<?= site_url('Monitoria/excluirFrequencia/'.$aula->id_monitoria.'/'. $frequencia->id_aula.'/' . $frequencia->id_frequencia) ?>"><span
                                    class="glyphicon glyphicon-trash" title="Excluir frenquencia"></span></a></td>
                </tr>
                <?php }?>

                </tbody>

              </table>

            <!-- /.box-body -->
                <div class="box-body">
                    <form role="form" action="<?php echo site_url('Monitoria/frequencia_editar/'.$aula->id_monitoria.'/'.$aula->id_aula); ?>" method="post">


                    <label>Alunos</label>
                    <select class="form-control select2"  name="id_aluno" style="width: 100%;">
                        <?php foreach ($matriculados as $alunos) { ?>
                            <option value="<?= $alunos->id_usuario ?>" <?= $alunos->id_usuario ? 'selected="selected"' : '' ?>>
                                <?= $alunos->nome ?>
                            </option>
                        <?php } ?>
                    </select>


                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-default" name="opcao" value="salvar">Cadastrar</button>
                    <a href="<?=site_url('Monitoria/gerenciar/'.$aula->id_monitoria)?>" class="btn btn-default">Voltar</a>
                </div>
                </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>



    </section>
    <!-- /.content -->



<?php $this->load->view('footer'); ?>
 
 
<!-- DataTables -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>

  
<!-- InputMask -->
<script src="<?= base_url('/AdminLTE-2.4.3/plugins/input-mask/jquery.inputmask.js');?>"></script>
<script src="<?= base_url('/AdminLTE-2.4.3/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
<script src="<?= base_url('/AdminLTE-2.4.3/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/moment/min/moment.min.js');?>"></script>
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js');?>"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('/AdminLTE-2.4.3/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
 
 

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
  })
</script> 
