<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function post($id) 
    {
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->model('Post_model', 'pt_m');
        $this->load->helper('db_defaults');
        
        if (is_int($id = (int) $id) && is_numeric($id))
        //if ($post = $this->gn_m->getGenericById('idpost', $id, 'post')) {
        if ($post = $this->pt_m->getPostByPostId($id)) { // Não é genérico porque precisa validar o usuário
            $data['post'] = $post;
            unset($post);

            if ($data['post']->status === '0' && // Testa se usuário tem permissão
                $this->session->userdata('id') !== $data['post']->usuario_id)
                unset($data['post']);
            else if ($usuario = $this->ur_m->getAllUsuarioById($data['post']->usuario_id)[0]) {
                $data['usuario'] = $usuario;
                $data['usuario']->nome_completo = 
                    mb_strtoupper($data['usuario']->nome_completo);
            }
            unset($usuario);

            /* if ($data['post']->status === '0' &&
                $this->session->userdata('id') !== $data['usuario']->idusuario) {
                //redirect(base_url());
                unset($data['post']);
                unset($data['usuario']);
            } */
        }

        if (!isset($data['post'])) 
            $data['post'] = d_post();
        if (!isset($data['usuario'])) 
            $data['usuario'] = d_topusuario();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('post/post', $data);
    }
}
