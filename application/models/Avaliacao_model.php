<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getValidAvaliacao()
    {        
        $this->db->order_by('usuario_id', 'asc');
        $this->db->select(
            'avaliacoes.avaliacoes, 
            avaliacoes.usuario_id');

        $this->db->from('avaliacoes, usuario');
        $this->db->where('usuario.status = 1');
        $this->db->where('avaliacoes.status = 1');
        $this->db->where('avaliacoes.usuario_id = usuario.idusuario');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getAvaliacaoByFm($formacao)
    {        
        $this->db->order_by('usuario_id', 'asc');
        $this->db->select(
            'avaliacoes.avaliacoes, 
            avaliacoes.usuario_id');

        $this->db->from('avaliacoes, usuario');
        $this->db->where('usuario.status = 1');
        $this->db->where('avaliacoes.status = 1');
        $this->db->where('avaliacoes.usuario_id = usuario.idusuario');
        $this->db->where('usuario.formacao_curso_id = '.$formacao);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getAvaliacaoById($id)
    {        
        //$this->db->order_by('usuario_id', 'asc');
        $this->db->select(
            'avaliacoes.avaliacoes, 
            avaliacoes.usuario_id');

        $this->db->from('avaliacoes, usuario');
        $this->db->where('usuario.status = 1');
        $this->db->where('avaliacoes.status = 1');
        $this->db->where('avaliacoes.usuario_id = usuario.idusuario');
        $this->db->where('avaliacoes.usuario_id = '.$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}