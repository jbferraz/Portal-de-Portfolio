<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Create_post</title>
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
            >/create_post</h2>
            
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
    <?php echo form_open_multipart('usuario/submit_post')?> <!-- opens form -->
    <!-- <form action="<?php echo base_url('usuario/submit_post') ?>" method="post"> -->      
        <div class="posts" style="
            display: table; width: 70%; height: 700px; margin: 0 0 0 10vw; float: left;
            ">
            <div class="frame" style="
                display: table; width: 77%; height: 200px;
                margin: 50px auto 0; padding: 0 0 0 30px;">
                <div style="float: left; width: 100%;">  
                    <div style="background: #f4f4f4; 
                     margin: 0 4.1% 0 0;">        
                        <label>Foto</label><br>
                        <input style="
                            width: 100%; height: 42px;"
                            type="file" name="foto" required>
                        <br><br>
                        <i>Tamanho máximo: 200KB</i>
                    </div><br>
                    <label>Título</label><br>
                    <input style="
                        width: 95%; height: 35px;"
                        type="text" name="titulo" required><br><br>
                    <label>Descrição</label><br>
                    <textarea style="
                        width: 95%; height: 300px;"  
                        type="text" name="desc" required
                        ></textarea><br><br>
                </div>     
            </div>          
        </div>

        <div class="menu" style="
            display: table; width: 15%; height: 50px; float: left;
            margin: 60px 0 0 0;">
            <a style="text-decoration: none;"
                href="<?php echo base_url('usuario') ?>"
                <button class="btn btn-success btn-info" type="submit" >Voltar</button>
            </a>
            <br>
            <br>
            <button class="btn btn-success btn-info" type="submit" >Salvar<br>Post</button>
                
                <!-- &#x00A; -->
            <!-- <a href="<?php echo base_url('usuario/edit_post/'.$usuario->idusuario) ?>"
                style="text-decoration: none;">                
                <div style="
                    display: table; margin: 15px 0 0; text-align: center;
                    padding: 18px; border-width: 2px; border-style: solid; 
                    background: #f4f4f4;">
                    EDITAR<br>POST
                </div>
            </a> -->
        </div>
    </form>

    

</body>
</html>