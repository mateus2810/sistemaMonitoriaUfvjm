<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Disciplinas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Disciplina_model');
        $this->load->model('Util_model', 'Util');
    }

    function index()
    {
    }

    function listar_view()
    {
        $this->Util->verificaPermissao($this, 'Administrador');
        //adquirir data do db tabela disciplinas a seguir
        $data['disciplinas'] = $this->Disciplina_model->getDisciplinas();
        $this->load->view('disciplinas_listar', $data);
    }

    function editar_view($id_disciplina)
    {
        $this->Util->verificaPermissao($this, 'Administrador');
        if ($id_disciplina == 'novo') {
            $disciplina = new stdClass();
            $disciplina->id_disciplina = '';
            $disciplina->nome = '';
            $disciplina->curso = '';
            $disciplina->unidade_academica = '';
            $disciplina->campus = '';
            $disciplina->codigo = '';
            $DATA['disciplina'] = $disciplina;
        } else {
            $DATA['disciplina'] = $this->Disciplina_model->getDisciplinaById($id_disciplina);
        }
        $this->load->view('disciplinas_edit', $DATA);
    }

    function editar()
    {

        $DATA['id_disciplina'] = $this->input->post('id_disciplina');
        $DATA['nome'] = $this->input->post('nome');
        $DATA['curso'] = $this->input->post('curso');
        $DATA['unidade_academica'] = $this->input->post('unidade_academica');
        $DATA['campus'] = $this->input->post('campus');
        $DATA['codigo'] = $this->input->post('codigo');


        if ($DATA['id_disciplina'] == 0) {
            if (!$this->Disciplina_model->verificaCodigo($DATA['codigo'])) {
                if (strlen(trim($this->input->post('nome'))) > 0) {
                    $this->Disciplina_model->adicionaEditaDisciplina($DATA);
                    $this->Util->telaResultado($this, "Informações atualizados!", false, "Disciplinas/listar_view");
                } else {
                    if (strlen($DATA['id_disciplina']) == 0) {
                        $this->editar_view('novo');
                    } else {
                        $this->editar_view($DATA['id_disciplina']);
                    }
                }
            } else {
                $this->Util->telaResultado($this, "Codigo de disciplina ja existente.", true);
            }
        } else {
            $this->Disciplina_model->adicionaEditaDisciplina($DATA);
            $this->Util->telaResultado($this, "Informações atualizados!", false, "Disciplinas/listar_view");
        }
    }


    //Entra na model e excluir disciplina do banco de dados
    function excluir_disciplina_bd($id_disciplina)
    {
        //recupera as disciplinas do sistema
        $this->load->model('Disciplina_model', 'disciplina');//
        //var_dump($id_monitoria);

        if (!$this->Disciplina_model->verificaDisciplina($id_disciplina)) {
            if ($this->Disciplina_model->excluirDisciplina($id_disciplina) != 0) {
                $this->Util->telaResultado($this, "Disciplina excluida com sucesso!", false, "Disciplinas/listar_view");
            } else {
                $this->Util->telaResultado($this, "Não foi possivel atualizar os dados. Confira os dados informados e se não existe um periodo ativo ou ja cadastrado.", true);
            }
        } else {
            $this->Util->telaResultado($this, "Disciplina vinculada a uma monitoria.", true);
        }
    }
}
