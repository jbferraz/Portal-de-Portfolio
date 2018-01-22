<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function formacao($id) 
    {
        $this->load->model('Avaliacao_model', 'av_m');
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->model('Post_model', 'pt_m');
        $this->load->helper('rating');
        $this->load->helper('db_defaults');

        if ($formacao = $this->gn_m->getGeneric('formacao', 'asc', 'formacao'))
            $data['formacao'] = $formacao;
        unset($formacao);

        if (is_int($id = (int) $id) && is_numeric($id))
        if ($avaliacao = $this->av_m->getAvaliacaoByFm($id)) {
            $data['avaliacao'] = $avaliacao;
            unset($avaliacao);
            if ($topformacao = ratingMaker($data['avaliacao'], null))
                $data['topformacao'] = $topformacao;
            unset($topformacao);
        }

        if (!isset($data['formacao'])) 
            $data['formacao'][] = d_formacao();
        if (!isset($data['avaliacao'])) 
            $data['avaliacao'][] = d_avaliacao();
        if (!isset($data['topformacao']))
            $data['topformacao'][] = d_topusuario();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('formacao/formacao', $data);
    }
}
