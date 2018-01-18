<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Home</title>
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
            <!-- <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /home</h2> -->
            <h2 style="float: left; margin: 16px 0px 0px 27%; padding: 0;"
            >/home</h2>
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
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

    <div class="posts" style="
        display: table; width: 66%; float: left; 
        ">
        <div style="padding: 20px; width: 95%; display: table;">
            <?php foreach ($post as $g): ?>
            <a href="<?php echo base_url('post/'.$g->idpost) ?>"
                style="color: #000; text-decoration: none;">
                <div class="posts_cell" style="
                    display: block; width: 25%; min-width: 170px; height: 17.35vw; min-height: 240px; float: left; 
                    padding: 20px; margin: 0 0 20px 20px; background: #f4f4f4; 
                    border-width: 2px; border-style: solid;">
                    <div style="
                        display: block; width: 100%; max-height: 10.7vw; overflow: hidden; 
                        min-height: 10.7vw;">
                        <img src="<?php echo base_url($g->foto) ?>"
                            alt="Foto do post" style="
                                width: 140%; position: relative; top: -0.7vw; left: -2.5vw;"> 
                    </div>
                    <h4 style="padding: 0; margin: 10px 0 0;">
                        <div style="display block; max-width: 60%; 
                            max-height: 1em; float: left; overflow:hidden; word-break: break-all;">
                            <?php echo $g->titulo ?>
                        </div>
                        <div style="float: right;">
                            <?php echo '['.date('Y-m-d', strtotime($g->data_alteracao)).']' ?>
                        </div>
                    </h4>
                    <h5 style="display: block; width: 100%; padding: 0; margin: 3px 0 0;
                        max-height: 1em; overflow:hidden; word-break: break-all;">
                        <?php echo $g->nome_completo ?>
                    </h5>
                    <p style="display: block; padding: 0; margin: 12px 0 0;
                        max-height: 2.5em; overflow:hidden; word-break: break-all;">
                        <?php echo $g->desc100 ?>
                    </p>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>

    <div class="rating" style="
        display: table; width: 14%; float: left; 
        ">
        <div style="padding: 20px;">
        <?php foreach ($topusuario as $g): ?>
        <a href="<?php echo base_url('usuario_home/'.$g->idusuario) ?>" style="
            text-decoration: none; overflow: scroll;">
            <h4 style="margin: 0 0 3px 0; padding: 0;">
                <?php echo $g->nome_completo.' ['.$g->rate.']' ?>
            </h4>
        </a>
        <h5 style="margin: 0 0 3px 0; padding: 0;">
            <?php echo $g->formacao ?>
        </h5>
        <h6 style="margin: 0; padding: 0;">
            <?php echo $g->nome_cidade.' – '.$g->sigla_estado ?>
        </h6>
        <br>
        <?php endforeach ?>   
        </div>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Formacao</h4>
        <pre>
            <?php print_r($formacao) ?>
        </pre>
        <h4>Post</h4>
        <pre>
            <?php print_r($post) ?>
        </pre>
        <h4>Avaliacao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
        <h4>Top Usuario</h4>
        <pre>
            <?php print_r($topusuario) ?>
        </pre>
    </div>

</body>
</html>