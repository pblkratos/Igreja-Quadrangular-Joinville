<?php
include '../conexao.php';
$nome = $_POST['nomeEvento'];
$dataEvento = $_POST['dataEvento'];
$horaEvento = $_POST['horaEvento'];
$descricao = $_POST['descricaoEvento'];
$logradouro = $_POST['ruaEvento'];
$bairro = $_POST['bairroEvento'];
$numero = $_POST['numeroEvento'];
$designado = $_POST['designado'];
$foto = "nao feito ainda";
$relatorio = "nao feito ainda";
$statuss = 1;
$msg      = "";
$status   = "danger";
$link="../administrador.php?folder=page&file=criarEvento.php&nome=".$nome."&data=".$dataEvento."&hora=".$horaEvento."&bairro=".$bairro."&numero=".$numero."&rua=".$logradouro."&descricao=".$descricao."&designado=".$designado."";

//$link     = "../administrador.php?folder=page&file=criarEvento.php";


if($nome==""){
  $msg = "Nome não preenchido";
}else if($dataEvento==""){
  $msg = "Data não especificada";
}else if($horaEvento==""){
  $msg = "Hora não especificada";
}else if($logradouro==""){
  $msg = "Rua não preenchida";
}else if ($bairro==""){
  $msg = "Bairro não preenchido";
}else if($numero==""){
  $msg = "Numero não preenchido";
}else if($designado=="0"){
  $msg = "Selecione uma opção";
}else if($descricao==""){
  $msg = "Descrição não preenchida";

}else{

include '../conexao.php';
$insert = "INSERT INTO eventos (nome,data,hora,descricao,status,foto,relatorio,logradouro,numero,bairro,designado)
VALUES ('$nome','$dataEvento','$horaEvento','$descricao','$statuss','$foto','$relatorio','$logradouro','$numero','$bairro','$designado')";

$dados = mysqli_query($con,$insert) or die (mysqli_error($con));


if(mysqli_affected_rows($con)>0){
  $status = "success";
  $msg = "Evento criado com sucesso";
  $link = "../administrador.php?folder=page&file=editarEvento.php";
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
