<?php

class Relatorio_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }



    public function verificaFrenquencia($ida_aluno_mnnitoria)
    {
        $sql = "select f.id_frequencia from aluno_monitoria a
        join frequencia  f JOIN usuario u where a.idaluno_monitoria = $ida_aluno_mnnitoria
        and f.id_aluno=a.id_aluno;";
        $Query = $this->db->query($sql, $ida_aluno_mnnitoria);
        $result = $Query->result();

        return $result;
    }
//Função para os monitores e professores estão inseridos em algum monitoria
    function verificaExclusaoUsuarioMonitoria($id_usuario)
    {
        $sql = "Select * from usuario join monitoria m join aluno_monitoria a  where $id_usuario = m.id_monitor
        or $id_usuario = m.id_professor or  $id_usuario = a.id_aluno ";
        $Query = $this->db->query($sql, $id_usuario);
        $result = $Query->result();

        return $result;
    }

    public function profMonitoria($id_monitoria){
        $sql = "SELECT * from usuario u join monitoria m on m.id_professor = u.id_usuario and m.id_monitoria = $id_monitoria ";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result[0];
    }

    public function teste($id_monitoria){
        $sql = "select distinct d.unidade_academica, u.nome as professor from monitoria m join disciplina d join usuario u
where m.id_monitoria = $id_monitoria and m.id_disciplina = d.id_disciplina and u.perfil= 'professor' and u.id_usuario = m.id_professor";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result[0];
    }

    public function alunoFrequencia($id_monitoria){
        $sql = "select distinct cadastrado, u.nome from frequencia f join usuario u
                join aluno_monitoria a where a.id_monitoria = $id_monitoria and
                f.id_aluno = u.id_usuario;";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;

    }




    //Função para apresentar todas infomações da tabela atestado_frequencia + semestre e ano da tabela periodo
    public function infoAtestadoFrequencia(){
        $sql ="SELECT id_atestado_frequencia, data_inicio, data_fim, p.semestre, p.ano FROM atestado_frequencia a join periodo p where a.id_periodo = p.id_periodo";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function getRelatorioById($id_atestado_frequencia)
    {
        $idcliente = $this->db->escape($id_atestado_frequencia);

        //recupera os dados do banco de dados
        $sql = "SELECT * FROM atestado_frequencia WHERE id_atestado_frequencia = ?";
        $Query = $this->db->query($sql, $id_atestado_frequencia);
        $result = $Query->result();

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function adicionaAtestadoFrequencia($DADOS){

        //abrindo transacao
        $this->db->trans_start();

        //tenta recuperar o atestado de frequencia
        $this->db->where('id_atestado_frequencia', $DADOS['id_atestado_frequencia']);
        $q = $this->db->get('atestado_frequencia');

        //verifica se existe o atestado de frequencia, caso exista atualiza
        if ($q->num_rows() > 0) {
            $this->db->where('id_atestado_frequencia', $DADOS['id_atestado_frequencia']);
            $this->db->update('atestado_frequencia', $DADOS);
            $id_periodo = $DADOS['id_atestado_frequencia'];
        }
        //caso contrario insere um novo
        else {
            $this->db->insert('atestado_frequencia', $DADOS);
            $id_atestado_frequencia = $this->db->insert_id();
        }

        //$this->db->trans_rollback();
        $this->db->trans_complete();

        return $id_atestado_frequencia;
    }

    function excluirAtestadoFrequencia($id_atestado_frequencia)
    {

        $this->db->where('id_atestado_frequencia', $id_atestado_frequencia);

        return $this->db->delete('atestado_frequencia');
    }
}
