<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
        $id = $this->session->userdata('id');
        //$this->load->model('Usuario_model', 'ur_m');
		$this->load->model('Avaliacao_model', 'av_m');
		//$this->load->model('Post_model', 'pt_m');
        //$this->load->helper('rating');
        $this->load->helper('db_defaults');
        $this->session->set_userdata('referred_from', current_url()); // Save referred_from
        
        $data['adm'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');

        //$data['avaliacao'] = $this->gn_m->getGenericWhere('status', 0, 'avaliacoes', 'data_avaliacoes', 'desc');
        $data['avaliacao'] = $this->av_m->getUnverifiedAvaliacao();
            
        if (!isset($data['adm'])) 
            $data['adm'] = d_topusuario();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('adm/adm/adm', $data);
        }
    }
}
