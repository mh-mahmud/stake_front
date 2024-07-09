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
									<a href="<?= base_url() ?>" class="c-tabs__item c-tabs__item--active">
										<span class="c-tabs__name">
											Home
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="left-sidebar-accordion-list">
						<div class="tab-content">
							<div class="tab-pane fade show active">

								<div class="sport-card-accordion" id="accordion">

									<?php
									foreach ($get_game_page as $sval):
										?>
										<div class="sport-card-level-one-wrapper">
											<div class="sport-card-level-one">
												<div class="sport-card-level-one-header"
													 data-toggle="collapse" routerlinkactive="active"
													 data-target="#sport-level-1" aria-expanded="false"
													 aria-controls="#sport-level-1"><a
														class="sport-card-level-one-header-link"
														href="<?= base_url("game/".$sval->id) ?>" style="color: #ffffff; cursor: pointer"><span
															class="category-name">
														<span class="name"><?php echo $sval->page_name; ?></span></span>
													</a>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</app-left-sidebar>
		</div>
	</div>
</perfect-scrollbar>
