<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function ajaxCidade($id) 
    {     
        $result = $this->db->where("estado_id", $id)->get("cidade")->result();
        echo json_encode($result);
    }
}
