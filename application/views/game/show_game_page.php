<?php include(APPPATH . "views/game/game_header.php"); ?>
<style>
	canvas {
		border: 1px solid white;
	}
</style>
<app-game-content-area>
	<section class="game-content-area" style="margin-top: 0px">
		<div class="row">
			<?php include(APPPATH . "views/game/game_left_sidebar.php"); ?>

			<perfect-scrollbar class="col-lg-7 game-area custom-scrollbar-2">
				<div style="position: static;" class="ps">
					<div class="ps-content">
						<div class="tab-content" id="live-in-play-tab-content">
							<div class="tab-pane-1" role="tabpanel">
<!--								<img src="--><?//= get_admin_url() . "assets/game/images.jpg" ?><!--" width="100%">-->
								<canvas height="400" width="500" id="game"></canvas>
							</div>
						</div>
					</div>
				</div>
			</perfect-scrollbar>

			<!-- Right sidebar -->
			<?php include(APPPATH . "views/game/game_right_sidebar.php"); ?>

		</div>
	</section>
</app-game-content-area>


<!--login modal here-->
<div id="login-Modal" class="modal fade in" style="display: none;">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">

				</div>
				<h5 class="modal-title">User Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form id="sign_in">
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username"
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
		</div>
	</div>
</div>

<?php include(APPPATH . "views/game/game_footer.php"); ?>
