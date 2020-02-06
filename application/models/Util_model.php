<?php

class Util_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
    }

    public function verificaPermissao($controller, $permissao)
    {
        if (strpos($permissao, $this->session->userdata('perfil')) === false) {
            $DATA['msg'] = 'Voce não possui permissão';
            $DATA['erro'] = true;
            $controller->load->view('resultado', $DATA);
            $controller->CI =& get_instance();
            $controller->CI->output->_display();
            die();
        }
    }
    
    public function telaResultado($controller, $msg, $erro, $ControllerFunctionContinue = "Home")
    {
        $DATA['ControllerFunctionContinue'] = 'Home';
        $DATA['msg'] = $msg;
        if ($erro) {
            $DATA['erro'] = true;
        } else {
            $DATA['ok'] = true;
            $DATA['ControllerFunctionContinue'] = $ControllerFunctionContinue;
        }
        $controller->load->view('resultado', $DATA);
        $controller->CI =& get_instance();
        $controller->CI->output->_display();
        die();
    }
    
    public function formatarTimestamp($timestamp)
    {
        return date('H:i:s - d/m/Y', strtotime($timestamp));
    }

    
    public function datatablesPortugueseBrasil()
    {
        $json = '{
			sEmptyTable: "Nenhum registro encontrado",
			sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
			sInfoFiltered: "(Filtrados de _MAX_ registros)",
			sInfoPostFix: "",
			sInfoThousands: ".",
			sLengthMenu: "_MENU_ resultados por página",
			sLoadingRecords: "Carregando...",
			sProcessing: "Processando...",
			sZeroRecords: "Nenhum registro encontrado",
			sSearch: "Pesquisar",
			oPaginate: {
			sNext: "Próximo",
			sPrevious: "Anterior",
			sFirst: "Primeiro",
			sLast: "Último"
			},
			oAria: {
			sSortAscending: ": Ordenar colunas de forma ascendente",
			sSortDescending: ": Ordenar colunas de forma descendente"
			}
		}';
        
        return $json;
    }
}
