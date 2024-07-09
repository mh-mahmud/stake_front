<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


	<meta name="title" content="Betscore 24">
	<meta name="author" content="Engineer Zahidul Haque UK">
	<meta name="description" content="International Betting Site, Best Betting Site in Asia. Join our platform and make some profit.">
	<meta name="keywords"
		  content="betting, live bet, live betting, online betting, bet online, mobile bet, sport bet, cricket bet, football bet, bet365, betasia365, betwin69, best bettings site in bangladesh, bet site bangladesh">

	<title>Betscore24</title>
	<link rel="shortcut icon" type="ico" href="<?php echo base_url("assets/img/")?>favicon.ico.ico"/>
	
	<!-- Local Link -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<link href="<?php echo base_url(); ?>assets/css/animate.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style-green.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/responsive.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/react_css_js/materialize.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/react_css_js/sweetalert.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.css?ver=<?php echo md5(rand(111,999))?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/multibet/style.css?ver=<?php echo md5(rand(111,999))?>">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chat/style.css">-->
	<!-- End -->

<style>
    body {
        /*overscroll-behavior-y: contain;*/
        width: 100%;
        /*oncontextmenu="return false;*/
    }
</style>
</head>
<body>
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
    
	<!-- set cookie data -->
	<?php
	// $chat_cookie_id = null;
	// $chat_login_id = null;
	// $random_str = substr("abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25), 1).substr(md5(time()), 1);

	// if( !empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data']) ) {
	// 	$chat_login_id = $this->session->userdata['cus_data']->id;
	// }
	// else {
	// 	if( !isset($_COOKIE['user_chat_cookie']) ) {
	// 		setcookie('user_chat_cookie', $random_str, time() + (86400 * 30), "/");
	// 		$chat_cookie_id = $_COOKIE['user_chat_cookie'];
	// 	}
	// 	else {
	// 		$chat_cookie_id = $_COOKIE['user_chat_cookie'];
	// 	}
	// }

	?>

	<?php

	if(!empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data'])) {
		$user_u_id = $this->session->userdata['cus_data']->id;
		$user_u_coin = 0;
		$pre_data = $this->db->query("SELECT current_balance FROM my_coin WHERE user_id='{$user_u_id}' ORDER BY id DESC LIMIT 1")->row();
		if(!empty($pre_data)) {
			$user_u_coin = $pre_data->current_balance;
		} 
	}

	?>

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
						<span><i style="color: gold;" class="fas fa-coins"></i> 
						<!-- <i class="lds-ellipsis">
							<ii></ii>
							<ii></ii>
							<ii></ii>
							<ii></ii> 
						</i> -->
						<b class="waiting"><?php echo $user_u_coin; ?></b>
						<b class="myBal"></b></span>
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
									<a class="nav-item <?php menu_active_route('multi_bet_history'); ?>"
									   href="<?php echo base_url('multi_bet_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Multi Bet History</span>
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
						<h4><i class="fas fa-money"></i>Personal Wallet</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('deposit_coin'); ?>"
									   href="<?php echo base_url('deposit_coin'); ?>">
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

					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="" href="javascript:void(0);" data-target="#game" ><h4><i class="fas fa-support"></i> Game</h4></a>
						<div class="admin-profile-sidebar-menu-list  <?php echo menu_active_route_parent(array('coin-game-history','ludu-game-history', 'dice-game-history')) ; ?> active" id="game">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('coin-game-history'); ?>"
									   href="<?php echo base_url('coin-game-history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Coin History</span>
									</a>
								</li>

								<li style="display:none;">
									<a class="nav-item <?php menu_active_route('ludu-game-history'); ?>"
									   href="<?php echo base_url('ludu-game-history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Ludu History</span>
									</a>
								</li>

								<li style="display:none;">
									<a class="nav-item <?php menu_active_route('dice-game-history'); ?>"
									   href="<?php echo base_url('dice-game-history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Dice History</span>
									</a>
								</li>

							</ul>
						</div>
					</div>

				</div>
			</div>

		</div>
	<?php endif; ?>
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
						 <span><i style="color: goldenrod" class="fas fa-coins"></i> <?php $coin = 0;
							 $user_coin = $this->db->query("SELECT current_balance FROM club_coin WHERE club_id='{$this->session->userdata['club_user_data']->id}' ORDER BY id DESC")->row();
							 if (!empty($user_coin)) {
								 $coin = $user_coin->current_balance;
							 }  echo " ".$coin. " Coin" ; ?></span>
					</div>
				</div>
				<div class="admin-profile-sidebar-menu-area">
					<div class="admin-profile-sidebar-menu-group">
						<h4><i class="fas fa-user"></i>&nbsp;Club Profile</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>
								<li>
									<a class="nav-item <?php menu_active_route('club_profile'); ?>"  href="<?php echo base_url('club_profile'); ?>">
                                        <span class="icon">
                                        <i class="fas fa-arrow-right"></i></span>
										<span class="text">Club Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('match_bit_coin'); ?>"  href="<?php echo base_url('match_bit_coin'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Match Bit Coin</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('match_bit_coin_history'); ?>"  href="<?php echo base_url('match_bit_coin_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Match Bit Coin History</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('customer_withdraw'); ?>"  href="<?php echo base_url('customer_withdraw'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Customer Withdraw History</span>
									</a>
								</li>
								<li>
									<a class="nav-item <?php menu_active_route('user_balance_transfer'); ?>"  href="<?php echo base_url('user_balance_transfer'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Balance Transfer History</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group"><h4
						><i class="fas fa-money-bill"></i>&nbsp;Club Wallet</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('user_history'); ?>"  href="<?php echo base_url('user_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">User History</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('club_withdraw'); ?>"  href="<?php echo base_url('club_withdraw'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Club Withdraw</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('club_withdraw_history'); ?>"  href="<?php echo base_url('club_withdraw_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Club Withdraw History</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group"><h4><i class="fas fa-hands-helping"></i>&nbsp;Support</h4>
						<div class="admin-profile-sidebar-menu-list">
							<ul>
								<li>
									<a class="nav-item <?php menu_active_route('customer_complain'); ?>" href="<?php echo base_url('customer_complain'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Customer Complain History</span>
									</a>
								</li>

								<li>
									<a class="nav-item  <?php menu_active_route('customer_statement'); ?>" href="<?php echo base_url('customer_statement'); ?>"><span class="icon"><i class="fas fa-arrow-right"></i></span>
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
			<div class="row align-items-center justify-content-between" style="flex-wrap: nowrap!important;">
				<div class="col-sm-2">
					<div class="logo"><a href="<?php echo base_url(); ?>">
						<img alt="BetScore24" src="<?php echo base_url(); ?>assets/img/logo.png"></a>
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


	<?php if (!empty($this->session->userdata['cus_data']) || !empty($this->session->userdata['club_user_data'])) : ?>
		<?php include(APPPATH . "views/after_sign_in_slider.php"); ?>
	<?php else:?>
		<?php include(APPPATH . "views/without_sign_in_slider.php"); ?>
	<?php endif; ?>



	<app-notice-bar  id="home">
		<?php include(APPPATH . "views/notice.php"); ?>
	</app-notice-bar>
