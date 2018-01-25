<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script>
		$(document).ready(function(){
			$(".button1").click(function(){
				var texto = $(this).text();
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val(texto).select();
				document.execCommand("copy");
				$temp.remove();
				alert("Chave de avaliação copiada!");
			});
		});
	</script>
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
        display: table; width: 70%; margin: 0 0 0 10vw; float: left;
        ">
        <div style="display: table; width: 100%; margin: 50px;"></div>
        
         <?php if (!empty($chave)): ?>
         <div class="alert_true" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #000; text-align: center; background: #66ff00;">
             Clique no link, e o envie para o cliente lhe avaliar<br>
             A chave vai ser copiada automaticamente.
         
        </div>
        <?php foreach ($chave as $g): ?>
            <div class="img_cell" style="
                display: table; width: 70%; padding: 20px; margin: 20px auto 0;
                background: #f4f4f4;">
                <b style="font-family: monospace; font-size: 20px; margin: 3px 0 0; float: left;">
                    <a style="text-decoration: none; color: #000;"
                        
                    	<a href="#" class="button1" ><?php echo base_url('avaliacao?h='.$g->chave)?></a>

                </b>
                <p style="font-family: monospace; font-size: 17px; margin: 5px 0 0; float: right;">
                    <?php echo $g->validade ?>
                </p>
            </div>
          
        <?php endforeach ?>
          <br>
        
         <br>
          <br>
         <?php else: ?>
         <div class="alert_false" style="
            width: 50%; padding: 25px; margin: 30px auto 0; 
            color: #800000; text-align: center; background: #ff9999;">
             Para criar uma chave clique no botão "Criar chave"<br>
             Máximo 4 chaves por usuário
         
        </div>
        <br>
        
         <br>
          <br>
          <?php endif ?>
    </div>

    <div class="menu" style="
        diaplay: table; width: 15%; height: 50px; float: left;
        margin: 60px 0 0 0;">
        <a style="text-decoration: none;"
            href="<?php echo base_url('usuario') ?>">
           <button class="btn btn-success btn-info" type="submit" >Voltar</button>
        </a>
        <br>
        <br>
        <?php if ($mix -> chave_count < 5): ?>
            <a href="<?php echo base_url('usuario/submit_chave') ?>"
                style="text-decoration: none;">                
                <button class="btn btn-success btn-info" type="submit" >Criar<br>Chave</button>
                </div>
            </a>
        <?php endif ?>
    </div>

    <br>
</body>
</html>