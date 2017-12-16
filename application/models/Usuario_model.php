<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /* function getAllUsuario()
    {
        //$this->db->order_by('avaliacoes', 'desc');
        $this->db->select(
            'usuario.*,
            cidade.nome_cidade, 
            estado.sigla_estado');

        $this->db->from('usuario, estado, cidade');
        $this->db->where('usuario.perfil_de_usuario_id = 0');
        $this->db->where('usuario.status = 1');
        $this->db->where('usuario.cidade_id = cidade.idcidade');
        $this->db->where('cidade.estado_id = estado.idestado');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    } */

    function getAllUsuarioById($id) {

        $this->db->select(
            'usuario.*,
            cidade.nome_cidade, 
            estado.sigla_estado,
            estado.idestado,
            formacao.formacao');

        $this->db->from('usuario, estado, cidade, formacao');
        $this->db->where('usuario.idusuario = '.$id);
        $this->db->where('usuario.cidade_id = cidade.idcidade');
        $this->db->where('cidade.estado_id = estado.idestado');
        $this->db->where('usuario.formacao_curso_id = formacao.idformacao');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getLogin($usuario, $senha) {
         
    }
}
