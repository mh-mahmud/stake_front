<div class="col-lg-2 left-sidebar">
	<app-user-left-sidebar>
		<div class="left-sidebar-wrapper user-left-sidebar-wrapper">
			<div class="admin-left-sidebar-toggle-btn-area">
				<div class="admin-left-sidebar-toggle-btn-wrapper">
					<span class="collapse-d-none" style="float:left;padding-right:9%;font-size: 15px;">Time: &nbsp;<span id="time"></span>&nbsp;&nbsp;&nbsp;</span>
					<span class="icon ic-cl">
						<i class="fas fa-arrow-left icoc"></i>
					</span>
				</div>
			</div>
			<div class="sport-card-level-one">
				<div class="sport-card-level-one-header">
					<a class="sport-card-level-one-header-link" href="<?php echo base_url() ?>">
						<span class="icon"><img src="<?php echo base_url()?>assets/img/inplay.gif" alt=""></span>
						<span class="category-name">
							<span class="name" style="color: white;"> In Play</span>
						</span>
					</a>
				</div>
			</div>

			<div class="sport-card-level-one">
				<div class="sport-card-level-one-header">
					<a class="sport-card-level-one-header-link" href="<?php echo base_url() ?>">
						<span class="icon"><img src="<?php echo base_url()?>assets/img/upcome.gif" alt=""></span>
						<span class="category-name">
							<span class="name" style="color: white;"> Upcomming</span>
						</span>
					</a>
				</div>
			</div>

			<div class="admin-profile-sidebar-menu-area">
				<div class="admin-profile-sidebar-menu-group">
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#profile" ><h4><i class="fas fa-user"></i> Personal Profile </h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('view_profile','update_profile','update_club','my_followers','bet_history','multi_bet_history','update_password')) ; ?> active" id="profile">
							<ul>
								<li>
									<a class="nav-item <?php menu_active_route('view_profile'); ?>"
									   href="<?php echo base_url('view_profile'); ?>">
                                                    <span class="icon">
                                                    <i class="fas fa-arrow-right"></i></span>
										<span class="text">View Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('update_profile'); ?>"
									   href="<?php echo base_url('update_profile'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Edit Profile</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('update_club'); ?>"
									   href="<?php echo base_url('update_club'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Change Club</span>
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
										<span class="text">Change Password</span>
									</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#wallet" ><h4><i class="fas fa-money"></i> Personal Wallet </h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('deposit_coin','deposit_history','coin_transfer','coin_transfer','withdraw','withdraw_history','statement','coin_transfer_history')) ; ?> active" id="wallet">
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
									<a class="nav-item <?php menu_active_route('coin_transfer_history'); ?>"
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
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#support" ><h4><i class="fas fa-support"></i> Support</h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('submit_complain','complain_history')) ; ?> active" id="support">
							<ul>

								<li>
									<a class="nav-item <?php menu_active_route('submit_complain'); ?>"
									   href="<?php echo base_url('submit_complain'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Write Complain</span>
									</a>
								</li>

								<li>
									<a class="nav-item <?php menu_active_route('complain_history'); ?>"
									   href="<?php echo base_url('complain_history'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
										<span class="text">Complain History</span>
									</a>
								</li>

							</ul>
						</div>
					</div>

					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#game" ><h4><i class="fas fa-support"></i> Game</h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('coin-game-history','ludu-game-history', 'dice-game-history')) ; ?> active" id="game">
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

					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="<?php echo base_url('logout'); ?>" data-target="#support" ><h4><i class="fas fa-power-off"></i> Logout </h4></a>
						<div class="admin-profile-sidebar-menu-list collapse active" id="support">
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-user-left-sidebar>
</div>



