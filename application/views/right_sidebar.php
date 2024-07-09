<perfect-scrollbar class="col-lg-3 right-sidebar custom-scrollbar-2">
	<div style="position: static;" class="ps">
		<div class="ps-content">
			<app-right-sidebar>
				<app-upcoming-matches>
					<div class="upcomming-matches-area ng-star-inserted">
						<div class="upcomming-matches-section-title">
							<div class="c-tabs c-tabs--folder coupon__tabs">
								<div class="c-tabs__header">
									<button type="button" id="upcomeBetTab" class="c-tabs__item c-tabs__item--active">
										<span class="c-tabs__name" style="font-size: 12px!important;">
											Upcomming Bet
										</span>
									</button>
									<button type="button" id="liveTvTab"  class="c-tabs__item">
										<span class="c-tabs__name">
											Live Tv
										</span>
									</button>
								</div>
							</div>
						</div>
						<div class="betslip-card-body-wrapper" id="showLiveTv" style="display: none">
							<div class="betslip-card-body" id="liveTvSrc">
									 

							</div>
						</div>

						<div style="overflow-y: scroll; max-height:400px;" id="upcomingBetTabGames">

							<?php
//							$up_match = $this->db->query("SELECT m.id,m.serial, m.title, m.league_title, m.notification, mp.match_option_title, mp.id AS option_id,starting_time AS startTime FROM matchname AS m INNER JOIN match_option AS mp ON m.id=mp.match_id WHERE m.active_status=2 AND m.status=1 GROUP BY m.id ORDER BY m.serial ASC")->result();
							$up_match = $this->db->query("SELECT m.id,m.serial, m.title, m.league_title, m.notification,starting_time AS startTime FROM matchname AS m WHERE m.active_status=2 AND m.status=1 GROUP BY m.id ORDER BY m.serial ASC")->result();
							if (!empty($up_match)):
							foreach ($up_match as $vmatch) :
							?>


								<div class="upcomming-matches-list">
									<div class="single-upcomming-match-card ng-star-inserted">
										<div class="upcomming-match-date">
											<span class="date"><?php echo date("j", strtotime($vmatch->startTime));?></span>
											<span class="month"><?php echo date("M", strtotime($vmatch->startTime));?></span>
										</div>
										<div class="upcomming-match-details">
											<a class="upcomming-match-details-link"
											   href="javascript:void(0);" onclick="return adv_bets_by_single_match(<?php echo $vmatch->id; ?>);">
												<span
													class="upcomming-match-tournament"><?php echo $vmatch->league_title; ?></span>
												<span class="upcomming-match-teams"><?php echo $vmatch->title; ?></span>
												<span
													class="upcomming-match-day-time"><?php echo $vmatch->notification; ?></span>
											</a>

										</div>
									</div>
								</div>

							<?php endforeach; ?>
						</div>
						<?php else: ?>
							<p style="background: #0000FF;color: white;text-align: center">Sorry! no upcoming game</p>
						<?php endif;?>
					</div>
				</app-upcoming-matches>

				<app-upcoming-matches>
					<div class="upcomming-matches-area ng-star-inserted">
						<div class="upcomming-matches-section-title" style="text-align: center">Upcoming Score</div>
						<div>
							<div class="banCont latent">
								<div class="right-banners-block" style="display: block;" id="upcoming_score_ajax">
									<?php
										$up_match = $this->db->query("SELECT m.id, m.title,m.team1,m.team2,m.icon1,m.icon2, m.league_title, m.notification, mp.match_option_title, mp.id AS option_id,starting_time AS startTime FROM matchname AS m INNER JOIN match_option AS mp ON m.id=mp.match_id WHERE m.active_status=2 AND m.status=1 AND mp.is_score_show ='YES' ORDER BY m.serial ASC")->result();
										if (!empty($up_match)):
										foreach ($up_match as $vmatch) :
										$team1_coin = $this->db->query("SELECT option_coin FROM match_option_details WHERE match_option_id='{$vmatch->option_id}' AND option_serial = '1'")->row()->option_coin;
										$team2_coin = $this->db->query("SELECT option_coin FROM match_option_details WHERE match_option_id='{$vmatch->option_id}' AND option_serial = '3'")->row()->option_coin;

										if (!empty($team1_coin) && !empty($team2_coin)):
										?>


										<div class="br-banner ">
											<div class="br-banner__title"><?php echo $vmatch->league_title; ?></div>
											<div class="br-banner-body">
												<div class="br-banner-team">
													<div class="br-banner-team__image">
														<img
															src="<?= get_admin_url() ?>assets/img/flag/<?= $vmatch->icon1 ?>"
															alt="">
													</div>
													<div class="br-banner-team__title"><?= $vmatch->team1 ?></div>
												</div>
												<div class="br-banner-info">
													<div class="br-banner-info__time">
														<span><?php echo date("j-m", strtotime($vmatch->startTime));?></span><span><?php echo date("H:i", strtotime($vmatch->startTime));?></span>
													</div>
													<div class="br-banner-info__ico">

													</div>
												</div>
												<div class="br-banner-team">
													<div class="br-banner-team__image">
														<img
															src="<?= get_admin_url() ?>assets/img/flag/<?= $vmatch->icon2 ?>"
															alt="">
													</div>
													<div class="br-banner-team__title"><?= $vmatch->team2 ?></div>
												</div>
											</div>
											<div class="br-banner-footer">
												<div class="br-banner-footer__val br-banner-footer__val--left"><b style="color: black;"><?= $team1_coin ?></b></div>
												<a href="javascript:void(0);" onclick="return adv_bets_by_single_match(<?php echo $vmatch->id; ?>);"
												   class="br-banner-footer__btn">Place a bet</a>
												<div class="br-banner-footer__val br-banner-footer__val--right"><b style="color: black;"><?= $team2_coin ?></b></div>
											</div>
										</div>
										
										<?php endif; ?>
										<?php endforeach; ?>
										<?php else: ?>
											<p style="background: #0000FF;color: white;text-align: center">Sorry! no upcoming game</p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</app-upcoming-matches>
			</app-right-sidebar>
		</div>

	</div>
</perfect-scrollbar>
