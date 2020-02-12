<?php

include 'conexao.php';

$codigoCelula    = $_GET['codigo'];
$nomeCelula      = $_GET['celulasNome'];
$codigoMembro    = $_GET['mc'];
$emailMembro     = $_GET['email'];
$nomeMembro      = $_GET['nome'];
$senhaMembro     = $_GET['senha'];
$telefoneMembro  = $_GET['telefone'];
$tipoMembro      = $_GET['tipo'];

?>

<script>

  $(document).function({

    $("#testequery").focus(function(){
      alert("Ola");


    });


  });

</script>

<style>
.white-box{
margin-left: 200px !important;
width: 700px;
}

.tamanho{
width: 100px;
}

.tamanho2{
width: 150px;
}
.on{
width: 500px;
margin-left: 40px;
margin-bottom: -10px;
border-top-right-radius: 20px;
border-top-left-radius: 20px;
}

</style>

           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Editar Membros</h4> </div>
                   <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="administrador.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Voltar</a>
                       <ol class="breadcrumb">
                           <li><a href="administrador.php">inicio</a></li>
                           <li class="active">Editar Membros</li>
                       </ol>
                   </div>
               </div>
               <center>
               <?php
                     if(isset($_GET['mensagem'])){
                     ?>
                     <div class="alert on alert-<?php echo $_GET['status']; ?>" role="alert">
                       <?php echo $_GET['mensagem']; ?>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <?php
                     }
                     ?></center>
               <!-- /.row -->
               <!-- .row -->
             <div class="row">
                   <div class="col-md-8 col-xs-12">
                       <div class="white-box">
                            <form class="form-horizontal form-material" action="page/editandoMembro.php?mc=<?php echo $codigoMembro ?>" method="POST">
                             <div class="form-group">
                                 <label class="col-sm-12">NOME DA CELULA</label>
                                 <div class="col-sm-12">
                                     <select name="celula" required class="form-control form-control-line">
                                       <option selected value="<?php echo $codigoCelula ?>" ><?php echo $nomeCelula ?></option>
<?php

                                          $selectLider = "SELECT * FROM celulas";
                                          $dados = mysqli_query($con,$selectLider) or die (mysqli_error($con));
                                          $arrLider = array();

                                          while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                                            array_push($arrLider,$linha);
                                          }

                                          foreach ($arrLider as $value) {

                                            echo "<option value=".$value['codigo'].">" . $value['nome'] . "</option>;";

                                          }

?>
                                      </select>
                                 </div>
                            </div>
                               <div class="form-group">
                                   <label class="col-md-12">MEMBRO</label>
                                   <div class="col-md-12">
                                       <input type="text" required maxlength="45" placeholder="" value="<?php echo $nomeMembro ?>"  name="nomeMembro" class="form-control form-control-line">
                                       <input type="text" hidden placeholder="" value="<?php echo $nomeCelula ?>"  name="nomeCelula" class="">
                                     </div>
                               </div>

                               <div class="form-group">
                                   <label class="col-md-12">E-MAIL</label>
                                   <div class="col-md-12">
                                       <input type="text" class="form-control form-control-line" required  value="<?php echo $emailMembro ?>"min="2019-04-01" max="2021-04-20" name="emailMembro" >
                                     </div>
                               </div>

                               <div class="form-group">
                                   <label class="col-md-12">SENHA</label>
                                   <div class="col-md-12">
                                       <input type="password" required name="senhaMembro" required value="<?php echo $senhaMembro ?>" class="form-control form-control-line"> </div>
                               </div>

                                 <div class="form-group">
                                   <label class="col-md-12">TELEFONE</label>
                                   <div class="col-md-12">
                                       <input type="text" maxlength="45" required  value="<?php echo $telefoneMembro ?>" name="telefoneMembro" class="form-control form-control-line" > </div>
                               </div>

                               <div class="form-group">
                                   <label class="col-md-12">TIPO</label>
                                   <div class="col-md-12">
                                       <input type="text" maxlength="45" required name="tipoMembro" value="<?php echo $tipoMembro ?>" class="form-control form-control-line"> </div>
                               </div>

                               <div class="form-group">
                                   <div class="col-sm-12">
                                      <input class="btn btn-success" type="submit" value="Salvar Membro">

                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               <!-- /.row -->
           </div>
