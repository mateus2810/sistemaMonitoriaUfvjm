<?php

class Frequencia_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getFrequenciasByAula($id_aula)
    {
        //recupera os dados do banco de dados
        $sql = "SELECT id_frequencia, id_aluno, id_aula, cadastrado, matricula, nome
 FROM `frequencia` as f JOIN usuario as u ON (f.id_aluno = u.id_usuario) WHERE id_aula = ?";
        $Query = $this->db->query($sql, array($id_aula));
        $result = $Query->result();

        return $result;
    }

    public function adicionaEditaFrequenciaMonitoria($DADOS)
    {
        $id_frequencia = null;
        $this->db->trans_start();
        $this->db->where('id_frequencia', $DADOS['id_frequencia']);
        $q = $this->db->get('frequencia');

        if ($q->num_rows() > 0) {
            $this->db->where('id_frequencia', $DADOS['id_frequencia']);
            $this->db->update('frequencia', $DADOS);
            $id_frequencia = $DADOS['id_frequencia'];
        } //caso contrario insere um novo
        else {
            $this->db->insert('frequencia', $DADOS);
            $id_frequencia = $this->db->insert_id();
        }

        //$this->db->trans_rollback();
        $this->db->trans_complete();

        return $id_frequencia;
    }

    public function excluirFrequencia($id_frequencia)
    {
        $this->db->where('id_frequencia', $id_frequencia);

        return $this->db->delete('frequencia');
    }

    public function getVerificaFrequencia($id_aula){
        $sql = "select f.id_frequencia from frequencia f where f.id_aula = $id_aula;";
        $Query = $this->db->query($sql, $id_aula);
        $result = $Query->result();

        return $result;
    }
}
