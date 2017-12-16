<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    public function post($id) 
    {
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->helper('db_defaults');
        
        if (is_int($id = (int) $id) && is_numeric($id))
        if ($post = $this->gn_m->getGenericById('idpost', $id, 'post')) {
            $data['post'] = $post;
            unset($post);

            if ($usuario = $this->ur_m->getAllUsuarioById($data['post']->usuario_id)[0]) {
                $data['usuario'] = $usuario;
                $data['usuario']->nome_completo = 
                    mb_strtoupper($data['usuario']->nome_completo);
            }
            unset($usuario);
        }

        if (!isset($data['post'])) 
            $data['post'] = d_post();
        if (!isset($data['usuario'])) 
            $data['usuario'] = d_topusuario();

        $this->load->view('backend_test/post/post', $data);
    }
}
