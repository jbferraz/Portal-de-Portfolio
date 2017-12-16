<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllPost()
    {
        $this->db->order_by('data_alteracao', 'desc');
        $this->db->select(
            'post.idpost,
            post.foto,
            post.data_cadastro,
            post.data_alteracao,
            post.titulo,
            post.status,
            post.status_adm,
            usuario_id,
            usuario.nome_completo');
        $this->db->select('SUBSTRING(post.desc, 1, 100)', FALSE);

        $this->db->from('post, usuario');
        $this->db->where('post.status = 1');
        $this->db->where('post.usuario_id = usuario.idusuario');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getPostById($id) //Id do usuário
    {
        $this->db->order_by('data_alteracao', 'desc');
        $this->db->select(
            'post.idpost,
            post.foto,
            post.data_cadastro,
            post.data_alteracao,
            post.titulo,
            post.status,
            post.status_adm,
            usuario_id');
        $this->db->select('SUBSTRING(post.desc, 1, 100)', FALSE);

        $this->db->from('post');
        $this->db->where('post.status = 1');
        $this->db->where('post.usuario_id = '.$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getPostDesc($id)
    {
        //$this->db->order_by('data_alteracao', 'desc');
        $this->db->select(
            'post.desc');

        $this->db->from('post');
        $this->db->where('post.status = 1');
        $this->db->where('post.idpost = '.$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    function getOnePost($id) //Id do Post
    {
        $this->db->order_by('data_alteracao', 'desc');
        $this->db->select(
            'post.*,
            usuario.nome_completo,
            cidade.nome_cidade,
            estado.sigla_estado,
            ');
        $this->db->select('SUBSTRING(post.desc, 1, 100)', FALSE);

        $this->db->from('post');
        $this->db->where('post.status = 1');
        $this->db->where('post.usuario_id = '.$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}
