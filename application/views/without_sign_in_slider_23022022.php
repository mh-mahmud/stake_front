
<style>
   @media (max-width: 768px) {

        #reg_form{
            display:none;
        }
        
    } 
</style>
	<app-game-other-info-box>
	<div class="game-other-info-box-area">
		<div class="row">
			<div class="col-lg-4">
				<app-game-other-info-registration-area>
					<div class="game-other-info-registration-area" id="reg_form"
						 style="background-image: url('assets/img/registration-bg.png');">
						<div class="game-other-info-registration-wrapper">
							

							<form id="personalInfoFormOtp" action="" style="max-width:500px;margin:auto;display: ;" method="post">
								<input type="hidden" id="verified_op" name="verified_by" value="phone">
								<h3>User Registration</h3>

								<div id="step2">

									<div class="input-containerr" id="phoneId">
										<i class="fas fa-phone iconr"></i>
										<input class="input-fieldr" type="tel" id="phone"
											   placeholder="Mobile Number" name="phone">
									</div>

									<div class="input-containerr">
										<i class="fas fa-globe iconr"></i>
										<select name="country" id="country" class="input-fieldr">
											<option class="option" value="">Select your country</option>
											<!--<?php
											$jsonUrl = base_url() . 'assets/json/CountryCodes.json';
											$countyJson = file_get_contents($jsonUrl);
											$cuntryArray = json_decode($countyJson, true);

											foreach ($cuntryArray as $countryVal) {

												?>
												<option
													class="option" <?= $countryVal['dial_code'] == "+880" ? "selected" : "" ?>
													value="<?= $countryVal['name'] ?> <?= $countryVal['dial_code'] ?>"><?= $countryVal['name'] ?> <?= $countryVal['dial_code'] ?> </option>
											<?php } ?> -->
 											<option value="Maylaysia +60">Maylaysia +60</option>
                                            						<option value="Bangladesh +880">Bangladesh +880</option>
                                            						<option value="Singapore +65">Singapore +65</option>
                                            						<option value="India +91">India +91</option>
										</select>
									</div>

									<div class="input-containerr">
										<i class="fas fa-user iconr"></i>
										<input class="input-fieldr" type="text" id="full_name"
											   placeholder="Username" name="username_f">
									</div>

									<div class="input-containerr">
										<i class="fas fa-key iconr"></i>
										<input class="input-fieldr" type="password" id="regpassword"
											   placeholder="Give any password" name="password_f">
									</div>

									<div class="input-containerr">
										<i class="fas fa-key iconr"></i>
										<input class="input-fieldr" type="password" id="cpassword"
											   placeholder="Confirm password" name="cpassword_f">
									</div>

									<div class="input-containerr">
										<i class="fas fa-male iconr"></i>
										<input class="input-fieldr" type="text" id="sponsorname"
											   placeholder="Your sponsor name(Required)" required="true"
											   name="sponsorname_f">
									</div>

									<div class="input-containerr">
										<i class="fas fa-handshake iconr"></i>
										<select name="club_id_f" id="club_id" class="input-fieldr">
											<option value="">Select A Club *</option>
											<?php
											$club_data = $this->db->query("SELECT id, club_name FROM club_users WHERE status=1 ORDER BY serial ASC")->result();
											foreach ($club_data as $cval):
												?>
												<option class="option"
														value="<?= $cval->id; ?>"><?= $cval->club_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<button type="submit" class="btnr" id="registerBtn">Register</button>

								<div class="rs-other-info termes-policy"><span
										class="text-center"> I accept Betscore24 <a
											href="">Terms of Service</a>. and <a
											href="">Security Standards & Policies</a>. </span>
								</div>
							</form>

						</div>
					</div>
				</app-game-other-info-registration-area>
			</div>
			<div class="col-lg-6 col-sm-12">
				<app-banner-slider>
					<owl-carousel>
						<owl-carousel-child class="banner-slider-carousel owl-carousel owl-loaded owl-drag"
											style="display: block;">
							<div id="owl-demo" class="owl-carousel">
								<?php $slider_query = $this->db->query("SELECT * FROM `slider_banner` WHERE status = 1 ORDER BY serial ASC")->result(); ?>
								<?php foreach ($slider_query as $sval): ?>
									<div class="item" style="height: 321px;"><img
											src="<?php echo get_admin_url() ?>assets/img/slider/<?= $sval->file_name; ?>">
									</div>
								<?php endforeach; ?>
							</div>

						</owl-carousel-child>
					</owl-carousel>
				</app-banner-slider>
			</div>
			<div class="col-lg-2">
				<app-cricket-match-live>
					<div class="cricket-match-carousel-area no-live-match"
						 style="background-image: url('assets/img/cr.jpg')">

						<owl-carousel>
							<owl-carousel-child id="c_s_s" class="banner-slider-carousel owl-carousel owl-loaded owl-drag"
												style="display: block;">
								<div id="owl-cricket-score" class="owl-carousel">
									<?php $slider_query = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.score_show_in='Cricket' AND m.active_status = '1' AND m.status = '1' ")->result(); ?>
									<?php if (!empty($slider_query)): ?>
										<?php foreach ($slider_query as $sval): ?>
											<div class="item" style="height: 155px;">
												<div data-sportid="2" class="new-event__game">
													<a href="javascript:void(0);"
													   class="new-event__title"><?= $sval->league_title; ?></a>
													<div class="new-event__wrap">
														<marquee behavior = 'scroll' direction = 'left' onmouseout=this.start(); onmouseover=this.stop(); scrollamount='2' scrolldelay='40' truespeed='truespeed'>
															<div class="new-event__beginning">
																<span class="new-event__half">
																	<span><?php echo $sval->team1; ?>&nbsp;</span>
																	<span class="live-match-title"> VS </span>
																	<span>&nbsp;<?php echo $sval->team2; ?></span>
																	<span class="new-event__time">&nbsp;&nbsp;|&nbsp;&nbsp;<?= $sval->notification; ?></span>
																</span>
															</div>
														</marquee>

														<div class="new-event__teams">
															<div class="new-event__team">
																<div class="event-team__logo">
																	<img
																		style="width: 40px!important;height: 40px!important;"
																		src="<?= get_admin_url() ?>assets/img/flag/<?= $sval->icon1; ?>">
																</div>
																<div class="event-team__name"><?= $sval->team1; ?></div>
																<span class="cricket_score1_id_<?= $sval->id; ?>"><?= $sval->score_1; ?></span>
															</div>

	 


															<div class="new-event__team">
																<div class="event-team__logo">
																	<img
																		style="width: 40px!important;height: 40px!important;"
																		src="<?= get_admin_url() ?>assets/img/flag/<?= $sval->icon2; ?>">
																</div>
																<div class="event-team__name"><?= $sval->team2; ?></div>
																<span class="cricket_score2_id_<?= $sval->id; ?>"><?= $sval->score_2; ?></span>
															</div>


															<div class="new-event__bg" style="opacity: 1!important;">
																<img src="<?= base_url() ?>assets/css/bgvs.png" style="width: 40px!important;height: 40px!important;position: absolute;top: calc(50% - 2.08333em);left: calc(50% - 2.08333em);background-position: center;">
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									<?php endif ?>
									

								</div>

							</owl-carousel-child>
						</owl-carousel>
 
					</div>
				</app-cricket-match-live>
				<app-football-match-live>
					<div class="football-match-carousel-area no-live-match"
						 style="background-image: url('assets/img/fb.png')">

						<div id="football_slider_ajx">
							<owl-carousel>
								<owl-carousel-child id="f_s_s" class="banner-slider-carousel owl-carousel owl-loaded owl-drag"
													style="display: block;">
									<div id="owl-football-score" class="owl-carousel">
										<?php $slider_query = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.score_show_in='Football' AND m.active_status = '1' AND m.status = '1' ")->result(); ?>
										<?php foreach ($slider_query as $sval): ?>
											<div class="item" style="height: 155px;">
												<div data-sportid="2" class="new-event__game">
													<a href="javascript:void(0);"
													   class="new-event__title"><?= $sval->league_title; ?></a>
													<div class="new-event__wrap">
														<div class="new-event__beginning">
															<span class="new-event__half">
																<span><?php echo $sval->team1; ?>&nbsp;</span>
																<span class="live-match-title"> VS </span>
																<span>&nbsp;<?php echo $sval->team2; ?></span>
															</span>
															<span class="new-event__time"><?= $sval->notification; ?></span>
														</div>

														<div class="new-event__teams">
															<div class="new-event__team">
																<div class="event-team__logo">
																	<img
																		style="width: 40px!important;height: 40px!important;"
																		src="<?= get_admin_url() ?>assets/img/flag/<?= $sval->icon1; ?>">
																</div>
																<div class="event-team__name"><?= $sval->team1; ?></div>
															</div>


															<div class="new-event__score">
																<div class="event-score__number">
																	<span class="football_score1_id_<?= $sval->id; ?>"><?= $sval->score_1; ?></span></div>
																<div class="event-score__divider"></div>
																<div class="event-score__number">
																	<span class="football_score2_id_<?= $sval->id; ?>"><?= $sval->score_2; ?></span></div>
															</div>


															<div class="new-event__team">
																<div class="event-team__logo">
																	<img
																		style="width: 40px!important;height: 40px!important;"
																		src="<?= get_admin_url() ?>assets/img/flag/<?= $sval->icon2; ?>">
																</div>
																<div class="event-team__name"><?= $sval->team2; ?></div>
															</div>

														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>

								</owl-carousel-child>
							</owl-carousel>
						</div>


					</div>
				</app-football-match-live>
			</div>
		</div>
	</div>
</app-game-other-info-box>
