<?php include(APPPATH . "views/customer/index_header.php"); ?>
	<app-game-content-area>
		<section class="game-content-area" style="margin-top: 0px"  >
			<div class="row">

				<?php
					if (!empty($this->session->userdata('club_user_data'))) {
						redirect('/club_profile');
					}
				?>

				<?php include(APPPATH . "views/left_sidebar.php"); ?>

				<perfect-scrollbar class="col-lg-7 game-area custom-scrollbar-2">
					<div style="position: static;" class="ps">
						<div class="ps-content">


							<div class="live-in-play">

								<div class="nav nav-tabs live-in-play-carousel">
									<div style="width: 50%; cursor: pointer;" onclick="return live_bets_all();" id="liveBtnTop">
										<div class="single-match-result-header" style="background-color:#666;">
											<a class="left-side" href="javascript:void(0);">
											<span class="match-infos">
												<span class="bottom-side">
													<span style="font-size:12px">In Play &nbsp; <img
															style="display: none;width: 18px; padding: 0px 2px 0px 0px; align-self: center"
															id="liveGif"
															src="<?php echo base_url() ?>assets/img/inplay.gif" alt=""></span>
												</span>
											</span>
											</a>
										</div>
									</div>
									<div style="width: 50%; cursor: pointer;" onclick="return adv_bets_all();">
										<div class="single-match-result-header"
											 style="background-color:#666; border-left: 1.5px solid rgba(255, 255, 255, .3);">
											<a class="left-side" href="javascript:void(0);">
											<span class="match-infos">
												<span class="bottom-side">
													<span style="font-size:12px">Advance Bet &nbsp; <img
															style="display: none; width: 18px; padding: 0px 2px 0px 0px; align-self: center"
															id="upGif"
															src="<?php echo base_url() ?>assets/img/upcome.gif" alt=""></span></span>
												</span>
												</span>
											</a>
										</div>
									</div>
								</div>


								<?php include(APPPATH . "views/sports_menu.php"); ?>

								<!--live bet option here-->
								<div id="live_bets_all" style="display: none;"></div>
								<div id="live_bets_by_cat" style="display: none;"></div>
								<div id="live_bets_by_single_match" style="display: none;"></div>

								<!--adv bet option here-->
								<div id="adv_bets_all" style="display: none;"></div>
								<div id="adv_bets_by_cat" style="display: none;"></div>
								<div id="adv_bets_by_single_match" style="display: none;"></div>
								<!--bet option end here-->
							</div>
						</div>

					</div>
				</perfect-scrollbar>

				<!-- Right sidebar -->
				<?php include(APPPATH . "views/right_sidebar.php"); ?>
			</div>
			
			<?php //include(APPPATH . "views/chat_app.php"); ?>

			<?php include(APPPATH . "views/multibet/betslip.php"); ?>
		</section>
	</app-game-content-area>

	<!-- Bet Modal -->
	<div class="modal fade" id="betModalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		 aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">

			<!-- Modal content-->
			<div class="modal-content">
				<!--common block-->
				<div class="common_block_panel betting_slip_block">
					<button type="button" class="close" data-dismiss="modal" style="padding:3px; color: #ffffff">&times;
					</button>
					<h2>Bet Slip</h2>
					<div class="pallate_container bet_slip_container">

						<!--bet slip 01-->
						<div class="bet_slip_select_box">

							<h5 class="select_bet_perticipant_name">

                            <span class="modal_match_name">
                            <span id="leagueTitle"></span> : <span id="matchName"></span></span>
								<span id="matchCoin" class="match_result_rating"></span>
							</h5>

							<div class="select_bet_match_information">

								<div style="display:none;" class="bet_result bet_slip_error"><br></div>
								<div class="betSuccessMsg"
									 style="display:none;background-color:green;color:#fff;padding:10px"></div>

								<div class="betlimit">Bet limit is 20 to 8000<br></div>
								<div class="betslipQ">Q: <span id="betTitle" class="modal_match_q"></span></div>
								<div class="betslipA">A: <span id="betOption" class="modal_match_ans"></span></div>
							</div>

							<div class="rating_option_line">
								<div class="rating_stake_field">
									<form>
										<input id="option_details_id" type="hidden" name="option_details_id">
										<div class="form-group">
											<input min="20" type="text" class="form-control stake_inputbox" id="stake"
												   value="20" data-betmin="20" data-betmax="8000">
										</div>
									</form>
								</div>

								<div class="to_return_box">
									To Return <span class="return_amount">0.00</span>
								</div>
							</div>
						</div>
						<!--bet slip 01-->


						<!--bid button-->
						<div class="place_bid_button_line">

							<button id="betBtn" class="place-bet-btn place_bid_custom_btn">Place Bet</button>
							<button id="closeBtn" style="width:100%;display:none;" type="button" class="btn btn-danger"
									data-dismiss="modal">Close
							</button>
						</div>
						<!--bid button-->

					</div>
				</div>
				<!--end common block-->
			</div>
		</div>
	</div>

	<!--login modal here-->
	<div id="login-Modal" class="modal fade in" style="display: none;">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<!--					<img src="/examples/images/avatar.png" alt="Avatar">-->
					</div>
					<h5 class="modal-title">User Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="sign_in">
						<div class="form-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="Phone or Email"
								   required="required">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password"
								   placeholder="Password" required="required">
						</div>
						<div class="form-group">
							<button type="submit" id="submit_btn" class="btn btn-info btn-sm btn-block login-btn">
								Login
							</button>
						</div>
					</form>
				</div>
				
				<div class="modal-footer">
					<a href="javascript:void(0);" onclick="return forgotPassword();">Forgot Password?</a>
				</div>
				<div class="modal-footer">
					<a href="javascript:void(0);" onclick="return createNewAccount();"><font color="blue">New? Create an account.</font></a>
				</div>
			</div>
		</div>
	</div>

<?php include(APPPATH . "views/customer/footer.php"); ?>
