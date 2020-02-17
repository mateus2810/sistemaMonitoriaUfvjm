<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relatorio extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Usuario_model', 'Usuario_model');
        $this->load->model('Disciplina_model', 'Disciplina_model');
        $this->load->model('Monitoria_model', 'Monitoria_model');
        $this->load->model('Periodo_model', 'Periodo_model');
        $this->load->model('Frequencia_model', 'Frequencia_model');
        $this->load->model('Aula_model', 'Aula_model');
        $this->load->model('Relatorio_model', 'Relatorio_model');
        $this->load->model('Local_model', 'Local_model');
        $this->load->model('Util_model', 'Util');
    }

    public function index()
    {
    }



    function atestado_frequencia($id_monitoria, $id_atestado_frequencia)
    {
        $ID_USUARIO = $this->session->userdata('id_usuario');
        $PERFIL_USUARIO = $this->session->userdata('perfil');


        if (@$this->Monitoria_model->verificaIDMonitor($ID_USUARIO, $id_monitoria) or @$this->Monitoria_model->verificaIDProf($ID_USUARIO, $id_monitoria) or $PERFIL_USUARIO == "Administrador") {
            //recupera os periodos

            //$DATA['monitores'] = $this->Usuario_model->getMonitorById($id_monitoria);

            $DATA['professor'] = $this->Monitoria_model->professorMonitoria($id_monitoria);

            $DATA['somatorioAula'] = $this->Aula_model->somatorioHorarioAula($id_monitoria);

            $DATA['monitoria'] = $this->Monitoria_model->profMonitoria($id_monitoria);

            $DATA['alunos'] = $this->Relatorio_model->alunoFrequencia($id_monitoria);



            var_dump($DATA['alunos'] );


            $this->load->view('relatorios/atestado_frequencia', $DATA);
        } else {
            $this->Util->telaResultado($this, "Acesso negado.", true);
        }
    }

    public function listar_view(){
        $this->Util->verificaPermissao($this, 'Administrador');

        //recupera os periodos
        $DATA['atestados'] = $this->Relatorio_model->infoAtestadoFrequencia();

        $this->load->view('atestado_listar', $DATA);
    }

    function editar_view($id_atestado_frequencia)
    {
        $this->Util->verificaPermissao($this, 'Administrador');
        $DATA['periodos'] = $this->Periodo_model->getPeriodos();
        $DATA['atestado_frequencia'] = $this->Relatorio_model->getRelatorioById($id_atestado_frequencia);

        //Prepara para inserir um novo periodo
        if ($id_atestado_frequencia == 'novo') {
            $atestado_frequencia = new stdClass();
            $atestado_frequencia->$id_atestado_frequencia = "";
            $atestado_frequencia->data_inicio = "";
            $atestado_frequencia->data_fim = "";
            $DATA['atestado_frequencia'] = $atestado_frequencia;
        }

        //var_dump($DATA);
        $this->load->view('atestado_edit', $DATA);
    }


    //Retaforar a função, ainda não funcional
    //Adicionar atestado de frequencia no banco de dados
    function editar()
    {
        $this->Util->verificaPermissao($this, 'Administrador');

        $DATA['id_atestado_frequencia'] = $this->input->post('id_atestado_frequencia');
        $DATA['id_periodo'] = $this->input->post('id_periodo');
        $DATA['data_inicio'] = $this->input->post('data_inicio');
        $DATA['data_fim'] = $this->input->post('data_fim');



        if ($this->Relatorio_model->adicionaAtestadoFrequencia($DATA) != 0) {
            $this->Util->telaResultado($this, "Informações atualizados!", false, "Relatorio/listar_view");
        } else {
            $this->Util->telaResultado($this, "Não foi possivel atualizar os dados.", true);
        }
    }

    public function excluir_atestado_bd($id_atestado_frequencia){

        //recupera as disciplinas do sistema
        //$this->load->model('Relatorio_model', 'atestado_frequencia');//


            if ($this->Relatorio_model->excluirAtestadoFrequencia($id_atestado_frequencia) != 0) {
                $this->Util->telaResultado($this, "Atestado de Frequência excluido com sucesso!", false, "Relatorio/listar_view");
            } else {
                $this->Util->telaResultado($this, "Não foi excluir atestado de frequência", true);
            }

    }



}
