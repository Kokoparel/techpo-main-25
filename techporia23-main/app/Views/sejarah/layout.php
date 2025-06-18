<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>20<?= $tahun; ?> | Technology Euphoria</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('favicon.ico'); ?>">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('favicon.png'); ?>">
	<link rel="manifest" href="<?= base_url() ?>manifest.json">
	<meta name="msapplication-TileColor" content="#111">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#111">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= base_url() ?>assets-old/css/sejarah/uikit.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets-old/css/sejarah/sejarah-techpo.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets-old/css/sejarah/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets-old/css/sejarah/homepage.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets-old/css/sejarah/owlnav.css">
	<link rel="stylesheet" type="text/css"
		href="<?= base_url() ?>assets-old/css/sejarah/table-sejarah-custom/css/animate.css">
	<link rel="stylesheet" type="text/css"
		href="<?= base_url() ?>assets-old/css/sejarah/table-sejarah-custom/css/main.css">
	<script src="<?= base_url() ?>assets-old/css/sejarah/uikit.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineMax.min.js"></script>
	<style>
		body {}

		html {
			background-image: url("<?= base_url('assets-old/images/background2.jpeg') ?>");
		}
	</style>
</head>

<body>
	<div id="box-logo">
		<img id="logo-entrance" src="<?= base_url() ?>assets-old/images/logos/<?= $tahun; ?>.png" alt="">
		<div class="Smallmont"
			style="text-align: center; font-size: 20px; font-weight: 700; margin-top: 30px">TECHPHORIA
			<br>20<?= $tahun ?>
		</div>
	</div>
	<div style="width: 100vw;">
		<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky;">
			<nav class="uk-navbar-container" style="position: relative; z-index: 99;font-weight: 700; color: white" uk-navbar>
				<div class="uk-navbar-center">

					<div class="uk-navbar-center-left">
						<div>
							<ul class="uk-navbar-nav">
								<li><a href="<?= base_url('') ?>">Beranda</a></li>
							</ul>
						</div>
					</div>
					<a class="uk-navbar-item uk-logo" href=""><img src="<?= base_url() ?>assets-old/images/logos/<?= $tahun; ?>.png"
							style="height: 30px;width: 30px;" alt=""></a>
					<div class="uk-navbar-center-right">
						<div>
							<ul class="uk-navbar-nav">
								<li class="uk-active">

									<a href="#">Sejarah</a>
									<div class="uk-navbar-dropdown">
										<ul class="uk-nav uk-navbar-dropdown-nav">
											<?php for ($i = 14; $i < date('y'); $i++) { ?>
												<li style=""><a href="<?= site_url('sejarah/20' . $i) ?>">Sejarah 20<?php echo $i ?></a></li>
											<?php } ?>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</nav>
		</div>
	</div>

	<?= $this->renderSection('content'); ?>

	<script src="<?= base_url() ?>assets-old/css/ScrollMagic.min.js"></script>
	<script src="<?= base_url() ?>assets-old/css/animation.gsap.min.js"></script>
	<script src="<?= base_url() ?>assets-old/css/animation.velocity.min.js"></script>
	<script src="<?= base_url() ?>assets-old/css/debug.addIndicators.min.js"></script>
	<script src="<?= base_url() ?>assets-old/css/jquery.ScrollMagic.min.js"></script>
	<script src="<?= base_url() ?>assets-old/css/sejarah/owl.carousel.min.js"></script>
	<script>
		TweenMax.to("#box-logo", 2, {
			y: "-1000px"
		}).delay(1);
		TweenMax.to("#tittle-anim1", 1, {
			opacity: 1
		}).delay(1.7);
		TweenMax.to("#tittle-anim2", 1, {
			opacity: 1
		}).delay(2.5);
		/*CAROUSEL*/
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			loop: true,
			margin: 50,
			nav: true,
			autoWidth: true,
			responsiveClass: true,
			responsive: {
				600: {
					items: 1
				},
				800: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});

	</script>
</body>

</html>