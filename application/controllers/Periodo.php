<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periodo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Periodo_model', 'Periodo_model');

        $this->load->model('Util_model', 'Util');
    }

    public function index()
    {
    }

    function listar_view()
    {
        $this->Util->verificaPermissao($this, 'Administrador');

        //recupera os periodos
        $DATA['periodos'] = $this->Periodo_model->getPeriodos();

        $this->load->view('periodo_listar', $DATA);
    }

    function editar_view($id_periodo)
    {
        $this->Util->verificaPermissao($this, 'Administrador');

        //Prepara para inserir um novo periodo
        if ($id_periodo == 'novo') {
            $periodo = new stdClass();
            $periodo->id_periodo = "";
            $periodo->semestre = "";
            $periodo->ano = "";
            $periodo->ativo = "";
            $DATA['periodo'] = $periodo;
        }
        //recupera as informacoes do periodo para editar
        else {
            //recupera os periodos do sistema
            $DATA['periodo'] = $this->Periodo_model->getPeriodoById($id_periodo);

            if ($DATA['periodo']  == null) {
                $this->Util->telaResultado($this, "Entrada Inválido!", true);
            }
        }

        //var_dump($DATA);
        $this->load->view('periodo_edit', $DATA);
    }

    function editar()
    {
        $this->Util->verificaPermissao($this, 'Administrador');

        $DATA['id_periodo'] = $this->input->post('id_periodo');
        $DATA['semestre'] = $this->input->post('semestre');
        $DATA['ano'] = $this->input->post('ano');
        $DATA['ativo'] = $this->input->post('ativo');



        if ($this->Periodo_model->adicionaEditaUsuario($DATA) != 0) {
            $this->Util->telaResultado($this, "Informações atualizados!", false, "Periodo/listar_view");
        } else {
            $this->Util->telaResultado($this, "Não foi possivel atualizar os dados. Confira os dados informados e se não existe um período ativo ou já cadastrado.", true);
        }
    }


    function excluir_periodo_bd($id_periodo)
    {

        //recupera as disciplinas do sistema
        $this->load->model('Periodo_model', 'periodo');//


        if (!$DATA['periodo'] = $this->Periodo_model->verificaPeriodoAtivo($id_periodo)) {
            if ($this->Periodo_model->excluirPeriodo($id_periodo) != 0) {
                $this->Util->telaResultado($this, "Periodo excluido com sucesso!", false, "Periodo/listar_view");
            } else {
                $this->Util->telaResultado($this, "Não foi possivel atualizar os dados. Confira os dados informados e se não existe um periodo ativo ou ja cadastrado.", true);
            }
        } else {
            $this->Util->telaResultado($this, "Você não pode excluir um periodo ativo.", true);
        }
    }
}
