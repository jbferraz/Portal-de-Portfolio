<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Edit</title>
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
            $('select[name="estado"]').on('click', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '<?php echo base_url('cadastro/formAjax/')?>'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="cidade"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="cidade"]').append('<option value="'+ value.idcidade +'">'+ value.nome_cidade +'</option>');
                            });
                            $('select[name="cidade"]').prop('disabled', false);
                            $('select[name="cidade"]').val(<?php echo $usuario->cidade_id?>).trigger("change");
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
            >Portal de Portfólio /edit</h2>
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
            display: table; width: 30%; height: 200px;
            margin: 50px auto 0;">
            <div style="float: left; width: 100%;">          
                <label>NOME COMPLETO</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="nome_completo" 
                    value="<?php echo $usuario->nome_completo ?>" required><br><br>
                <label>E-MAIL</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="email" name="email" 
                    value="<?php echo $usuario->email ?>" required><br><br> 
                <label>CELULAR (DDD)</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="number" name="celular" min="11900000000" max="99999999999" 
                    value="<?php echo $usuario->celular ?>" required><br><br>
                <label>SEXO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="sexo" required>
                    <option value=""></option>
                    <option value="MASCULINO" 
                    <?php if($usuario->sexo == 'MASCULINO') echo 'selected'?>>MASCULINO</option>
                    <option value="FEMININO"
                    <?php if($usuario->sexo == 'FEMININO') echo 'selected'?>>FEMININO</option>
                    <option value="OUTRO"
                    <?php if($usuario->sexo == 'OUTRO') echo 'selected'?>>OUTRO</option>
                </select><br><br>
                <label>DATA DE NASCIMENTO</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="date" name="data_nasc" 
                    value="<?php echo $usuario->data_nasc ?>" required><br><br>
                <label>LINKEDIN</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="linkedin"
                    value="<?php echo $usuario->linkedin ?>"><br><br>
                <label>FACEBOOK</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="facebook"
                    value="<?php echo $usuario->facebook ?>"><br><br>
                <label>INSTAGRAM</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="instagram"
                    value="<?php echo $usuario->instagram ?>"><br><br>
                <label>DESCRIÇÃO</label><br>
                <textarea style="
                    width: 95%; height: 80px;"  
                    type="password" name="desc" required
                    ><?php echo $usuario->desc?></textarea><br><br>
                <label>FORMAÇÃO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="formacao" required>
                    <option value=""></option>
                    <?php foreach ($formacao as $g): ?>
                    <option value="<?php echo $g->idformacao ?>"><?php echo $g->formacao ?></option>
                    <?php endforeach ?>
                </select><br><br>
                <script>$('select[name="formacao"]').val(<?php echo $usuario->formacao_curso_id?>).trigger("change");</script>
                <label>ESTADO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="estado" id="estado" required>
                    <option value=""></option>
                    <?php foreach ($estado as $g): ?>
                    <option value="<?php echo $g->idestado ?>"><?php echo $g->nome_estado ?></option>
                    <?php endforeach ?>
                </select><br><br>
                <script>
                    $('select[name="estado"]').val(<?php echo $usuario->idestado?>).trigger("change");
                    //document.getElementById('estado').click(); 
                    $(document).ready(function() {
                        $('select[name="estado"]').trigger('click');
                    });
                </script>
                <label>CIDADE</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="cidade" disabled required>
                    <option value=""></option>
                </select><br><br>
                <div style="
                background: #d9d9d9; padding: 15px 0 0 15px; margin: 20px 20px 20px 20px;">
                    <label>SENHA ANTERIOR</label><br>
                    <input style="
                        width: 95%; height: 35px;"  
                        type="password" name="senhaa" required><br><br> 
                    <label>NOVA SENHA</label><br>
                    <input style="
                        width: 95%; height: 35px;"  
                        type="password" name="senhan" pattern=".{8,50}" 
                        required title="No mínimo 8 caracteres"><br><br>
                    <label>REPETIR NOVA SENHA</label><br>
                    <input style="
                        width: 95%; height: 35px;"  
                        type="password" name="senhan2" required><br><br> 
                </div>
                
                <input type="submit"  value="ENVIAR" style="
                    display: table; margin: 55px auto 0;
                    width: 50%; height: 55px; font-size: 15px;"/>
            </div>     
        </div>
    </form>

    <div class="var_dump" style="margin: auto; display: table">
        
        <h4>Usuario</h4>
        <pre>
            <?php print_r($usuario) ?>
        </pre>
        <h4>Formacao</h4>
        <pre>
            <?php print_r($formacao) ?>
        </pre>
        <h4>Estado</h4>
        <pre>
            <?php print_r($estado) ?>
        </pre>
        <?php if(isset($hash)): ?>
        <h4>Hash</h4>
        <pre>
            <?php print_r($hash) ?>
        </pre>
        <?php endif ?>
        <?php if(isset($avaliacao)): ?>
        <h4>Avaliacao</h4>
        <pre>
            <?php print_r($avaliacao) ?>
        </pre>
        <?php endif ?>
    </div>

</body>
</html>