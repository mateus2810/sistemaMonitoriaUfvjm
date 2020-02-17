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
        $sql = "select DISTINCT  a.data,u.nome from aula a join frequencia f join usuario u where a.id_aula = f.id_aula
and f.id_aluno = u.id_usuario and a.id_monitoria = $id_monitoria;";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;

    }

    public function alunoNome($id_monitoria){
        $sql = "select DISTINCT a.data, u.nome from aula a join frequencia f join usuario u where a.id_aula = f.id_aula
and f.id_aluno = u.id_usuario and a.id_monitoria = $id_monitoria";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;

    }


    public function getAtestadoFrequencia()
    {
        //recupera as informações da tabala atestado_frequencia
        $sql = "SELECT * FROM atestado_frequencia";
        $query = $this->db->query($sql);
        $result = $query->result();

        return($result);
    }

    public function  getContagemFrequencia(){

        $sql = "select a.data , COUNT(f.id_frequencia) as quant from frequencia f join aula a where a.id_aula =f.id_aula GROUP by a.data;;";
        $query = $this->db->query($sql);
        $result = $query->result();

        return($result);


    }
}
