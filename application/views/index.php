<?php $this->load->view('header_site');?>

<?php
date_default_timezone_set('America/Sao_Paulo');
$hora = date('H:i:s');
$dia = date('D');
$semana = array(
    'Sun' => 'DOMINGO', 'Mon'=>'SEGUNDA-FEIRA', 'Tue'=>'TERÇA-FEIRA', 'Wed'=>'QUARTA-FEIRA', 'Thu'=>'QUINTA-FEIRA', 'Fri'=>'SEXTA-FEIRA', 'Sat'=>'SáBADO');


//var_dump($monitorias);
    $quantPage = 6 ;
    $corSemana = ["SEGUNDA-FEIRA" => "#2D455F", "TERÇA-FEIRA" => "#596D82", "QUARTA-FEIRA" => "#2D455F", "QUINTA-FEIRA" => "#596D82", "SEXTA-FEIRA" => "#2D455F", "SÁBADO" => "#596D82", "DOMINGO" => "#2D455F" ];
?>
<meta http-equiv="refresh" content="300">

    <!-- Full Width Column -->
    <div class="content-wrapper" style="min-height: 100%;">

            <!-- /.box-header -->
        <div class="box box-primary">
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">

                    <?php
                    for ($i = 0; $i < count($monitorias); $i++) {
                        ?>


                        <?= $i == 0 ? '<div class="item active">' : '<div class="item">'; ?>
                        <div class="wrapper">

                            <?php
                            for ($j=0; $j < $quantPage && $i < count($monitorias); $i++, $j++) {
                                $monitoria = $monitorias[$i];
                                ?>
                                <?php $qtd = strlen($monitoria->nomeDisciplina); ?>

                                    <div class="col-md-6" style="height: auto;bottom:auto;" align="center" >
                                <div  class="callout callout-danger"  style="background-color:<?= $corSemana[mb_strtoupper($monitoria->dia_semana)] ?> !important; border-color: #001f3f !important "   >
                                    <b><font size="+1"> <?= mb_strtoupper($monitoria->codigo) ?></font> </b><br/>
                                   <b><font size="+1"> <?= mb_strtoupper($monitoria->nome) ?></font> </b>
                                    <h4><?= mb_strtoupper($monitoria->dia_semana)?>, <?=substr($monitoria->horario_inicio, 0, -3)?>h ATÉ <?=substr($monitoria->horario_fim, 0, -3)?> </h4>
                                    <h4><?= mb_strtoupper($monitoria->sala)?>, <?= mb_strtoupper($monitoria->predio)?>  </h4>
                                    <p><b>MONITOR(A): <?= mb_strtoupper($monitoria->monitor)?></b></p>
                                    <p><b>STATUS: <?php if ($monitoria->dia_semana!=$semana[$dia]) {
                                        echo"POR VIR";
                                                  } else {
                                                      if ($monitoria->horario_fim>$hora && $monitoria->horario_inicio<$hora) {
                                                          echo "EM ANDAMENTO";
                                                      } elseif ($monitoria->horario_inicio>$hora) {
                                                          echo "POR VIR";
                                                      } elseif ($monitoria->horario_fim<$hora) {
                                                          echo "ENCERRADO";
                                                      }
                                                  }?></b></p>

                                </div>

                            </div>


                            <?php } $i--; ?>
                        </div>

                    </div>

                    <?php }  ?>

                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev" style="margin: 0px;width:50%;height: 0%;">
                  <span class="fa fa-angle-left" style="background-color: #fcfeff;"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next" style="margin: 0px;width:50%;height: 0%;">
                  <span class="fa fa-angle-right" style="background-color: #fcfeff;"></span>
                </a>
              </div>

            </div>
        <br/><br/>
    </div>
            <!-- /.box-body -->

    </div>
    <!-- /.content-wrapper -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- Page script -->

<script>
window.onload = function () {
    $(".carousel-control").css({ top: '101%' });
}
</script>
<?php $this->load->view('footer_site');?>
