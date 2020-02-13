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
        //$DATA['periodos'] = $this->Periodo_model->getPeriodos();

        $this->load->view('atestado_listar');
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
        $this->load->view('atestado_edit', $DATA);
    }

}
