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
        <?php if ((strpos("Monitor", $this->session->userdata('perfil')) !== false)
        or strpos("Professor", $this->session->userdata('perfil'))!== false) {  ?>
        <div class="row col-md-6" >

          <div class="box box-solid"   >
              <div class="box-header with-border " >
                  <i class="fa fa-text-width"></i>

                  <h3 class="box-title">Termo de Não Vinculo Empregatício </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body ">
                  <dl>
                      <dt>Descrição</dt>
                      <dd>Declaro para os fins de registro na modalidade fretamento, que não possuo vínculo
                          direta ou indiretamente com a Administração Pública FEDERAL, ESTADUAL
                          ou MUNICIPAL, em conformidade com inciso XVI do artigo 37 da Constituição
                          Federal.</dd>

                  </dl>
              </div>
              <!-- /.box-body -->
          </div>

          <button type="button" class="btn btn-primary btn-sm">Concordo</button>
          <button type="button" class="btn btn-secondary btn-sm">Não Concordo</button>

        <!-- ./col -->
      </div>
      <!-- /.row (main row) -->
        <?php } ?>
    </section>
    <!-- /.content -->



<?php $this->load->view('footer'); ?>
