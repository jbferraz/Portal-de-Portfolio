<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
        background: #f4f4f4">
        <a href="<?php echo base_url() ?>" style="
            text-decoration: none; color: #000;">
            <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /login</h2>
        </a>
        <div style="float: right; padding: 15px;">
        <?php if ($this->session->userdata('type') === '0'): ?>
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        <?php else: ?>
            <a href="<?php echo base_url('cadastro') ?>">cadastrar-se</a>&nbsp;
            <!-- <a href="<?php echo base_url('home/login') ?>">login</a> -->
        <?php endif ?>
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

    <form action="<?php echo base_url('home/submit') ?>"
        method="post">
        <div class="login" style="
            display: table; width: 30%; height: 200px;
            margin: 100px auto 0;">
                <div style="float: left; width: 70%;">               
                    <label>E-mail</label><br>
                    <input class="form-control"  
                        type="email" name="email" required="" placeholder="E-mail"><br>
                    <label>Senha</label><br>
                    <input class="form-control"  
                        type="password" name="senha" required="" placeholder="*******" ><br>
                </div><br>
                
                <button class="btn btn-success btn-block" type="submit" style="margin-right:50px; width: 70%;">Salvar </button>
                </div>
        </div>
    </form>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
    </div>

</body>
</html>