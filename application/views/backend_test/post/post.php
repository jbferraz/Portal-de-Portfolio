    <div class="posts" style="
        display: table; width: 70%; height: 700px; margin: 0 0 0 10vw; float: left;
        ">
        <h3 style="display: table; margin: 30px auto 0;">
            <?php echo $usuario->nome_completo.'&emsp;'.$usuario->nome_cidade.' – ' ?>
            <?php echo $usuario->sigla_estado.'&emsp;'.$usuario->formacao ?>
        </h3>
        <div class="img_cell" style="
            display: block; width: 70%; padding: 20px; margin: 40px auto 0;
            border-width: 2px; border-style: solid; background: #f4f4f4;">
            <div style="width: 100%; max-height: 26vw; overflow: hidden;">
                <img style="width: 115%; position: relative; top: -4vw; left: -3.8vw;"
                    src="<?php echo base_url($post->foto) ?>" 
                    alt="Foto do post">
            </div>           
        </div>
        <h1 style="display: table; padding: 40px 0 0; font-size: 45px; margin: auto;">
        <?php if ($post->status === '0') echo '[Pendente] '; echo mb_strtoupper($post->titulo) ?>
        </h1>
        <h2 style="display: table; padding: 0; margin: auto;">
            [<?php echo $post->data_alteracao ?>]
        </h2>
        <p style="
            display: table; width: 80%; padding: 30px; text-align: justify; 
            font-size: 18px; margin: auto;">
            <?php /*for ($i = 0; $i < 100; $i++)*/ echo $post->desc.' ' ?>
        </p>
        <br><br><br>
    </div>
    
    <div class="menu" style="
        diaplay: table; width: 15%; height: 50px; float: left;
        margin: 60px 0 0 0;">
        <?php if ($this->session->userdata('type') === '0' && 
            $post->usuario_id == $this->session->userdata('id')): ?>
            <a style="display: table; padding: 18px; text-decoration: none;"
                href="<?php echo base_url('usuario') ?>">
                VOLTAR
            </a>
            <a href="<?php echo base_url('usuario/edit_post/'.$post->idpost) ?>"
                style="text-decoration: none;">                
                <div style="
                    display: table; margin: 15px 0 0; text-align: center;
                    padding: 18px; border-width: 2px; border-style: solid; 
                    background: #f4f4f4;">
                    EDITAR<br>POST
                </div>
            </a>
        <?php else: ?>
            <a style="display: table; padding: 18px; text-decoration: none;"
                href="<?php echo base_url('usuario_home/'.$post->usuario_id) ?>">
                VOLTAR
            </a>
        <?php endif ?>
    </div>
