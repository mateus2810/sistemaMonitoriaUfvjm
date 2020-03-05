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
        Monitorias
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('/Home/Index/');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" >Monitoria </li>
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box table-responsive">
                <div class="box-header">
                    <h3 class="box-title">Monitorias Cadastradas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Unidade Curricular</th>
                            <th>Monitor</th>
                            <th>Professor</th>
                            <th>Período</th>
                            <th>Ações</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($monitorias as $monitoria) { ?>
                            <tr>
                                <td>
                                    <?= $monitoria->nomeDisciplina ?>
                                    <br/><small> <?= $monitoria->curso ?> - <?= $monitoria->unidade_academica ?> -<?= $monitoria->campus ?>
                                </td>
                                <td><?= $monitoria->monitor ?></td>
                                <td><?= $monitoria->professor ?></td>
                                <td><?= $monitoria->periodo ?></td>
                            <?php if (strpos("Administrador", $this->session->userdata('perfil')) !== false or strpos("Professor", $this->session->userdata('perfil')) !== false) {  ?>
                                <td>
                                    <a href="<?=site_url('Monitoria/gerenciar/'.$monitoria->id_monitoria)?>"
                                       class="glyphicon glyphicon-plus-sign" title="Acessar monitoria"></a>

                                    <a href="<?= site_url('Monitoria/cadastro_monitoria_view/'.$monitoria->id_monitoria) ?>"
                                       class="glyphicon glyphicon-edit" title="Editar monitoria"></a>
                                    <a href="<?= site_url('Monitoria/excluir_monitoria_bd/'.$monitoria->id_monitoria) ?>"
                                       onclick="return confirm('Deseja realmente excluir?')" class="glyphicon glyphicon-trash" title="Excluir monitoria"></a>
                                </td>
                            <?php } else { ?>
                    <td>
                        <a href="<?=site_url('Monitoria/gerenciar/'.$monitoria->id_monitoria)?>"
                           class="glyphicon glyphicon-plus-sign" title="Acessar monitoria"></a>

                    </td>




                            <?php }?>
                            </tr>
                        <?php }?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
                <?php if (strpos("Administrador", $this->session->userdata('perfil')) !== false or strpos("Professor", $this->session->userdata('perfil')) !== false) {  ?>
                <div class="box-body">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-2">
                            <a href="<?=site_url('Monitoria/cadastro_monitoria_view/novo')?>" class="btn btn-default btn-block btn-flat">Nova Monitoria</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <?php } ?>
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
