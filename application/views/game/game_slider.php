<app-game-other-info-box>
	<div class="game-other-info-box-area">
		<div class="row">

			<div class="col-lg-12 col-sm-6">
				<app-cricket-match-live>
					<owl-carousel>
						<owl-carousel-child class="banner-slider-carousel owl-carousel owl-loaded owl-drag"
											style="display: block;">
							<div id="owl-game-sl" class="owl-carousel">
								<?php foreach ($slider_query as $sval): ?>
									<div class="item" style="height: 321px;"><img
											src="<?php echo get_admin_url() ?>assets/game/<?= $sval->file_name; ?>">
									</div>
								<?php endforeach; ?>
							</div>

						</owl-carousel-child>
					</owl-carousel>
				</app-cricket-match-live>
			</div>

		</div>
	</div>
</app-game-other-info-box>
