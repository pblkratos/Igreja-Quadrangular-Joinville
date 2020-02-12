<?php
session_start();
$foto = $_POST['foto'];
$id = $_POST['codigo'];

$atualizar = "UPDATE membros SET foto='$foto' WHERE codigo='$id'";

include '../database/conexao.php';

if ($foto != "") {
  $dados = mysqli_query($con, $atualizar) or die(mysqli_connect_error());

   $_SESSION['foto'] = $foto;
}else{
  $_SESSION['foto'] = "https://i.imgur.com/IGviWrd.png";

}
?>
