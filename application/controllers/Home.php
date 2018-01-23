<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Generic_model', 'gn_m');
    }

	function index()
	{	
		$this->load->model('Usuario_model', 'ur_m');
		$this->load->model('Avaliacao_model', 'av_m');
		$this->load->model('Post_model', 'pt_m');
		$this->load->helper('rating');
		$this->load->helper('db_defaults');

		if ($formacao = $this->gn_m->getGeneric('formacao', 'asc', 'formacao'))
			$data['formacao'] = $formacao;
		unset($formacao);

		if ($post = $this->pt_m->getAllPost()) {
			$data['post'] = $post;
			unset($post);
			foreach ($data['post'] as $object) {
				$object->{'SUBSTRING(post.desc, 1, 100)'} = // Remove espaços
					str_replace('<br />', "", $object->{'SUBSTRING(post.desc, 1, 100)'});
				$object->desc100 = substr($object->{'SUBSTRING(post.desc, 1, 100)'}, 0, 50).'...'; 
				unset($object->{'SUBSTRING(post.desc, 1, 100)'}); // Corta descrição em 50 chars
			}
			unset($object);
			$data['post'] = array_slice($data['post'], 0, 6); // Número de post no index
		}

		if ($avaliacao = $this->av_m->getValidAvaliacao()) {
			$data['avaliacao'] = $avaliacao;
			unset($avaliacao);
			if ($topusuario = ratingMaker($data['avaliacao'], 5)) // Quantidade de top usuários
				$data['topusuario'] = $topusuario;
			unset($topusuario);
		}

		if (!isset($data['formacao'])) 
			$data['formacao'][] = d_formacao();
		if (!isset($data['avaliacao'])) 
            $data['avaliacao'][] = d_avaliacao();
		if (!isset($data['post']))
			$data['post'][] = d_post();
		if (!isset($data['topusuario']))
            $data['topusuario'][] = d_topusuario();

		$this->load->helper('layout'); // Carrega a view
        viewLoader('home/home', $data);
	}

	function login() 
	{
		$data['usuario'] = $this->gn_m->getGeneric('nome_completo', 'asc', 'usuario');

		$this->load->helper('layout'); // Carrega a view
        viewLoader('home/login', $data);
	}

	function submit()
	{
		$this->load->model('Usuario_model', 'ur_m');

		$email = $this->input->post('email');
		$senha = hash('sha512', $this->input->post('senha'));

		if ($user = $this->ur_m->userlogin($email)[0]) { // Procura usuário válido
			if ($user->senha == $senha) {
				//$this->session->set_flashdata('success_msg', 'Usuário e senha existem');
				// adm@erase.me eraseme
				
				//$this->session->set_userdata('id', $user->idusuario);
				$arraydata = array(
					'id' => $user->idusuario,
					'type' => $user->perfil_de_usuario_id,
					'nome' => $user->nome_completo
				);
				$this->session->set_userdata($arraydata);
				//echo var_dump($this->session->userdata());
				if ($this->session->userdata('type') === '0')
					redirect(base_url('usuario'));
				if ($this->session->userdata('type') === '1')
					redirect(base_url('adm/adm'));
			} else 
				$this->session->set_flashdata('error_msg', 'Senha errada');
		} else {
			$this->session->set_flashdata('error_msg', 'Usuário não existe');
		}

		redirect(base_url('home/login'));
	}

	function sobre() 
	{
		$data['usuario'] = $this->gn_m->getGeneric('nome_completo', 'asc', 'usuario');

		$this->load->helper('layout'); // Carrega a view
        viewLoader('home/sobre', $data);
	}

	function logoff() 
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('type');
		if ($this->session->userdata('name'))
			$this->session->unset_userdata('name');
		if ($this->session->userdata('hash'))
			$this->session->unset_userdata('hash');
		if ($this->session->userdata('referred_from'))
			$this->session->unset_userdata('referred_from');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}