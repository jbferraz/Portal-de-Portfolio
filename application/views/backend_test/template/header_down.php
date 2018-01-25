</head>
<body style="margin: 0 0 60px;">

    <div class="topo" style="
        display: table; width: 100%; height: 50px; float: left;
        background: #f4f4f4">
        <a href="<?php echo base_url() ?>" style="
            text-decoration: none; color: #000;">
            <!-- <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /home</h2> -->
            <h2 style="float: left; margin: 16px 0px 0px 27%; padding: 0;"
            >/<?php echo $mix->title?></h2>
            <img src="<?php echo base_url('img/logo1.png')?>"
                alt="Logo" style="
                    width: 190px; position: absolute; top: 1.5px; left: 12%;"> 
        </a>
        <div style="float: right; padding: 15px;">
        <?php if ($this->session->userdata('type') === '0'): ?>
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        <?php elseif ($this->session->userdata('type') === '1'): ?>
            <a href="<?php echo base_url('adm/adm') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        <?php elseif ($this->session->userdata('type') === '2'): ?>
            <a href="<?php echo base_url('avaliacao?h='.$this->session->userdata('hash')) ?>"><?php echo $this->session->userdata('hash') ?></a>&nbsp;
        <?php else: ?>
            <?php if ($mix->title != 'cadastro'): ?>
                <a href="<?php echo base_url('cadastro') ?>">cadastrar-se</a>&nbsp;
            <?php endif ?>
            <?php if ($mix->title != 'login'): ?>
                <a href="<?php echo base_url('home/login') ?>">login</a>
            <?php endif ?>
        <?php endif ?>
        </div>
    </div>
    <div style="display: table; width: 100%; height: 0px;"></div>
