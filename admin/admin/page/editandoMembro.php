<?php
$celula = $_POST['celula'];
$celulaNome = $_POST['nomeCelula'];
$nome = $_POST['nomeMembro'];
$email = $_POST['emailMembro'];
$senha = $_POST['senhaMembro'];
$telefone = $_POST['telefoneMembro'];
$tipo = $_POST['tipoMembro'];
$codigo = $_GET['mc'];

$msg      = "";
$status   = "danger";

$link     = "../administrador.php?folder=page&file=editarMembros.php&codigo=".$celula."&celulasNome=".$celulaNome."&mc=".$codigo."&nome=".$nome."&senha=".$senha."&email=".$email."&telefone=".$telefone."&tipo=".$tipo."";

$atualizaMembro = "UPDATE membros SET celulas_codigo='$celula',nome='$nome',email='$email',senha='$senha',telefone='$telefone',tipo='$tipo' WHERE codigo='$codigo'";
include ("../conexao.php");
mysqli_query($con,$atualizaMembro);

if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Membro editado com sucesso";
  $link = "../administrador.php?folder=page&file=gerenciarMembros.php";
}else if(mysqli_affected_rows($con)==0){
  $status   = "warning";
  $msg = "Voce precisa editar algo";
}



mysqli_close($con);
header("Location: ".$link."&mensagem=".$msg."&status=".$status);
?>
