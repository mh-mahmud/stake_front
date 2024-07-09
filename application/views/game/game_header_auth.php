<?php $get_game_page =  $this->db->query("SELECT * FROM `game_page` WHERE status = 'Active' ORDER BY serial ASC")->result(); ?>
<?php if (!empty($this->session->userdata['cus_data']) && is_object($this->session->userdata['cus_data'])) : ?>
	<?php
	$name = $this->session->userdata['cus_data']->name;

	$user_data = $this->db->query("SELECT * FROM `users` WHERE id = '{$this->session->userdata['cus_data']->id}'")->row();


	?>

	<div class="col-sm-10 text-right">
		<div class="main-menu">
			<ul id="main-menu">
				<div class="footer-top-right">
					<ul>
						<li class="ng-star-inserted">
							<div class="sign-up-area">
								<a onclick="return checkbal(<?= $user_data->id; ?>)" class="logged-in-user btn btn-success"
								   data-toggle="dropdown" href="#">
									<span class="user-balance">
										<span class="top-balance"><?php echo $user_data->username; ?></span>
									</span>
									<span class="dropdown-icon">
										<i class="zmdi zmdi-chevron-down"></i>
									</span>
								</a>
								<div
									class="dropdown-menu dropdown-menu-right after-login-dropdown-menu purple-megenta-bg-gradient"
									x-placement="bottom-end"
									style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, 30px, 0px);">
									<div class="balance-type-area">
										<div class="single-balance-type">
											<div class="amount-text">Balance: <i style="color: gold;" class="fas fa-coins"></i> <b class="myBal"></b> Coins</div>
										</div>
									</div>

									<div class="nav">
										<a class="nav-item" href="<?php echo base_url('view_profile'); ?>"> <i class="fas fa-arrow-right"></i> &nbsp; Personal
											Profile</a>
										<a class="nav-item" href="<?php echo base_url('make_deposit'); ?>"><i class="fas fa-arrow-right"></i> &nbsp;Make
											Deposit</a>
										<a class="nav-item" href="<?php echo base_url('withdraw'); ?>"><i class="fas fa-arrow-right"></i> &nbsp;Withdraw</a>
										<a class="nav-item" href="<?php echo base_url('logout'); ?>"><i class="fas fa-power-off"></i> &nbsp;Sign Out</a>
									</div>
								</div>
							</div>
						</li>

						<li class="ng-star-inserted">
							<a class="logged-in-user btn btn-info" href="javascript:void(0);">
									<span class="user-balance">
										<span class="top-balance">More</span>
									</span>
								</span>
							</a>

							<ul class="sub-menu" style="overflow: visible; background-color: #376f99; flex-wrap: wrap!important;height: auto!important;">
								<?php foreach ($get_game_page as $gval): ?>
									<li style="width: 100%">
										<a  style="color: #FFF;" href="<?= base_url("game/".$gval->id) ?>" target="_blank"><?= $gval->page_name ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>
				</div>
			</ul>
		</div>

		<div class="responsive-menu-wrapper">
			<span class="icon-user-menu"><span class="top-balance" onclick="return checkbal(<?= $user_data->id; ?>)"><i
						class="fas fa-user"></i>&nbsp;<?php echo $user_data->username; ?></span></span>
			<div class="responsive-main-menu tab-d-none" id="responsive-main-menu-1">
				<button aria-expanded="false" id="hideMenu" aria-haspopup="true" class="dropdown-toggle"
						data-toggle="dropdown"><i class="fas fa-bars"></i></button>
				<div class="dropdown-menu dropdown-menu-right"
					 id="responsive-mobile-main-menu">
					<div class="responsive-main-menu-wrapper">
						<ul>
							<li><a href="<?= base_url() ?>">In-Play</a></li>
							<li><a href="<?= base_url() ?>">Upcomming</a>
							</li>
							<li><a class="nav-item" href="<?php echo base_url('make_deposit'); ?>">Make
									Deposit</a></li>
							<li><a class="nav-item" href="<?php echo base_url('withdraw'); ?>">Withdraw</a></li>
							<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>

						</ul>
					</div>
				</div>
			</div>
			<div class="responsive-main-menu tab-d-none" id="responsive-main-menu-1">
				<button aria-expanded="false" id="hideMenu" aria-haspopup="true" class="dropdown-toggle"
						data-toggle="dropdown"><i class="fas fa-arrow-circle-down"></i></button>
				<div class="dropdown-menu dropdown-menu-right" id="responsive-mobile-main-menu">
					<div class="responsive-main-menu-wrapper">
						<ul>
							<?php foreach ($get_game_page as $gval): ?>
								<li style="width: 100%">
									<a  style="color: #FFF;" href="<?= base_url("game/".$gval->id) ?>" target="_blank"><?= $gval->page_name ?></a>
								</li>
							<?php endforeach; ?>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php else: ?>

	<div class="col-sm-10 text-right">
		<div class="main-menu">
			<ul id="main-menu">
				<div class="footer-top-right">
					<ul>
						<li><a class="btn btn-success" href="javascript:void(0);" onclick="return loginForm();">Sign In</a></li>
						<li><a class="btn btn-danger" href="javascript:void(0);" onclick="return registrationForm();">Register</a></li>
						<li class="ng-star-inserted">
							<a class="logged-in-user btn btn-info" href="javascript:void(0);">
									<span class="user-balance">
										<span class="top-balance">More</span>
									</span>
								<span class="dropdown-icon">
										<i class="zmdi zmdi-chevron-down"></i>
								</span>
							</a>

							<ul class="sub-menu " style="overflow: visible; background-color: #376f99; flex-wrap: wrap!important;height: auto!important;">
								<?php foreach ($get_game_page as $gval): ?>
									<li style="width: 100%">
										<a  style="color: #FFF;" href="<?= base_url("game/".$gval->id) ?>" target="_blank"><?= $gval->page_name ?></a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>
				</div>
			</ul>
		</div>

		<div class="responsive-menu-wrapper">
			<span class="icon-user-menu"><span class="top-balance"><a style="color: #ffffff" href="javascript:void(0);" onclick="return loginForm();">Sign In</a></span></span>
			<div class="responsive-main-menu tab-d-none" id="responsive-main-menu-1">
				<button aria-expanded="false" id="hideMenu" aria-haspopup="true" class="dropdown-toggle"
						data-toggle="dropdown"><i class="fas fa-bars"></i></button>
				<div class="dropdown-menu dropdown-menu-right" id="responsive-mobile-main-menu">
					<div class="responsive-main-menu-wrapper">
						<ul>
							<li><a href="<?= base_url() ?>">In-Play</a></li>
							<li><a href="<?= base_url() ?>">Upcomming</a>
							</li>
							<li><a href="javascript:void(0);" onclick="return loginForm();">Sign In</a></li>
							<li><a href="javascript:void(0);" onclick="return registrationForm();">Register</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="responsive-main-menu tab-d-none" id="responsive-main-menu-1">
				<button aria-expanded="false" id="hideMenu" aria-haspopup="true" class="dropdown-toggle"
						data-toggle="dropdown"><i class="fas fa-arrow-circle-down"></i></button>
				<div class="dropdown-menu dropdown-menu-right" id="responsive-mobile-main-menu">
					<div class="responsive-main-menu-wrapper">
						<ul>
							<?php foreach ($get_game_page as $gval): ?>
								<li style="width: 100%">
									<a  style="color: #FFF;" href="<?= base_url("game/".$gval->id) ?>" target="_blank"><?= $gval->page_name ?></a>
								</li>
							<?php endforeach; ?>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
