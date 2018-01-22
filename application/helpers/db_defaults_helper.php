<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function d_formacao()
{
    return (object) array
    (
        'idformacao' => 0,
        'formacao' => 'sem_formacao'
    );
}

function d_avaliacao()
{
    return (object) array
    (
        'avaliacoes' => 0,
        'usuario_id' => 0
    );
}

function d_topusuario()
{
    return (object) array
    (
        'idusuario' => 0,
        'nome_completo' => 'sem_usuario',
        'email' => 'sem@usuario.mesmo',
        'celular' => '51900000000',
        'sexo' => 'OUTRO',
        'data_nasc' => '0000-00-00',
        'linkedin' => 'sem_usuario',
        'facebook' => 'sem_usuario',
        'instagram' => 'sem_usuario',
        'senha' => 'sem_senha',
        'desc' => 'Este usuário não existe',
        'status' => 0,
        'formacao_curso_id' => 0,
        'cidade_id' => 0,
        'idestado' => 0,
        'perfil_de_usuario_id' => 0,
        'nome_cidade' => 'sem_cidade',
        'sigla_estado' => 'no_e',
        'formacao' => 'sem_usuario',
        'rate' => 0,
        'foto' => 'img/default_img.png'
    );
}

function d_post() 
{
    return  (object) array
    (
        'idpost' => 0,
        'foto' => 'img/default_img.png',
        'data_cadastro' => '0000-00-00 00:00:00',
        'data_alteracao' => '0000-00-00 00:00:00',
        'titulo' => 'sem_post',
        'status' => 0,
        'status_adm' => 0,
        'usuario_id' => 0,
        'desc' => 'Este post não existe.',
        'fulldesc' => 'Este post não existe.',
        'desc100' => 'Este post não existe....',
        'nome_completo' => 'sem_usuario'
    );
}

function d_estado()
{
    return (object) array
    (
        'idestado' => 0,
        'nome_estado' => 'sem_estado',
        'sigla_estado' => 'no_e',
    );
}