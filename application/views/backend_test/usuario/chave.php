<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Chave</title>
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
        display: table; width: 100%; height: 30px;
        background: #f4f4f4;">
        <a href="<?php echo base_url() ?>" style="
            text-decoration: none; color: #000;">
            <!-- <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /create_post</h2> -->
            <h2 style="float: left; margin: 16px 0px 0px 27%; padding: 0;"
            >/chave</h2>
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
        </a>
        <div style="float: right; padding: 15px;">
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        </div>
    </div>

    <?php
    if ($this->session->flashdata('success_msg')) {
        ?>
        <div class="alert_true" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #006600; text-align: center; background: #b3ffb3;">
            <?php echo $this->session->flashdata('success_msg') ?>
        </div>
        <?php
    }
    if ($this->session->flashdata('error_msg')) {
        ?>
        <div class="alert_false" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #800000; text-align: center; background: #ff9999;">
            <?php echo $this->session->flashdata('error_msg') ?>
        </div>
        <?php
    }
    ?>
    
    <div class="chaves" style="
        display: table; width: 70%; margin: 50px 0 0 10vw; float: left;
        ">
        <?php if (!empty($chave)): ?>
        <?php foreach ($chave as $g): ?>
            <div class="chave" style="
                display: table; width: 70%; padding: 20px; margin: 20px auto 0;
                background: #f4f4f4;">
                <b style="font-family: monospace; font-size: 20px; margin: 3px 0 0; float: left;">
                    <a style="text-decoration: none; color: #000;"
                        href="<?php echo base_url('avaliacao?h='.$g->chave)?>"><?php echo $g->chave?></a>
                </b>
                <p style="font-family: monospace; font-size: 17px; margin: 5px 0 0; float: right;">
                    <?php echo $g->validade ?>
                </p>
            </div>
        <?php endforeach ?>
        <?php else: ?>
            <div class="chave" style="
                display: table; width: 70%; padding: 20px; margin: 20px auto 0;
                background: #f4f4f4;">
                <b style="font-family: monospace; font-size: 20px; margin: 3px 0 0; float: left;">
                    Sem chaves
                </b>
            </div>
        <?php endif ?>
    </div>
    
    <div class="menu" style="
        diaplay: table; width: 15%; height: 50px; float: left;
        margin: 60px 0 0 0;">
        <a style="display: table; padding: 18px; text-decoration: none;"
            href="<?php echo base_url('usuario') ?>">
            VOLTAR
        </a>
        <?php if ($mix['chave_count'] < 4): ?>
            <a href="<?php echo base_url('usuario/submit_chave') ?>"
                style="text-decoration: none;">                
                <div style="
                    display: table; margin: 15px 0 0; text-align: center;
                    padding: 18px; border-width: 2px; border-style: solid; 
                    background: #f4f4f4;">
                    CRIAR<br>CHAVE
                </div>
            </a>
        <?php endif ?>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
        <h4>Chave_all</h4>
        <pre>
            <?php print_r($chave_all) ?>
        </pre>
        <h4>Chave</h4>
        <pre>
            <?php print_r($chave) ?>
        </pre>
        <h4>Avalicao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
        <h4>Mix</h4>
        <pre>
            <?php print_r($mix) ?>
        </pre>
    </div>

</body>
</html>