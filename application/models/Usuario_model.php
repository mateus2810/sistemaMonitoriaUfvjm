<?php

class Usuario_model extends CI_Model
{


    public function __construct()
    {
        $this->load->database();
    }

    public function getUsuarios()
    {
        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario;";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;
    }

    public function getUsuariosMonitor()
    {
        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario where perfil = 'Monitor';";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;
    }

    public function getUsuariosProfessor()
    {
        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario where perfil = 'Professor';";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;
    }

    public function getUsuariosAluno()
    {
        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario where perfil = 'Aluno';";
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;
    }

    public function getAlunoMatricula($id_monitoria)
    {
        $sql1 = 'SELECT id_monitor FROM monitoria WHERE id_monitoria = ?';
        $Query1 = $this->db->query($sql1, array($id_monitoria));
        $result1 = $Query1->result();
        $id_monitor = $result1[0]->id_monitor;


        $sql = 'SELECT DISTINCT
                 a.idaluno_monitoria, a.id_monitoria, u.id_usuario, u.nome, u.matricula, u.email, u.perfil
                FROM
                    usuario u
                    LEFT JOIN aluno_monitoria a on u.id_usuario = a.id_aluno
                     JOIN monitoria m
                WHERE
                    u.perfil in ("Aluno", "Monitor")
                    AND (a.id_monitoria <> ? OR a.id_monitoria IS NULL)
                    AND u.id_usuario NOT IN (SELECT id_aluno FROM `aluno_monitoria` WHERE id_monitoria = ?)
                    AND u.id_usuario <> ?  ;';


        $Query = $this->db->query($sql, array($id_monitoria, $id_monitoria, $id_monitor));
        $result = $Query->result();

        return $result;
    }

    public function getUsuarioById($id_usuario)
    {
        $idcliente = $this->db->escape($id_usuario);

        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario WHERE id_usuario = " . $id_usuario;
        $Query = $this->db->query($sql);
        $result = $Query->result();

        if ($result == null) {
            return null;
        }

        return $result[0];
    }

    public function getUsuarioAlunoMonitor($id_usuario)
    {
        $idcliente = $this->db->escape($id_usuario);
        //recupera os dados do banco de dados
        $sql = "UPDATE usuario set perfil = 'Monitor' where id_usuario = " . $id_usuario;
        $this->db->query($sql);
    }

    public function getUsuarioMonitorAluno($id_usuario)
    {
        $this->db->escape($id_usuario);
        //recupera os dados do banco de dados
        $sql = "UPDATE usuario set perfil = 'Aluno' where id_usuario = " . $id_usuario;
        $this->db->query($sql);

    }


    public function verificaLogin($matricula, $senha)
    {
        $matricula = $this->db->escape($matricula);
        $senha = $this->db->escape($senha);


        //recupera os dados do banco de dados
        $sql = "SELECT * FROM usuario WHERE matricula = " . $matricula . " and senha = " . $senha;
        $Query = $this->db->query($sql);
        $result = $Query->result_array();

        if ($result == null || count($result[0]) == 0) {
            return null;
        }

        return $result[0];
    }

    public function adicionaEditaUsuario($DADOS)
    {
        $idUsuario = null;

        //abrindo transacao
        $this->db->trans_start();

        //tenta recuperar o usuario
        $this->db->where('id_usuario', $DADOS['id_usuario']);
        $q = $this->db->get('usuario');

        //verifica se existe o usuario, caso exista atualiza
        if ($q->num_rows() > 0) {
            $this->db->where('id_usuario', $DADOS['id_usuario']);
            $this->db->update('usuario', $DADOS);
            $idUsuario = $DADOS['id_usuario'];
        } //caso contrario insere um novo
        else {
            $DADOS['senha'] = '123456';
            $this->db->insert('usuario', $DADOS);
            $idUsuario = $this->db->insert_id();
        }

        //$this->db->trans_rollback();
        $this->db->trans_complete();

        return $idUsuario;
    }


    public function alterarSenha($id_usuario, $senha)
    {
        //verifica se o usuario esta editando outro usuario. somente o admin pode fazer isso
        $ID_USUARIO = $this->session->userdata('id_usuario');
        if ($id_usuario != $ID_USUARIO) {
            $this->Util->verificaPermissao($this, 'Administrador');
        }

        $id_usuario = str_replace("\'", "", $id_usuario);
        $DADOS['senha'] = str_replace("\'", "", $senha);

        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuario', $DADOS);
    }

    public function excluirUsuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);

        return $this->db->delete('usuario');
    }

    public function getMonitorById($id_monitoria)
    {

        //recupera os dados do banco de dados
        $sql = "SELECT * FROM monitoria m join usuario u where m.id_monitor = u.id_usuario and m.id_monitoria = ".$id_monitoria;
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result[0];
    }


    public function recuperaSenha($email)
    {

        $this->db->where('email', $email);

        return $this->db->get('usuario')->row_array();
    }

    public function recuperaID($senha)
    {

        $this->db->where('senha', $senha);

        return $this->db->get('usuario')->row_array();
    }

    public function alterarSenhaDeslogado($id_usuario, $senha)
    {

        $id_usuario = str_replace("\'", "", $id_usuario);
        $DADOS['senha'] = str_replace("\'", "", $senha);

        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuario', $DADOS);
    }

    public function verificaAlunoDesmatriculado($id_usuario){
        $usuario =$this->session->userdata('id_usuario');

        $sql = "select DISTINCT u.nome from usuario u join monitoria m
        join aluno_monitoria am where m.id_monitor = $id_usuario and m.id_monitoria = am.id_monitoria
        and  m.id_professor = $usuario and u.id_usuario = m.id_monitor;" ;
        $Query = $this->db->query($sql);
        $result = $Query->result();

        return $result;
    }
}
