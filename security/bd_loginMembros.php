<?php
$email = $_POST['email'];
$senha = $_POST['passw'];
$dbEmail = "SELECT email FROM membros where email='$email'";
$dbSenha = "SELECT senha FROM membros where email='$email' AND senha='$senha'";

$msg = "E-mail e/ou senha inválido(s)";
$status = "success";

include ("../database/conexao.php");

//---------Puxa email = $email---------
  $verificaEmail = mysqli_query($con, $dbEmail);
  $resultEmail = mysqli_affected_rows($con);

//---------Puxa senha = $senha---------
  $verificaSenha = mysqli_query($con, $dbSenha);
  $resultSenha = mysqli_affected_rows($con);

//---------Verifica linhas afetadas e valida---------

  //---------Se coincidirem, o usuário será logado---------
  if ($resultEmail > 0 AND $resultSenha > 0) {
    $verificaId = "SELECT * FROM membros WHERE email='$email'";
    $puxaId = mysqli_query($con, $verificaId);
    $arrayId = array();
    while ($linha = mysqli_fetch_array($puxaId, MYSQLI_ASSOC)) {
      array_push($arrayId,$linha);
    }
    foreach ($arrayId as $value) {
      session_start();
      $_SESSION['nome'] = $value['nome'];
      $_SESSION['codigo'] = $value['codigo'];
      $_SESSION['tipo'] = $value['tipo'];
      $_SESSION['senha'] = $value['senha'];
      $_SESSION['email'] = $value['email'];
      $_SESSION['telefone'] = $value['telefone'];
      $_SESSION['celula'] = $value['celulas_codigo'];
      $_SESSION['id_sessao'] = session_id();

//---------Verificação entre membro ou líder+ ---------
    if($_SESSION['tipo'] < 4){
      $msg = "Adm, ".$_SESSION['nome']."- Logado";
      header ("Location: ../admin/admin/administrador.php?cod=".$_SESSION['codigo']);
    }else{
      $msg = "Membro, ".$_SESSION['nome']."- Logado";
      header ("Location: ../index.php?cod=".$_SESSION['codigo']);

  }
}
//---------caso não, informará um erro---------
}else{
  mysqli_close($con);
  $msg = "Email inválido ou não cadastrado, deseja cadastrar? <a class='cadastroLinks' href='cadastroMembros.php?email=$email'>Clique Aqui</a>";
  $status = "danger";
  header ("Location: ../pages/loginMembros.php?status=".$status."&msg=".$msg);
}
?>
