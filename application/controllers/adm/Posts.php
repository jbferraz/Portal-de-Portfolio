<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
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

        $update = $this->gn_m->update('idpost', $id, 'post', array('status' => 1));
        
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

        $delete_post = $this->gn_m->delete('idpost', $id, 'post');

        if (isset($referred_from)) 
            redirect($referred_from);
        else 
            redirect(base_url());
            
        }
    }
}
