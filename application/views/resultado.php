<?php $this->load->view('header'); ?>


<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box-header with-border">

                <?php if (isset($erro) && $erro == true) { ?>
                  <div class="col-lg-12">
                    <div class="alert alert-dismissable alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong> <?php echo $msg;?> </strong>
                    </div>
                  </div>
                  
                  <center>
                      <a href="javascript:history.back();">
                        <button class="btn btn-danger">Voltar</button>  
                      </a>
                  </center>
                  
                <?php } ?>
              
              <?php if (isset($ok) && $ok == true) { ?> 
                  <div class="col-lg-12">

                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong> <?php echo $msg;?> </strong>
                    </div>
                  </div> 
                  
                  <center>
                      <a href="<?php echo site_url($ControllerFunctionContinue);?>">
                        <button class="btn btn-success">Continuar</button>  
                      </a>
                  </center>
              <?php } ?>    
              
            </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
</section>

<?php $this->load->view('footer'); ?>