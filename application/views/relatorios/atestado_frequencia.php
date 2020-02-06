<?php $this->load->view('header');?>
<?php
//carrega a traducao em portugues para as tabelas
$ci =& get_instance();
$ci->load->model('Util_model');
$datatablesPortugueseBrasil = $ci->Util_model->datatablesPortugueseBrasil();
?>

<h1>
    Usuários
</h1>
<ol class="breadcrumb">
    <li><a  href="<?= site_url('Home/Index/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a  href="<?= site_url('Monitoria/gerenciar/'.$monitores->id_monitoria) ?>"> Monitorias</a></li>
    <li class="active">Atestado de Frequência</li>
</ol>
</section>

<pre>
    <h3><b><center>
                Anexo III
        Atestado de Frequência Mensal
        </center></b></h3>

<p><strong>Unidade Acadêmica:</strong> <?= $disciplina->unidade_academica ?></p>
<p><strong>Monitor:</strong> <?= $monitores->nome ?> </p>
<p><strong>Processo Seletivo(Edital/Ano):</strong><?= $monitores->numero_edital ?></p>
<p><strong>Docente Supervisor:</strong></p>
<p><strong>Unidade Curricular:</strong><?= $disciplina->nome ?></p>
<p>Declaro que o monitor acima citado cumpriu:<b><?= $somatorioAula->horario_aula ?></b> horas de atividade de Monitoria:</p>
<?php if ( $monitores->monitoria_remunerada == 'Sim')  {  ?>
( X ) Remunerada (  )Volutária no período de

<?php } else {?>
(  ) Remunerada ( X )Volutária no período de

<?php } ?>

______________________________________,__________de__________________de20___
                Local                                 e data



<center> _____________________________________________________________</center>
              <center>Professor(a) Supervisor(a) da Monitoria /Nº SIAPE</center>

    </pre>
