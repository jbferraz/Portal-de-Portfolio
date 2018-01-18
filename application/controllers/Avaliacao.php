<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avaliacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        if ($this->session->userdata('type') === '0' ||   // Se logado, faz logoff
            $this->session->userdata('type') === '1') {
            redirect(base_url('home/logoff'));
        } else if ($this->session->userdata('type') === '2'){ // Login do cliente
            //echo 'type 2';
            $hash = $this->input->get('h');
            if ($hash !== $this->session->userdata('hash')) {
                //echo '<br>wrong key';
                redirect(base_url('home/logoff'));
            } else {
                // echo '<br>right key';
                $id = $this->session->userdata('id');
                $s_hash = $this->session->userdata('hash');

                $data['usuario'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');
                $data['chave'] = $this->gn_m->getGenericWhere('chave', "'".$s_hash."'", 'chave_hash', null, null)[0];

                $this->load->helper('layout'); // Carrega a view
                viewLoader('avaliacao/avaliacao', $data);
            }
        } else {
        //$this->load->model('Chave_model', 'cv_m');
        $hash = $this->input->get('h');
        $n_hash = $this->gn_m->getGenericWhere('chave', "'".$hash."'", 'chave_hash', null, null)[0];

        if ($n_hash) {
            //echo 'key exists';
            if ($n_hash->status === '0') {
                //echo '<br>key is 0';
                date_default_timezone_set('America/Sao_Paulo');
                $int_time = strtotime(date('Y-m-d').' 23:59:59');
                $n_hash->int_val = strtotime($n_hash->validade.' 23:59:59');

                if ($n_hash->int_val <= $int_time) { // Chave vencida
                    //echo '<br>outdated key';
                } else {
                    //echo '<br>right key';

                    $arraydata = array(
                        'id' => $n_hash->usuario_id,
                        'type' => '2',
                        'hash' => $n_hash->chave
                    );
                    $this->session->set_userdata($arraydata);
                    //echo var_dump($this->session->userdata());
                    if ($this->session->userdata('type') === '2')
                        redirect(base_url('avaliacao?h='.$this->session->userdata('hash')));
                }
            } else {
                //echo '<br>key already used';
            }   
        } else {
            //echo '<br>key does not exist';
        }
        redirect(base_url());
        }
    }
}
