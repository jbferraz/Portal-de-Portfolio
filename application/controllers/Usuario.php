<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $id = $this->session->userdata('id');
        $this->load->model('Usuario_model', 'ur_m');
		$this->load->model('Avaliacao_model', 'av_m');
		$this->load->model('Post_model', 'pt_m');
        $this->load->helper('rating');
        $this->load->helper('db_defaults');
        
        if (is_int($id = (int) $id) && is_numeric($id))
        if ($avaliacao = $this->av_m->getAvaliacaoById($id)) {
            $data['avaliacao'] = $avaliacao;
            unset($avaliacao);
            
            if ($topusuario = ratingMaker($data['avaliacao'], null)[0]) {
                $data['topusuario'] = $topusuario;
                unset($topusuario);

                if ($data['topusuario']->linkedin == null) 
                    unset($data['topusuario']->linkedin);
                if ($data['topusuario']->facebook == null) 
                    unset($data['topusuario']->facebook);
                if ($data['topusuario']->instagram == null)
                    unset($data['topusuario']->instagram);

                if ($post = $this->pt_m->getPostById($id)) {
                    $data['postone'] = $post[0];
                    $data['postone']->fulldesc = 
                        $this->pt_m->getPostDesc($data['postone']->idpost)[0]->desc;
                    unset($data['postone']->{'SUBSTRING(post.desc, 1, 100)'});
                    
                    if (count($post) > 1) {
                        $data['post'] = array_slice($post, 1);
                        foreach ($data['post'] as $object) {
                            $object->desc100 = $object->{'SUBSTRING(post.desc, 1, 100)'}.'...';
                            unset($object->{'SUBSTRING(post.desc, 1, 100)'});
                        }
                        unset($object);
                    }
                    unset($post);
                }
            }
        }

        if (!isset($data['avaliacao'])) 
            $data['avaliacao'][] = d_avaliacao();
        if (!isset($data['topusuario'])) 
            $data['topusuario'] = d_topusuario();
        if (!isset($data['postone']))
            $data['postone'] = d_post();

        $this->load->view('backend_test/usuario/usuario', $data);
    }
    }

    function edit() 
    {
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->helper('db_defaults');

        if ($usuario = $this->ur_m->getAllUsuarioById((int) $this->session->userdata('id'))[0]) {
            $data['usuario'] = $usuario;
            $data['usuario']->desc = str_replace('<br />', "", $data['usuario']->desc);;
        }
        unset($usuario);

        if ($estado = $this->gn_m->getGeneric('nome_estado', 'asc', 'estado'))
            $data['estado'] = $estado;
        unset($estado);

        if ($formacao = $this->gn_m->getGeneric('formacao', 'asc', 'formacao'))
            $data['formacao'] = $formacao;
        unset($formacao);

        if (!isset($data['usuario'])) 
            $data['usuario'] = d_topusuario();
        if (!isset($data['estado'])) 
            $data['estado'][] = d_estado();
        if (!isset($data['formacao'])) 
            $data['formacao'][] = d_formacao();

        $this->load->view('backend_test/usuario/edit', $data);
    }
}
