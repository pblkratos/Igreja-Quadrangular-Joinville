<script>
function validar(){
	var nome = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var senha = document.getElementById("passw").value;
	var csenha = document.getElementById("confpassw").value;

	if(nome==""){
		alert("Campo NOME obrigatório!");
		return false;
		exit;
	}else if(email==""){
		alert("Campo E-MAIL obrigatório!");
		return false;
		exit;
	}else if(senha==""){
		alert("Campo SENHA obrigatório!");
		return false;
		exit;
		}else if(senha==csenha){
			alert("Confirmado");
			return true;
		}else{
			alert("Senhas não correspondem");
			return false;
			}
}
</script>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/cadastrostyle.css">
	<script type="text/javascript" src="../assets/js/cadastrojava.js"></script>
	<script type="text/javascript" src="../assets/js/notify.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body class="tudo">
	<section id="home" class="js-fullheight"  style="height: 100%; background-image: url(../assets/images/bg_1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
	<div class="overlay js-fullheight"></div>

	<div class="container">
	       <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	         <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
	           <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong></strong></h1>
	           <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary btn-outline-white px-4 py-3"></a></p>

						 <center>
					 		<div class="headerCadastro">
					 			<input type="button" onclick="window.location.href='../index.php'" class="back backicon" value="Voltar">
					 		</div>

					 		<div class="boxLogin">

					 			<div class="rightboxlogin">
					 				<p class ="titulo">Entrar<p>
										<form action="../security/bd_loginMembros.php" autocomplete="off" method="post">
					 						<input type="email" class="inputslogin" name="email" required value="<?php if(isset($_GET['email'])) echo $_GET['email'] ?>" placeholder="E-mail">
					 							<label for="email" class="label-nomelogin">Digite seu <strong>e-mail</strong></label>
					 						<input type="password" class="inputslogin" minlength="4" name="passw" required placeholder="Senha">
					 							<label for="passw" class="label-nomelogin">Digite sua <strong>senha</strong></label>
					 						<input type="submit" class="btnEntrar" value="Entrar">
					 						<div>
												<br>
					 							<a class="cadastroLinks" href="../index.php">Esqueci minha senha</a><br><br><a class="cadastroLinks" href="cadastroMembros.php">Não sou cadastrado</a>
					 						</div>
										</form>
										<?php
										if(isset($_GET['msg'])){
										?>
										<div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
											<strong><?php echo $_GET['msg'] ?></strong> <?php if($_GET['status'] == 'danger'){ echo ' - Tente novamente'; }?>
										</div>
										<?php
										}
										?>

					 			</div>
					 		</div>

					 	</center>

					 </div>
	       </div>
	     </div>
	</section>


</body>
</html>

<?php

?>
