<?php
 require 'Contato.php';//faço a requisição do meu arquivo CONTATO.PHP
 $cont = new Contato();//instâncio a minha CLASS Contato();
 $list = $cont->getlistContact();//armazeno em uma variável o retorno do meu método GETLISTCONTACT();	
?>
<!DOCTYPE html>
<html>
 <head>
  <title>CRUD OO</title>
  <meta charset="utf8">			
 </head>
<body>
  <h2>LISTA DE CONTATOS</h2>
    <a href="add.php">Adicionar novo Contato</a>	
    <table border="1" width="50%;" style="margin-top:1%;">
     <tr>
      <th>NOME</th>
      <th>EMAIL</th>
      <th>AÇÕES</th>
     </tr>
     <?php 
      foreach ($list as $contact)://percorro minha lista com um FOREACH e armazeno em uma variável os dados
     ?>	
     <tr>
      <!--pego os dados necessários-->
      <td><?php echo $contact['nome'];?></td>
      <td><?php echo $contact['email'];?></td>
      <td>
      <!--crio um link para poder redirecionar aos meus arquivos de EDT E EXC e passo o ID do contato-->
      <a href="edt.php?id=<?php echo $contact['id'];?>">EDITAR</a>
      -
      <a href="exc.php?id=<?php echo $contact['id'];?>">EXCLUIR</a>
      </td>	
     </tr>
     <?php endforeach; ?> 
    </table> 
 </body>
</html>