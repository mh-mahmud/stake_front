<div id="in_play">
	<div class="live-in-play-carousel-parent-wrapper">
		<owl-carousel>
			<owl-carousel-child class="live-in-play-carousel stage-padding owl-carousel"
								style="display: block;" id="owl-menu">

								<div class="item">
									<a class="live-in-play-carousel-item" href="javascript:void(0);"
									   onclick="return live_bets_all();">
										<img alt="All" class="d-block w-100"
											 src="<?php echo base_url(); ?>assets/img/icon/select-all.png">
										<p id="top_bar_all_live_game_count"></p>
									</a>
								</div>
							<?php
							$sport_cat_mid_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
							foreach ($sport_cat_mid_menu as $val):
							?>
							<div class="item">
								<a class="live-in-play-carousel-item" href="javascript:void(0);"
								   onclick="return live_bets_by_cat(<?php echo $val->id; ?>);">
									<img alt="<?php echo $val->name; ?>" class="d-block w-100"
										 src="<?php echo get_admin_url(); ?>assets/img/icon/<?php echo $val->image; ?>">
									<p style="align-items: center; text-align: justify-all" id="top_bar_live_game_count_by_cat_<?= $val->id; ?>"></p>
								</a>
							</div>
							<?php endforeach; ?>

			</owl-carousel-child>
		</owl-carousel>
	</div>
</div>
<div id="advance_play" style="display: none">
	<div class="live-in-play-carousel-parent-wrapper">
		<owl-carousel>
			<owl-carousel-child class="live-in-play-carousel stage-padding owl-carousel "
								style="display: block;" id="owl-menu2">

				<div class="item">
					<a class="live-in-play-carousel-item" href="javascript:void(0);"
					   onclick="return adv_bets_all();">
						<img alt="All" class="d-block w-100"
							 src="<?php echo base_url(); ?>assets/img/icon/select-all.png">
						<p id="top_bar_all_adv_game_count"></p>
					</a>
				</div>
				<?php
				$sport_cat_mid_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
				foreach ($sport_cat_mid_menu as $val):
					?>
					<div class="item">
						<a class="live-in-play-carousel-item" href="javascript:void(0);"
						   onclick="return adv_bets_by_cat(<?php echo $val->id; ?>);">
							<img alt="<?php echo $val->name; ?>" class="d-block w-100"
								 src="<?php echo get_admin_url(); ?>assets/img/icon/<?php echo $val->image; ?>">
							<p style="align-items: center; text-align: justify-all" id="top_bar_adv_game_count_by_cat_<?= $val->id; ?>"></p>
						</a>
					</div>
				<?php endforeach; ?>

			</owl-carousel-child>
		</owl-carousel>
	</div>
</div>

