<?php
include '../conexao.php';

$codigoCelula = $_GET['celula'];
$codigoMembro = $_GET['id'];
$msg      = "";
$status   = "danger";
$link     = "../administrador.php?folder=page&file=profile.php";


echo $codigoMembro;
echo $codigoCelula;
$update = "UPDATE membros SET celulas_codigo = '$codigoCelula' WHERE codigo = '$codigoMembro'";
$dados = mysqli_query($con,$update) or die (mysqli_error());

if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Mudança de celula efetuada";
  $link = "../administrador.php?folder=page&file=profile.php";
}else if(mysqli_affected_rows($con)==0){
  $status   = "warning";
  $msg = "Voce precisa editar algo em seu perfil";
}else{
  $msg = "Mudança de celula não efetuada";
}


header("Location: ".$link."&mensagem=".$msg."&status=".$status);

 ?>
