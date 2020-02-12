<?php
session_start();
$nome = $_POST['nome'];
$telefone = $_POST['tel'];
$id = $_POST['codigo'];

$atualizar = "UPDATE membros SET nome='$nome',telefone='$telefone' WHERE codigo='$id'";

include '../database/conexao.php';

$dados = mysqli_query($con, $atualizar) or die(mysqli_connect_error());

 $_SESSION['nome'] = $nome;
 $_SESSION['telefone'] = $telefone;
?>
