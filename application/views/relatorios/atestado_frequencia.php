<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();
$remunerada=' ';
$naoRemunerada=' ';
if($monitores->monitoria_remunerada == 'Sim'){
    $remunerada='( X ) Remunerada (  )Volutária no período de';
}else{
    $naoRemunerada='(  ) Remunerada ( X )Volutária no período de';
}


// Carrega seu HTML


$info= '


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

<p><strong>Unidade Acadêmica:</strong> '  .$disciplina->unidade_academica. '</p>
<p><strong>Monitor:</strong> '. $monitores->nome .' </p>
<p><strong>Processo Seletivo(Edital/Ano):</strong>'. $monitores->numero_edital.'</p>
<p><strong>Docente Supervisor:</strong>'. $monitoria->nome.'</p>
<p><strong>Unidade Curricular:</strong>'. $disciplina->nome .'</p>
<p>Declaro que o monitor acima citado cumpriu: <b>'. $somatorioAula->horario_aula .'</b> horas de atividade de Monitoria</p>
'.$remunerada .'
'.$naoRemunerada .' ____/____/20____ a ____/____/20____

<br>
<br>
<p><center> _________________,____de__________________de20____</center></p>

<br>
<br>



<center> _____________________________________________________________</center>
              <center>Professor(a) Supervisor(a) da Monitoria /Nº SIAPE</center>



                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

';




$dompdf->load_html($info);

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
    "atestado_frequência_mensal.pdf",
    array(
        "Attachment" => false //Para realizar o download somente alterar para true
    )
);

?>
