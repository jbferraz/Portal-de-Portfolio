<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Adm</title>
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
            >Portal de Portfólio /adm</h2> -->
            <h2 style="float: left; margin: 16px 0px 0px 27%; padding: 0;"
            >/adm</h2>
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
        </a>
        <div style="float: right; padding: 15px;">
            <a href="<?php echo base_url('adm/adm') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
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
                    display: block; width: 100%; padding: 20px; 
                    border-width: 2px; border-style: solid; background: #f4f4f4;">
                    <div style="
                        display: block; width: 100%; max-height: 11vw; overflow: hidden;">
                        <img src="<?php echo base_url('img/default_img.png')?>" 
                            alt="Foto do post" style="
                                width: 135%; position: relative; top: -1.1vw; left: -2.85vw;">
                    </div>
                </div>
                <br>
                <div style="display: block; margin: 0 0 0 10px; width: 110%;">
                    <h2 style="padding: 0; margin: 0;">
                        <?php echo $adm->nome_completo ?>
                    </h2>
                    <hr>
                    <div style="display: table; width: 90%; margin: auto; text-align: justify;">
                        <p style="padding: 0; margin: 15px 0 15px 0;">
                            <?php echo $adm->desc.' ' ?>
                        </p>
                    </div>
                    <hr>
                    <h4 style="padding: 0; margin: 0 0 0 0;">
                        <?php echo $adm->celular ?>
                    </h4>
                    <h4 style="padding: 0; margin: 0 0 0 0;">
                        <?php echo $adm->email ?>
                    </h4>
                    <a href="<?php echo base_url('adm/adm/list') ?>"
                        style="text-decoration: none;">                
                        <div style="
                            display: table; margin: 40px auto 0; 
                            padding: 18px; border-width: 2px; border-style: solid; 
                            background: #f4f4f4;">
                            LISTAR<br>ADM
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="adm_panel" style="
        display: table; width: 70%; height: 700px; margin: 0 0 40px 60px; float: left; 
        ">

        <?php
        if ($this->session->flashdata('success_msg')) {
            ?>
            <div class="alert_true" style="
                width: 60%; padding: 25px; margin: 30px auto 0; 
                color: #006600; text-align: center; background: #b3ffb3;">
                <?php echo $this->session->flashdata('success_msg') ?>
            </div>
            <?php
        }
        if ($this->session->flashdata('error_msg')) {
            ?>
            <div class="alert_false" style="
                width: 60%; padding: 25px; margin: 30px auto 0; 
                color: #800000; text-align: center; background: #ff9999;">
                <?php echo $this->session->flashdata('error_msg') ?>
            </div>
            <?php
        }
        ?>

        <div class="avaliacao" style="
            display: table; width: 72%; margin: 20px 0 0 10vw;
            height: 12vw;">
            <?php if (!empty($avaliacao)): ?>
            <?php foreach ($avaliacao as $g): ?>
                <div style="
                    display: table; width: 90%; float: left;
                    background: #f4f4f4; padding: 0;
                    ">
                    <div class="chave" style="
                        display: table; width: 97.5%; padding: 0 4px 0 4px; margin: 4px auto 0;
                        background: #fbfbfb;">
                        <!-- background: #f4f4f4; -->
                        <div style="display: table; float: left;">
                            <b style="display: table; font-family: monospace; font-size: 16px; margin: 3px 20px 0 0; padding: 0; float: left;">
                                <?php echo substr($g->chave, 0, 10).'...'?>
                            </b>
                            <b style="display: table; font-family: monospace; font-size: 17px; margin: 3px 0 0; padding: 0; float: left;">
                                <?php echo 'CELULAR: '.$g->celular_cliente?>
                            </b>
                            <p style="display: table; font-family: monospace; font-size: 15px; margin: 5px 0 0; padding: 0; float: right;">
                                <?php echo 'NOTA: ['.$g->avaliacoes.']' ?>
                                <!-- date('Y-m-d', strtotime($g->data_avaliacoes)) -->
                            </p>
                            <div style="display: table; width: 100%">
                                <p style="display: table; margin: 0 0 0; font-size: 12px; float: left;">
                                    <?php echo mb_strtoupper($g->nome_completo).'&emsp;'.$g->nome_cidade.' – ' ?>
                                    <?php echo $g->sigla_estado.'&emsp;'.$g->formacao ?>
                                </p>
                                <p style="display: table; margin: 0 0 0; font-size: 15px; float: right;">
                                    <?php echo $g->data_avaliacoes ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: table; float: right;
                    width: 9%; margin: 0.5%;">
                    <a href="<?php echo base_url('adm/avaliacao/validate/'.$g->chave_hash_id) ?>"
                        style="margin: 0; padding: 0 0 0 5px;">Validar</a>
                    <a href="<?php echo base_url('adm/avaliacao/delete/'.$g->chave_hash_id) ?>"
                        style="margin: 0; padding: 0 0 0 5px;"
                        onclick="return confirm('Tem certeza que deseja excluir esta avaliação?')">Deletar</a>
                </div>
            <?php endforeach ?>
            <?php else: ?>
                <div style="
                    display: table; width: 90%; float: left;
                    background: #f4f4f4; padding: 0;
                    ">
                    <div class="chave" style="
                        display: table; width: 97.5%; padding: 0 4px 0 4px; margin: 4px auto 0;
                        background: #fbfbfb;">
                        <!-- background: #f4f4f4; -->
                        <div style="display: table; float: left;">
                            <b style="display: table; font-family: monospace; font-size: 17px; margin: 0.6em 0 0.6em; padding: 0; float: left;">
                                Sem avaliação
                            </b>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div style="display: table; width: 90%; height: 4px; 
                background: #f4f4f4; float: left;"></div>
        </div>
        <p style="display: table; margin: auto;">test</p>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Adm</h4>
        <pre>
            <?php print_r($adm) ?>
        </pre>
        <h4>Avaliacao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
    </div>

</body>
</html>