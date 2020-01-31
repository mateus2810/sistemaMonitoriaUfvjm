<?php $this->load->view('header');?>
<?php
 
?>

 
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuários 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
        <li class="active">Usuários</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alterar senha - <?=$nome?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
                <form role="form" action="<?php echo site_url('usuarios/alterar_senha'); ?>" method="post"> 
                    <div class="box-body"> 
                        <input type="hidden" name="id_usuario" value="<?=$id_usuario?>">
                        <div class="form-group">
                            <label>Nova Senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Entre com a senha" >
                        </div>

                        <div class="form-group">
                            <label>Confirme a Senha</label>
                            <input type="password" class="form-control" name="senha2" placeholder="Repida a senha" >
                        </div> 
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer"> 
                        <button type="submit" class="btn btn-default" name="opcao" value="alterar_senha" >Alterar Senha</button>
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
 