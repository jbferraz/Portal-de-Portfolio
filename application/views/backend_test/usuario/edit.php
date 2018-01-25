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

    <div style="display: table; width: 80%; float: left;">
        <form action="<?php echo base_url('usuario/update') ?>"
            method="post">
            <div class="cadastro" style="
                display: table; width: 37%; height: 200px;
                margin: 50px 0 0 30vw;">
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
                        width: 96.5%; height: 42px;" name="estado" required>
                        <option value=""></option>
                        <?php foreach ($estado as $g): ?>
                        <option value="<?php echo $g->idestado ?>"><?php echo $g->nome_estado ?></option>
                        <?php endforeach ?>
                    </select><br><br>
                    <script>
                        $('select[name="estado"]').val(<?php echo $usuario->idestado?>).trigger("change");
                        $(document).ready(function() {
                            $('select[name="estado"]').trigger('click');
                        });
                    </script>
                    <label>CIDADE</label><br>
                    <select style="
                        width: 96.5%; height: 42px;" name="cidade" disabled required>
                        <option value=""></option>
                    </select><br><br>
                    <div style="margin: 0 30px 0 0">
                        <div style="
                        background: #f4f4f4; width: 100%; padding: 15px 0 0 15px; margin: 20px 20px 20px 0;">
                            <label>SENHA ANTERIOR</label><br>
                            <input style="
                                width: 95%; height: 35px;"  
                                type="password" name="senha"><br><br> 
                            <label>NOVA SENHA</label><br>
                            <input style="
                                width: 95%; height: 35px;"  
                                type="password" name="senhan" pattern=".{8,50}" 
                                title="No mínimo 8 caracteres"><br><br>
                            <label>REPETIR NOVA SENHA</label><br>
                            <input style="
                                width: 95%; height: 35px;"  
                                type="password" name="senhan2"><br><br> 
                            <i style="display: table; padding: 0 0 14px;">Se algum campo estiver vazio a senha será ignorada</i>
                        </div>
                    </div>
                    
                    
                    <input type="submit"  value="EDITAR" style="
                        display: table; margin: 55px auto 0;
                        width: 50%; height: 55px; font-size: 15px;"/>
                </div>     
            </div>
        </form>
        <br><br><br>
        
    </div>
    <div style="
        display: table; float: left; margin: 50px 0 0 0">
        <a href="<?php echo base_url('usuario/delete') ?>"
            style="text-decoration: none;"
            onclick="return confirm('Tem certeza que deseja excluir esta conta?')">                
            <div style="
                display: table;
                padding: 18px; border-width: 2px; border-style: solid; 
                background: #f4f4f4;">
                DELETAR<br>USUÁRIO
            </div>
        </a>
    </div>
