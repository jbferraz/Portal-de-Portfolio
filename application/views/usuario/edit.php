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
                        url: '<?php echo base_url('ajax/ajaxCidade/')?>'+stateID,
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
        background: #f4f4f4;">
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

    <div style="display: table; width: 80%; float: left;">
        <form action="<?php echo base_url('usuario/update') ?>"
            method="post">
            <div class="cadastro" style="
                display: table; width: 37%; height: 200px;
                margin: 50px 0 0 30vw;">
                <div style="float: left; width: 100%;">          
                    <label>Nome Completo</label><br>
                    <input class="form-control"  
                        type="text" name="nome_completo" 
                        value="<?php echo $usuario->nome_completo ?>" required><br>
                    <label>E-mail</label><br>
                    <input class="form-control"  
                        type="email" name="email" 
                        value="<?php echo $usuario->email ?>" required><br> 
                    <label>Celular (DDD)</label><br>
                    <input class="form-control"  
                        type="number" name="celular" min="11900000000" max="99999999999" 
                        value="<?php echo $usuario->celular ?>" required><br>
                    <label>Sexo</label><br>
                    <select <input class="form-control" name="sexo" required>
                        <option value=""></option>
                        <option value="MASCULINO" 
                        <?php if($usuario->sexo == 'MASCULINO') echo 'selected'?>>MASCULINO</option>
                        <option value="FEMININO"
                        <?php if($usuario->sexo == 'FEMININO') echo 'selected'?>>FEMININO</option>
                        <option value="OUTRO"
                        <?php if($usuario->sexo == 'OUTRO') echo 'selected'?>>OUTRO</option>
                    </select><br>
                    <label>Data de nascimento</label><br>
                    <input class="form-control"  
                        type="date" name="data_nasc" 
                        value="<?php echo $usuario->data_nasc ?>" required><br>
                    <label>Linkedin</label><br>
                    <input class="form-control"  
                        type="text" name="linkedin"
                        value="<?php echo $usuario->linkedin ?>"><br>
                    <label>Facebook</label><br>
                    <input class="form-control"  
                        type="text" name="facebook"
                        value="<?php echo $usuario->facebook ?>"><br>
                    <label>Instagram</label><br>
                    <input class="form-control"  
                        type="text" name="instagram"
                        value="<?php echo $usuario->instagram ?>"><br>
                    <label>Descrição</label><br>
                    <textarea <input class="form-control"  
                        type="password" name="desc" required
                        ><?php echo $usuario->desc?></textarea><br>
                    <label>Formação</label><br>
                    <select <input class="form-control" name="formacao" required>
                        <option value=""></option>
                        <?php foreach ($formacao as $g): ?>
                        <option value="<?php echo $g->idformacao ?>"><?php echo $g->formacao ?></option>
                        <?php endforeach ?>
                    </select><br>
                    <script>$('select[name="formacao"]').val(<?php echo $usuario->formacao_curso_id?>).trigger("change");</script>
                    <label>Estado</label><br>
                    <select <input class="form-control" name="estado" required>
                        <option value=""></option>
                        <?php foreach ($estado as $g): ?>
                        <option value="<?php echo $g->idestado ?>"><?php echo $g->nome_estado ?></option>
                        <?php endforeach ?>
                    </select><br>
                    <script>
                        $('select[name="estado"]').val(<?php echo $usuario->idestado?>).trigger("change");
                        $(document).ready(function() {
                            $('select[name="estado"]').trigger('click');
                        });
                    </script>
                    <label>Cidade</label><br>
                    <select <input class="form-control" name="cidade" disabled required>
                        <option value=""></option>
                    </select><br>
                    <div style="margin: 0 30px 0 0">
                        <div style="
                             background:#cccccc; width: 100%; padding: 15px 20px 0 15px; margin: 20px 20px 20px 20px;">
                            <label>Senha Anterior</label><br>
                            <input class="form-control"  
                                type="password" name="senha"><br> 
                            <label>Nova Senha</label><br>
                            <input class="form-control"  
                                type="password" name="senhan" pattern=".{8,50}" 
                                title="No mínimo 8 caracteres"><br>
                            <label>Repetir nova senha</label><br>
                            <input class="form-control"  
                                type="password" name="senhan2"><br>
                            <i style="display: table; padding: 0 0 14px;">Se algum campo estiver vazio a senha será ignorada</i>
                        </div>
                        <button class="btn btn-success btn-block" type="submit" style="margin: 20px 20px 20px 20px;">Enviar </button>
                    </div>
                    
                    
                    '
                </div>     
            </div>
        </form>
        
    </div>
    <div style="
        display: table; float: left; margin: 50px 0 0 0">
        <a href="<?php echo base_url('usuario/delete') ?>"
            style="text-decoration: none;"
            onclick="return confirm('Tem certeza que deseja excluir esta conta?')">                
            <button class="btn btn-info  "<br>Deletar<br>Usuário</button>
            
        
            <br>
            <br>
            
             <a href="<?php echo base_url('usuario') ?>">              
            <button class="btn btn-info  ">Voltar</button>
            </a>
               
            
               </a> 
        
            </div>
   
        
    </div>
    
            
    

</body>
</html>