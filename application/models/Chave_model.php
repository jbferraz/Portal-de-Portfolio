<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chave_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getValidChaveById($id) // Id do usuário
    {                              // Seleciona todas as chaves sem avaliação
        $query = $this->db->query( // Seleciona 2x por isso o distinct (erro)
            'select distinct 
                chave_hash.* 
            from 
                chave_hash, avaliacoes
            where
                chave_hash.usuario_id = '.$id.' and
                avaliacoes.usuario_id = '.$id.' and
                chave_hash.idchave not in (
                    select
                        chave_hash.idchave
                    from
                        chave_hash, avaliacoes
                    where
                        chave_hash.idchave = avaliacoes.chave_hash_id
                )
            ORDER BY chave_hash.validade ASC');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }

    /* function getSelfChaveById($u_id, $c_id) // Id do usuário, Id da chave
    {                              // Seleciona uma chave sem avaliação
        $query = $this->db->query( // Seleciona 2x por isso o distinct (erro)
            'select distinct 
                chave_hash.* 
            from 
                chave_hash, avaliacoes
            where
                chave_hash.usuario_id = '.$u_id.' and
                avaliacoes.usuario_id = '.$u_id.' and
                chave_hash.idchave = '.$c_id.' and
                chave_hash.idchave not in (
                    select
                        chave_hash.idchave
                    from
                        chave_hash, avaliacoes
                    where
                        chave_hash.idchave = avaliacoes.chave_hash_id
                )
            ORDER BY chave_hash.validade ASC');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    } */
}
