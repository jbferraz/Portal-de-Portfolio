<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function viewLoader($url, $data) {
    // url: avaliacao/avaliacao
    $ci =& get_instance();

    if (LAYOUT == 0) // Escolhe layout
        $ci->load->view('backend_test/'.$url, $data);
    else {
        $ci->load->view('template/header');
        if (file_exists(realpath(APPPATH.'/views'.'/'.$url.'.php')))
            $ci->load->view($url, $data);
        else 
            $ci->load->view('backend_test/'.$url, $data);
        $ci->load->view('template/footer');
    }
}
