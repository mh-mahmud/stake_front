<style>
	.game_container {
		position: relative;
		width: 100%;
	}
	.middle_game_img {
		transition: .5s ease;
		opacity: 0;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}
	.game_image {
		opacity: 1;
		display: block;
		width: 100%;
		transition: .5s ease;
		backface-visibility: hidden;
	}
	.game_container:hover .game_image {
		opacity: 0.3;
	}
	.game_container:hover .middle_game_img {
		opacity: 1;
	}

	.text_img {
		background-color: #1b5797;
		color: white;
		font-size: 16px;
		padding: 16px 32px;
	}

@media only screen and (max-width: 600px) and (min-width: 300px) {
    .left-sidebar-content-area {
        display: none!important;
    }
}
</style>
<perfect-scrollbar class="col-lg-2 left-sidebar custom-scrollbar-2">
	<div style="position: static;" class="ps">
		<div class="ps-content">
			<app-left-sidebar>
				<div class="left-sidebar-toggle-btn-area ic_font">
					<span class="collapse-d-none" style="float:left;padding-right:9%;font-size: 15px;">Time: &nbsp;<span id="time"></span>&nbsp;&nbsp;&nbsp;</span><i class="fas fa-arrow-left icoc"></i>
				</div>
				<div class="left-sidebar-content-area">
					<div class="left-sidebar-tab-search-wrapper collapse-d-none">
						<div class="left-sidebar-tab-links">
							<div class="c-tabs c-tabs--folder coupon__tabs">
								<div class="c-tabs__header">
									<button type="button" id="liveTvTabs" onclick="return live_bets_all();" class="c-tabs__item c-tabs__item--active">
										<span class="c-tabs__name">
											In Play
										</span>
									</button>
									<button type="button" id="upcomeBetTabs" class="c-tabs__item" onclick="return adv_bets_all();">
										<span class="c-tabs__name">
											Advance
										</span>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="left-sidebar-accordion-list">
						<div class="tab-content">
							<div class="tab-pane fade show active">

								<div class="sport-card-accordion" id="accordion">
									<div class="sport-card-accordion-header">Live &nbsp;
										<span class="collapse-d-none">
											<div class="rowc">
												<div class="column-all" style="background-color:#fff;color: #0a2940">
													All
												  </div>
												  <div class="column-all" style="background-color:#888;">
													  <span id="left_side_all_game_count"></span>
												  </div>
												  <div class="column-all" style="background-color:#6bb300;">
													  <span id="left_side_all_live_game_count"></span>
												  </div>
											</div>
										</span>
									</div>

									<?php
									$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
									foreach ($sport_cat_side_menu as $val):
										?>
										<div class="sport-card-level-one-wrapper">
											<div class="sport-card-level-one">
												<div class="sport-card-level-one-header"
													 data-toggle="collapse" routerlinkactive="active"
													 data-target="#sport-level-1" aria-expanded="false"
													 aria-controls="#sport-level-1"><a
														class="sport-card-level-one-header-link"
														href="javascript:void(0);" style="color: #ffffff"
														onclick="return live_bets_by_cat(<?php echo $val->id; ?>);"><span
															class="category-name">
														<span>
															<img alt=""
																 src="<?php echo get_admin_url() ?>assets/img/icon/<?php echo $val->image; ?>"></span><span
																 class="name"><?php echo $val->name; ?></span></span>
														<span class="category-number">
															<span class="anumber" id="left_side_all_game_count_by_cat_<?= $val->id; ?>"></span>&nbsp;&nbsp;
															<span class="number" id="left_side_live_game_count_by_cat_<?= $val->id; ?>"></span>
													</span>
													</a>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>


					<div class="left-sidebar-tab-search-wrapper">
						<div class="tab-content">
							<div class="c-tabs__header">
								<span class="c-tabs__item c-tabs__item--active">
									Play Game
								</span>
							</div>
								<?php $get_game_page =  $this->db->query("SELECT * FROM `game_page` WHERE status = 'Inactive' ORDER BY serial ASC")->result(); ?>
								<?php foreach ($get_game_page as $gval): ?>
								<div class="tab-pane fade show active game_container" style="border: white 1px solid">
									<img src="<?= get_admin_url() . "assets/game/" . $gval->page_image ?>"
										 class="game_image" style="width:100%; height: 150px">
									<div class="middle_game_img">
										<div class="text_img"><a
												href="<?= base_url("game/" . $gval->id) ?>">Play Now</a>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
						</div>
					</div>

				</div>

			</app-left-sidebar>
		</div>
	</div>
</perfect-scrollbar>
