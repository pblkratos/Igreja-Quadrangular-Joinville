<?php
include '../database/conexao.php';
session_start();
  if (!empty($_SESSION['nome'])) {
    $verifica = true;
  }else{
    $verifica = false;
  }

$limite = 4;

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
<html lang="pt-br">
  <head>
    <title>Wisdom - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../assets/css/flaticon.css">
    <link rel="stylesheet" href="../assets/css/icomoon.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/dist/simplePagination.css">
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar2">
      <div class="container">
        <a class="navbar-brand" href="../index.php" ><span>Liberty</span> <span>Church</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu">a</span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="../index.php" class="nav-link">Início</a></li>
            <li class="nav-item"><a href="../index.php#sobre" class="nav-link">Sobre</a></li>
            <li class="nav-item active"><a href="events.php" class="nav-link">Eventos</a></li>
            <li class="nav-item"><a href="../index.php#contato" class="nav-link">Contato</a></li>
            <?php if ($verifica): ?>
             <li class="nav-item"><a class="nav-link" href="#">Editar</a></li>
             <li class="nav-item"><a class="nav-link" href="../security/logout.php">Sair</a></li>
            </ul> 
            <?php endif; ?>
            <?php if (!$verifica):?>
             <li class="nav-item"><a href="loginMembros.php" class="nav-link">Entrar</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
	  </nav>
    <!-- END nav -->

    <section id="home" class="video-hero js-fullheight"  style="height: 80px; background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
			<div class="overlay2 js-fullheight d-none d-lg-block" style="height: 110px;"></div>
		</section>

    <style>
        .js-fullheight{
          height: 115px !important;
        }

    </style>

		<section class="ftco-section ftco-section-2" style="padding-top: 60px;">
			<div class="container">
				<div class="row">
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
                  '01' => 'Jan',
                  '02' => 'Fev',
                  '03' => 'Mar',
                  '04' => 'Abr',
                  '05' => 'Mai',
                  '06' => 'Jun',
                  '07' => 'Jul',
                  '08' => 'Ago',
                  '09' => 'Set',
                  '10' => 'Out',
                  '11' => 'Nov',
                  '12' => 'Dez'
                );
                $horaEvento       = $value['hora'];
                $logradouroEvento = $value['logradouro'];
                $numeroEvento     = $value['numero'];
                $bairroEvento     = $value['bairro'];
                $descricaoEvento  = $value['descricao'];


                echo "
                <div class='col-md-6'>
                <div class='event-entry d-flex ftco-animate'>
        					<div class='meta mr-4'>
        						<p>
                      <span>" .date('d',$diaEvento)."</span>
                      <span>".$meses[date('m',$diaEvento)]."</span>
        						</p>
        					</div>
        					<div class='text'>
        						<h3 class='mb-2'><a href='events.php'>$nomeEvento</a></h3>
        						<p class='mb-4'><span>$logradouroEvento, $numeroEvento - $bairroEvento.</span></p>
        						<a href='events.php' class='img' style='background-image: url(../assets/images/sermons-1.jpg);'></a>
        						<p>$descricaoEvento</p>
        					</div>
        				</div>
                </div>
                ";
          }
        }

        ?>

				</div>

        <!-- paginacao-->
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
        <nav><ul>
        <?php if(!empty($tot_pages)):for($i=1; $i<=$tot_pages; $i++):
                    if($i == $page):?>
                    <li class='active'  id="<?php echo $i;?>"><a href='events.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                    <?php else:?>
                    <li id="<?php echo $i;?>"><a href='events.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                <?php endif;?>
        <?php endfor;endif;?>
        </ul></nav>
        		</div>
            </div>
            </div>


			</div>
		</section>
   

   <footer class="ftco-footer ftco-bg-dark ftco-section" id="contato">
      <div class="container">
        <div class="row ">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4" style="padding-top: 5px;">
              <h2 class="logo"><i class="flaticon-cross"><a href="index.php"></i><span>LIBERTY</span><span>Church</span></a></h2>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <div class="block-23">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text text-right">Rua Arno Dohler</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+55 47 9 9999 9999</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">liberty@church.com.br</span></a></li>
                  <li><span class="icon icon-clock-o"></span><span class="text">Quarta a domingo - 08:00 às 18:00</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>Todos os direitos reservados &copy; Liberty Church</p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/aos.js"></script>
  <script src="../assets/js/jquery.animateNumber.min.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script src="../assets/js/jquery.timepicker.min.js"></script>
  <script src="../assets/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="../assets/js/scrollax.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/jquery.simplePagination.js"></script>
  <script src="../assets/js/jquery.countdown.js"></script>

  </body>
  </html>
