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
                                width: 140%; position: relative; top: -1.2vw; left: -3.1vw;"> 
                    </div>
                    <h4 style="padding: 0; margin: 10px 0 0;">
                        <div style="display: block; max-width: 60%; 
                            max-height: 1em; float: left; overflow: hidden; word-break: break-all;">
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
