<?php
include 'conexao.php';
$nome = $_GET['nome'];
$data = $_GET['data'];
$hora = $_GET['hora'];
$descricao = $_GET['descricao'];
$rua = $_GET['rua'];
$bairro = $_GET['bairro'];
$numero = $_GET['numero'];
$designado = $_GET['designado'];

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d');
$hora2 = date('H:i');

?>
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

<script>

</script>

<div class="container-fluid">
   <div class="row bg-title">
       <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
           <h4 class="page-title">Criar Eventos</h4>        </div>

           <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="administrador.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Voltar</a>
               <ol class="breadcrumb">
                   <li><a href="administrador.php">inicio</a></li>
                   <li class="active">Criar Eventos</li>
               </ol>

           </div>

       </div><center>
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
                   <form class="form-horizontal form-material" action="page/cadastrandoEventos.php" method="POST">
                       <div class="form-group">
                           <label class="col-md-12">NOME DO EVENTO</label>
                           <div class="col-md-12">
                               <input type="text" maxlength="45" value="<?php echo $nome ?>" name="nomeEvento" class="form-control form-control-line"> </div>
                           </div>
                           <div class="form-group">
                               <label for="example-email" class="col-md-12">DATA DO EVENTO</label>
                               <div class="col-md-12">
                                   <input type="date" value="<?php echo $data ?>" class="form-control form-control-line complex-colorpicker tamanho2" min="<?php echo $data ?>" max="2021-04-20" name="dataEvento" >
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-12">HORA DO EVENTO</label>
                               <div class="col-md-12">
                                   <input type="time" value="<?php echo $hora ?>" name="horaEvento" min="<?php echo $hora2 ?>"class="form-control form-control-line tamanho2"> </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-md-12">NOME DA RUA</label>
                                   <div class="col-md-12">
                                       <input type="text" maxlength="45" value="<?php echo $rua ?>" name="ruaEvento" class="form-control form-control-line" > </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-md-12">BAIRRO</label>
                                       <div class="col-md-12">
                                           <input type="text" maxlength="45" value="<?php echo $bairro ?>" name="bairroEvento" class="form-control form-control-line" > </div>
                                       </div>
                                       <div class="form-group">
                                           <label class="col-md-12">NUMERO</label>
                                           <div class="col-md-12">
                                               <input type="number"  value="<?php echo $numero ?>" name="numeroEvento" class="form-control form-control-line tamanho" > </div>
                                           </div>

                                           <div class="form-group">
                                               <label class="col-sm-12">Designado a</label>
                                               <div class="col-sm-12">
                                                   <select name="designado" class="form-control form-control-line">
                                                     <?php if($designado==1){?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1"selected>Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6">Outros</option>
                                                     <?php }else if($designado==2){ ?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1">Adultos</option>
                                                       <option value="2" selected>Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6">Outros</option>
                                                     <?php }else if($designado==3){ ?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1">Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3" selected>Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6">Outros</option>
                                                     <?php }else if($designado==4){ ?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1">Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4" selected>Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6">Outros</option>
                                                     <?php }else if($designado==5){ ?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1">Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5" selected>Jovens</option>
                                                       <option value="6">Outros</option>
                                                     <?php }else if($designado==6){ ?>
                                                       <option value="0" >Selecione</option>
                                                       <option value="1"selected>Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6" selected>Outros</option>
                                                     <?php }else if($designado==0){ ?>
                                                       <option value="0" selected>Selecione</option>
                                                       <option value="1">Adultos</option>
                                                       <option value="2">Crianças</option>
                                                       <option value="3">Casais</option>
                                                       <option value="4">Livre</option>
                                                       <option value="5">Jovens</option>
                                                       <option value="6">Outros</option>                                                     <?php } ?>

                                                   </select>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <label class="col-md-12">DESCRIÇÃO DO EVENTO</label>
                                               <div class="col-md-12">
                                                   <textarea rows="5" maxlength="150" value="<?php echo $descricao ?>" class="form-control form-control-line" name="descricaoEvento" ></textarea>
                                               </div>
                                           </div>
                                           <div class="form-group">
                                               <div class="col-sm-12">
                                                   <button class="btn btn-success">Criar Evento</button>
                                               </div>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </div>
                           <!-- /.row -->
                       </div>
