<?php

class Periodo_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database(); 
    }

    public function getPeriodos(){
        //recupera os dados do banco de dados
        $sql = "SELECT * FROM periodo;";
        $Query = $this->db->query($sql); 
        $result = $Query->result(); 
		
        return $result;
    }

    public function getPeriodoById($id_periodo){
        $idcliente = $this->db->escape($id_periodo);

        //recupera os dados do banco de dados
        $sql = "SELECT * FROM periodo WHERE id_periodo = ?";
		$Query = $this->db->query($sql, $id_periodo); 
        $result = $Query->result(); 
		
		if($result == null)
			return null;
				
        return $result[0];
    }
	 
    public function adicionaEditaUsuario($DADOS){
        $idUsuario = null;
		
		//verifica se o novo periodo é igual a um cadastrado, se tiver nao faz nada
		if( $DADOS['id_periodo'] == '' ){
			$sql = "SELECT * FROM periodo WHERE (semestre = ? AND ano = ?) OR ativo = 1";
			$Query = $this->db->query( $sql, array($DADOS['semestre'] , $DADOS['ano']) );  
			$result = $Query->result();  
			if( count($result) > 0)
				return 0;
		} 
		//verifica se existe algum periodo ativo , se tiver nao faz nada
		if( $DADOS['ativo'] == '1' ){
			$sql = "SELECT * FROM periodo WHERE ativo = 1";
			$Query = $this->db->query( $sql );  
			$result = $Query->result();  
			if( count($result) > 0)
				return 0;
		}  

        //abrindo transacao
        $this->db->trans_start();

        //tenta recuperar o periodo
        $this->db->where('id_periodo', $DADOS['id_periodo'] );
        $q = $this->db->get('periodo');
     
        //verifica se existe o periodo, caso exista atualiza
        if ( $q->num_rows() > 0 ){
            $this->db->where('id_periodo',$DADOS['id_periodo']);
            $this->db->update('periodo',$DADOS);
            $id_periodo = $DADOS['id_periodo'];
        } 
        //caso contrario insere um novo
        else {   
            $this->db->insert('periodo',$DADOS);
            $id_periodo = $this->db->insert_id();
        }
  
        //$this->db->trans_rollback();
        $this->db->trans_complete();
		 
        return $id_periodo;
    }

 function excluirPeriodo($id_periodo){

        $this->db->where('id_periodo', $id_periodo);

     return $this->db->delete('periodo');
 }

 function verificaPeriodoAtivo($id_periodo){
     $sql = "SELECT * from periodo p where p.id_periodo = $id_periodo  AND ativo = 1;";
     $Query = $this->db->query($sql);
     $result = $Query->result();

     return $result;
 }
     
}
