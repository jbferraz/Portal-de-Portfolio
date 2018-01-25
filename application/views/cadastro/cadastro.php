<!DOCTYPE html>

<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
    <link rel="stylesheet" type="text/css" 
        href="<?php echo base_url() ?>"/>
    <style>
        html, body{
            margin: 0;
            padding: 0;
        }
    </style>
    <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="estado"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '<?php echo base_url('ajax/ajaxCidade/')?>'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="cidade"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="cidade"]').append('<option value="'+ value.idcidade +'">'+ value.nome_cidade +'</option>');
                            });
                            $('select[name="cidade"]').prop('disabled', false);
                        }
                    });
                }else{
                    $('select[name="cidade"]').empty();
                }
            });
        });
    </script>
</head>
<body>

    <div class="topo" style="
        display: table; width: 100%; height: 30px;
        background: #f4f4f4">
        <a href="<?php echo base_url() ?>" style="
            text-decoration: none; color: #000;">
            <h2 style="float: left; margin: 7px 7px 7px 12%; padding: 0;"
            >Portal de Portfólio /cadastro</h2>
        </a>
        <div style="float: right; padding: 15px;">
        <?php if ($this->session->userdata('type') === '0'): ?>
            <a href="<?php echo base_url('usuario') ?>"><?php echo $this->session->userdata('nome') ?></a>&nbsp;
            <a href="<?php echo base_url('home/logoff') ?>">logoff</a>
        <?php else: ?>
            <!-- <a href="<?php echo base_url('cadastro') ?>">cadastrar-se</a>&nbsp; -->
            <a href="<?php echo base_url('home/login') ?>">login</a>
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

    <form action="<?php echo base_url('cadastro/submit') ?>"
        method="post">
        <div class="cadastro" style="
            display: table; width: 25%; height: 200px;
            margin: 100px auto 0;">
            <div class="row" style="padding-top:0px;">    
                <fieldset>
                    <legend><strong>Cadastro de Pessoas</strong></legend>
                </fieldset>
                <br>
                <br>
                <label>Nome Completo</label><br>
                <input class="form-control" 
                    type="text" name="nome_completo" required="" placeholder="Nome Completo"><br>
                <label>E-mail</label><br>
                <input <input class="form-control"  
                    type="email" name="email" required="" placeholder="E-mail"><br>
                <label>Celular (DDD)</label><br>
                <input <input class="form-control"  
                    type="number" name="celular" min="11900000000" max="99999999999" required="" placeholder="celular"><br>
                <label>Sexo</label><br>
                <select <input class="form-control" name="sexo" required="" placeholder="Opções">
                    <option value=""></option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMININO">FEMININO</option>
                    <option value="OUTRO">OUTRO</option>
                </select><br>
                <label>Data de Nascimento</label><br>
                <input <input class="form-control"  
                              type="date" name="data_nasc" required=""> <br>
                <label>Linkedin</label><br>
                <input <input class="form-control" 
                    type="text" name="linkedin" placeholder="Linkedin"><br>
                <label>Facebook</label><br>
                <input <input class="form-control" 
                    type="text" name="facebook" placeholder="Facebook"><br>
                <label>Instagram</label><br>
                <input <input class="form-control" 
                    type="text" name="instagram" placeholder="Instagram"><br>
                <label>Senha</label><br>
                <input <input class="form-control"  
                    type="password" name="senha" pattern=".{8,50}" 
                    required title="No mínimo 8 caracteres" placeholder="********"><br>
                <label>Repetir Senha</label><br>
                <input <input class="form-control"  
                    type="password" name="senha2" required="" placeholder="********"><br> 
                <label>Descrição</label><br>
                <textarea <input class="form-control"  
                    type="password" name="desc" required="" placeholder="Descrição"></textarea><br>
                <label>Formação</label><br>
                <select <input class="form-control" name="formacao" required="" >
                    <option value="" ></option>
                    <?php foreach ($formacao as $g): ?>
                    <option value="<?php echo $g->idformacao ?>"><?php echo $g->formacao ?></option>
                    <?php endforeach ?>
                </select><br>
                <label>Estado</label><br>
                <select <input class="form-control" name="estado" required>
                    <option value=""></option>
                    <?php foreach ($estado as $g): ?>
                    <option value="<?php echo $g->idestado ?>"><?php echo $g->nome_estado ?></option>
                    <?php endforeach ?>
                </select><br>
                <label>Cidade</label><br>
                <select <input class="form-control" name="cidade" required disabled>
                    <option value=""></option>
                </select> 
                <br>
                <button class="btn btn-success btn-block" type="submit" style="margin-top:10px;">Salvar </button>
                <br>
        <br>
        <br>
        <br>
        <br>
            </div>     
        </div>
    </form>

    
</body>
</html>