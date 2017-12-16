<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Formacao</title>
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
            >Portal de Portfólio /formacao</h2>
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

    <div class="menu" style="
        display: table; width: 20%; float: left; 
        ">
        <div style="padding: 20px;">
            <?php foreach ($formacao as $g): ?>
            <p>
                <a href="<?php echo base_url('formacao/'.$g->idformacao) ?>"
                ><?php echo $g->formacao ?></a>
            </p>
            <?php endforeach ?>
        </div>
    </div>

    <div class="users" style="
        display: table; width: 80%; float: left;
        ">
        <div style="padding: 20px; display: table; width: 95%;">
            <?php foreach ($topformacao as $g): ?>
            <a href="<?php echo base_url('usuario_home/'.$g->idusuario) ?>"
                style="color: #000; text-decoration: none;">
                <div class="outer_cell" style="
                    display: table; width: 25%; min-width: 170px; height: 220px; float: left; 
                    margin: 0 44px 40px 20px; text-align: center; 
                    ">
                    <div class="inner_cell" style="
                        display: table; width: 100%; padding: 20px; 
                        border-width: 2px; border-style: solid; background: #f4f4f4;">
                        <img src="<?php echo base_url('img/user_img.jpg') ?>" 
                            alt="Foto do usuário" style="width: 100%;"> 
                    </div>
                    <h3 style="padding: 0; margin: 0 0 0 44px;">
                        <?php echo $g->nome_completo.' ['.$g->rate.']' ?>
                    </h3>
                    <h6 style="padding: 0; margin: 0 0 0 44px;">
                        <?php echo $g->nome_cidade.' – '.$g->sigla_estado ?>
                    </h6>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Formacao</h4>
        <pre>
            <?php print_r($formacao) ?>
        </pre>
        <h4>Avaliacao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
        <h4>Top Formacao</h4>
        <pre>
            <?php print_r($topformacao) ?>
        </pre>
    </div>

</body>
</html>