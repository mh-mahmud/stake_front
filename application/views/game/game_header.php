<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


	<meta name="title" content="Betscore 24">
	<meta name="description" content="International Betting Site, Best Betting Site in Asia. Join our platform and make some profit.">
	<meta name="keywords"
		  content="betting, live bet, live betting, online betting, bet online, mobile bet, sport bet, cricket bet, football bet, bet365, betasia365, betwin69, best bettings site in bangladesh, bet site bangladesh">

	<title>Betscore24</title>
	<link rel="shortcut icon" type="ico" href="<?php echo base_url("assets/img/")?>favicon.ico.ico"/>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style-green.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/react_css_js/materialize.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/react_css_js/sweetalert.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.css">

</head>
<body style="width: 100%">
<input type="hidden" id="sports_id_get">
<input type="hidden" id="current_session">
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

	<?php if (!empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data'])) : ?>
		<div class="sign-in-off-canvas-area">
			<div class="sign-in-off-canvas-area-overlay"></div>
			<div class="sign-in-off-canvas-area-close"><i class="zmdi zmdi-close"></i>
			</div>

			<div class="sign-in-off-canvas full-height overflow-x-hidden overflow-y-auto p-0">
				<div class="off-canvas-user-info-area">
					<div class="welcome-message">Welcome</div>
					<div
						class="user-profile-username"><?php echo $user_data = $this->db->query("SELECT username FROM `users` WHERE id = '{$this->session->userdata['cus_data']->id}'")->row()->username; ?></div>
					<div class="user-main-balance">
						<span><i style="color: gold;" class="fas fa-coins"></i> <b class="myBal"></b> Coin</span>
					</div>
				</div>
				<div class="admin-profile-sidebar-menu-area">
					<div class="admin-profile-sidebar-menu-group">
						<h4><i class="fas fa-user"></i> Personal Profile </h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('view_profile'); ?>"
									   href="<?php echo base_url('view_profile'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">View Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('update_profile'); ?>"
									   href="<?php echo base_url('update_profile'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></i></span>
										<span class="text">Update Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('update_club'); ?>"
									   href="<?php echo base_url('update_club'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Update Club</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('my_followers'); ?>"
									   href="<?php echo base_url('my_followers'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">My Followers</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('bet_history'); ?>"
									   href="<?php echo base_url('bet_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Bet History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('update_password'); ?>"
									   href="<?php echo base_url('update_password'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Update Password</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group">
						<h4><i class="fas fa-money"></i> Personal Wallet</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('make_deposit'); ?>"
									   href="<?php echo base_url('make_deposit'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Make Deposit</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('deposit_history'); ?>"
									   href="<?php echo base_url('deposit_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Deposit History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('coin_transfer'); ?>"
									   href="<?php echo base_url('coin_transfer'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Coin Transfer</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('coin_transfer'); ?>"
									   href="<?php echo base_url('coin_transfer_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Coin Transfer History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('withdraw'); ?>"
									   href="<?php echo base_url('withdraw'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Withdraw</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('withdraw_history'); ?>"
									   href="<?php echo base_url('withdraw_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Withdraw History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('statement'); ?>"
									   href="<?php echo base_url('statement'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Statement</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group"><h4><i class="fas fa-support"></i> Support </h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('submit_complain'); ?>"
									   href="<?php echo base_url('submit_complain'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Submit Complain</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('complain_history'); ?>"
									   href="<?php echo base_url('complain_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Complain History</span>
									</a>
								</li>

								<li>
									<a class="nav-item" href="<?php echo base_url('logout'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Logout</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	<?php endif; ?>
	<section class="header-area fixed">

		<div class="container-fluid header-bottom-area">
			<div class="row align-items-center justify-content-between" style="flex-wrap: nowrap!important;">
				<div class="col-sm-2">
					<div class="logo"><a href="<?php echo base_url(); ?>"><img alt="BetScore24"
																			   src="<?php echo base_url(); ?>assets/img/logo.png"></a>
					</div>
				</div>
				<?php include(APPPATH . "views/game/game_header_auth.php"); ?>
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



		<?php include(APPPATH . "views/game/game_slider.php"); ?>



	<app-notice-bar  id="home">
		<?php include(APPPATH . "views/notice.php"); ?>
	</app-notice-bar>
