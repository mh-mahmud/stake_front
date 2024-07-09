<div style="position: static;" class="ps">
	<div class="ps-content">
		<div class="live-in-play">
			<div class="match-details-banner">
				<div class="match-location-date">
					<span class="date ng-star-inserted"><div><i class="fas fa-circle text-danger blink"></i>&nbsp; LIVE </div></span></div>
				<div class="match-countdown-timer ng-star-inserted">

				</div>

				<div class="match-team-list">
					<div class="team-name-flag">
                                    <span class="flag">
                                        <img alt="" src="<?= get_admin_url() ?>assets/img/flag/<?= $get_data->icon1 ?>">
                                    </span>
						<span class="name"><a><?php echo $team_1; ?></a></span>
					</div>

					<div class="match-start-time">
						<span class="text">Score</span>
						<span class="time"><?php echo $get_data->score_1; ?>:<?php echo $get_data->score_2; ?></span>
					</div>
					<div class="team-name-flag">
                                    <span class="flag">
                                        <img alt="" src="<?= get_admin_url() ?>assets/img/flag/<?= $get_data->icon2 ?>">
                                    </span>
						<span class="name"><a><?php echo $team_2; ?></a></span>
					</div>
				</div>
			</div>

			<div class="match-details-game-header">
                            <span class="text">
                                <?php echo $get_data->league_title; ?> : <?php echo $get_data->title; ?>
                            </span>
				<!--				<span class="statistics"><img alt="" src="assets/img/graph.svg"></span>-->
			</div>
			<!-- end score board -->

			<div class="tab-content" id="live-in-play-tab-content">
				<div class="tab-pane-1" id="homeSports-tab" role="tabpanel">

					<?php if (!empty($get_data)) : ?>

						<div class="ng-star-inserted">
							<div class="single-match-result">


								<?php
								$get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$get_data->id}' AND status=1  ORDER BY match_option_serial ASC")->result();

								$x = rand(10, 10000);
								$i = $x + $get_data->id;
								foreach ($get_bet_data as $data) :
									$options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();
									?>

									<app-bet>
                                                            <span class="ng-star-inserted">
                                                                <div
																	class="single-match-result-accordion-header ng-star-inserted"
																	data-toggle="collapse"
																	data-target="#single-match-result-accordion-<?php echo $i; ?>"
																	aria-expanded="true"
																	aria-controls="single-match-result-accordion-<?php echo $i; ?>"
																	title="To Win The Match?">
                                                                    <a class="status"
																	   title="Match Winner"><?php echo $data->match_option_title; ?></a>
                                                                    <div class="right-side">
                                                                        <span class="single-match-result-accordion-btn">
<!--                                                                            <i class="fas fa-chevron-down"></i>-->
<!--                                                                            <i class="fas fa-chevron-up"></i>-->
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="collapse show ng-star-inserted"
																	 id="single-match-result-accordion-<?php echo $i; ?>">
                                                                    <app-match-ratio class="ng-tns-c28-562">
                                                                        <div class="single-match-result-accordion-body">
                                                                            <div
																				class="row align-items-center justify-content-start">

                                                                                <?php foreach ($options as $op) : ?>
																					<div
																						class="col col-lg-4 ng-tns-c28-562 ng-star-inserted">
                                                                                        <a
																							class="single-match-result-box "
																							href="javascript:void(0);"
																							onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");'
																							title="<?php echo $op->option_title; ?>">
                                                                                            <div
																								class="match-name"><?php echo $op->option_title; ?></div>
                                                                                            <div
																								class="match-point ng-tns-c28-562 ng-star-inserted"><?php echo $op->option_coin; ?></div>
                                                                                        </a>
                                                                                    </div>
																				<?php endforeach; ?>


                                                                            </div>
                                                                        </div>
                                                                    </app-match-ratio>
                                                                </div>
                                                            </span>
									</app-bet>

									<?php $i++; endforeach; ?>

							</div>
						</div>

					<?php else: ?>

						<div class="single-match-result-header" style="background-color:#666;margin-top:5px">
							<a class="left-side">
									<span class="match-infos">
										<span class="bottom-side">
											<span style="font-size:12px">Sorry, no match found to bet</span>
										</span>
									</span>
							</a>
						</div>

					<?php endif; ?>

				</div>
			</div>

		</div>
	</div>

</div>

