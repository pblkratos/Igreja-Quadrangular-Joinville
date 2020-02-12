<?php
include '../conexao.php';
$codigoEvento = $_GET['id'];

$deletarreg = "DELETE FROM eventos WHERE codigo='$codigoEvento'";
$dados = mysqli_query($con, $deletarreg) or die(mysqli_connect_error());

header("Location: ../administrador.php");


 ?>
