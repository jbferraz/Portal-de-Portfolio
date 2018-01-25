<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function viewLoader($url, $data, $script = FALSE) {
    // url: avaliacao/avaliacao
    $ci =& get_instance();

    $title = substr($url, mb_strrpos($url, '/')+1); //  mb_strrpos() = last | mb_strpos() = first
    if (!isset($data['mix'])) 
        $data['mix'] = new stdClass();
    $data['mix']->title = $title;
    $data['mix']->title_upper = mb_strtoupper(mb_substr($title, 0, 1)).mb_substr($title, 1);
    $data['mix']->font_family = "Helvetica, Arial, Sans-Serif";
    unset($title);

    if (LAYOUT == 0) { // Escolhe layout
        if (BE_DEBUG == 1) {
            $data['data'] = $data;
            $ci->load->view('backend_test/template/header_up', $data);
            if ($script) 
                $ci->load->view('backend_test/template/scripts/'.$script);
            $ci->load->view('backend_test/template/header_down');
            $ci->load->view('backend_test/'.$url);
            $ci->load->view('backend_test/template/debug');
            $ci->load->view('backend_test/template/footer');
        } else {
            $ci->load->view('backend_test/template/header_up', $data);
            if ($script) 
                $ci->load->view('backend_test/template/scripts/'.$script);
            $ci->load->view('backend_test/template/header_down');
            $ci->load->view('backend_test/'.$url);
            $ci->load->view('backend_test/template/footer');
        }
    } else {
        $ci->load->view('template/header', $data);
        if (file_exists(realpath(APPPATH.'/views'.'/'.$url.'.php')))
            $ci->load->view($url);
        else 
            $ci->load->view('backend_test/'.$url);
        $ci->load->view('template/footer');
    }
}
