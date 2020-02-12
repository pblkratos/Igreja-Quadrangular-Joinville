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