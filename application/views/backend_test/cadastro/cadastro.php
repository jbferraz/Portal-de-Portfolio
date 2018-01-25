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

    <form action="<?php echo base_url('cadastro/submit') ?>"
        method="post">
        <div class="cadastro" style="
            display: table; width: 30%; height: 200px;
            margin: 50px auto 0;">
            <div style="float: left; width: 100%;">          
                <label>NOME COMPLETO</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="nome_completo" required><br><br>
                <label>E-MAIL</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="email" name="email" required><br><br> 
                <label>CELULAR (DDD)</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="number" name="celular" min="11900000000" max="99999999999" required><br><br>
                <label>SEXO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="sexo" required>
                    <option value=""></option>
                    <option value="MASCULINO">MASCULINO</option>
                    <option value="FEMININO">FEMININO</option>
                    <option value="OUTRO">OUTRO</option>
                </select><br><br>
                <label>DATA DE NASCIMENTO</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="date" name="data_nasc" required><br><br>
                <label>LINKEDIN</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="linkedin"><br><br>
                <label>FACEBOOK</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="facebook"><br><br>
                <label>INSTAGRAM</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="text" name="instagram"><br><br>
                <label>SENHA</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="password" name="senha" pattern=".{8,50}" 
                    required title="No mínimo 8 caracteres"><br><br>
                <label>REPETIR SENHA</label><br>
                <input style="
                    width: 95%; height: 35px;"  
                    type="password" name="senha2" required><br><br> 
                <label>DESCRIÇÃO</label><br>
                <textarea style="
                    width: 95%; height: 80px;"  
                    type="password" name="desc" required></textarea><br><br>
                <label>FORMAÇÃO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="formacao" required>
                    <option value=""></option>
                    <?php foreach ($formacao as $g): ?>
                    <option value="<?php echo $g->idformacao ?>"><?php echo $g->formacao ?></option>
                    <?php endforeach ?>
                </select><br><br>
                <label>ESTADO</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="estado" required>
                    <option value=""></option>
                    <?php foreach ($estado as $g): ?>
                    <option value="<?php echo $g->idestado ?>"><?php echo $g->nome_estado ?></option>
                    <?php endforeach ?>
                </select><br><br>
                <label>CIDADE</label><br>
                <select style="
                    width: 96.5%; height: 42px;" name="cidade" required disabled>
                    <option value=""></option>
                </select> 
                
                <input type="submit"  value="ENVIAR" style="
                    display: table; margin: 55px auto 0;
                    width: 50%; height: 55px; font-size: 15px;"/>
            </div>     
        </div>
    </form>
    <br><br><br>
