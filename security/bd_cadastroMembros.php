<?php
$nome = $_POST["name"];
$telefone = $_POST["tel"];
$senha = $_POST["passw"];
$csenha = $_POST["confpassw"];
$email = $_POST["email"];
$celula = $_POST["celula"];

$status = "";
$msg = "";

$inserir = "INSERT INTO membros (tipo,nome,senha,email,celulas_codigo,telefone) VALUES(5,'$nome','$senha','$email','$celula','$telefone')";

include ("../database/conexao.php");
$select = "SELECT * FROM membros WHERE email='{$email}'";
$dados = mysqli_query($con, $select) or die(mysqli_connect_error());

$hasEmail = mysqli_affected_rows($con);

if($hasEmail > 0){
	mysqli_close($con);
	$status = "danger";
	$msg = "Email já cadastrado";
	header ("Location: ../pages/cadastroMembros.php?nome=".$nome."&telefone=".$telefone."&msg=".$msg."&status=".$status);
}else if($senha != $csenha){
	mysqli_close($con);
	$status = "danger";
	$msg = "Senhas não conferem";
	header ("Location: ../pages/cadastroMembros.php?nome=".$nome."&email=".$email."&telefone=".$telefone."&msg=".$msg."&status=".$status);
}else{
	$dados = mysqli_query($con, $inserir) or die(mysqli_connect_error());
	mysqli_close($con);
	$status = "success";
	$msg = "Usuário cadastrado com sucesso";
	header ("Location: ../pages/loginMembros.php?msg=".$msg."&status=".$status);
}
?>
