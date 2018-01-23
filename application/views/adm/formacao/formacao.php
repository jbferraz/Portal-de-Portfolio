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
            $(document).ready(function () {
                $('select[name="estado"]').on('change', function () {
                    var stateID = $(this).val();
                    if (stateID) {
                        $.ajax({
                            url: '<?php echo base_url('ajax/ajaxCidade/') ?>' + stateID,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="cidade"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="cidade"]').append('<option value="' + value.idcidade + '">' + value.nome_cidade + '</option>');
                                });
                                $('select[name="cidade"]').prop('disabled', false);
                            }
                        });
                    } else {
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

        <form  method="post" action="<?php echo base_url('adm/formacao/add') ?>">
            <div class="cadastro" style="
                 display: table; width: 25%; height: 200px;
                 margin: 100px auto 0;">
                <div class="row" style="padding-top:0px;">    
                    <fieldset>
                        <legend><strong>Adicione cursos</strong></legend>
                    </fieldset>
                    <label>Formação:</label><br> 
                    <input class="form-control" type="text" required="" size="20" name="formacao" id=""></td></tr>

                    <tr> <td></td><td><button class="btn btn-success btn-block" type="submit" style="margin-top:10px;">Adicionar </button></td></tr>     
                    </form>
                </div>
            </div>
            <div class="cadastro" style="
                 display: table; width: 25%; height: 200px;
                 margin: 100px auto 0;">
                <div class="row" style="padding-top:0px;">    
                    <fieldset>
                        <legend><strong>Lista cursos</strong></legend>
                    </fieldset>
                    <?php foreach ($Formacao as $g): ?>
                        <form  method="post" name="form2" action="<?php echo base_url('adm/formacao/editar/' . $g->idformacao) ?>">
                            <div id="nome"<tr> <td>Edite o curso </div>
                            <tr> <td>Editar:</td><td> 

                      <input <input class="form-control" type="text" name="formacao" value="<?php echo $g->formacao ?>" id="editar" value="Editar"> 
                            <br>
                            <input class="btn btn-success btn-block" type="submit" name="entrar" id="entrar" value="Salvar" style="margin-right:5px; width: 100% ">

                        </form><?php endforeach ?>

                </div>
            </div>

    </body>
</html>
