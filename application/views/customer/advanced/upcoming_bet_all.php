<div class="tab-content" id="live-in-play-tab-content">

	<style type="text/css">
		/* Create three unequal columns that floats next to each other */
		.rowColumn {
			float: right;
			line-height: 2;
		}

		.middle, .right {
			width: 15%;
			padding-right: 5px;
			margin-left: 5px;
			margin-top: 15px;
		}

		.left {
			width: 70%; 
			height: 20px;
			background-color: white;
			color: black;
			line-height: 1;
			margin-top: 2px;
		}

		/* Clear floats after the columns */
		.three_row:after {
			content: "";
			display: table;
			clear: both;
		}
		.imgGray{
			filter: gray; /* IE6-9 */
		  	-webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
		  	filter: grayscale(1);
		}

		@media only screen and (max-width: 600px) {
		  		.rowColumn {
					float: right;
					line-height: 2;
				}

				.middle, .right {
					width: 70px;
					padding-right: 1px;
					margin-left: 1px;
					margin-top: 3px;
				}

				.left {
					width: 80%; 
					height: 17px;
					background-color: white;
					color: black;
					line-height: 1.5;
					margin-top: -3px;
				}

				/* Clear floats after the columns */
				.three_row:after {
					content: "";
					display: flex; 
				}
				.single-match-result-header .right-side{
					width: 10%!important;
					
				}
				.right-side{
					display: inline!important;
				}
		}
	</style>

	<div class="tab-pane-1" id="homeSports-tab" role="tabpanel">

		<?php $i = 1;
		foreach ($get_data as $key => $each_cat_match) : ?>
			<div class="single-match-result-accordion-game-header"
				 data-toggle="collapse"
				 data-target="#single-match-result-accordion-<?php echo $i; ?>"
				 aria-expanded="true"
				 aria-controls="single-match-result-accordion-<?php echo $i; ?>">
				<a><?php echo $each_cat_match[0]->name ?><span class="icon">&nbsp&nbsp;<img
							width="25px"
							src="<?php echo get_admin_url() ?>assets/img/icon/<?php echo $each_cat_match[0]->image; ?>"
							alt=""></span></a>
				<div class="align-content-center">
						<span class="single-match-result-accordion-btn">

						</span>
				</div>
			</div>

			<?php
			$each_match = [];
            foreach($match_ids as $val) {
                
                foreach($each_cat_match as $key => $val_x) {

                    if( $val == $val_x->id ) {
                        $each_match[$val][] = $val_x;
                    }
    
                }
                
            }

			foreach ($each_match as $matchval) {

				?>

				<div class="collapse show ng-star-inserted"
					 id="single-match-result-accordion-<?php echo $i; ?>">
					<div class="ng-star-inserted">
						<div class="single-match-result">
							<div class="single-match-result-header" style="justify-content: center!important;">
								<a class="left-side" href="javascript:void(0);"
								   onclick="return live_bets_by_single_match(<?php echo $matchval[0]->id; ?>);">
                                <span class="match-infos">

                                	<div class="left"><marquee behavior="scroll" direction="left" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="1" scrolldelay="40" truespeed="truespeed"><?php echo $matchval[0]->notification; ?></marquee></div>

                                    <span class="top-side">
                                        <span><?php echo $matchval[0]->league_title; ?></span>
                                    </span>
                                    <span class="bottom-side">
                                        <span><?php echo $matchval[0]->team1; ?>&nbsp;</span>
										<span class="live-match-title"> VS </span>
                                        <span class="">&nbsp;<?php echo $matchval[0]->team2; ?></span>
                                    </span>
                                </span>
								</a>
								<div class="right-side">
									<div class="three_row" style="display: inline!important;">
										<?php if (!empty($matchval[0]->youtubeLInk)): ?>
											<div class="rowColumn middle" onclick="youtube_link('<?= $matchval[0]->youtubeLInk ?>');"><img src="<?= base_url("assets/img/youtube.png") ?>" style="width: 35px;height: 20px;cursor: pointer;"></div>
										<?php else: ?>
											<div class="rowColumn middle imgGray"><img src="<?= base_url("assets/img/youtube.png") ?>" style="width: 35px;height: 20px;cursor: pointer;"></div>
										<?php endif ?>
										

										<?php if ($matchval[0]->isLive=="Yes"): ?>
											<div class="rowColumn right"><img src="<?= base_url("assets/img/live.png") ?>" style="width: 35px;height: 20px;"></div>
										<?php else: ?>
											<div class="rowColumn right imgGray"><img src="<?= base_url("assets/img/live.png") ?>" style="width: 35px;height: 20px;"></div>
										<?php endif ?>
									</div>
								</div>
							</div>

							<?php
							$x = rand(100, 100000);
							$ii = $x + $matchval[0]->id;
							foreach ($matchval as $data) {
								if ($data->mopst==1) {
								$options = $this->db->query("SELECT id, option_coin, option_title, status FROM match_option_details WHERE match_option_id='{$data->match_option_id}' AND status NOT IN(4) ORDER BY option_serial ASC")->result();
								?>

								<app-bet>
                                <span class="ng-star-inserted">
                                    <div class="single-match-result-accordion-header"
										 data-toggle="collapse"
										 data-target="#single-match-result-accordion-<?php echo $ii; ?>"
										 aria-expanded="true"
										 aria-controls="single-match-result-accordion-<?php echo $ii; ?>"
										 title="<?php echo $data->match_option_title; ?>">
                                        <a class="status"
										   title=""><?php echo $data->match_option_title; ?></a>
                                        <div class="right-side">
                                            <span class="single-match-result-accordion-btn">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="collapse <?php echo $data->collapse_or_expand=="collapse"?"":"show";  ?> ng-star-inserted"
										 id="single-match-result-accordion-<?php echo $ii; ?>">
                                        <app-match-ratio class="ng-tns-c28-562">
                                            <div class="single-match-result-accordion-body">
                                                <div class="row align-items-center justify-content-start">
                                                    <?php foreach ($options as $op) : ?>
														<div class="col col-lg-4 ng-tns-c28-562 ng-star-inserted">
                                                            <a
																data-coin="<?php echo $op->option_coin; ?>"
																href="javascript:void(0);"
																onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");'
																class="single-match-result-box  bet-option"
																title="<?php echo $op->option_title; ?>">
                                                                <div class="match-name">
                                                                	<?php echo $op->option_title; ?>
                                                                </div>
                                                                <div class="match-point ng-tns-c28-562 ng-star-inserted">
                                                            		<div id="<?= $op->status==0?'box':''; ?>">
                                                            			<?php echo $op->option_coin; ?>
                                                            		</div>
                                                            	</div>
                                                            </a>
                                                        </div>
													<?php endforeach; ?>
                                                </div>
                                            </div>
                                        </app-match-ratio>
                                    </div>
                                </span>
								</app-bet>
								<?php $ii++;
							} } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php $i++; endforeach; ?>
	</div>
</div>

