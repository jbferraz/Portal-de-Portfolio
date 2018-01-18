<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Edit_post</title>
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
            >Portal de Portfólio /edit_post</h2> -->
            <h2 style="float: left; margin: 16px 0px 0px 27%; padding: 0;"
            >/edit_post</h2>
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
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
    <?php echo form_open_multipart('usuario/update_post')?>
    <!-- <form action="<?php echo base_url('usuario/submit_post') ?>" method="post"> -->
    <form>      
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
            <a style="display: table; padding: 18px; margin: 0 0 0 4px; text-decoration: none;"
                href="<?php echo base_url('usuario') ?>">
                VOLTAR
            </a>
            <input type="submit"  value="EDITAR&#x00A;POST" style="
                display: table; margin: 15px 0 0 0; text-align: center;
                padding: 18px 25px 18px 25px; border-width: 2px; border-style: solid; 
                background: #f4f4f4; border-color: blue; color: blue; 
                font-size: 1em; font-family: san-serif; cursor: pointer;"/>

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

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
        <h4>Post</h4>
        <pre>
            <?php print_r($post) ?>
        </pre>
        <?php if ($this->session->flashdata('foto_data')): ?>
        <h4>Foto_data</h4>
        <pre>
            <?php print_r($this->session->flashdata('foto_data'))?>
        </pre>
        <?php endif ?>
    </div>

</body>
</html>