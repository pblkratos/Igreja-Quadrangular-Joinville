<?php
session_start();
$codigo = $_SESSION['codigo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$msg      = "";
$status   = "danger";
$link     = "../administrador.php?folder=page&file=profile.php";

if($nome==""){
  $msg = "Nome não preenchido";
}else if($email==""){
  $msg = "Email não preenchido";
}else if($telefone==""){
  $msg = "Telefone não preenchido";
}else if($senha==""){
  $msg = "Senha não preenchida";
}else{
  include '../conexao.php';


$update = "UPDATE membros SET nome = '$nome',email='$email',senha='$senha',telefone='$telefone' WHERE codigo = '$codigo'";

$dados = mysqli_query($con,$update) or die (mysqli_error($con));

if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Perfil atualziado com sucesso!";
  $link = "../administrador.php?folder=page&file=profile.php";
}else if(mysqli_affected_rows($con)==0){
  $status   = "warning";
  $msg = "Voce precisa editar algo em seu perfil";
}else{
  $msg = "Perfil nao atualizado";
}
}

header("Location: ".$link."&mensagem=".$msg."&status=".$status);

 ?>
