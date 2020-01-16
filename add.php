<?php
  require 'Contato.php';//faço a requisição do meu arquivo CONTATO.PHP
  $cont = new Contato();//instâncio a minha CLASS Contato();
  //verfico se foi enviado os POST	
  if(isset($_POST['nome']) && !empty($_POST['nome'])){
   $nome = addslashes($_POST['nome']);
   $email = addslashes($_POST['email']);
   //instâncio meu método ADDCONTACT e passo os valores dos POST
   if ($cont->emailExist($email) == false) {
   $cont->addContact($nome, $email);
   header("Location: index.php");
   }else{
   echo "ESTE EMAIL JÁ FOI CADASTRADO!!";
   }	
  }	
?>
<h3>ADICIONAR NOVO CONTATO</h3>
<form method="post">
NOME:</br>
<input type="text" name="nome" required></br></br>
NOME:</br>
<input type="email" name="email" required></br></br>
<input type="submit" value="Cadastrar">
</form>