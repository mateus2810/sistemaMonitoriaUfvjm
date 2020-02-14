<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();


// Carrega seu HTML


ob_start();
require __DIR__."/lista_frequencia.php";
$dompdf->loadHtml(ob_get_clean());




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
