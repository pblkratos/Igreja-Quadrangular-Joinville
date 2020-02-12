<?php
include '../conexao.php';

$codigoCelula = $_POST['codigoCelula'];
$nomeCelula    = $_POST['nomeCelula'];
$logradouroCelula = $_POST['logradouroCelula'];
$numeroCelula = $_POST['numeroCelula'];
$bairroCelula = $_POST['bairroCelula'];
$msg      = "";
$status   = "danger";
$link     = "../administrador.php?folder=page&file=editandoCelula.php&id=".$codigoCelula."&nome=".$nomeCelula."&logradouro=".$logradouroCelula."&bairro=".$bairroCelula."&numero=".$numeroCelula."";


if($nomeCelula==""){
  $msg = "Nome não preenchido";
}else if($logradouroCelula==""){
  $msg = "Rua não preenchida";
}else if ($numeroCelula==""){
  $msg = "Numero não preenchido";
}else if($bairroCelula==""){
  $msg = "Bairro não preenchido";
}else{

include '../conexao.php';
$editarEvento = "UPDATE celulas set nome='$nomeCelula',logradouro='$logradouroCelula',numero='$numeroCelula',bairro='$bairroCelula' where  codigo='$codigoCelula';";
$dados = mysqli_query($con, $editarEvento) or die(mysqli_connect_error($con));


if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Celula editada com sucesso";
  $link = "../administrador.php?folder=page&file=editarCelula.php";
}else if(mysqli_affected_rows($con)==0){
  $status   = "warning";
  $msg = "Voce precisa editar algo";
}else{
  $msg = "Celula não editada";
}
}

header("Location: ".$link."&mensagem=".$msg."&status=".$status);



//recebo o último id
//$idEvento = mysqli_insert_id($con);

//$insert = "INSERT INTO membros_has_eventos VALUES (1,'$idEvento')";
//$dados = mysqli_query($con,$insert) or die (mysqli_error());

 ?>
