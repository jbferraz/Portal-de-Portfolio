<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao extends CI_Controller { //ADM

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
        $u_id = $this->session->userdata('id');
        
        }
    }

    function validate($id) 
    {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
        //$this->load->library('user_agent');
        $u_id = $this->session->userdata('id');

        if ($this->session->userdata('referred_from')) { // Retrieve referred_from
            $referred_from = $this->session->userdata('referred_from');
            $this->session->unset_userdata('referred_from');
        }

        $update = $this->gn_m->update('chave_hash_id', $id, 'avaliacoes', array('status' => 1));
        
        if (isset($referred_from)) 
            redirect($referred_from);
        else 
            redirect(base_url());

        }
    }

    function delete($id) 
    {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
        //$this->load->library('user_agent');
        $u_id = $this->session->userdata('id');

        if ($this->session->userdata('referred_from')) { // Retrieve referred_from
            $referred_from = $this->session->userdata('referred_from');
            $this->session->unset_userdata('referred_from');
        }

        $delete_rate = $this->gn_m->delete('chave_hash_id', $id, 'avaliacoes');
        $delete_hash = $this->gn_m->delete('idchave', $id, 'chave_hash');

        if (isset($referred_from)) 
            redirect($referred_from);
        else 
            redirect(base_url());
            
        }
    }

}
