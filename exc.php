<?php
 require 'Contato.php';//faço a requisição do meu arquivo CONTATO.PHP
 $cont = new Contato();//instâncio a minha CLASS Contato();
 if (!empty($_GET['id'])) {
  $id = addslashes($_GET['id']);
  $cont->excContact($id);
  header("Location: index.php");
 }
?>