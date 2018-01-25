<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Avaliacao</title>
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
            >/avaliacao</h2>
            
        </a>
        <div style="float: right; padding: 15px;">
            <a href="<?php echo base_url('avaliacao?h='.$this->session->userdata('hash')) ?>"
                ><?php echo $this->session->userdata('hash') ?></a>&nbsp;
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
            display: table; width: 50%; padding: 20px; margin: 30px auto 0;
            background: #f4f4f4;"> <!-- #f4f4f4 -->
            <b style="font-family: monospace; font-size: 20px; margin: 3px 0 0; float: left;">
                <?php echo $chave->chave?>
            </b>
            <p style="font-family: monospace; font-size: 17px; margin: 5px 0 0; float: right;">
                <?php echo $chave->validade ?>
            </p>
        </div>
        <form action="<?php echo base_url('avaliacao/submit') ?>"
            method="post">
            <div class="cadastro" style="
                display: table; width: 30%; height: 200px; padding-left: 300px;
                margin: 30px auto 0;">
                <div style="float: left; width: 100%;">          
                    <label>ESCOLHA UMA NOTA ENTRE 1 E 5:</label><br>
                    <div class="rate-frame" 
                        style="min-width: 900px; display: table; margin: 10px auto 0; ">
                        <div style="">
                            <input type="radio" name="rate" id="estrela1" title="1 estrela" value="1" required/>
                                <label for="estrela1"><img title="1 estrela" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="1 estrela" style="width: 35%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela2" title="2 estrelas" value="2"/>
                                <label for="estrela2"><img title="2 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="2 estrelas" style="width: 35%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela3" title="3 estrelas" value="3"/>
                                <label for="estrela3"><img title="3 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="3 estrelas" style="width: 35%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela4" title="4 estrelas" value="4"/>
                                <label for="estrela4"><img title="4 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="4 estrelas" style="width: 35%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela5" title="5 estrelas"value="5"/>
                                <label for="estrela5"><img title="5 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="5 estrelas" style="width: 35%;"/></label>
                        </div>
                    </div><br>
                    <label>CELULAR (DDD)</label><br>
                    <input class="form-control"
                    style=" 
                        width: 70%; height: 30px;"  
                        type="number" name="celular" min="11900000000" max="99999999999" required><br><br>
                    
                    <button class="btn btn-success btn-block" type="submit" style="margin-right:50px; width: 70%;">Enviar </button>
                </div>     
            </div>
        </form>
    </div>

    

</body>
</html>