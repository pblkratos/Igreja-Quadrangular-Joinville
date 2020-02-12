<?php
include '../conexao.php';
$nome = $_POST['nomeCelula'];
$logradouro = $_POST['ruaCelula'];
$bairro = $_POST['bairroCelula'];
$numero = $_POST['numeroCelula'];
$msg      = "";
$status   = "danger";
$link     = "../administrador.php?folder=page&file=cadastroCelula.php&nome=".$nome."&logradouro=".$logradouro."&bairro=".$bairro."&numero=".$numero."";

//$link     = "../administrador.php?folder=page&file=cadastroCelula.php";


if($nome==""){
  $msg = "Nome não preenchido";
}else if($logradouro==""){
  $msg = "Rua não preenchida";
}else if ($bairro==""){
  $msg = "Bairro não preenchido";
}else if($numero==""){
  $msg = "Numero não preenchido";
}else{

include '../conexao.php';
$insert = "INSERT INTO celulas (nome,logradouro,numero,bairro) VALUES ('$nome','$logradouro','$numero','$bairro')";
$dados = mysqli_query($con,$insert) or die (mysqli_error($con));



if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Celula criada com sucesso";
  $link = "../administrador.php?folder=page&file=editarCelula.php";
}else if(mysqli_affected_rows($con)==0){
  $status   = "warning";
  $msg = "Voce precisa escrever algo";
}else{
  $msg = "Evento não criado";
}
}

header("Location: ".$link."&mensagem=".$msg."&status=".$status);



//recebo o último id
//$idEvento = mysqli_insert_id($con);

//$insert = "INSERT INTO membros_has_eventos VALUES (1,'$idEvento')";
//$dados = mysqli_query($con,$insert) or die (mysqli_error());

 ?>
