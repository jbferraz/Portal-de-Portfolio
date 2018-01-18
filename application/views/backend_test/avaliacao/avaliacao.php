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
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
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
        display: table; width: 100%; margin: 50px auto 10vw;
        ">
        <form action="<?php echo base_url('cadastro/submit') ?>"
            method="post">
            <div class="cadastro" style="
                display: table; width: 30%; height: 200px;
                margin: 50px auto 0;">
                <div style="float: left; width: 100%;">          
                    <label>ESCOLHA UMA NOTA ENTRE 1 E 5:</label><br>
                    <div class="rate-frame" 
                        style="min-width: 400px; display: table; margin: 10px auto 0;">
                        <div style="">
                            <input type="radio" name="rate" id="estrela1" title="1 estrela" value="1" required/>
                                <label for="estrela1"><img title="1 estrela" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="1 estrela" style="width: 12%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela2" title="2 estrelas" value="2"/>
                                <label for="estrela2"><img title="2 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="2 estrelas" style="width: 12%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela3" title="3 estrelas" value="3"/>
                                <label for="estrela3"><img title="3 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="3 estrelas" style="width: 12%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela4" title="4 estrelas" value="4"/>
                                <label for="estrela4"><img title="4 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="4 estrelas" style="width: 12%; margin: auto;"/></label>
                            <input type="radio" name="rate" id="estrela5" title="5 estrelas"value="5"/>
                                <label for="estrela5"><img title="5 estrelas" src="<?php echo base_url('img/star1.png') ?>" 
                                    alt="5 estrelas" style="width: 12%;"/></label>
                        </div>
                    </div><br>
                    <label>CELULAR (DDD)</label><br>
                    <input style="
                        width: 95%; height: 35px;"  
                        type="number" name="celular" min="11900000000" max="99999999999" required><br><br>
                    
                    <input type="submit"  value="ENVIAR" style="
                        display: table; margin: 20px auto 0;
                        width: 50%; height: 55px; font-size: 15px;"/>
                </div>     
            </div>
        </form>
    </div>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
        <h4>Chave</h4>
        <pre>
            <?php print_r($chave) ?>
        </pre>
    </div>

</body>
</html>