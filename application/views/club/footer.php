<app-footer-area>
	<div class="footer-bg-area" style="background-image:url('<?php echo base_url(); ?>assets/img/footer-bg.png')">
		<section class="footer-area">
			<div class="container-fluid">
				<div class="row" style="  padding: 10px!important; line-height: 12px!important;">
					<div class="col-lg-7">
						<div class="row">
							<div class="col-md-4">
								<div class="footer-links"><h3>Information</h3>
									<ul>
										<li><a href="">About Us</a></li>
										<li><a href="">Contact Us</a></li>
										<li><a href="">Privacy Policy</a></li>
										<li><a href="">ONLINE Affiliate Program</a></li>
										<li><a href="">How to place a bet</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-4">
								<div class="footer-links"><h3>Game</h3>
									<ul>
										<li><a href="">Toto</a></li>
										<li><a href="">Slots</a></li>
										<li><a href="">Live TV Game</a></li>
										<li><a href="">Bingo</a></li>
									</ul>
								</div>
							</div>

							<div class="col-md-4">
								<div class="footer-links"><h3>Co. Partner</h3>
									<ul>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/gambling.svg"></li>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/cil_logo.png"></li>
									</ul>
								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-5">
						<div class="row">
							<div class="col-lg-4">
								<div class="mobile-apps">
									<h3>Mobile Apps</h3>
									<a href="javascript:void(0);" onclick="return alert('Our app currently under development process');"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/app-store.png"></a>
									<a href="javascript:void(0);" onclick="return alert('Our app currently under development process');"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/android.png"></a>
								</div>
							</div>
							<div class="col-lg-7 text-center" style="max-width: 285px!important;">
								<div class="logo-list logo-list-stacked">
									<ul>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/logo-1.png"></li>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/logo-2.png"></li>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/logo-3.png"></li>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/logo-5.png"></li>
										<li style="height: 25px!important;"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/logo-6.png"></li>
										<li style="height: 25px!important;"><img width="100" alt="" src="<?php echo base_url(); ?>assets/img/bitcoin.png"></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-4" style="max-width: 120px!important;">
								<div class="mobile-apps">
									<a href="javascript:void(0);" onclick="return alert('Our app currently under development process');"><img width="80" alt="" src="<?php echo base_url(); ?>assets/img/18plus-logo.png"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<section class="footer-area-bottom">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-2">
					<div class="footer-top-left">
						<ul>
							<li>
								<a href="" title="Facebook">
									<i class="zmdi zmdi-facebook"></i>
								</a>
							</li>
							<li>
								<a href="" title="Youtube">
									<i class="zmdi zmdi-youtube"></i>
								</a>
							</li>
							<li>
								<a href="" title="Twitter">
									<i class="zmdi zmdi-twitter"></i>
								</a>
							</li>
							<li>
								<a href="" title="Instagram">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li>
								<a href="" title="Telegram">
									<i class="fab fa-telegram-plane"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-10">
					<div class="row">
						<div class="col-md-10">
							<p style="color: darkgray;text-align: justify;position: absolute; top: 10px;">
								Copyright © 2016-2021 <b>Betscore 24</b>.	All rights reserved and protected by law. betscore.com is owned by Toto Ltd
								(reg.number USW37U99).
							</p>
						</div>
						<div class="col-md-2">
							<div class="footer-top-right">
								<ul>
									<li><a style="color: darkgray!important;" href=""><img width="15" height="15" alt="" src="http://localhost/bet_web/assets/img/callIco.png">&nbsp;&nbsp; +4458411225</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</app-footer-area>
</app-root>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php //echo base_url(); ?>assets/bappe_css_js/materialView.js"></script>
<script src="<?php echo base_url(); ?>assets/bappe_css_js/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bappe_css_js/sweetalert-dev.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

</body>
</html>
<script>

	//	slider
	$(document).ready(function() {

		$("#owl-demo").owlCarousel({
			items:1,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true
		});

	});


	function myTimer() {
		var d = new Date();
		document.getElementById("time").innerHTML = d.toLocaleTimeString();
	}

	setInterval(myTimer, 1000);

	$(".sign-in-off-canvas-area-close").click(function () {
		$(".sign-in-off-canvas-area").removeClass("active");
	});
	$(".icon-user-menu").click(function () {
		$(".sign-in-off-canvas-area").addClass("active");
	}).on('click', '.sign-in-off-canvas-area-overlay', function (e) {
		$(".sign-in-off-canvas-area").removeClass("active");
	});

	$(".ic-cl").click(function () {
		$(".left-sidebar").hasClass("collaps-active") ? $(".left-sidebar").removeClass("collaps-active") : $(".left-sidebar").addClass("collaps-active");
		$(".admin-profile-sidebar-menu-list").hasClass("collapse show") ? $(".admin-profile-sidebar-menu-list").removeClass("collapse show") : $(".admin-profile-sidebar-menu-list").addClass("collapse show");
		$(".admin-content").hasClass("collaps-active") ? $(".admin-content").removeClass("collaps-active") : $(".admin-content").addClass("collaps-active");
	});

	$(".ic_font").click(function () {
		if ($(".icoc").hasClass("fa-arrow-left")){
			$(".icoc").removeClass("fa-arrow-left");
			$(".icoc").addClass("fa-arrow-right");
		}else{
			$(".icoc").addClass("fa-arrow-left");
			$(".icoc").removeClass("fa-arrow-right");
		}
		$(".left-sidebar").hasClass("collaps-active") ? $(".left-sidebar").removeClass("collaps-active") : $(".left-sidebar").addClass("collaps-active");
		$(".game-area").hasClass("collaps-active") ? $(".game-area").removeClass("collaps-active") : $(".game-area").addClass("collaps-active");
	});


	function checkClubbal(id) {
		var url_prefix = "<?php echo base_url(); ?>";
		$.ajax({
			type: 'POST',
			url: url_prefix + 'jsquerytimer/cehckAjaxClubBal',
			data:{id:id},
			dataType: 'json'
		}).done(function (response) {
			if (response.st == 200) {
				$("#clubBal").html('');
				$("#clubBal").html(response.data);
			}
		});
	}


</script>
