<?php
$codigoCelula = $_GET['id'];
$msg      = "";
$status   = "danger";
$link     = "../administrador.php?folder=page&file=editarCelula.php";

include '../conexao.php';
$deletarreg = "DELETE FROM celulas WHERE codigo='$codigoCelula'";
$dados = mysqli_query($con, $deletarreg);



if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Celula Excluida";
}else{
  $status = "warning";
  $msg = "Existem membros nesta celula e não pode ser excluida";
}


header("Location: ".$link."&mensagem=".$msg."&status=".$status);
 ?>
