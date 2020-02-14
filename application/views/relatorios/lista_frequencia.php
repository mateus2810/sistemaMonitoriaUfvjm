<?php
//carrega a traducao em portugues para as tabelas
$ci =& get_instance();
$ci->load->model('Util_model');
$datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




<ol class="breadcrumb">

</ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <center><h3 class="box-title">Prograd</h3></center>
                </div>

                <p class="box-body">


                <h3><b><center>
                            Anexo III
                            Atestado de Frequência Mensal
                        </center></b></h3>

                <p><strong>Unidade Acadêmica:</strong> <?= $disciplina->unidade_academica?></p>
                <p><strong>Monitor:</strong> <?=$monitores->nome ?></p>
                <p><strong>Processo Seletivo(Edital/Ano):</strong><?=$monitores->numero_edital?></p>
                <p><strong>Docente Supervisor:</strong><?= $monitoria->nome?></p>
                <p><strong>Unidade Curricular:</strong><?=$disciplina->nome ?></p>
                <p>Declaro que o monitor acima citado cumpriu: <b><?= $somatorioAula->horario_aula ?></b> horas de atividade de monitoria</p>

                <?php
                $remunerada=' ';
                $naoRemunerada=' ';
                if($monitores->monitoria_remunerada == 'Sim'){
                    $remunerada='( X ) Remunerada (  )Volutária no período de';
                }else{
                    $naoRemunerada='(  ) Remunerada ( X )Volutária no período de';
                }

                ?>
                <? echo $remunerada ?>
                <? echo $naoRemunerada ?>  ____/____/20____ a ____/____/20___


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($alunos as $aluno) { ?>

                                    <tr>
                                        <td> <?= $aluno->nome ?> </td>
                                        <td>   <?= $aluno->cadastrado ?> </td></br>

                                    </tr>

                            <?php } ?>
                            </tbody>

                        </table>
                    </div>



                <br>
                <br>
                <p><center> <?php  echo date("d/m/Y"); ?></center></p>

                <br>
                <br>

                <center> <?= $monitoria->nome?></center>
                <center>Professor(a) Supervisor(a) da Monitoria /Nº SIAPE</center>



            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>







</body>
</html>

<script>
    $(function () {

        $('#example1').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })
        $('#example2').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })

        $('#example3').DataTable({
            'language': <?= $datatablesPortugueseBrasil?>
        })

    })
</script>
