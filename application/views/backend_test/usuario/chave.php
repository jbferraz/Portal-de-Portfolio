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
        <?php if ($mix->chave_count < 4): ?>
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
