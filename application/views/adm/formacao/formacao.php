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
        
        <form  method="post" name="form1" action="<?php echo base_url('adm/formacao/add')?>">
            <div id="nome"<tr> <td>Adicione cursos </div>
            <tr> <td>Formação:</td><td> <input type="text" size="20" name="formacao" id=""></td></tr>
          
        <tr> <td></td><td><input type="submit" name="entrar" id="entrar" value="Adicionar"></td></tr>     
        </form>
        
         <?php foreach ($Formacao as $g): ?>
       <form  method="post" name="form2" action="<?php echo base_url('adm/formacao/editar/'.$g->idformacao)?>">
            <div id="nome"<tr> <td>Edite o curso </div>
            <tr> <td>Editar:</td><td> 
          
        <tr> <td></td><td><input type="text" name="formacao" value="<?php echo $g->formacao?>" id="editar" value="Editar"></td></tr>  
         <tr> <td></td><td><input type="submit" name="entrar" id="entrar" value="Editar"></td></tr>   
        
       </form><?php endforeach ?>
   
       
    </body>
</html>
