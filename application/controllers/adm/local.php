<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class local extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            $Estado = $this->gn_m->getGeneric('idestado', 'asc', 'estado');
            echo "<pre>";
            echo print_r($Estado);
            //  $this->load->view('adm/formacao/formacao', $data);
        }
    }

    function pag() {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            $data['Estado'] = $this->gn_m->getGeneric('idestado', 'asc', 'estado');
            $u_id = $this->session->userdata('id');
            // $old_post = $this->pt_m->getPostByPostId($id);
            foreach ($data['Estado'] as $g) {
                echo "$g->idestado $g->nome_estado";
                echo "<a href=" . base_url('adm/local/delete/' . $g->idestado) . ">  Deletar 
                    </a>
                    
<br>";
            }
            $this->load->view('adm/local/estado', $data);

            //  $this->load->view('adm/formacao/formacao', $data);
        }
    }

    function add() {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            $Estado = $this->gn_m->getGeneric('idestado', 'asc', 'estado');

            $ci = & get_instance();
            $fields = array
                (
                'nome_estado' => $this->input->post('estado')
                    
            );
            $this->gn_m->submit('estado', $fields);
            
            $Estadoo = $this->gn_m->getGenericWhere('nome_estado', "'".$fields['nome_estado']."'", 'estado', null, null)[0];
            redirect(base_url('adm/local/pag2/'.$Estadoo->idestado));
        }
    }

    function delete($id) {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
                $Estado = $this->gn_m->delete('idestado', $id, 'estado');
                $u_id = $this->session->userdata('id');
                redirect(base_url('adm/local/pag/'));
            }
        }
    }

    function editar($id) {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
                $dataEstado = $this->input->post('estado');
                $Estado = $this->gn_m->update('idestado', $id, 'estado', array('nome_estado' => $dataEstado));
                redirect(base_url('adm/local/pag/'));
            }
        }
    }

    function pag2($id) {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            $data['cidade'] = $this->gn_m-> getGenericWhere('estado_id', $id, "cidade", null, null);
            $data['idestado'] = $id;
                  //  getGeneric('idcidade', 'asc', 'cidade');
           

         
            //redirect(base_url('local/pag/'));
            if (!empty($data['cidade'])) {
            foreach ($data['cidade'] as $g) {
                echo "Estado_id:$g->estado_id idcidade:$g->idcidade nome_cidade: $g->nome_cidade";
                echo "<a href=" . base_url('adm/local/deletec/' . $g->idcidade) . ">  Deletar 
                    </a>
                    
<br>";
            }}

            $this->load->view('adm/local/cidade', $data);
            
            
            
        }
    }

    function addc() {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            $Cidade = $this->gn_m->getGeneric('idcidade', 'asc', 'cidade');

            $ci = & get_instance();
            $fields = array
                (
                'nome_cidade' => $this->input->post('cidade'),
                     'estado_id' => $this->input->post('idestado')
            );
            $this->gn_m->submit('cidade', $fields);
             redirect(base_url('adm/local/pag2/'.$this->input->post('idestado')));
        }
    }

    function deletec($id) {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
                $data['cidade'] = $this->gn_m->getGenericWhere('idcidade', $id, 'cidade', null, null)[0];
                $Cidade = $this->gn_m->delete('idcidade', $id, 'cidade');
                
                $u_id = $this->session->userdata('id');
                redirect(base_url('adm/local/pag2/'.$data['cidade']->estado_id ));
            }
        }
    }

    function editarc($id) {
        if ($this->session->userdata('type') !== '1')
            redirect(base_url());
        else {
            if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
                $dataCidade = $this->input->post('cidade');
               $data['cidade'] = $this->gn_m-> getGenericWhere('idcidade', $id, 'cidade', null, null)[0];
                $Cidade = $this->gn_m->update('idcidade', $id, 'cidade', array('nome_cidade' => $dataCidade));
                redirect(base_url('adm/local/pag2/'.$data['cidade']->estado_id ));
            }
        }
    }

}
