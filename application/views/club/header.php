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

	<link rel="stylesheet"
		  href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style-green.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bappe_css_js/materialize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bappe_css_js/sweetalert.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.css">

</head>
<body style="width: 100%">
<div id="siteLoading" style="display: none">
	<div class="hidden spinner center">
		<div id="loader-wrapper">
			<div id="preloader">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
</div>
<app-header-area>

	<?php if (!empty($this->session->userdata['club_user_data']) && is_object($this->session->userdata['club_user_data'])) : ?>
		<div class="sign-in-off-canvas-area">
			<div class="sign-in-off-canvas-area-overlay"></div>
			<div class="sign-in-off-canvas-area-close"><i class="zmdi zmdi-close"></i>
			</div>

			<div class="sign-in-off-canvas full-height overflow-x-hidden overflow-y-auto p-0">
				<div class="off-canvas-user-info-area">
					<div class="welcome-message">Welcome</div>
					<div
						class="user-profile-username"><?php echo $user_data = $this->db->query("SELECT club_name FROM `club_users` WHERE id = '{$this->session->userdata['club_user_data']->id}'")->row()->club_name; ?></div>
					<div class="user-main-balance">
						 <span><i class="fas fa-coins"></i> <?php $coin = 0;
							 $user_coin = $this->db->query("SELECT current_balance FROM my_coin WHERE user_id='{$this->session->userdata['club_user_data']->id}' ORDER BY id DESC")->row();
							 if (!empty($user_coin)) {
								 $coin = $user_coin->current_balance;
							 }  echo " ".$coin. " COIN" ; ?>ffff</span>
					</div>
				</div>
				<div class="admin-profile-sidebar-menu-area">
					<div class="admin-profile-sidebar-menu-group">
						<h4>Club Profile</h4>
						<div class="admin-profile-sidebar-menu-list">
						 <ul>
								<li>
									<a class="nav-item <?php menu_active_route('club_profile'); ?>"  href="<?php echo base_url('club_profile'); ?>">
                                        <span class="icon">
                                        <i class="fas fa-user"></i></span>
										<span class="text">Club Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('match_bit_coin'); ?>"  href="<?php echo base_url('match_bit_coin'); ?>">
										<span class="icon"><i class="fas fa-coins"></i></span>
										<span class="text">Match Bit Coin</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('match_bit_coin_history'); ?>"  href="<?php echo base_url('match_bit_coin_history'); ?>">
										<span class="icon"><i class="fas fa-coins"></i></span>
										<span class="text">Match Bit Coin History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('customer_withdraw'); ?>"  href="<?php echo base_url('customer_withdraw'); ?>">
										<span class="icon"><i class="fas fa-wallet"></i></span>
										<span class="text">Customer Withdraw History</span>
									</a>
								</li>
								<li>
									<a class="nav-item <?php menu_active_route('user_balance_transfer'); ?>"  href="<?php echo base_url('user_balance_transfer'); ?>">
										<span class="icon"><i class="fas fa-handshake"></i></span>
										<span class="text">Balance Transfer History</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group"><h4
						>Club Wallet</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('user_history'); ?>"  href="<?php echo base_url('user_history'); ?>">
										<span class="icon"><i class="fas fa-users"></i></span>
										<span class="text">User History</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('club_withdraw'); ?>"  href="<?php echo base_url('club_withdraw'); ?>">
										<span class="icon"><i class="fas fa-dollar-sign"></i></span>
										<span class="text">Club Withdraw</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('club_withdraw_history'); ?>"  href="<?php echo base_url('club_withdraw_history'); ?>">
										<span class="icon"><i class="fas fa-file-invoice-dollar"></i></span>
										<span class="text">Club Withdraw History</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group"><h4>Support</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>
								<li>
									<a class="nav-item <?php menu_active_route('customer_complain'); ?>" href="<?php echo base_url('customer_complain'); ?>">
										<span class="icon"><i class="fas fa-comment"></i></span>
										<span class="text">Customer Complain History</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('customer_statement'); ?>" href="<?php echo base_url('customer_statement'); ?>"><span class="icon"><i class="fas fa-copy"></i></span>
										<span class="text">Customer Statement</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="<?php echo base_url('logout'); ?>" data-target="#support" ><h4>Logout <i class="fas fa-power-off"></i></h4></a>
						<div class="admin-profile-sidebar-menu-list collapse active" id="support">
						</div>
					</div>
				</div>
			</div>

		</div>
	<?php endif; ?>

	<section class="header-area fixed">

		<div class="container-fluid header-bottom-area">
			<div class="row align-items-center justify-content-between">
				<div class="col-sm-2">
					<div class="logo"><a href="<?php echo base_url(); ?>"><img alt="BetScore24"
																			   src="<?php echo base_url(); ?>assets/img/logo.png"></a>
					</div>
				</div>
				<?php include(APPPATH . "views/header_auth.php"); ?>
			</div>

		</div>
		<div id="lodingPage" style="display: none;">
			<span></span>
			<span></span>
			<span></span>
		</div>

	</section>
</app-header-area>

<app-home-layout>


	<?php include(APPPATH . "views/after_sign_in_slider.php"); ?>



	<app-notice-bar>
		<?php include(APPPATH . "views/notice.php"); ?>
	</app-notice-bar>
