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

						 <center>
					 		<div class="headerCadastro">
					 			<input type="button" onclick="window.location.href='../index.php'" class="back backicon" value="Voltar">
					 		</div>

					 		<div class="boxCadastro">

					 			<div class="rightbox">
					 				<p class ="titulo">Cadastro<p>
										<form action="../security/bd_cadastroMembros.php" autocomplete="off" method="post">
					 						<input type="text" class="inputs" required value="<?php if(isset($_GET['nome'])) echo $_GET['nome'] ?>" name="name" placeholder="Nome completo*">
					 							<label for="name" class="label-nome">Insira seu nome completo</label>
					 						<input type="email" class="inputs" name="email" required value="<?php if(isset($_GET['email'])) echo $_GET['email'] ?>" placeholder="E-mail*">
					 							<label for="email" class="label-nome">Insira um e-mail válido</label>
					 						<input type="tel" class="inputs" name="tel" value="<?php if(isset($_GET['telefone'])) echo $_GET['telefone'] ?>" minlength="11" maxlength="11" placeholder="Telefone">
					 							<label for="tel" class="label-nome">Insira seu telefone</label>

					 						<select required class="inputs" name="celula">
					 							<option class="personalizar-option" value=''>Escolha sua celula*</option>
					 						<?php

					 							$celulas = "SELECT codigo,nome FROM celulas";
					 							include ("../database/conexao.php");
					 							$dadosCelulas = mysqli_query($con, $celulas);

					 							if (isset($dadosCelulas)){
					 								foreach ($dadosCelulas as $value) {
					 									$codigoCelula = 0;
					 									$nomeCelula   = "";

					 									$codigoCelula = $value['codigo'];
					 									$nomeCelula = $value['nome'];

					 									echo "<option class='personalizar-option' value='$codigoCelula'>$nomeCelula</option>";
					 							}}
											mysqli_close($con);
					 						?>

					 						</select>
					 						<input type="password" class="inputs" minlength="4" name="passw" required placeholder="Senha*">
					 							<label for="passw" class="label-nome">Crie sua senha</label>
					 						<input type="password" class="inputs" minlength="4" name="confpassw" required placeholder="Confirmar Senha*">
					 							<label for="confpassw" class="label-nome">Confirme sua senha</label>

					 						<input type="submit" class="btnConfirma" value="Confirmar">
					 						<div>
												<br>
					 							<a class="cadastroLinks" href="../index.php">Esqueci minha senha</a> | <a class="cadastroLinks" href="loginMembros.php">Já tenho uma conta</a>
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
	</section>


</body>
</html>

<?php

?>
