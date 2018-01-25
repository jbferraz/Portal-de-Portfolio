<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form  method="post" name="form1" action="<?php echo base_url('adm/local/add') ?>">
            <div id="nome"<tr> <td>Adicione estados </div>
            <tr> <td>Estados:</td><td> <input type="text" size="20" name="estado" id=""></td></tr>

            <tr> <td></td><td><input type="submit" name="entrar" id="entrar" value="Adicionar"></td></tr>     
        </form>
        <?php foreach ($Estado as $g): ?>
            <form  method="post" name="form2" action="<?php echo base_url('adm/local/editar/' . $g->idestado) ?>">
                <div id="nome"<tr> <td>Edite o estado </div>
                <tr> <td>Editar:</td><td> 

                <tr> <td></td><td><input type="text" name="estado" value="<?php echo $g->nome_estado ?>" id=""></td></tr>  
                <tr> <td></td><td><input type="submit" name="editar" id="editar" value="Editar"></td></tr>   

            </form><?php endforeach ?>

    </body>
</html>
