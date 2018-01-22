<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generic_model', 'gn_m');
    }

    function index() 
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $id = $this->session->userdata('id');
        $this->load->model('Usuario_model', 'ur_m');
		$this->load->model('Avaliacao_model', 'av_m');
		$this->load->model('Post_model', 'pt_m');
        $this->load->helper('rating');
        $this->load->helper('db_defaults');
        
        if (is_int($id = (int) $id) && is_numeric($id)) // Testa se id é um número válido
        if ($avaliacao = $this->av_m->getAvaliacaoById($id)) {
            $data['avaliacao'] = $avaliacao;
            unset($avaliacao);
            
            if ($topusuario = ratingMaker($data['avaliacao'], null)[0]) {
                $data['topusuario'] = $topusuario;
                unset($topusuario);

                if ($data['topusuario']->linkedin == null) 
                    unset($data['topusuario']->linkedin);
                if ($data['topusuario']->facebook == null) 
                    unset($data['topusuario']->facebook);
                if ($data['topusuario']->instagram == null)
                    unset($data['topusuario']->instagram);

                if ($post = $this->pt_m->getAllPostById($id)) {
                    $data['postone'] = $post[0];
                    $data['postone']->fulldesc = // Pega a descrição completa do post e remove o preview
                        $this->pt_m->getPostDesc($data['postone']->idpost)[0]->desc;
                    unset($data['postone']->{'SUBSTRING(post.desc, 1, 100)'});
                    
                    if (count($post) > 1) {
                        $data['post'] = array_slice($post, 1);
                        foreach ($data['post'] as $object) {
                            $object->desc100 = $object->{'SUBSTRING(post.desc, 1, 100)'}.'...';
                            unset($object->{'SUBSTRING(post.desc, 1, 100)'});
                        }
                        unset($object);
                    }
                    unset($post);
                }
            }
        }

        if (!isset($data['avaliacao'])) 
            $data['avaliacao'][] = d_avaliacao();
        if (!isset($data['topusuario'])) 
            $data['topusuario'] = d_topusuario();
        if (!isset($data['postone']))
            $data['postone'] = d_post();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('usuario/usuario', $data);
        }
    }

    function edit() 
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->helper('db_defaults');

        if ($usuario = $this->ur_m->getAllUsuarioById((int) $this->session->userdata('id'))[0]) {
            $data['usuario'] = $usuario;
            $data['usuario']->desc = str_replace('<br />', "", $data['usuario']->desc);
            // Remove o <br /> para o formulário
        }
        unset($usuario);

        if ($estado = $this->gn_m->getGeneric('nome_estado', 'asc', 'estado'))
            $data['estado'] = $estado;
        unset($estado);

        if ($formacao = $this->gn_m->getGeneric('formacao', 'asc', 'formacao'))
            $data['formacao'] = $formacao;
        unset($formacao);

        if (!isset($data['usuario'])) 
            $data['usuario'] = d_topusuario();
        if (!isset($data['estado'])) 
            $data['estado'][] = d_estado();
        if (!isset($data['formacao'])) 
            $data['formacao'][] = d_formacao();

        $this->load->helper('layout'); // Carrega a view
        viewLoader('usuario/edit', $data);
        }
    }

    function update()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $this->load->model('Usuario_model', 'ur_m');
        $this->load->helper('duplicated');
        $usuarios = $this->gn_m->getGeneric('nome_completo', 'asc', 'usuario');
        $id = $this->session->userdata('id');
        
        $fields = getPostCadastro(1, 0); //status, perfil_de_usuario_id

        if (
            $fields['senha'] != null &&
            $fields['senhan'] != null &&
            $fields['senhan2'] != null
        ) {
            $fields['senha'] = hash('sha512', $fields['senha']);
            $fields['senhan'] = hash('sha512', $fields['senhan']);
            $fields['senhan2'] = hash('sha512', $fields['senhan2']);

            $usuario = $this->ur_m->getUsuarioPass($id)[0];
            if ($usuario->senha == $fields['senha']) {
                if ($fields['senhan'] == $fields['senhan2']) 
                    $fields['senha'] = $fields['senhan']; 
                else {
                    $this->session->set_flashdata('error_msg', 'Senhas não coincidem');
                    redirect(base_url('usuario/edit'));
                }
            } else { 
                $this->session->set_flashdata('error_msg', 'Senha errada');
                redirect(base_url('usuario/edit'));
            }
        } else 
            unset($fields['senha']);

        unset($fields['senhan']);
        unset($fields['senhan2']);
        
        if ($fields['cidade_id'] == null) {
            $this->session->set_flashdata('error_msg', 'Cidade não selecionada');
            redirect(base_url('usuario/edit'));
        }
        $fields['desc'] = htmlspecialchars($fields['desc'], ENT_QUOTES);
        $fields['desc'] = nl2br($fields['desc']);
        
        //$fields = array_filter($fields);
        $test = duplicatedUsuario($usuarios, $fields, $id);

        if ($test) 
            $this->session->set_flashdata('error_msg', 'Cadastro já existe');
            else {
                $result = $this->gn_m->update('idusuario', $id, 'usuario', $fields);
                if ($result) {
                    $this->session->set_flashdata('success_msg', 'Cadastro atualizado com sucesso');
                    $this->session->set_userdata('nome', $fields['nome_completo']);
                    //echo "it's true";
                } else {
                    $this->session->set_flashdata('error_msg', 'Nada foi mudado');
                    //echo "it's false";
                }
            }
        redirect(base_url('usuario/edit'));    
        }
    }

    //view post was leaking.... -----------------------------!!!-----------------------------
    function delete()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
            $this->load->model('Usuario_model', 'ur_m');
            $id = $this->session->userdata('id');

            $this->session->unset_userdata('id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('name');
            //$this->session->sess_destroy();

            if ($delete = $this->ur_m->editUsuarioDelete($id)) {
                $this->session->set_flashdata('success_msg', 'Usuário excluído com sucesso');
            } else {
                $this->session->set_flashdata('error_msg', 'Erro ao excluir usuário');
            }
            //echo $delete;
            redirect(base_url('home/login'));
        }
    }

    function create_post()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
            $id = $this->session->userdata('id');
            $data['usuario'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');

            $this->load->helper('layout'); // Carrega a view
            viewLoader('usuario/create_post', $data);
        }
    }

    function submit_post()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $this->load->helper('duplicated');
        $id = $this->session->userdata('id');
        $data['usuario'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');

        $config = getUploadConfig($data['usuario']->celular); //Foto config
        $this->load->library('upload', $config);

        $fields = getPostPost($config['file_name'], $data['usuario']->idusuario, 0); //Post Post (status)
        $fields['desc'] = htmlspecialchars($fields['desc'], ENT_QUOTES);
        $fields['desc'] = nl2br($fields['desc']);

        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('error_msg', 'Erro ao enviar foto');
            //$this->upload->display_errors()
        } else {
            $foto_data = $this->upload->data();
            $fields['foto'] = $fields['foto'].$foto_data['file_ext'];

            if ($result = $this->gn_m->submit('post', $fields)) {
                $this->session->set_flashdata('success_msg', 'Post pendente criado com sucesso');
                $this->session->set_flashdata('foto_data', $foto_data); //debug
            } else 
                $this->session->set_flashdata('error_msg', 'Erro ao criar post');
        }
        redirect(base_url('usuario/create_post'));
        }
    }

    function edit_post($id) 
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
            $this->load->model('Post_model', 'pt_m');
            $u_id = $this->session->userdata('id');

            $data['usuario'] = $this->gn_m->getGenericById('idusuario', $u_id, 'usuario');
            $data['post'] = $this->pt_m->getPostByPostId($id);
            $data['post']->desc = str_replace('<br />', "", $data['post']->desc);
            // Remove o <br /> para o formulário

            if ($u_id === $data['post']->usuario_id) { // Testa se usuário corresponde

                $this->load->helper('layout'); // Carrega a view
                viewLoader('usuario/edit_post', $data);
            } else {
                //echo $u_id.'<br>'.$data['post']->usuario_id;
                redirect(base_url('usuario')); // Post não pertence ao usuário
            }
        } else
            redirect(base_url('usuario')); 
    }

    function update_post()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
        $this->load->model('Post_model', 'pt_m');
        $this->load->helper('duplicated');
        $u_id = $this->session->userdata('id');
        $id = $this->input->post('id');
        $upload = true;

        $usuario = $this->gn_m->getGenericById('idusuario', $u_id, 'usuario');
        $old_post = $this->pt_m->getPostByPostId($id);

        if ($u_id === $old_post->usuario_id) { // Testa se usuário corresponde
            if (!empty($_FILES['foto']['name'])) {
                $config = getUploadConfig($usuario->celular); //Foto config
                $config['file_name'] = substr($old_post->foto, 4, -4); // Cut img/ (folder)
                $old_ext = substr($old_post->foto, -4);
                $this->load->library('upload', $config);

                if ($upload = !$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error_msg', 'Erro ao enviar foto');
                    redirect(base_url('usuario/edit_post/'.$id));
                } else {
                    $foto_data = $this->upload->data();
                    $foto = substr($old_post->foto, 0, -4).$foto_data['file_ext']; // Cut/edit ext
                    if ($old_ext != $foto_data['file_ext']) {
                        unlink($old_post->foto); // Deleta foto antiga se ext for diferente
                    }
                    $this->session->set_flashdata('foto_data', $foto_data); //debug
                }
            }

            $fields = getPostPost($config['file_name'], $usuario->idusuario, 0); //Post Post (status)
            if ($upload) // Se deu erro no upload 
                unset($fields['foto']);
            else {
                $fields['foto'] = $foto;
                unset($foto);
            }
            unset($fields['data_cadastro']);

            $fields['desc'] = htmlspecialchars($fields['desc'], ENT_QUOTES);
            $fields['desc'] = nl2br($fields['desc']);

            if ($result = $this->gn_m->update('idpost', $id, 'post', $fields)) {
                $this->session->set_flashdata('success_msg', 'Post pendente editado com sucesso');
            } else 
                $this->session->set_flashdata('error_msg', 'Erro ao editar post');
            
            redirect(base_url('usuario/edit_post/'.$id));
        }
        }
    }

    function delete_post($id) // Por enquanto o usuário pode excluír o próprio post!!!!!!!!!!
    {
        if ($this->session->userdata('type') !== '0')
        redirect(base_url());
        else if (is_int($id = (int) $id) && is_numeric($id)) { // Testa se id é um número válido
            $this->load->model('Post_model', 'pt_m');
            $u_id = $this->session->userdata('id');
            $old_post = $this->pt_m->getPostByPostId($id);

            if ($u_id === $old_post->usuario_id) { // Testa se usuário corresponde
                if ($delete = $this->gn_m->delete('idpost', $id, 'post')) {
                    $this->session->set_flashdata('success_msg', 'Post excluído com sucesso');
                    unlink($old_post->foto); // Deleta a foto do post deletado
                } else {
                    $this->session->set_flashdata('error_msg', 'Erro ao excluir post');
                }
            } else 
                $this->session->set_flashdata('error_msg', 'Post não corresponde');
        }
        redirect(base_url('usuario'));
    }

    function chave()
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
            $this->load->model('Chave_model', 'cv_m');
            $id = $this->session->userdata('id');
            $data['usuario'] = $this->gn_m->getGenericById('idusuario', $id, 'usuario');
            $data['chave_all'] = $this->gn_m->getGenericWhere('usuario_id', $id, 'chave_hash', null, null);
            $data['chave'] = $this->cv_m->getValidChaveById($id);
            $data['avaliacao'] = $this->gn_m->getGenericWhere('usuario_id', $id, 'avaliacoes', 'data_avaliacoes', 'desc');
            
            date_default_timezone_set('America/Sao_Paulo');
            $int_time = strtotime(date('Y-m-d H:i:s'));
            //$g->int_val2 = $g->validade.' 23:59:59'; // +Dois dias completos
            //$g->int_now2 = date('Y-m-d').' 23:59:59';

            if (!empty($data['chave'])) {
                foreach ($data['chave'] as $key => $g) {
                    $g->int_val = strtotime($g->validade.' 23:59:59'); // +Dois dias completos
                    //echo $g->int_val.' '.$int_time.'<br>';
                    if ($g->int_val <= $int_time) // Remove as chaves vencidas
                        unset($data['chave'][$key]);
                }
            }

            $data['mix']['chave_count'] = count($data['chave']);

            $this->load->helper('layout'); // Carrega a view
            viewLoader('usuario/chave', $data);
        }
    }

    function submit_chave() 
    {
        if ($this->session->userdata('type') !== '0')
            redirect(base_url());
        else {
            $this->load->model('Chave_model', 'cv_m');
            $this->load->helper('duplicated');
            $id = $this->session->userdata('id');
            $usuario = $this->gn_m->getGenericById('idusuario', $id, 'usuario');
            $chave = $this->cv_m->getValidChaveById($id);
            
            date_default_timezone_set('America/Sao_Paulo');
            $int_time = strtotime(date('Y-m-d H:i:s'));

            if (!empty($chave)) {
                foreach ($chave as $key => $g) {
                    $g->int_val = strtotime($g->validade.' 23:59:59'); // +Dois dias completos
                    if ($g->int_val <= $int_time) // Remove as chaves vencidas
                        unset($chave[$key]);
                }
            }
            
            if (count($chave) < 4) { // Até 4 chaves
                $c_hash = getHash($usuario->celular, 0, $id); // status (0)
                if ($hash = $this->gn_m->submit('chave_hash', $c_hash)) {
                    //$this->session->set_flashdata('success_msg', 'Nova chave criada');
                } else {
                    $this->session->set_flashdata('error_msg', 'Erro ao criar chave');
                }
            } else 
                $this->session->set_flashdata('error_msg', 'Máximo de 4 chaves pendentes');

            redirect(base_url('usuario/chave'));
        }
    }
}
