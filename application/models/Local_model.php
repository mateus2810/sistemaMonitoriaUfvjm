<?php
class Local_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
 
    
    public function getLocais()
    {
        //recupera todos locais cadastrados.
        $sql = "SELECT * FROM `local`";
        $Query = $this->db->query($sql);
        $result = $Query->result();
  
        return $result;
    }
    
    public function getLocalById($id_local)
    {
        $idLocal = $this->db->escape($id_local);
        
        $sql = "SELECT * FROM local WHERE id_local = " .$idLocal;
        $query = $this->db->query($sql);
        $result = $query->result();
        if ($result == null) {
            return(null);
        } else {
            return($result[0]);
        }
    }
    public function adicionaEditaLocal($DADOS)
    {
        $idLocal = null;
        $this->db->trans_start();
        $this->db->where('id_local', $DADOS['id_local']);
        $q = $this->db->get('local');
        
        if ($q->num_rows() > 0) {
            $this->db->where('id_local', $DADOS['id_local']);
            $this->db->update('local', $DADOS);
            $idLocal = $DADOS['id_local'];
        }
        //caso contrario insere um novo
        else {
            $this->db->insert('local', $DADOS);
            $idLocal = $this->db->insert_id();
        }
  
        //$this->db->trans_rollback();
        $this->db->trans_complete();
         
        return $idLocal;
    }

    public function excluirLocal($id_local)
    {
        $this->db->where('id_local', $id_local);

        return $this->db->delete('local');
    }
}
