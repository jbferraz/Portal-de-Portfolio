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
        $this->db->where('usuario.status = 1');
        $this->db->where('usuario.cidade_id = cidade.idcidade');
        $this->db->where('cidade.estado_id = estado.idestado');
        $this->db->where('usuario.formacao_curso_id = formacao.idformacao');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getUsuarioPass($id)
    {
        $this->db->select(
            'usuario.senha');

        $this->db->from('usuario');
        $this->db->where('usuario.status = 1');
        $this->db->where('usuario.idusuario = '.$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function userlogin($email)
    {
        $this->db->where('usuario.status = 1');
        $this->db->where('usuario.email = '."'".$email."'");
        $query = $this->db->get('usuario');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function editUsuarioDelete($id)
    {
        //$this->db->where('usuario_id', $id);
        //$this->db->update('avaliacoes', array('status' => 0));

        //$this->db->where('usuario_id', $id);
        //$this->db->update('chave_hash', array('status' => 0));

        //$this->db->where('usuario_id', $id);
        //$this->db->update('post', array('status' => 0, 'status_adm' => 0));

        $this->db->where('idusuario', $id);
        $this->db->update('usuario', array('status' => 0));

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
