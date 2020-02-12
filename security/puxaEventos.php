<?php

$select = selecionarEvento("SELECT * FROM `eventos` ORDER BY data ASC LIMIT $limite ");

function selecionarEvento($pScript){
  include "database/conexao.php";

  $dados = mysqli_query($con, $pScript) or die(mysqli_connect_error());

  $arrUsuario = array();

  while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
    array_push($arrUsuario, $linha);
  }
  mysqli_close($con);

  return $arrUsuario;
}


?>
