<?php
$limite = 2;
include 'security/puxaEventos.php';

  session_start();
  if (!empty($_SESSION['nome'])) {
    $verifica = true;
  }else{
    $verifica = false;
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Liberty Church</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><span>Liberty</span> <span>Church</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu">a</span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="#home" class="nav-link">Início</a></li>
	          <li class="nav-item"><a href="#sobre" class="nav-link">Sobre</a></li>
	          <li class="nav-item"><a href="#eventos" class="nav-link">Eventos</a></li>
            <li class="nav-item"><a href="#contato" class="nav-link">Contato</a></li>
            <?php if ($verifica): ?>
             <li class="nav-item"><a class="nav-link" href="pages/perfilMembro.php">Perfil</a></li>
             <li class="nav-item"><a class="nav-link" href="security/logout.php">Sair</a></li>
            </ul>
            <?php endif; ?>
            <?php if (!$verifica):?>
	           <li class="nav-item"><a href="pages/loginMembros.php" class="nav-link">Entrar</a></li>
            <?php endif; ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section id="home" class="video-hero js-fullheight blurimg" style="height: 700px; background-image: url(assets/images/bg_3.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
			<div class="overlay js-fullheight"></div>

			<div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Liberty,</strong> viva sua vida.</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="pages/cadastroMembros.php" class="btn btn-primary btn-outline-white px-4 py-3">Participe</a></p>
          </div>
        </div>
      </div>
		</section>

		<section class="ftco-section-2">
      <div class="container-fluid">
        <div class="section-2-blocks-wrapper d-flex row no-gutters">
          <div class="img col-md-6 ftco-animate" style="background-image: url('assets/images/about.jpg');">
          </div>
          <div class="text col-md-6 ftco-animate" id="sobre">
            <div class="text-inner align-self-start">

              <h3>Nossa Visão</h3>
              <p>A visão da Igreja do Evangelho Quadrangular é apresentar Jesus Cristo, o filho de Deus, como o Salvador, o Batizador com o Espírito Santo, o Médico dos médicos e o Rei que há de vir. Desde a fundação da igreja, em 1923, essa visão foi praticada por meio da evangelização e do estabelecimento de assembléias locais nos EUA e no exterior.</p>

              <p>Por conta disso, deu-se início a consolidação e a formação de líderes em todos os níveis da vida cristã, em colaboração com outros membros do corpo de Cristo para aprendizagem e conhecimento bíblico, a fim de que seja vivido o mandamento bíblico de sermos “sal” da Terra e “luz” do mundo.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section" id="sobre">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div style="background: #ffc9c9;" class="icon d-flex justify-content-center mb-3"><span class="align-self-center"><img width="80px" src="assets/images/cruz.png"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Cruz</h3>
                <p>Simboliza a morte de Cristo em sacrifício pela nossa salvação.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div style="background: #c9f0ff;" class="icon d-flex justify-content-center mb-3"><span class="align-self-center"><img width="80px" src="assets/images/calice.png"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Cálice</h3>
                <p>Simboliza a cura divina.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div style="background: #ffffc9;" class="icon d-flex justify-content-center mb-3"><span class="align-self-center"><img width="80px" src="assets/images/pomba.png"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Pomba</h3>
                <p>Simboliza o batismo com o Espírito Santo.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div style="background: #f9c9ff;" class="icon d-flex justify-content-center mb-3"><span class="align-self-center"><img width="80px" src="assets/images/coroa.png"></span></div></div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Coroa</h3>
                <p>Simboliza a volta de Cristo para reinar eternamente.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter" id="section-counter" id="sobre">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number">
                  <?php
                    $row = 0;
                    include 'database/conexao.php';
                    $sql1 = 'select COUNT(*) from membros';
                    $count1 = mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_array($count1)) {
                      echo $row['COUNT(*)'];
                    }
                  ?>
                </strong>
                <span>Membros</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number">
                  <?php
                    $row = 0;
                    include 'database/conexao.php';
                    $sql1 = 'select COUNT(*) from celulas';
                    $count1 = mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_array($count1)) {
                      echo $row['COUNT(*)'];
                    }
                  ?>
                </strong>
                <span>Células</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number">
                  <?php
                    $row = 0;
                    include 'database/conexao.php';
                    $sql1 = 'select COUNT(*) from eventos where status = 2';
                    $count1 = mysqli_query($con,$sql1);
                    while($row=mysqli_fetch_array($count1)) {
                      echo $row['COUNT(*)'];
                    }
                  ?>
                </strong>
                <span>Eventos</span>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="ftco-section-2 bg-light" id="eventos">
    	<div class="container-fluid">
    		<div class="row no-gutters d-flex">
    			<div class="col-md-6 img d-flex justify-content-end align-items-center" style="background-image: url(assets/images/event.jpg);">
    				<div class="col-md-7 heading-section text-sm-center text-md-right heading-section-white ftco-animate mr-md-5 mt-md-5">
	            <h2>Nossos eventos</h2>
	            <p>Veja todos nosso eventos de todas as células participantes</p>
	            <p><a href="pages/events.php" class="btn btn-primary py-3 px-4">Ver mais +</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="event-wrap">

              <?php
                if (isset($select)){
                  foreach ($select as $value) {
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

              echo "
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
    	    						<a href='pages/events.php' class='img' style='background-image: url(assets/images/sermons-1.jpg);'></a>
    	    					</div>
    	    				</div>
                  ";
            }
          }

          ?>

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


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/jquery.timepicker.min.js"></script>
  <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  <script src="assets/js/main.js"></script>

  </body>
</html>
