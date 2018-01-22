<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projeto Curriculo</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('https://fonts.googleapis.com/css?family=Roboto:400,500,700'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/fonts/ionicons.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css'); ?>">
        <script type="text/javascript" 
            src="<?php echo base_url('assets/backend_tests/all.js') ?>"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container" >
                
                <div class="collapse navbar-collapse" id="navcol-1" >
                    
                    <ul class="nav navbar-nav" style="float:left">
                        
                        <li role="presentation" ><a href="<?php echo base_url('home') ?>">
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
</a></li>
                     </ul>
                    
                    
                    
                    
                    <?php if ($this->session->userdata('type') === '0'): ?>
            <ul class="nav navbar-nav" style="float:right">
                <li role="presentation" ><a href="<?php echo base_url('home') ?>">Pagina inicial</a></li>
                    <li role="presentation" ><a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a></li>
                        <li role="presentation" ><a href="<?php echo base_url('home/logoff') ?>">Logoff</a></li>
                         </ul>
            
        <?php else: ?>
            
            <ul class="nav navbar-nav" style="float:right">
                 <li role="presentation" ><a href="<?php echo base_url('home') ?>">Pagina inicial</a></li>
                    <li role="presentation" ><a href="<?php echo base_url('cadastro') ?>">Cadastrar-se</a></li>
                        <li role="presentation" ><a href="<?php echo base_url('home/login') ?>">Login</a></li>
                         </ul>
        <?php endif ?>
                </div>
            </div>
        </nav>


