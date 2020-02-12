<?php
include '../conexao.php';
session_start();
$codigo = $_SESSION['codigo'];
$selectUser = "SELECT * FROM membros WHERE codigo = '$codigo'";
$dados = mysqli_query($con,$selectUser) or die (mysqli_error($con));
$arrUser= array();

    while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
        array_push($arrUser,$linha);
    }

    foreach ($arrUser as $value) {
      if($value['tipo']==0){
        $tipo = "Pastor";
      }else if($value['tipo']==1){
        $tipo = "Coordenador";
      }else if($value['tipo']==2){
        $tipo = "Supervisor";
      }else if($value['tipo']==3){
        $tipo = "Lider";
      }else if($value['tipo']==4){
        $tipo = "Vice-Lider";
      }else{
        $tipo = "Membro";
      }
      $codigo = $value['codigo'];
      $nome = $value['nome'];
      $email = $value['email'];
      $telefone = $value['telefone'];
      $senha = $value['senha'];
      $celulas_codigo = $value['celulas_codigo'];

    }

    $selectNome = "SELECT nome FROM celulas WHERE codigo = '$celulas_codigo'";
    $dados = mysqli_query($con,$selectNome) or die (mysqli_error($con));
    $arrNome= array();

        while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
            array_push($arrNome,$linha);
        }
        foreach ($arrNome as $value) {
          $celula = $value['nome'];
        }

      $selectCelula = "SELECT nome,codigo FROM celulas";
      $dados = mysqli_query($con,$selectCelula) or die (mysqli_error($con));
      $arrCelula= array();

          while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
              array_push($arrCelula,$linha);
          }


 ?>
 <style>


a.marginxD{
  margin-top: -80px;
  padding-left: 8px;
  color: #F29999;
}
.hihi{
  width: 200px;
}
.btn-primary{
  margin-right: 10px;
}

.modal-body{
  padding-top: 0px !important;
}
.modal-footer {
    margin-top: 23px;
}
.modal-header {
    padding-bottom: 0;
}

*{font-family: 'Roboto', sans-serif;}

@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 40px;
  width: 40px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  z-index: 1000;
  border-radius: 30px;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #85B4D0;
}
.option-input:checked::before {
  height: 40px;
  width: 40px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 26.66667px;
  text-align: center;
  line-height: 40px;
}
.option-input:checked::after {
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 30%;
}
.option-input.radio::after {
  border-radius: 50%;
}





.cores {
    display: flex;
    width: 200px;
    position: fixed;
    right: -160px;
    top: 20%;
    transition: right 350ms;
    z-index:5;
}
.btn1 {
    width: 40px;
    height: 40px;
    background-color: #000;
    display: flex;
    justify-content: center;
    align-items: center;
    color: rgba(255, 255, 255,0.6);
    font-size: 2rem;
    transition: color 350ms;
    cursor: pointer;
    line-height: 0;
}
.btn1:hover {
    color: rgba(255, 255, 255,1);
}
#btn1 {
    display: none;
}
.paleta {
    box-sizing: border-box;
    border: 1px solid black;
    width: 160px;
    margin: 0;
    padding: 1rem;
    background-color: #eee;
    display: flex;
    flex-wrap: wrap
}
.paleta h4 {
    margin: 0 0 0.5em;
    width: 100%;
}
.paleta .box {
    width: 30px;
    height: 30px;
    box-sizing: border-box;
    border: 1px solid #666;
    cursor: pointer;
    opacity: 0.65;
    transition: background-color 350ms;
}

input:checked + .cores {
    right: 10;
}
input:checked + .cores > .btn {
    color: rgba(255, 255, 255,1);
}

.seleciona{
  width: 20px;
  height: 20px;
  background-color: #000000;
  border: none;
}
.boxx{
  background-color:#00000099 !important;
}

label{
  font-family: Rubik,sans-serif;
}
input{
  font-family: Rubik,sans-serif;
}

h4{
  font-family: Rubik,sans-serif;
}
h5{
  font-family: Rubik,sans-serif;
}
 </style>
 <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">

<script>
$(document).ready(function(){
  $("#seletor_de_cores").click(function(){
    $("#overlay-box").addClass("boxx");
  });
});

// Função que lê a cor escolhida pelo usuário em <input type="color"> e altera a formatação CSS
// do <body id="pagina"> com a cor escolhida.
//function mudar_cor_de_fundo(){
// lê o valor de cor escolhido pelo usuário.
//var cor = document.getElementById("seletor_de_cores").value;
// muda a formatação CSS do <body> background para a cor escolhida
//var element = document.getElementById("overlay-box");
  //element.classList.add("overlay-boxx");
//document.getElementById("overlay-box")element.classList.add = cor;
// opcional: escreve na página a cor escolhida
//document.getElementById("cor_escolhida").innerHTML = "A Cor escolhida é "+cor;
//}


</script>
 <script>

 $(document).ready(function () {
    $('.celula').change(function () {
      $("#mudarCelula").attr("href",$("#mudarCelula").attr("href").substr(0,37) + "&celula=" + this.value);
    });
});
 </script>
             <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Página de Pefil</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Sair</a>
                        <ol class="breadcrumb">
                            <li><a href="administrador.php">Inicio</a></li>
                            <li class="active">Página de Pefil</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                      <?php
                      if(isset($_GET['mensagem'])){
                      ?>
                      <div class="alert alert-<?php echo $_GET['status']; ?>" role="alert">
                        <?php echo $_GET['mensagem']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php
                      }
                      ?>
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
                                <div class="overlay-box" id="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $nome; ?></h4>
                                        <h5 class="text-white"><?php echo $email; ?></h5> </div>
                                </div>
                            </div>

                        </div>
                        <center>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Mudar de Celula
                          </button>
                          <input type="checkbox" id="btn">
                          <div class="cores">
                              <label for="btn1" class="btn1" role="checkbox">&#x270E;</label>
                              <div class="paleta">
                                  <h4>Cores</h4>
                                  <button class="seleciona" id="seletor_de_cores" VALUE="#00000099"> </button>

                              </div>
                          </div>                          </center>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material ex" action="page/editarPerfil.php" method="POST">
                                <div class="form-group">
                                    <label class="col-md-12">Nome completo</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" value="<?php echo $email; ?>"  class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Senha</label>
                                    <div class="col-md-12">
                                        <input type="password" name="senha" value="<?php echo $senha; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Telefone</label>
                                    <div class="col-md-12">
                                        <input type="tex" name="telefone" value="<?php echo $telefone; ?>"  class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Cargo</label>
                                    <div class="col-md-12">
                                        <input type="tex" readonly value="<?php echo $tipo; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Celula Participante</label>
                                    <div class="col-md-12">
                                        <input type="tex" readonly value="<?php echo $celula; ?>"  class="form-control hihi form-control-line"> </div>
                                </div>
                                <button class="btn btn-success">Atualizar o Perfil</button>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escolha uma Célula que deseja participar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">

                      <?php
                      foreach ($arrCelula as $value) {
                        if($celulas_codigo == $value['codigo']){ ?>
                      <INPUT TYPE="RADIO" class='celula option-input checkbox' name="celula" checked VALUE="<?php echo $value['codigo'] ?>"><?php echo " " . $value['nome']; ?>
                      <br><?php }else{ ?>
                        <INPUT TYPE="RADIO" class='celula option-input checkbox' name="celula" VALUE="<?php echo $value['codigo'] ?>"><?php echo " " . $value['nome']; ?>
                            <br>

                        <?php

                      }} ?>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <a id="mudarCelula" href='page/mudandoCelula.php?&id=<?php echo $codigo ?>&celula=<?php echo $celulas_codigo?>'>
                          <button type="button" class="btn btn-primary">Salvar Celula</button>
                        </a>
                      </div>

                  </div>

                </div>
              </div>
            </div>
