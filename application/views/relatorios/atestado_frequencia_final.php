<?php
require_once("dompdf/autoload.inc.php");
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


//referenciar o DomPDF com namespace
use Dompdf\Dompdf;



//===================================================================
// CSS para o formulario
$css = '
<style>
#customers {
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 3px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #bcdae9;}
#customers th {
  padding-top: 3px;
  padding-bottom: 3px;
  text-align: center;
  background-color: #0073ae;
  color: white;
}
</style>
';
//===================================================================


//Monta o cabecalho
$imgCabecalhoPath = $_SERVER["DOCUMENT_ROOT"] ."/imagens/relatorios/cabecalho.jpg"; //recupera o caminho da imagem no servidor
//$imgCabecalhoPath = base_url( "/imagens/relatorios/cabecalho.jpg"); //recupera o caminho da imagem no servidor

$htmlStr = '<img style="width: 19cm;" src="'.$imgCabecalhoPath .'" >';
$htmlStr .= '<h3><b><center>Relatório Final de Monitoria </center></b></h3>';


//Monta as informações basicas do relatorio


//Monta a tabela do relatorio
$htmlStr .= '
<table id="customers">
  <tr>
    <th>Monitores</th>
    <th>Quant. Horas</th>
  </tr>
';

foreach ($dados as $aluno) {
    $htmlStr .= '
      <tr>
        <td>'.$aluno->monitor .'</td>

      </tr>
    ';
}

$htmlStr .= '
</table>
';


// Monta o final
$htmlStr .= '
<br/> <br/>
<p>
    Declaro que o monitor acima citado cumpriu <b>'. str_replace (' ','',$somatorioAula->horario_aula) .'</b>
    horas de atividade de monitoria no périodo de '. date("d/m/Y", strtotime($data->data_inicio)) .' a '. date("d/m/Y", strtotime($data->data_fim)) .'
</p>
<br/>
<p style="text-align: center;">

'. date("d/m/Y", strtotime('today')).'
<br><br>
___________________________________________________<br/>
'. $monitoria->nome .' / '. $monitoria->matricula .' <br/>
Professor(a) Supervisor(a) da Monitoria /Nº SIAPE
</p>
';




//Criando a Instancia
$dompdf = new DOMPDF();

//Envia o HTML para o DomPDF
ob_start();

echo $css;
echo $htmlStr;
//die;

$dompdf->loadHtml(ob_get_clean());

$dompdf->setPaper('A4', 'landscape');

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
