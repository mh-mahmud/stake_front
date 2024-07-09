<div class="col-lg-2 left-sidebar">
	<app-user-left-sidebar>
		<div class="left-sidebar-wrapper user-left-sidebar-wrapper">
			<div class="admin-left-sidebar-toggle-btn-area">
				<div class="admin-left-sidebar-toggle-btn-wrapper">
					<span class="collapse-d-none" style="float:left;padding-right:9%;">Time: &nbsp;<span id="time"></span>&nbsp;&nbsp;&nbsp;</span>
					<span class="icon ic-cl">
						<i class="fas fa-arrow-left icoc"></i>
					</span>
				</div>
			</div>

			<div class="admin-profile-sidebar-menu-area">
				<div class="admin-profile-sidebar-menu-group">
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#profile" ><h4><i class="fas fa-user"></i>&nbsp;Club Profile</h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('club_profile','match_bit_coin','match_bit_coin_history','customer_withdraw','user_balance_transfer')) ; ?> active" id="profile">
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
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#wallet" ><h4><i class="fas fa-money-bill"></i>&nbsp;Club Wallet</h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('user_history','club_withdraw','club_withdraw_history')) ; ?> active" id="wallet">
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
					<div class="admin-profile-sidebar-menu-group">
						<a data-toggle="collapse" href="javascript:void(0);" data-target="#support" ><h4><i class="fas fa-hands-helping"></i>&nbsp;Support</h4></a>
						<div class="admin-profile-sidebar-menu-list collapse <?php echo menu_active_route_parent(array('customer_complain','customer_statement')) ; ?> active" id="support">
							<ul>
								<li>
									<a class="nav-item <?php menu_active_route('customer_complain'); ?>" href="<?php echo base_url('customer_complain'); ?>">
										<span class="icon"><i class="fas fa-arrow-right"></i></span>
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
	</app-user-left-sidebar>
</div>



