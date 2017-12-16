<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_home extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('Generic_model', 'gn_m');
    }

    public function usuario_home($id) 
    {
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
                    /*
                    $ct = count($post)-1;
                    for ($i = 0; $i < 10; $i++) 
                        $post[] = clone $post[$ct];
                    //*/
                    //$post = array_merge($post, $post);
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

        $this->load->view('backend_test/usuario_home/usuario_home', $data);
    }
}
