<style>
	.container_img {
		position: relative;
		width: 100%;
	}

	.image {
		opacity: 1;
		display: block;
		width: 500px;
		height: auto;
		transition: .5s ease;
		backface-visibility: hidden;
	}

	.middle {
		transition: .5s ease;
		opacity: 0;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}

	.container_img:hover .image {
		opacity: 0.3;
	}

	.container_img:hover .middle {
		opacity: 1;
	}

	.text_img {
		background-color: #1b5797;
		color: white;
		font-size: 16px;
		padding: 16px 32px;
	}
</style>

<perfect-scrollbar class="col-lg-3 right-sidebar custom-scrollbar-2">
	<div style="position: static;" class="ps">
		<div class="ps-content">
			<app-right-sidebar>
				<app-upcoming-matches>
					<div class="upcomming-matches-area ng-star-inserted">
						<div class="upcomming-matches-section-title" style="text-align: center">Play Game</div>
						<div>
							<div class="banCont latent">
								<div class="right-banners-block" style="display: block; overflow-y: scroll; max-height:600px;">
									<?php
									foreach ($get_game_page as $svals):
										?>
										<div class="br-banner ">
											<div class="br-banner__title"><?php echo $svals->page_name; ?></div>
											<div class="container_img">
												<img src="<?= get_admin_url() . "assets/game/" . $svals->page_image ?>"
													 class="image" style="width:500px; height: 150px">
												<div class="middle">
													<div class="text_img"><a
															href="<?= base_url("game/" . $svals->id) ?>">Play Now</a>
													</div>
												</div>
											</div>
										</div>

									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</app-upcoming-matches>
			</app-right-sidebar>
		</div>

	</div>
</perfect-scrollbar>
