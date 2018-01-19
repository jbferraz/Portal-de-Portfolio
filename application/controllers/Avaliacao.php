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
        } else if ($this->session->userdata('type') === '2') { // Login do cliente
            //echo 'type 2';
            $hash = $this->input->get('h');
            if ($hash !== $this->session->userdata('hash')) {
                //echo '<br>wrong key';
                redirect(base_url('home/logoff'));
            } else {
                // echo '<br>right key';
                $this->load->model('Usuario_model', 'ur_m');
                $id = $this->session->userdata('id');
                $s_hash = $this->session->userdata('hash');

                //$data['usuario'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');
                $data['usuario'] = $this->ur_m->getAllUsuarioById($id)[0];
                $data['usuario']->nome_completo = 
                    mb_strtoupper($data['usuario']->nome_completo);
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
            $rate = $this->gn_m->getGenericWhere('chave_hash_id', $n_hash->idchave, 'avaliacoes', null, null)[0];
            if (!$rate) {
                //echo '<br>key is 0';
                date_default_timezone_set('America/Sao_Paulo');
                $int_time = strtotime(date('Y-m-d H:i:s'));
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

    function submit() 
    {
        if ($this->session->userdata('type') !== '2') 
            redirect(base_url('home/logoff'));
        else if (!empty($data['mix']['rate'] = $this->input->post('rate')) &&      // Só carrega a página
                !empty($data['mix']['celular'] = $this->input->post('celular'))) { // se tiver post
            $this->load->model('Chave_model', 'cv_m');
            $id = $this->session->userdata('id');
            $hash = $this->session->userdata('hash');
            //$data['mix']['rate'] = $this->input->post('rate');
            //$data['mix']['celular'] = $this->input->post('celular');
            
            $data['chave'] = $this->gn_m->getGenericWhere('chave', "'".$hash."'", 'chave_hash', null, null)[0];
            if ($data['chave']) {
                //echo 'found key';
                $avaliacao = 
                    $this->gn_m->getGenericWhere('chave_hash_id', $data['chave']->idchave, 'avaliacoes', null, null)[0];
                if (!$avaliacao) {
                    //echo '<br>empty rate key';
                    $celular = 
                        $this->gn_m->getGenericWhere('celular_cliente', $data['mix']['celular'], 'avaliacoes', null, null)[0];
                    if (!$celular) {
                        //echo '<br>new phone';
                        $this->load->helper('duplicated');
                        $c_rate = // !!! --- Não testa se celular é número --- !!!
                            getAvaliacao($data['chave']->idchave, $data['mix']['celular'], $data['mix']['rate'], 0, $data['chave']->usuario_id);
                        //$rate = true;
                        $rate = $this->gn_m->submit('avaliacoes', $c_rate);
                        if ($rate) {
                            $this->load->model('Usuario_model', 'ur_m');
                            $data['usuario'] = $this->ur_m->getAllUsuarioById($id)[0];
                            $data['usuario']->nome_completo = 
                                mb_strtoupper($data['usuario']->nome_completo);

                            $this->session->unset_userdata('id'); // End session
                            $this->session->unset_userdata('type');
                            $this->session->unset_userdata('hash');
                            $this->session->sess_destroy();

                            $this->load->helper('layout'); // Carrega a view
                            viewLoader('avaliacao/submit', $data);
                        } else {
                            //echo '<br>rate error';
                            $this->session->set_flashdata('error_msg', 'Erro ao enviar avaliação');
                            redirect(base_url('avaliacao?h='.$hash));
                        }
                    } else {
                        //echo '<br>phone already exists';
                        $this->session->set_flashdata('error_msg', 'Número de celular já usado');
                        redirect(base_url('avaliacao?h='.$hash));
                    }
                } else {
                    //echo '<br>rate conflict';
                    //$this->session->set_flashdata('error_msg', 'Usuário já foi avaliado por esse link');
                    redirect(base_url('home/logoff'));
                } 
            } else {
                //echo '<br>key does not exists';
                redirect(base_url('home/logoff'));
            }
        } else
            redirect(base_url('home/logoff'));
    }
}
