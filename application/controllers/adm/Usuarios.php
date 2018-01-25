<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller { //ADM

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

    function delete($id) 
    {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
        $this->load->model('Usuario_model', 'ur_m');
        //$this->load->library('user_agent');
        //$u_id = $this->session->userdata('id');

        if ($this->session->userdata('referred_from')) { // Retrieve referred_from
            $referred_from = $this->session->userdata('referred_from');
            $this->session->unset_userdata('referred_from');
        }

        $delete = $this->ur_m->usuarioFullDelete($id);

        if (isset($referred_from)) 
            redirect($referred_from);
        else 
            redirect(base_url());
            
        }
    }

}
