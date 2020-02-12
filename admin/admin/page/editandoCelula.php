<?php

include 'conexao.php';

$codigoCelula     = $_GET['id'];
$nomeCelula       = $_GET['nome'];
$logradouroCelula = $_GET['logradouro'];
$bairroCelula     = $_GET['bairro'];
$numeroCelula     = $_GET['numero'];

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

           <div class="container-fluid">
               <div class="row bg-title">
                   <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                       <h4 class="page-title">Editar Celula</h4> </div>
                   <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="administrador.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Voltar</a>
                       <ol class="breadcrumb">
                           <li><a href="administrador.php">inicio</a></li>
                           <li class="active">Editar Eventos</li>
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
                           <form class="form-horizontal form-material" action="page/insertEditarCelula.php" method="POST">
                             <div class="form-group">
                                 <label class="col-md-12">CODIGO DA CELULA</label>
                                 <div class="col-md-12">
                                     <input type="text" placeholder="" readonly value="<?php echo $codigoCelula ?>"  name="codigoCelula" class="form-control form-control-line"> </div>
                             </div>
                               <div class="form-group">
                                   <label class="col-md-12">NOME DA CELULA</label>
                                   <div class="col-md-12">
                                       <input type="text" placeholder="" value="<?php echo $nomeCelula ?>"  name="nomeCelula" class="form-control form-control-line"> </div>
                               </div>

                                 <div class="form-group">
                                   <label class="col-md-12">NOME DA RUA</label>
                                   <div class="col-md-12">
                                       <input type="text" placeholder="" value="<?php echo $logradouroCelula ?>" name="logradouroCelula" class="form-control form-control-line" > </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-md-12">BAIRRO</label>
                                   <div class="col-md-12">
                                       <input type="text" placeholder="" name="bairroCelula" value="<?php echo $bairroCelula ?>" class="form-control form-control-line" > </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-md-12">NUMERO</label>
                              <div class="col-md-12">
                                       <input type="number" placeholder="" name="numeroCelula" value="<?php echo $numeroCelula ?>"class="form-control form-control-line tamanho"> </div>
                               </div>

                               <div class="form-group">
                                   <div class="col-sm-12">
                                       <button class="btn btn-success">Salvar Evento</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
               <!-- /.row -->
           </div>
