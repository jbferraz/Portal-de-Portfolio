<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Post</title>
    <link rel="stylesheet" type="text/css" 
        href="<?php echo base_url() ?>"/>
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="topo" style="
        display: table; width: 100%; height: 30px; float: left;
        background: #f4f4f4">
        <a href="<?php echo base_url() ?>" style="
            text-decoration: none; color: #000;">
            <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /post</h2>
        </a>
        <div style="float: right; padding: 15px;">
        <?php if ($this->session->userdata('type') === '0'): ?>
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        <?php else: ?>
            <a href="<?php echo base_url('cadastro') ?>">cadastrar-se</a>&nbsp;
            <a href="<?php echo base_url('home/login') ?>">login</a>
        <?php endif ?>
        </div>
    </div>

    <div class="posts" style="
        display: table; width: 70%; height: 700px; margin: 0 0 0 10vw; float: left;
        ">
        <h3 style="display: table; margin: 30px auto 0;">
            <?php echo $usuario->nome_completo.'&emsp;'.$usuario->nome_cidade.' – ' ?>
            <?php echo $usuario->sigla_estado.'&emsp;'.$usuario->formacao ?>
        </h3>
        <div class="img_cell" style="
            display: block; width: 70%; padding: 20px; margin: 40px auto 0;
            border-width: 2px; border-style: solid; background: #f4f4f4;">
            <div style="width: 100%; max-height: 350px; overflow: hidden;">
                <img style="width: 100%; position: relative; top: -4vw;"
                    src="<?php echo base_url($post->foto) ?>" 
                    alt="Foto do post">
            </div>           
        </div>
        <h1 style="display: table; padding: 40px 0 0; font-size: 45px; margin: auto;">
            <?php echo strtoupper($post->titulo)?>
        </h1>
        <h2 style="display: table; padding: 0; margin: auto;">
            [<?php echo $post->data_alteracao ?>]
        </h2>
        <p style="
            display: table; width: 80%; padding: 30px; text-align: justify; 
            font-size: 18px; margin: auto;">
            <?php for ($i = 0; $i < 100; $i++) echo $post->desc.' ' ?>
        </p>
    </div>

    <div class="menu" style="
        diaplay: table; width: 15%; height: 50px; float: left;
        margin: 60px 0 0 0;">
        <?php if ($this->session->userdata('type') === '0' && 
            $post->usuario_id == $this->session->userdata('id')): ?>
            <a style="display: table;  text-decoration: none;"
                href="<?php echo base_url('home') ?>">
                <button class="btn btn-info  ">Voltar</button>
            </a>
        <br>
            <a href="<?php echo base_url('usuario/edit_post/'.$post->idpost) ?>"
                style="text-decoration: none;">                
                <button class="btn btn-info  ">Editar<br>Post</button>
                </a>
                </div>
           
        <?php else: ?>
            <a style="display: table; padding: 18px; text-decoration: none;"
                href="<?php echo base_url('home') ?>"><button class="btn btn-info  ">Voltar</button>
               
            </a>
        <?php endif ?>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Post</h4>
        <pre>
            <?php print_r($post) ?>
        </pre>
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
    </div>

</body>
</html>