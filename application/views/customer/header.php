<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="Live Bet 24/7">
    <meta name="description" content="Betting Site, Best Betting Site in Asia. Join our platform and make some profit.">
    <meta name="keywords"
          content="betting, live bet, live betting, online betting, bet online, mobile bet, sport bet, cricket bet, football bet">

    <title>Betscore24 | Online Betting Platform</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-green.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.3a7826290d01ff2b322c.css">
    <style>
        .game-content-area > .row, .admin-template-area > .row {
            height: 100% !important;
            min-height: 1px;
            /*height: auto !important;*/
        }
    </style>
</head>

<body>

    <app-home-layout>

		<section class="header-area fixed">
			<div class="container-fluid header-bottom-area">
				<div class="row align-items-center justify-content-between">
					<div class="col-sm-2">
						<div class="logo"><a href="<?php echo base_url(); ?>"><img alt="BetScore24" src="<?php echo base_url(); ?>assets/img/logo.png"></a>
						</div>
					</div>
					<!--here is header auth-->
					<?php include(APPPATH . "views/header_auth.php"); ?>
				</div>
			</div>
		</section>
		<app-home-layout>

			<app-game-other-info-box>
				<div class="game-other-info-box-area" style="border-top: 2px solid white;margin-top:58px;">
					<div class="row">

						<div class="col-lg-4" style="border-right:1px solid yellow;padding:0px;margin:0px">
							<img style="height:160px;width:100%" src="<?php echo base_url(); ?>assets/img/top-banner-1.jpg">
						</div>

						<div class="col-lg-4" style="padding:0px;margin:0px">
							<img style="height:160px;width:100%" src="<?php echo base_url(); ?>assets/img/top-banner-2.jpg">
						</div>
					</div>
				</div>
			</app-game-other-info-box>

			<app-notice-bar>
				<?php include(APPPATH . "views/notice.php"); ?>
			</app-notice-bar>
