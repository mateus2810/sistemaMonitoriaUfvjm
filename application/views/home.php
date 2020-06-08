<?php $this->load->view('header'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestão de Monitorias
        <small>Painel de controle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" >
      <!-- Small boxes (Stat box) -->
        <?php if (((strpos("Monitor", $this->session->userdata('perfil')) !== false) or
        strpos("Professor", $this->session->userdata('perfil'))!== false) and $usuario->declaracao == 0) {  ?>


            <div class="modal fade" id="modal-default" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                                <span aria-hidden="true"></span></button>
                            <h4 class="modal-title">TERMOS DE USO DO SISTEMA DE MONITORIA</h4>
                        </div>
                        <div class="modal-body">
                            <p>texto</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= site_url('Usuarios/termos_de_uso/') ?>" type="button" class="btn btn-primary">Concordo</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <!-- ./col -->
      </div>
      <!-- /.row (main row) -->
        <?php } ?>
    </section>
    <!-- /.content -->
<script src="<?= base_url('/AdminLTE-2.4.3/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<!-- chamada da função -->
<script>
    $(function(){
        $("#modal-default").modal("show");
    });

</script>

<?php $this->load->view('footer'); ?>
