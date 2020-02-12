<?php
$codigoCelula = $_REQUEST['pesquisa'];
include '../conexao.php';

if($codigoCelula == 'todos')
  $selectMembros = "SELECT membros.codigo AS 'membrosCodigo',membros.nome AS 'membrosNome',membros.email,membros.tipo,membros.telefone,membros.senha,celulas.codigo AS 'celulasCodigo',celulas.nome AS 'celulasNome' FROM membros INNER JOIN celulas WHERE membros.celulas_codigo=celulas.codigo";
else{
  $selectMembros = "SELECT membros.codigo AS 'membrosCodigo',membros.nome AS 'membrosNome',membros.email,membros.tipo,membros.telefone,membros.senha,celulas.codigo AS 'celulasCodigo',celulas.nome AS 'celulasNome' FROM membros INNER JOIN celulas ON membros.celulas_codigo=celulas.codigo WHERE celulas_codigo='$codigoCelula'";
}

$resultado = mysqli_query($con,$selectMembros);
$arrMembros = array();

while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
  array_push($arrMembros, $linha);
}

echo json_encode($arrMembros);

 ?>
