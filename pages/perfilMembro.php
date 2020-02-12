<?php
$fotoPerfil = "https://image.freepik.com/vetores-gratis/vetor-de-papel-de-parede-abstrato-dinamico-padrao_53876-59131.jpg";
include ("../database/conexao.php");
$limit = 2;
session_start();

$countSql = "SELECT COUNT(codigo) FROM eventos";
$result = mysqli_query($con, $countSql);
$row = mysqli_fetch_row($result);
$total_records = $row[0];
$tot_pages = ceil($total_records / $limit);
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$p = "SELECT * FROM eventos ORDER BY data ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $p);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/jquery-3.2.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/notify.min.js"></script>
    <script type="text/javascript" src="../assets/dist/jquery.mask.min.js"></script>

    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="../assets/js/modernizr.custom.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>


    <link href="../assets/css/style.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/perfilMembro.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet">
    <title></title>
  </head>

  <script>

  $(document).ready(function(){

/* FOTO DE PERFIL -------------------------------------------------------------- */

    $("#alteraFoto").click(function(alterarfoto){
      $("#alteraFoto").hide();
      $("#avatar").removeAttr("hidden");
      $("#confirmaFoto").removeAttr("hidden");
    });

    $("#confirmaFoto").click(function(confirmarfoto){
      $.ajax({
        url:'../security/bd_editaFoto.php',
        type: 'POST',
        data: $('#formFoto').serialize(),
        success: function(result){
          $("#alteraFoto").show();
          $("#avatar").attr("hidden",true);
          $("#confirmaFoto").attr("hidden",true);
        }
      });
    });

/* EDITAR NOME E TEL ----------------------------------------------------------- */

/* ---------- BOTÃO EDITAR */

  $("#editar").click(function(editarperfil){
    $("#name,#phone").removeAttr("readonly");
    $("#editar").hide();
    $("#cancelar,#confirmar").removeAttr("hidden");
    $("#name,#phone").removeClass("alterado");
    $('#name').focus();
  });

/* ---------- BOTÃO CANCELAR */

  $("#cancelar").click(function(cancelarperfil){
    $("#name,#phone").attr("readonly",true);
    $("#cancelar,#confirmar").attr("hidden",true);
    $("#editar").show();
  });

/* ---------- BOTÃO CONFIRMAR */

  $("#confirmar").click(function(confirmarperfil){
    if ($("#phone").val().length >= 10 && $("#name").val() != ""){
      $.ajax({
        url:'../security/bd_editaInfo.php',
        type: 'POST',
        data: $('#formMembros').serialize(),
        success: function(result){
          $("#name,#phone").attr("readonly",true);
          $("#editar").show();
          $("#cancelar,#confirmar").attr("hidden",true);
          $('#name,#phone').addClass('alterado');
          setTimeout(function() {
          $('#name,#phone').removeClass('alterado');
        }, 2000);
        }
      });
    }else if($("#name").val() == ""){
      $("#name").notify("Preenchimento Obrigatório",{ position:"right" });
      $('#name').addClass('erro');
      setTimeout(function() {
      $('#name').removeClass('erro');
        }, 2000);
      $('#name').focus();
    }else{
      $("#phone").notify("Preenchimento Obrigatório",{ position:"right" });
      $('#phone').addClass('erro');
      setTimeout(function() {
      $('#phone').removeClass('erro');
        }, 2000);
      $('#phone').focus();
    };
    });

/* EDITAR SENHA ---------------------------------------------------------------- */

/* ---------- BOTÃO EDITAR */

  $("#editarSenha").click(function(editarsenha){
    alert($("#passw").val());
    var atualsenha = $("#passw").val();
    $("#passw").removeAttr("readonly");
    $("#editarSenha").hide();
    $("#cancelarSenha,#confirmarSenha").removeAttr("hidden");
    $('#passw').focus();
    $("#confirmarSenha").click(function(confirmarsenha){
      if ($("#passw").val() == atualsenha) {
        $("#passw,#senha,#divsenhaatual").attr("hidden",true);
        $("#novasenha,#novapassw").removeClass("inputOp");
        $("#novasenha,#novapassw").removeAttr("readonly");
        $("#divsenha,#confsenha,#confpassw").removeAttr("hidden");
        $("#confsenha,#confpassw").removeAttr("readonly");
        $("#novasenha").focus();
        $("#confirmarSenha").attr("hidden",true);
        $("#confirmarSenha2").removeAttr("hidden");
      }else{
          $("#passw").focus();
          alert("senha incorreta");
      };
    });
  });

  $("#confirmarSenha2").click(function(confirmarsenha){
    if ($("#novasenha").val().length >= 4 && $("#confpassw").val().length >= 4) {
      if ($("#novasenha").val() == $("#confpassw").val()) {
        $.ajax({
          url:'../security/bd_editaSenha.php',
          type: 'POST',
          data: $('#formSenha').serialize(),
          success: function(result){
            alert("passou");
          var novasenha = $("#novasenha").val();
          $("#passw").val(novasenha);
          $("#passw").attr("readonly",true);
          $("#novasenha,#novapassw").addClass("inputOp");
          $("#novasenha,#novapassw").attr("readonly",true);
          $("#divsenha,#confsenha,#confpassw").attr("hidden",true);
          $("#passw,#senha,#divsenhaatual").removeAttr("hidden");
          $("#cancelarSenha,#confirmarSenha2").attr("hidden",true);
          $("#editarSenha").show();
          $("#novasenha,#confpassw").val("");
          }
        });
      }else{
        alert("senhas diferentes")
      };
    }else{
      alert("minimo 4 caracteres");
    };
  });
/* ---------- BOTÃO CANCELAR */

  $("#cancelarSenha").click(function(cancelarsenha){
    $("#passw,#confpassw").attr("readonly",true);
    $("#cancelarSenha,#confirmarSenha").attr("hidden",true);
    $("#editarSenha").show();
    $("#confpassw,#confsenha").addClass("inputOp");
    $('#passw,#confpassw').removeClass('erro');
  });

/* ---------- EDITAR CONFIRMAR */



/*$("#confirmarSenha").click(function(confirmarsenha){
    if($("#passw,confpassw").val().length >= 4 && $("#passw").val() == $("#confpassw").val()){
      $.ajax({
        url:'../security/bd_editaSenha.php',
        type: 'POST',
        data: $('#formSenha').serialize(),
        success: function(result){
        $("#cancelarSenha,#confirmarSenha").attr("hidden",true);
        $("#confpassw,#confsenha").addClass("inputOp");
        $("#passw,#confpassw").attr("readonly",true);
        $("#editarSenha").show();
      }
      });
      $('#passw').addClass('alterado');
      setTimeout(function() {
      $('#passw').removeClass('alterado');
    }, 2000);
    }else{
      $('#passw,#confpassw').addClass('erro');
      $("#passw").notify("Senhas não coincidem",{ position:"right" });
      setTimeout(function() {
      $('#passw,#confpassw').removeClass('erro');
      }, 2000);
    $('#passw').focus();
    };
  });*/
});

  $('.testi').mask('99999999990');

  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

  </script>
<body style="background-color: #f0f0f0;">
<div class="container marginbot margintop">
  <div class="row mx-auto">
    <div class="col-md-1">
    </div>
    <div class="col-md-3">
      <img class="fotoPerfil" src="<?php echo $_SESSION['foto'] ?>">
        <center>
        <form id="formFoto" action="" method="POST" autocomplete="off">
        <button type="button" id="alteraFoto" class="btn btn-outline-primary transicao" style="font-size: 10px; padding: -1px; margin-top: 5px;">Alterar foto de perfil</button>
        <button type="button" id="confirmaFoto" hidden class="btn btn-outline-success transicao" style="font-size: 10px; padding: -1px; margin-top: 5px;">Confirmar</button>
        <input type="text" id="avatar" hidden name="foto" class="form-control transicao" style="width: 200px; height: 30px; margin-bottom:-35px; margin-top:5px;" placeholder="insira um link">
        <input type="text" name="codigo" hidden class="form-control shadow" placeholder="Nome Completo" value='<?php echo $_SESSION['codigo'] ?>' readonly>
        </form>
    </div>

    <div class="col-md-3">
      <form id="formMembros" action="" method="POST" autocomplete="off">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <input type="text" name="codigo" hidden class="form-control shadow" placeholder="Nome Completo" value='<?php echo $_SESSION['codigo'] ?>' readonly>
            <span class="input-group-text icon ion-ios-people icon-me" id="celula"></span>
          </div>
          <input type="text" id="cel" name="celula" class="form-control" placeholder="Célula" value='<?php echo $_SESSION['celula'] ?>'readonly>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text icon ion-md-person icon-me" id="nome"></span>
          </div>
          <input type="text" id="name" name="nome" class="form-control" required placeholder="Nome Completo" pattern="[a-z\s]+$" required="required" value='<?php echo $_SESSION['nome'] ?>' readonly>
        </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text icon ion-md-call icon-me" id="telefone"></span>
        </div>
        <input type="text" id="phone" name="tel" class="form-control testi" placeholder="Telefone" value='<?php echo $_SESSION['telefone'] ?>' minlength="10" maxlength="11" required="true" readonly>
      </div>

      <center>
        <button type="button" id="editar" class="btn btn-outline-primary">Editar</button>
        <button type="reset" id="cancelar" hidden class="btn btn-outline-danger">Cancelar</button>
        <button type="button" id="confirmar" hidden class="btn btn-outline-success">Confirmar</button>
      </center>
    </form>


    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-3">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text icon ion-md-mail icon-me" id="email"></span>
        </div>
        <input type="text" id="mail" name="email" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="email" value='<?php echo $_SESSION['email'] ?>'readonly>
      </div>
    <form id="formSenha" action="" method="POST" autocomplete="off">
    <div class="input-group mb-3" id="divsenhaatual">
      <div class="input-group-prepend">
        <input type="text" name="codigo" hidden class="form-control" placeholder="Nome Completo" aria-label="Nome Completo" aria-describedby="nome" value='<?php echo $_SESSION['codigo'] ?>' readonly>
        <span class="input-group-text icon ion-md-lock icon-me" id="senha"></span>
      </div>
      <input type="password" id="passw"  name="senha" class="form-control" placeholder="Senha atual" aria-label="Senha" aria-describedby="senha" value='<?php echo $_SESSION['senha'] ?>'readonly>
    </div>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text icon ion-md-unlock icon-me inputOp" id="novapassw" readonly></span>
      </div>
      <input type="password" id="novasenha" name="novasenha" class="form-control inputOp" placeholder="Nova senha" aria-label="Senha" aria-describedby="senha" value='' readonly>
    </div>

    <div class="input-group mb-3" hidden id="divsenha">
      <div class="input-group-prepend">
        <span class="input-group-text icon ion-md-unlock icon-me" hidden id="confsenha" readonly></span>
      </div>
      <input type="password" id="confpassw" name="confsenha" hidden class="form-control" placeholder="Confirmar Senha" aria-label="Senha" aria-describedby="senha" value='' readonly>
    </div>

    <center>
    <button type="button" id="editarSenha" class="btn btn-outline-primary">Alterar Senha</button>
    <button type="reset" id="cancelarSenha" hidden class="btn btn-outline-danger">Cancelar</button>
    <button type="button" id="confirmarSenha" hidden class="btn btn-outline-success">Confirmar</button>
    <button type="button" id="confirmarSenha2" hidden class="btn btn-outline-success">Alterar</button>
    </center>
    </form>
  </div>

    <div class="col-md-1">
    </div>
  </div>
  <button type="button" onclick="window.location='../security/logout.php';" >sair</button>
</div>

<div class="container-fluid">
  <div class="row boxTitulo">
      <div class='col-md-12 mx-auto text-center'>
        <span class="tituloEvento">Eventos da celula</span>
    </img>
  </div>
</div>

<div class="container">
      <?php
                    if (isset($rs_result)){
                      foreach ($rs_result as $value) {
                        $nomeEvento       = "";
                        $dataEvento       = "";
                        $horaEvento       = "";
                        $logradouroEvento = "";
                        $numeroEvento     = "";
                        $bairroEvento     = "";
                        $diaEvento        = "";

                        $nomeEvento       = $value['nome'];
                        $dataEvento       = $value['data'];
                        $diaEvento        = strtotime($value['data']);
                        $meses = array(
                          '01' => 'JAN',
                          '02' => 'FEV',
                          '03' => 'MAR',
                          '04' => 'ABR',
                          '05' => 'MAI',
                          '06' => 'JUN',
                          '07' => 'JUL',
                          '08' => 'AGO',
                          '09' => 'SET',
                          '10' => 'OUT',
                          '11' => 'NOV',
                          '12' => 'DEZ'
                        );
                        $horaEvento       = $value['hora'];
                        $logradouroEvento = $value['logradouro'];
                        $numeroEvento     = $value['numero'];
                        $bairroEvento     = $value['bairro'];
                        $descricao        = $value['descricao'];
                        $id = $value["codigo"];

echo "
<div class='row'>
<div class='col-md-6 mx-auto'>
  <center>
  <div class='boxEvento testesss'>
    <div class='eventoImg'>
        <img class='fotoEvento' src=".$fotoPerfil.">
    </div>
    <div class='boxData'>
      <div class='eventoMes'>
        <h1>".date('d',$diaEvento)."</h1>
      </div>
      <div class='eventoData'>
        <span>".$meses[date('m',$diaEvento)]."</span>
      </div>
    </div>

    <div class='boxTituloDesc'>
      <div class='eventoNome'>
        <a>".$nomeEvento."</a>
      </div>
      <div class='eventoEndereco'>
        <a>$logradouroEvento, $numeroEvento - $bairroEvento.</a>
      </div>

      <button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#modal_$id' style='margin-top: 30px;'>Ver Mais</button>

    </div>
  </div>
  <!-- Modal -->
<div class='modal fade' id='modal_$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLongTitle'>$nomeEvento</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Data: $dataEvento<br>

        Endereco: Rua $logradouroEvento, $numeroEvento - $bairroEvento.<br>


        $descricao<br>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
      </div>
    </div>
  </div>
</div>
<center>
</div>
</div>
";
}
}
?>

  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-1 mx-auto">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php if(!empty($tot_pages)):for($i=1; $i<=$tot_pages; $i++):
                      if($i == $page):?>
                      <li class='page-item active'  id="<?php echo $i;?>"><a class='page-link' href='perfilMembro.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                      <?php else:?>
                      <li class='page-item' id="<?php echo $i;?>"><a class='page-link' href='perfilMembro.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                  <?php endif;?>
          <?php endfor;endif;?>
        </ul>
      </nav>
    </div>
  </div>
</div>



</body>
</html>
