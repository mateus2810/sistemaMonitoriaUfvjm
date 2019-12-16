<?php $this->load->view('header');?>
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
              <h3 class="box-title">Semestres letivos cadastrados</h3>
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
				
				<?php foreach($periodos as $periodo){ ?>
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
                      <a href="<?=site_url('Periodo/editar_view/novo')?>" class="btn btn-default btn-block btn-flat">Novo semestre</a>
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