<script>
$(document).ready(function(){
  $("#pesquisaMembros").change(function(){
  $('.table>tbody').empty();
    $.ajax({
      url: "page/pesquisa.php",
      type: "POST",
      data: {'pesquisa':$("#pesquisaMembros").val()},

      success: function(result){
      arrMembros = JSON.parse(result);

        $.each(arrMembros,function(index,value){
          if(value.tipo==0){
            var tipo = "Pastor";
          }else if(value.tipo==1){
            var tipo = "Coordenador";
          }else if(value.tipo==2){
            var tipo = "Supervisor";
          }else if(value.tipo==3){
            var tipo = "Lider";
          }else if(value.tipo==4){
            var tipo = "Vice-Lider";
          }else{
            var tipo = "Membro";
          }
          $(".table").append("<tr><td>" + value.membrosNome+ "</td><td>"+ value.email+"</td><td>"+ value.telefone +"</td><td>" + tipo + "</td><td>" +
          "<a href='administrador.php?folder=page&file=editarMembros.php&codigo=" + value.celulasCodigo + "&mc=" + value.membrosCodigo + "&nome=" + value.membrosNome + "&senha=" + value.senha + "&email=" + value.email + "&telefone=" + value.telefone + "&tipo=" + value.tipo + "&celulasNome=" + value.celulasNome + "'>"+
              "<button class='btn btn-primary' id='btnEditar'>Editar</button>" +
          "</a>" +
           "<a href='excluirMembro.php&codigo="+value.membrosCodigo+"'>"+
              "<button class='btn btn1 btn-primary'>Excluir</button>"+
          "</a>"+
          "</td></tr>");
        })
      }
    })
  });
});
</script>

<style>
.btn-primary{

}
.btn{
  margin-right: 10px !important;
}
.bg-title h4 {
    color: rgba(0,0,0,.5);
    font-weight: 400;
    margin-top: 6px;
}

.progress-bar-danger{
  background-color: #E55C58;
}
.text-danger{
  color: #E55C58AA;
}

.progress-bar-megna{
  background-color: #ff8265;
}

.text-megna{
  color: #ff8265AA;
}

.progress-bar-primary{
  background-color: #FF9566;
}

.text-primary{
  color: #FF9566AA;
}

.btn{
  border: none;
}

.btn:hover{
  border: none;
}

.btnExcluir{
  background-color: #F08080;
}

.btnExcluir:hover{
  background-color: #F08080;
}

.btn1{
  background-color: #F08080 !important;
  border-color: #F08080 !important;
}
</style>

    <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><b>Bem Vindo</b>,<?php echo " " . $_SESSION['nome']; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">QUANTIDADE DE MEMBROS</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php
                                    $row = 0;
                                    $select = "SELECT COUNT(*) FROM membros";
                                    $dados = mysqli_query($con,$select) or die (mysqli_error($con));
                                    while($row=mysqli_fetch_array($dados)){
                                      echo $row['COUNT(*)'];
                                    }

                                     ?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">QUANTIDADE DE CELULAS</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna"><?php
                                    $row = 0;
                                    $select = "SELECT COUNT(*) FROM celulas";
                                    $dados = mysqli_query($con,$select) or die (mysqli_error($con));
                                    while($row=mysqli_fetch_array($dados)){
                                      echo $row['COUNT(*)'];
                                    }

                                     ?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">EVENTOS REALIZADOS</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary"><?php
                                    $row = 0;
                                    $select = "SELECT COUNT(*) FROM eventos WHERE status = 2";
                                    $dados = mysqli_query($con,$select) or die (mysqli_error($con));
                                    while($row=mysqli_fetch_array($dados)){
                                      echo $row['COUNT(*)'];
                                    }

                                     ?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Membros
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <select class="form-control pull-right row b-none" id="pesquisaMembros" >
                                        <option value="todos">TODOS LIDERES </option>
                                    <?php
                                    $selectLider = "SELECT * FROM membros WHERE tipo = 3";
                                    $dados = mysqli_query($con,$selectLider) or die (mysqli_error($con));
                                    $arrLider = array();

                                        while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                                            array_push($arrLider,$linha);
                                        }

                                        foreach ($arrLider as $value) {

                                          echo "<option value=".$value['celulas_codigo'].">" . $value['nome'] . "</option>;";

                                        }
                                     ?>


                                    </select>

                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>NOME</th>
                                            <th>EMAIL</th>
                                            <th>TELEFONE</th>
                                            <th>CARGO</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <?php

                                $selectMembro ="SELECT membros.codigo AS 'membrosCodigo',membros.nome AS 'membrosNome',membros.email,membros.tipo,membros.telefone,membros.senha,celulas.codigo AS 'celulasCodigo',celulas.nome AS 'celulasNome' FROM membros INNER JOIN celulas WHERE membros.celulas_codigo=celulas.codigo";

                                $dados = mysqli_query($con,$selectMembro) or die (mysqli_error());
                                $arrMembros = array();
                                  while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                                        array_push($arrMembros,$linha);
                                      }

                                    $alou = 5;
                                    $tipo = "";
                                    foreach ($arrMembros as $value) {
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
                                     echo "<tr class='table-light'>";
                                     echo "<td>". $value["membrosNome"] . "</td>";
                                     echo "<td>". $value["email"] . "</td>";
                                     echo "<td>". $value["telefone"] . "</td>";
                                     echo "<td>". $tipo. "</td>


                                     <td>
                                     <a href='administrador.php?folder=page&file=editarMembros.php&codigo=".$value["celulasCodigo"]."&mc=".$value["membrosCodigo"]."&nome=".$value["membrosNome"]."&senha=".$value["senha"]."&email=".$value["email"]."&telefone=".$value["telefone"]."&tipo=".$value["tipo"]."&celulasNome=".$value["celulasNome"]."'>
                                         <button class='btn btn-primary'>Editar</button>
                                     </a>
                                      <a href='excluirMembro.php&codigo=".$value["membrosCodigo"]."'>
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

                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">EVENTOS FUTUROS</h3>

                            <?php
                            date_default_timezone_set ("America/Sao_Paulo");
                            $data = date("20y/m/d");
                            $selectEventos = "SELECT * FROM eventos WHERE data >= '$data' ORDER BY data ASC LIMIT 3";


                            $dados = mysqli_query($con,$selectEventos) or die (mysqli_error());
                            $arrEventos = array();
                            while($linha = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
                            array_push($arrEventos,$linha);
                            }


                            foreach ($arrEventos as $value) {
                             $dataEvento = $value['data'];
                             $newDate = date("d-m-Y", strtotime($dataEvento));
                             echo "<div class='comment-center'>";
                             echo "<div class='comment-body'>";
                             echo "  <div class='user-img'> <img src='../plugins/images/users/pawandeep.jpg' alt='user' class='img-circle'></div>";
                             echo "<div class='mail-contnet'>";
                             echo "<h5>" . $value['nome'] . "</h5>";
                             echo "<span class='mail-desc'>" . $value['descricao'] . "</span><a href='javacript:void(0)' class='action'><i class='ti-close text-danger'></i></a> <a href='javacript:void(0)' class='action'><i class='ti-check text-success'></i></a><span class='time pull-right'>" . $newDate . "</span></div>
                             </div> </div>";
                            }

                             ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">AQUI VAI TER ALGO XD</h3>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Genelia Deshmukh</h5> <span class="mail-desc">I love to do acting and dancing</span> <span class="time">9:08 AM</span> </div>
                                </a>
                                <a href="#" class="b-none">
                                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
