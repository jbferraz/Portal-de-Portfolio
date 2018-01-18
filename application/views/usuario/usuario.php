<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Usuario</title>
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
            >Portal de Portfólio /usuario</h2>
        </a>
        <div style="float: right; padding: 15px;">
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        </div>
    </div>

    <div class="user" style="
        display: table; width: 18%; float: left; word-break: break-all;
        ">
        <div style="padding: 20px; display: table; width: 95%;">
            <div class="outer_cell" style="
                display: table; width: 95%; min-width: 130px; height: 220px; float: left; 
                margin: 0 44px 40px 20px; text-align: center; 
                ">
                <br><br>
                <div class="inner_cell" style="
                    display: table; width: 100%; padding: 20px; 
                    border-width: 2px; border-style: solid; background: #f4f4f4;">
                    <img src="<?php echo base_url('img/user_img.jpg') ?>" 
                        alt="Foto do post" style="width: 100%;"> 
                </div>
                <br>
                <div style="display: block; margin: 0 0 0 10px; width: 110%;">
                    <h2 style="padding: 0; margin: 0;">
                        <?php echo $topusuario->nome_completo.' ['.$topusuario->rate.']' ?>
                    </h2>
                    
                    <h5 style="padding-top:  10px; margin: 0;">
                        <?php echo $topusuario->nome_cidade.' – '.$topusuario->sigla_estado ?>
                    </h5>
                    <hr>
                    <h6 style="padding: 0; margin: 10px 0 0 0;">
                        <?php echo $topusuario->formacao ?>
                    </h6>
                    <div style="display: table; width: 90%; margin: auto; text-align: center;">
                        <p style="padding: 0; margin: 15px 0 15px 0;">
                            <?php echo $topusuario->desc.' ' ?>
                        </p>
                    </div>
                    <hr>
                    <h4 style="padding: 0; margin: 0 0 0 0;">
                        <?php echo $topusuario->celular ?>
                    </h4>
                    <h4 style="padding: 0; margin: 0 0 0 0;">
                        <?php echo $topusuario->email ?>
                    </h4>
                    <h4 style="padding: 0; margin: 10px 0 0 0;">
                        <?php if (isset($topusuario->linkedin)): ?>
                        <a style="text-decoration: none;"
                            href="<?php echo $topusuario->linkedin ?>"
                            >linkedin
                        </a>
                        &nbsp;
                        <?php endif ?>
                        <?php if (isset($topusuario->facebook)): ?>
                        <a style="text-decoration: none;"
                            href="<?php echo $topusuario->facebook ?>"
                            >facebook
                        </a>
                        &nbsp;
                        <?php endif ?>
                        <?php if (isset($topusuario->instagram)): ?>
                        <a style="text-decoration: none;"
                            href="<?php echo $topusuario->instagram ?>"
                            >instagram
                        </a>
                        <?php endif ?>
                    </h4>
                    <a href="<?php echo base_url('usuario/edit') ?>"
                        style="text-decoration: none;">                
                         
                        <br>
                        <button class="btn btn-info  "<br>Editar<br>Usuario</button>
                            
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="right_menu" style="
        display: table; float: right; width: 5%; height: 20px; 
        text-align: center; position: absolute; top: 60px; right: 4%;">
        <a href="<?php echo base_url('usuario/create_post') ?>"
            style="text-decoration: none;">                
            <div style="
                display: block; margin: 15px 0 0;
                
                "><br>
                <button class="btn btn-info  ">Criar<br>Post</button>
            </div>
        </a>
        <a href="<?php echo base_url('usuario/chave') ?>"
            style="text-decoration: none;">                
            <div style="
                display: block; margin: 15px 0 0;
                
                "><br>
                        <button class="btn btn-info  ">Chaves</button>
               
            </div>
        </a>
    </div>

    <div class="posts" style="
        display: table; width: 70%; height: 700px; margin: 0 0 40px 60px; float: left; 
        ">
        <div class="img_cell" style="
            display: block; width: 70%; padding: 20px; margin: 50px auto 0;
            border-width: 2px; border-style: solid; background: #f4f4f4;">
            <a href="<?php echo base_url('post/'.$postone->idpost) ?>">
                <div style="width: 100%; max-height: 350px; overflow: hidden;">
                    <img style="width: 100%; position: relative; top: -4vw;"
                        src="<?php echo base_url($postone->foto) ?>" 
                        alt="Foto do post">
                </div>
            </a>
        </div>
        <a style="padding: 0; color: #000; text-decoration: none;"
            href="<?php echo base_url('post/'.$postone->idpost) ?>"
            >
            <h1 style="display: table; padding: 40px 0 0; font-size: 45px; margin: auto;">
                <?php if ($postone->status === '0') echo '[Pendente] '; echo strtoupper($postone->titulo) ?>
            </h1>
        </a>
        <h2 style="display: table; padding: 0; margin: auto;">
            [<?php echo $postone->data_alteracao ?>]
        </h2>
        <p style="
            display: table; width: 80%; padding: 30px; text-align: justify; 
            font-size: 18px; margin: auto;">
            <?php echo $postone->fulldesc.' ' ?>
        </p>
        <div style="
            display: table; width: 100%;">
            <a href="<?php echo base_url('usuario/edit_post/'.$postone->idpost) ?>"
                style="text-decoration: none;">                
                <div style="
                    display: table; float: right; margin: 0 12% 0 0; text-align: center;
                    padding: 18px; border-width: 2px; border-style: solid; 
                    background: #f4f4f4;">
                    EDITAR<br>POST
                </div>
            </a>
        </div>
        <?php if (isset($post)): ?>
        <?php foreach ($post as $g): ?>
            <div class="img_cell" style="
                display: block; width: 70%; padding: 20px; margin: 50px auto 0;
                border-width: 2px; border-style: solid; background: #f4f4f4;">
                <a href="<?php echo base_url('post/'.$g->idpost) ?>">                
                    <div style="width: 100%; height: 100px; overflow: hidden;">
                        <img style="width: 100%; position: relative; top: -10vw;"
                            src="<?php echo base_url($g->foto) ?>" 
                            alt="Foto do post">
                    </div>
                </a>
            </div>
            <a style="padding: 0; color: #000; text-decoration: none;"
                href="<?php echo base_url('post/'.$g->idpost) ?>"
                >
                <h1 style="display: table; padding: 20px 0 0; font-size: 35px; margin: auto;">
                    <?php if ($g->status === '0') echo '[Pendente] '; echo strtoupper($g->titulo)?>
                </h1>
            </a>
            <h3 style="display: table; padding: 0; margin: auto;">
                [<?php echo $g->data_alteracao ?>]
            </h3>
            <p style="
                display: table; width: 80%; padding: 15px; text-align: justify; 
                font-size: 18px; margin: auto;">
                <?php echo $g->desc100 ?>
            </p>
            <div style="
                display: table; width: 100%;">
                <a href="<?php echo base_url('usuario/edit_post/'.$g->idpost) ?>"
                    style="text-decoration: none;">                
                    <div style="
                        display: table; float: right; margin: 0 12% 0 0; text-align: center;
                        padding: 18px; border-width: 2px; border-style: solid; 
                        background: #f4f4f4;">
                        EDITAR<br>POST
                    </div>
                </a>
            </div>
        <?php endforeach ?>
        <?php endif ?>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Avaliacao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
        <h4>Top Usuario</h4>
        <pre>
            <?php print_r($topusuario) ?>
        </pre>
        <h4>Post One</h4>
        <pre>
            <?php print_r($postone) ?>
        </pre>
        <?php if(isset($post)): ?>
        <h4>Post</h4>
        <pre>
            <?php print_r($post) ?>
        </pre>
        <?php endif ?>
    </div>

</body>
</html>