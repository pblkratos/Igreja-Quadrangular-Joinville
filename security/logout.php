<?php
session_start();
$_SESSION['email'] = "";
$_SESSION['nome'] = "";
$_SESSION['senha'] = "";
$_SESSION['codigo'] = "";
$_SESSION['id_sessao'] = "";
header('Location: ../index.php');
?>
