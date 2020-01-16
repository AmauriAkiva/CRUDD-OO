<?php
class Contato {
  //crio meu método construtor que recebe minha conexão com o banco de dados
  public function __construct(){
   //coloco minha conexão dentro de um TRY CATCH
   try{
    $this->pdo = new PDO("mysql:dbname=crudoo;host=127.0.0.1", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   }catch(PDOException $e){
    echo "FALHOU!!".$e->getMessage();
   }	
  }
  //crio um método que lista os contatos
  public function getlistContact(){
  $list = array();
  $sql = "SELECT * FROM contato WHERE status = 'a'";
  $sql = $this->pdo->query($sql);
   if ($sql->rowCount() > 0) {
    $list = $sql->fetchAll();
   }
   return $list;	
  }
  //crio um método que pega os dados do contato pelo ID
  public function getInfoContact($id){
  $info = array();
  $sql = $this->pdo->prepare("SELECT * FROM contato WHERE id = :id");
  $sql->bindValue(":id", $id);
  $sql->execute();
   if ($sql->rowCount() > 0) {
    $info = $sql->fetch();
   }
   return $info;	
  }	
  //crio um método que adiciona os novos contatos
  public function addContact($nome, $email){
    $sql = $this->pdo->prepare("INSERT INTO contato SET nome = :nome, email = :email");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":email", $email);
    $sql->execute();	 	
  }
  //crio um método que edita os dados do contato
  public function edtContact($nome, $email, $id){
   if ($this->emailExist($email) == false) {
   $sql = $this->pdo->prepare("UPDATE contato SET nome = :nome, email = :email WHERE id = :id");
   $sql->bindValue(":nome", $nome);
   $sql->bindValue(":email", $email);
   $sql->bindValue(":id", $id);
   $sql->execute();
   }else{
    $sql = $this->pdo->prepare("UPDATE contato SET nome = :nome WHERE id = :id");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":id", $id);	
    $sql->execute();
   }	
  }
  //crio um método que "exclui" os dados do contato
  public function excContact($id){
   $sql = $this->pdo->prepare("UPDATE contato SET status = :status WHERE id = :id");
   $sql->bindValue(":status", 'c');
   $sql->bindValue(":id", $id);
   $sql->execute();
  }
  //crio um método que verifica se o email existe
  public function emailExist($email){
  $sql = $this->pdo->prepare("SELECT email FROM contato WHERE email = :email");
  $sql->bindValue(":email", $email);
  $sql->execute();
   if ($sql->rowCount() > 0) {
    return true;
   }else{
    return false;
  }
 }	
}
?>








