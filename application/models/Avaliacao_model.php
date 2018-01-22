<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getValidAvaliacao()
    {        
        $this->db->order_by('usuario_id', 'asc');
        $this->db->select('DISTINCT(avaliacoes.chave_hash_id)', FALSE); // distinct hash
        $this->db->select(
            'avaliacoes.avaliacoes, 
            avaliacoes.usuario_id');

        $this->db->from('avaliacoes, usuario, post'); // post (distinct)
        $this->db->where('usuario.status = 1');
        $this->db->where('avaliacoes.status = 1');
        $this->db->where('post.status = 1');                     // Remove usuários
        $this->db->where('post.usuario_id = usuario.idusuario'); // sem post, de home
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
        $this->db->select('DISTINCT(avaliacoes.chave_hash_id)', FALSE); // distinct hash
        $this->db->select(
            'avaliacoes.avaliacoes, 
            avaliacoes.usuario_id');

        $this->db->from('avaliacoes, usuario, post'); // post (distinct)
        $this->db->where('usuario.status = 1');
        $this->db->where('avaliacoes.status = 1');
        $this->db->where('post.status = 1');                     // Remove usuários
        $this->db->where('post.usuario_id = usuario.idusuario'); // sem post, de formacao
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

    /* ------------------------------- ADM ------------------------------- */

    function getUnverifiedAvaliacao() // Adm
    {        
        $this->db->order_by('data_avaliacoes', 'desc');
        $this->db->select(
            'avaliacoes.*,
            chave_hash.chave,
            usuario.nome_completo, 
            cidade.nome_cidade, 
            estado.sigla_estado,
            formacao.formacao');
        $this->db->limit(3); // Limite de resultados
        $this->db->from('avaliacoes, usuario, estado, cidade, formacao, chave_hash');
        $this->db->where('usuario.status = 1'); // Usuário não excluído
        $this->db->where('avaliacoes.status = 0');
        $this->db->where('avaliacoes.chave_hash_id = chave_hash.idchave');
        $this->db->where('avaliacoes.usuario_id = usuario.idusuario');
        $this->db->where('usuario.cidade_id = cidade.idcidade');
        $this->db->where('cidade.estado_id = estado.idestado');
        $this->db->where('usuario.formacao_curso_id = formacao.idformacao');

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}