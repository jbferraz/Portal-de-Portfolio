<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formacao extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
          $Formacao = $this->gn_m->getGeneric('idformacao', 'asc', 'formacao');
          echo "<pre>";
          echo print_r($Formacao);
         //  $this->load->view('adm/formacao/formacao', $data);
    }
    function dedo()
    {
   $data['formacao'] = $this->gn_m->getGeneric('idformacao', 'asc', 'formacao');
   echo "<pre>";
       //    echo print_r($data['formacao']);
    $this->load->view('adm/formacao/formacao', $data);
    }
    function add()
    {
         $Formacao = $this->gn_m->getGeneric('idformacao', 'asc', 'formacao');
         
          $ci =& get_instance();
          $fields = array
                  
                   (
              'formacao' => $this->input->post('formacao')
              );
           $this->gn_m->submit('formacao', $fields);
           redirect(base_url('adm/formacao/formacao/'));
           
           
           
    }
    function delete($id){
        if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
           $Formacao = $this->gn_m->delete('idformacao', $id, 'formacao');
            $u_id = $this->session->userdata('id');
            redirect(base_url('adm/formacao/formacao/'));
            
        
            }
    }
    function editar($id){
        if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
            $dataFormacao = $this->input->post('formacao'); 
            $Formacao = $this->gn_m->update('idformacao', $id, 'formacao', array('formacao' => $dataFormacao ) );
            redirect(base_url('adm/formacao/formacao/'));
            
        }
        
    }
            
    function formacao(){
        $data['Formacao'] = $this->gn_m->getGeneric('idformacao', 'asc', 'formacao');
            $u_id = $this->session->userdata('id');
           // $old_post = $this->pt_m->getPostByPostId($id);
//            foreach ($data['Formacao'] as $g){
//                echo "$g->idformacao $g->formacao";
//                echo "<a href=". base_url('adm/formacao/delete/'.$g->idformacao)  .">  Deletar 
//                    </a>
//                    
//<br>";  
//            }
            $this->load->view('template/header');
            $this->load->view('adm/formacao/formacao', $data);
            $this->load->view('template/footer');
          //  $this->load->view('adm/formacao/formacao', $data);
    }
    }