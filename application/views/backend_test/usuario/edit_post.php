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
    <?php echo form_open_multipart('usuario/update_post')?> <!-- opens form -->
    <!-- <form action="<?php echo base_url('usuario/submit_post') ?>" method="post"> -->  
        <div class="posts" style="
            display: table; width: 70%; height: 700px; margin: 0 0 0 10vw; float: left;
            ">
            <div class="frame" style="
                display: table; width: 77%; height: 200px;
                margin: 50px auto 0; padding: 0 0 0 30px;">
                <div style="float: left; width: 100%;">
                    <input type="hidden" 
                        value="<?php echo $post->idpost?>" name="id" />  
                    <div style="background: #f4f4f4; 
                    padding: 20px; margin: 0 4.1% 0 0;">        
                        <label>FOTO</label><br>
                        <input style="
                            width: 100%; height: 42px;"
                            type="file" name="foto">
                        <br><br>
                        <i>Tamanho máximo: 200KB</i>
                    </div><br>
                    <label>TÍTULO</label><br>
                    <input style="
                        width: 95%; height: 35px;"
                        type="text" name="titulo" 
                        value="<?php echo $post->titulo?>" required><br><br>
                    <label>DESCRIÇÃO</label><br>
                    <textarea style="
                        width: 95%; height: 300px;"  
                        type="text" name="desc" required
                        ><?php echo $post->desc?></textarea><br><br>
                </div>     
            </div>          
        </div>

        <div class="menu" style="
            diaplay: table; width: 15%; height: 50px; float: left;
            margin: 60px 0 0 0;">
            <a style="display: table; padding: 18px; margin: 0 0 0 8px; text-decoration: none;"
                href="<?php echo base_url('usuario') ?>">
                VOLTAR
            </a>
            <input type="submit"  value="SALVAR POST" style="
                display: table; margin: 15px 0 0 0; text-align: center;
                padding: 18px 25px 18px 25px; border-width: 2px; border-style: solid; 
                background: #f4f4f4; border-color: blue; color: blue; 
                font-size: 1em; font-family: <?php echo $mix->font_family?>; cursor: pointer;
                white-space: normal; width: 112px;"/>
                <!-- &#x00A; -->
            <a href="<?php echo base_url('usuario/delete_post/'.$post->idpost) ?>"
                style="text-decoration: none;"
                onclick="return confirm('Tem certeza que deseja excluir este post?')">                
                <div style="
                    display: table; margin: 15px 0 0; text-align: center;
                    padding: 18px; border-width: 2px; border-style: solid; 
                    background: #f4f4f4;">
                    DELETAR<br>POST
                </div>
            </a>
        </div>
    </form>
