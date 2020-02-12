<style>
.white-box{
  margin-left: 130px !important;
  width: 900px;
}

.tamanho{
  width: 150px;
}

.tamanho2{
  width: 270px;
}

.input-group-addon{
  border-right-color: #fff;
  border-top-color: #fff;
  background-color: #fff;
}

 .btn1{
   background-color: #F08080 !important;
   border-color: #F08080 !important;
 }

 .on{
 width: 50%;
 margin-left: 40px;
 margin-bottom: -10px;
 border-top-right-radius: 20px;
 border-top-left-radius: 20px;
 }
</style>

<div class="container-fluid">
                 <div class="row bg-title">
                     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">Gerenciar Celulas</h4> </div>
                     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="administrador.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Voltar</a>
                         <ol class="breadcrumb">
                             <li><a href="administrador.php">Inicio</a></li>
                             <li class="active">Editar/Excluir Celulas</li>
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
                     <div class="col-sm-12">
                         <div class="white-box">
                             <h3 class="box-title">CELULAS

                             </h3>
                             <div class="table-responsive">
                                 <table class="table ">
                                     <thead>
                                         <tr>
                                             <th>NOME DA CELULA</th>
                                             <th>RUA</th>
                                             <th>NUMERO</th>
                                             <th>BAIRRO</th>
                                             <th>AÇÃO</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <?php

                                 $selectMembro ="SELECT * FROM celulas";

                                 $dados = mysqli_query($con,$selectMembro) or die (mysqli_error());
                                 $arrMembros = array();
                                 while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                                         array_push($arrMembros,$linha);
                                   }

                                     $alou = 5;

                                     foreach ($arrMembros as $value) {
                                       $descricao = "";
                                       $codigoCelula = $value['codigo'];
                                      echo "<tr class='table-light'>";
                                      echo "<td>". $value["nome"] . "</td>";
                                      echo "<td>". $value["logradouro"] . "</td>";
                                      echo "<td>". $value["numero"] . "</td>";
                                      echo "<td>". $value["bairro"]. "</td>


                                      <td>
                                      <a href='administrador.php?folder=page&file=editandoCelula.php&nome=".$value['nome']."&data=".$value['data']."&hora=".$value['hora']."&descricao=".$value['descricao']."&logradouro=".$value['logradouro']."&numero=".$value['numero']."&bairro=".$value['bairro']."&id=".$value['codigo']."'>
                                          <button class='btn btn-primary'>Editar</button>
                                      </a>
                                       <a href='page/excluirCelula.php?&id=".$codigoCelula."'>
                                          <button class='btn btn1 btn-primary'>Excluir</button>
                                      </a>
                                      </td>";
                                     }

                                ?>


                                     </tbody>
                                 </table>  </div>
                         </div>
                     </div>
                 </div>
             <!-- /.container-fluid -->
         </div>
