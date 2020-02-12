<?php
$codigo  = $_POST['codigoEvento'];
$nome    = $_POST['nomeEvento'];
$data   = $_POST['dataEvento'];
$hora = $_POST['horaEvento'];
$logradouro = $_POST['logradouroEvento'];
$numero= $_POST['numeroEvento'];
$bairro = $_POST['bairroEvento'];
$statuss = $_POST['status'];
$designado = $_POST['designado'];

$msg      = "";
$status   = "danger";
$link="../administrador.php?folder=page&file=editandoEvento.php&id=".$codigo."&data=".$data."&hora=".$hora."&bairro=".$bairro."&numero=".$numero."&rua=".$logradouro."&nome=".$nome."&designado=".$designado."&statuss=".$statuss."";

if($nome==""){
  $msg = "Nome não preenchido";
}else if($data==""){
  $msg = "Data não especificada";
}else if($hora==""){
  $msg = "Hora não especificada";
}else if($logradouro==""){
  $msg = "Rua não preenchida";
}else if ($bairro==""){
  $msg = "Bairro não preenchido";
}else if($numero==""){
  $msg = "Numero não preenchido";
}else if($designado=="0"){
  $msg = "Selecione uma opção";
}else if($statuss=="0"){
  $msg = "Selecione uma opção";
}else{

    include '../conexao.php';
    $editarEvento = "UPDATE eventos SET nome='$nome',data='$data',hora='$hora',logradouro='$logradouro',numero='$numero',bairro='$bairro', status='$statuss', designado='$designado' where  codigo='$codigo'";
    $dados = mysqli_query($con, $editarEvento);


    if(mysqli_affected_rows($con)>0){
      $status = "success";
      $msg = "Evento Editado com sucesso";
      $link = "../administrador.php?folder=page&file=editarEvento.php";
    }else if(mysqli_affected_rows($con)==0){
      $status   = "warning";
      $msg = "Voce precisa escrever algo";
    }else{
      $msg = "Evento não editado";
    }
}

header("Location: ".$link."&mensagem=".$msg."&status=".$status);



//recebo o último id
//$idEvento = mysqli_insert_id($con);

//$insert = "INSERT INTO membros_has_eventos VALUES (1,'$idEvento')";
//$dados = mysqli_query($con,$insert) or die (mysqli_error());

 ?>
