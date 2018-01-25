<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function getPostCadastro($status, $perf) {
    $ci =& get_instance();
    $fields = array
    (
        'nome_completo' => $ci->input->post('nome_completo'), 
        'email' => mb_strtolower($ci->input->post('email')),
        'celular' => $ci->input->post('celular'),
        'sexo' => $ci->input->post('sexo'),
        'data_nasc' => $ci->input->post('data_nasc'),
        'linkedin' => $ci->input->post('linkedin'),
        'facebook' => $ci->input->post('facebook'),
        'instagram' => $ci->input->post('instagram'),
        'senha' => $ci->input->post('senha'),
        'senhan' => $ci->input->post('senhan'),
        'senhan2' => $ci->input->post('senhan2'),
        'desc' => $ci->input->post('desc'),
        'status' => $status,
        'formacao_curso_id' => $ci->input->post('formacao'),
        'cidade_id' => $ci->input->post('cidade'),
        'perfil_de_usuario_id' => $perf
    );
    return $fields;
}

function duplicatedUsuario($fromDb, $fromPost, $id) {
    
    foreach ($fromDb as $db) {
        if (!($id === $db->idusuario)) {
            if 
            (
                $db->email == 
                $fromPost['email'] ||

                $db->celular == 
                $fromPost['celular']
            )
            return true;
        }
    }
    return false;
}

function getHash($phone, $status, $id) {
    //$ci =& get_instance();
    date_default_timezone_set('America/Sao_Paulo');
    $fields = array
    (
        'chave' => sha1($phone.microtime(true).mt_rand(0, 10000)),
        'validade' => date('Y-m-d', strtotime("+2 days")),
        'status' => $status,
        'usuario_id' => $id
    );
    return $fields;
}

function getAvaliacao($id, $phone, $rate, $status, $user) {
    //$ci =& get_instance();
    date_default_timezone_set('America/Sao_Paulo');
    $fields = array
    (
        'chave_hash_id' => $id,
        'celular_cliente' => $phone,
        'avaliacoes' => $rate,
        'data_avaliacoes' => date('Y-m-d H:i:s'),
        'status' => $status,
        'usuario_id' => $user
    );
    return $fields;
}

function getUploadConfig($phone) {
    //$ci =& get_instance();
    $config = array
    (
        'upload_path' => './img',
        'allowed_types' => 'gif|jpg|png|jpeg',
        'max_size' => 200,
        'file_name' => sha1($phone.microtime(true).mt_rand(0, 10000)),
        'overwrite' => TRUE
    );
    return $config;
} 

function getPostPost($file, $id, $status) {
    $ci =& get_instance();
    date_default_timezone_set('America/Sao_Paulo');
    $fields = array
    (
        'foto' => 'img/'.$file, // Extensão adicionada depois
        'data_cadastro' => date('Y-m-d H:i:s'),
        'data_alteracao' => date('Y-m-d H:i:s'),
        'titulo' => $ci->input->post('titulo'),
        'desc' => $ci->input->post('desc'),
        'status' => $status,
        'usuario_id' => $id
    );
    return $fields;
}
