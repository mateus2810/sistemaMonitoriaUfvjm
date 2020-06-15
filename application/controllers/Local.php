<?php

class Local extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Local_model');
        $this->load->model('Util_model', 'Util');
        $this->load->model('Aula_model', 'Aula_model');
        $this->load->model('Local_model', 'local');
        $this->load->model('Horario_model', 'Horario_model');
    }

    function listar_view()
    {
        $this->Util->verificaPermissao($this, 'Administrador');
        $data['locais'] = $this->Local_model->getLocais();
        $this->load->view('local_listar', $data);
    }
    function editar_view($id_local)
    {
        $this->Util->verificaPermissao($this, 'Administrador');
        if ($id_local == 'novo') {
            $local = new stdClass();
            $local->id_local = $id_local;
            $local->dependencia = '';
            $local->campus = '';
            $DATA['local'] = $local;
        } else {
            $DATA['local'] = $this->Local_model->getLocalById($id_local);
        }
        $this->load->view('local_edit', $DATA);
    }

    function editar()
    {

        $DATA['id_local'] = $this->input->post('id_local');
        $DATA['dependencia'] = $this->input->post('dependencia');
        $DATA['campus'] = $this->input->post('campus');
       var_dump($DATA);
        if (strlen(trim($this->input->post('dependencia'))) > 0) {
            $this->Local_model->adicionaEditaLocal($DATA);
            $this->Util->telaResultado($this, "Informações atualizados!", false, "Local/listar_view");
        } else {
            if (strlen($DATA['id_local']) == 0) {
                $this->editar_view('novo');
            } else {
                $this->editar_view($DATA['id_local']);
            }
        }
    }

    //Entra na model e excluir disciplina do banco de dados
    function excluir_local_bd($id_local)
    {

        //var_dump($id_monitoria);

        if(!$this->Aula_model->getVerificaLocal($id_local) && !$this->Horario_model->getVerificaHorario($id_local) ){
            if ($this->Local_model->excluirLocal($id_local) != 0) {
            $this->Util->telaResultado($this, "Local excluido com sucesso!", false, "Local/listar_view");
            } else {
            $this->Util->telaResultado($this, "Não foi possivel atualizar os dados.
            Confira os dados informados e se não existe um periodo ativo ou ja cadastrado.", true);
            }
        }

        else {
        $this->Util->telaResultado($this, "Você tem horário ou atividade vinculado a esse local.", true);
    }
    }

}
