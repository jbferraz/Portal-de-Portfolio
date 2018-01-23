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

       <form  method="post" name="form1" action="<?php echo base_url('adm/local/addc') ?>"> 
           <input type="hidden" name="idestado" value="<?php echo $idestado ?>">
            <div id="nome"<tr> <td>Adicione cidade </div>
            <tr> <td>Cidade:</td><td> <input type="text" size="20" name="cidade" id=""></td></tr>

            <tr> <td></td><td><input type="submit" name="entrar" id="entrar" value="Adicionar"></td></tr>     
        </form>
        <?php if (!empty($cidade)): ?>
        <?php foreach ($cidade as $g): ?>
            <form  method="post" name="form2" action="<?php echo base_url('adm/local/editarc/' . $g->idcidade) ?>">
                <div id="nome"<tr> <td>Edite a cidade </div>
                <tr> <td>Editar:</td><td> 

                <tr> <td></td><td><input type="text" name="cidade" value="<?php echo $g->nome_cidade ?>" id=""></td></tr>  
                <tr> <td></td><td><input type="submit" name="editar" id="editar" value="Editar"></td></tr>   

            </form>
                <?php endforeach ?>
        <?php endif ?>
        
    </body>
</html>
