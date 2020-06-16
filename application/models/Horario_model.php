<?php

class Horario_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        $this->load->model('Relatorio_model', 'Relatorio_model');
    }

    //Verifica local cadastrado na tabela horario_monitoria
    public function getVerificaHorario($id_local){
        $sql = "select h.id_horario_monitoria from horario_monitoria h where h.id_local = $id_local;";
        $Query = $this->db->query($sql, $id_local);
        $result = $Query->result();

        return $result;
    }
}
