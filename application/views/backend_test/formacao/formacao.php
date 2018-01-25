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

    <div class="users" style="
        display: table; width: 80%; float: left;
        ">
        <div style="padding: 20px; display: table; width: 95%;">
            <?php foreach ($topformacao as $g): ?>
            <a href="<?php echo base_url('usuario_home/'.$g->idusuario) ?>"
                style="color: #000; text-decoration: none;">
                <div class="outer_cell" style="
                    display: table; width: 25%; min-width: 170px; height: 220px; float: left; 
                    margin: 0 44px 40px 20px; text-align: center; 
                    ">
                    <div class="inner_cell" style="
                        display: block; width: 100%; padding: 20px; 
                        border-width: 2px; border-style: solid; background: #f4f4f4;">
                        <div style="
                            display: block; width: 100%; max-height: 13vw; overflow: hidden;">
                            <img src="<?php echo base_url($g->foto) ?>" 
                                alt="Foto do usuário" style="
                                    width: 135%; position: relative; top: -1.2vw; left: -3.3vw;">
                        </div>
                    </div>
                    <h3 style="padding: 0; margin: 0 0 0 44px;">
                        <?php echo $g->nome_completo.' ['.$g->rate.']' ?>
                    </h3>
                    <h6 style="padding: 0; margin: 0 0 0 44px;">
                        <?php echo $g->nome_cidade.' – '.$g->sigla_estado ?>
                    </h6>
                </div>
            </a>
            <?php endforeach ?>
        </div>
    </div>
