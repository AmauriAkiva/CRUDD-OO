<?php
  require 'Contato.php';//faço a requisição do meu arquivo CONTATO.PHP
  $cont = new Contato();//instâncio a minha CLASS Contato();
  //verfico se existe o ID do contato	
  if(!empty($_GET['id'])){
   $id = addslashes($_GET['id']);
   $info = $cont->getInfoContact($id);
   }else{
   header("Location: index.php");	
  }
  if(isset($_POST['nome']) && !empty($_POST['nome'])){
   $nome = addslashes($_POST['nome']);
   $email = addslashes($_POST['email']);
   //instâncio meu método EDTCONTACT() e passo os valores enviados pelo POST	
   $cont->edtContact($nome, $email, $id);
   header("Location: index.php"); 
  }	
?>
<h3>EDITAR CONTATO</h3>
<form method="post">
NOME:</br>
<input type="text" name="nome" value="<?php echo $info['nome'];?>" required></br></br>
NOME:</br>
<input type="email" name="email" value="<?php echo $info['email'];?>" required></br></br>
<input type="submit" value="Cadastrar">
</form>