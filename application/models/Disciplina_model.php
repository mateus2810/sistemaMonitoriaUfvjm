<?php

class Disciplina_model extends CI_Model
{
    
    public function __construct()
    {
        $this->load->database();
    }
    public function getDisciplinas()
    {
        //recupera as informações da tabala disciplina
        $sql = "SELECT * FROM disciplina";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        return($result);
    }
    public function getDisciplinaById($id_disciplina)
    {
        $idDisciplina = $this->db->escape($id_disciplina);
        
        $sql = "SELECT * FROM disciplina WHERE id_disciplina = " .$idDisciplina;
        $query = $this->db->query($sql);
        $result = $query->result();
        

        return $result[0];
    }
            

    public function adicionaEditaDisciplina($DADOS)
    {
        $idDisciplina = null;
        $this->db->trans_start();
        $this->db->where('id_disciplina', $DADOS['id_disciplina']);
        $q = $this->db->get('disciplina');
        
        if ($q->num_rows() > 0) {
            $this->db->where('id_disciplina', $DADOS['id_disciplina']);
            $this->db->update('disciplina', $DADOS);
            $idDisciplina = $DADOS['id_disciplina'];
        }
        //caso contrario insere um novo
        else {
            $this->db->insert('disciplina', $DADOS);
            $idDisciplina = $this->db->insert_id();
        }
  
        //$this->db->trans_rollback();
        $this->db->trans_complete();
         
        return $idDisciplina;
    }

    public function excluirDisciplina($id_disciplina)
    {
        $this->db->where('id_disciplina', $id_disciplina);

        return $this->db->delete('disciplina');
    }

    public function verificaCodigo($codigo)
    {

        $this->db->where('codigo', $codigo);

        return $this->db->get('disciplina')->row_array();
    }

    public function verificaDisciplina($id_disciplina)
    {

        $this->db->where('id_disciplina', $id_disciplina);

        return $this->db->get('monitoria')->row_array();
    }
}
