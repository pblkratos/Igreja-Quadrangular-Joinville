 <style>
 .white-box{
   margin-left: 100px !important;
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
                          <h4 class="page-title">Gerenciar Eventos</h4> </div>
                      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="administrador.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Voltar</a>
                          <ol class="breadcrumb">
                              <li><a href="administrador.php">Inicio</a></li>
                              <li class="active">Editar/Excluir Eventos</li>
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


                              <h3 class="box-title">EVENTOS

                              </h3>
                              <div class="table-responsive">
                                  <table class="table ">
                                      <thead>
                                          <tr>
                                              <th>NOME DO EVENTO</th>
                                              <th>DATA</th>
                                              <th>HORA</th>
                                              <th>RUA</th>
                                              <th>BAIRRO</th>
                                              <th>STATUS</th>
                                              <th>AÇÃO</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <?php

                                  $selectMembro ="SELECT * FROM eventos";

                                  $dados = mysqli_query($con,$selectMembro) or die (mysqli_error());
                                  $arrMembros = array();
                                  while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                                          array_push($arrMembros,$linha);
                                    }

                                      $alou = 5;

                                      foreach ($arrMembros as $value) {
                                        if($value['status']==1){
                                          $status = "Em andamento";
                                        }else if($value['status']==2){
                                            $status = "Finalizado";
                                        }else{
                                            $status = "Cancelado";
                                        }
                                        $descricao = "";
                                        $codigoEvento = $value['codigo'];
                                        $dataEvento = $value['data'];
                                        $newDate = date("d-m-Y", strtotime($dataEvento));
                                       echo "<tr class='table-light'>";
                                       echo "<td>". $value["nome"] . "</td>";
                                       echo "<td>". $newDate . "</td>";
                                       echo "<td>". $value["hora"] . "</td>";
                                       echo "<td>". $value["logradouro"] . "</td>";
                                       echo "<td>". $value["bairro"] . "</td>";
                                       echo "<td>". $status. "</td>


                                       <td>
                                       <a href='administrador.php?folder=page&file=editandoEvento.php&nome=".$value['nome']."&data=".$value['data']."&hora=".$value['hora']."&statuss=".$value['status']."&rua=".$value['logradouro']."&numero=".$value['numero']."&bairro=".$value['bairro']."&id=".$value['codigo']."&designado=".$value['designado']."'>
                                           <button class='btn btn-primary'>Editar</button>
                                       </a>
                                        <a href='page/excluirEvento.php?&id=".$codigoEvento."'>
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
