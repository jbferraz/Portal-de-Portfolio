<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        $this->load->helper('db_defaults');
        
        //* Não é nescessário
        $data['hash'] = $this->gn_m->getGeneric('idchave', 'asc', 'chave_hash');
        $data['avaliacao'] = $this->gn_m->getGeneric('usuario_id', 'asc', 'avaliacoes');
        //*/

        if ($usuario = $this->gn_m->getGeneric('nome_completo', 'asc', 'usuario'))
            $data['usuario'] = $usuario;
        unset($usuario);

        if ($formacao = $this->gn_m->getGeneric('formacao', 'asc', 'formacao'))
            $data['formacao'] = $formacao;
        unset($formacao);

        if ($estado = $this->gn_m->getGeneric('nome_estado', 'asc', 'estado'))
            $data['estado'] = $estado;
        unset($estado);

        if (!isset($data['usuario']))
            $data['usuario'][] = d_topusuario();
        if (!isset($data['formacao'])) 
            $data['formacao'][] = d_formacao();
        if (!isset($data['estado'])) 
            $data['estado'][] = d_estado();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('cadastro/cadastro', $data, 'cadastro');
    }

    function submit()
	{
        $this->load->helper('duplicated');
        $usuario = $this->gn_m->getGeneric('nome_completo', 'asc', 'usuario');
        
        $fields = getPostCadastro(1, 0);
        $fields['senha'] = hash('sha512', $fields['senha']);
        unset($fields['senhan']);
        unset($fields['senhan2']);

        if ($fields['cidade_id'] == null) {
            $this->session->set_flashdata('error_msg', 'Cidade não selecionada');
            redirect(base_url('cadastro'));
        }
        $fields['desc'] = htmlspecialchars($fields['desc'], ENT_QUOTES);
        $fields['desc'] = nl2br($fields['desc']);
        
        $test = duplicatedUsuario($usuario, $fields, null);
        // Senha existe no post
        if ($fields['senha'] != hash('sha512', $this->input->post('senha2'))) {
            $this->session->set_flashdata('error_msg', 'Senhas não coincidem');
            redirect(base_url('cadastro'));
        }
        else if ($test) 
            $this->session->set_flashdata('error_msg', 'Cadastro já existe');
            else if ($result = $this->gn_m->submit('usuario', $fields)) {
                // Cria uma avaliação (3,0) com o celular dele.
                try {
                    $n_user = $this->gn_m->
                        getGenericWhere('celular', $fields['celular'], 'usuario', null, null)[0];
                    $c_hash = 
                        getHash($fields['celular'], 0, $n_user->idusuario); // status (0)
                    $hash = $this->gn_m->
                        submit('chave_hash', $c_hash);
                    $n_hash = $this->gn_m->
                        getGenericWhere('chave', "'".$c_hash['chave']."'", 'chave_hash', null, null)[0];
                    $c_rate = 
                        getAvaliacao($n_hash->idchave, $n_user->celular, 3, 1, $n_user->idusuario); // rate, status
                    $rate = $this->gn_m->
                        submit('avaliacoes', $c_rate);
                } catch (Exception $e) {
                    // Will not work!
                    $this->session->set_flashdata('error_msg', 'Erro ao cadastrar usuário');
                    $this->gn_m->delete('idusuario', $n_user->idusuario, 'usuario');
                    redirect(base_url('cadastro'));
                }
                $this->session->set_flashdata('success_msg', 'Cadastro inserido com sucesso');
                //echo "it's true";
            } else {
                $this->session->set_flashdata('error_msg', 'Erro ao inserir');
                //echo "it's false";
            }
        redirect(base_url('cadastro'));
	}

    /* //Ajax
    function formAjax($id) 
    {     
        $result = $this->db->where("estado_id", $id)->get("cidade")->result();
        //echo json_encode($result);
    } */
}
