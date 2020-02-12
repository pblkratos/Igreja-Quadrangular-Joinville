<script>
$(document).ready(function(){
  $("#pesquisaMembros").change(function(){
  $('.table>tbody').empty();
    $.ajax({
      url: "page/pesquisaGerenciarMembros.php",
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
                        <h4 class="page-title"><b>Gerenciar Membros</b></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Membros
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <select class="form-control pull-right row b-none" id="pesquisaMembros" >
                                        <option value="todos">TODAS CELULAS </option>
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
                                      <a href='excluirMembro.php?&codigo=".$value["membrosCodigo"]."'>
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
            </div>
