<?php
session_start();
$senha = $_POST['novasenha'];
$confsenha = $_POST['confsenha'];
$id = $_POST['codigo'];

$atualizar = "UPDATE membros SET senha='$senha' WHERE codigo='$id'";

include '../database/conexao.php';

if ($senha == $confsenha){
  $dados = mysqli_query($con, $atualizar) or die(mysqli_connect_error());
  $_SESSION['senha'] = $senha;
}
?>
