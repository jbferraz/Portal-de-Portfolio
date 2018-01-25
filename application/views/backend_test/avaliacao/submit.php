<?php if ($this->session->flashdata('success_msg')) {
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
