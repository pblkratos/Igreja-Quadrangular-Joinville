<?php
include '../conexao.php';
$codigoMembro = $_GET['codigo'];

$deletarreg = "DELETE FROM membros WHERE codigo='$codigoMembro'";
$dados = mysqli_query($con, $deletarreg) or die(mysqli_connect_error());
mysqli_close($con);
header("Location: ../administrador.php?folder=page&file=gerenciarMembros.php");


 ?>
