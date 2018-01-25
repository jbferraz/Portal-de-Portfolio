<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Submit</title>
    <link rel="stylesheet" type="text/css" 
        href="<?php echo base_url() ?>"/>
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
    </style>
    <script type="text/javascript">
        
    </script>
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
            >/submit</h2>
             
        </a>
        <div style="float: right; padding: 15px;">
            <a href="<?php echo base_url('avaliacao?h='.$chave->chave) ?>"
                ><?php echo $chave->chave ?></a>&nbsp;
            <!-- <a href="<?php echo base_url('home/logoff') ?>">logoff</a> -->
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
    
    <div class="frame" style="
        display: table; width: 100%; margin: 40px auto 10vw;
        ">
        <!-- <h1 style="display: table; margin: 0 auto 20px;">
            Avaliando:
        </h1> -->
        <h3 style="display: table; margin: 0 auto 0;">
            <?php echo $usuario->nome_completo.'&emsp;'.$usuario->nome_cidade.' – ' ?>
            <?php echo $usuario->sigla_estado.'&emsp;'.$usuario->formacao ?>
        </h3>
        <div class="chave" style="
            display: table; width: 30%; padding: 20px; margin: 30px auto 0;
            background: #f4f4f4;"> <!-- #f4f4f4 -->
            <b style="font-family: monospace; font-size: 20px; margin: 3px 0 0; float: left;">
                CELULAR: <?php echo $mix->celular?>
            </b>
            <p style="font-family: monospace; font-size: 17px; margin: 5px 0 0; float: right;">
                NOTA: [<?php echo $mix->rate?>]
            </p>
        </div>
        <h1 style="display: table; margin: 20px auto 0;">
            Avaliação concluída
        </h1>
        <h1 style="display: table; margin: 10px auto 0;">
            Obrigado pela contribuição!
        </h1>
    </div>

    
</body>
</html>