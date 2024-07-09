<style type="text/css">
	.page-loader-wrapper {
	    z-index: 99999999;
	    position: fixed;
	    top: 0;
	    left: 0;
	    bottom: 0;
	    right: 0;
	    width: 100%;
	    height: 100%; 
	    background: #eee;
	    overflow: hidden;
	    opacity: .93;
	    text-align: center;
	    overflow:hidden;
	    display: none;
	}

	.page-loader-wrapper p {
	    font-size: 13px;
	    margin-top: 10px;
	    font-weight: bold;
	    color: #444;
	}

	.preloader {
	    margin-right: 10px;
	}

	.page-loader-wrapper .loader {
	    position: relative;
	    /*top: calc(50% - 30px);*/
	}
	 
	 
</style>

<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
        	<div class="circle-clipper">
                <div class="circle"><img src="<?= base_url('assets/img/no_internet.jpg'); ?>"></div>
            </div>
    	</div>
    </div>
</div>

<footer class="footer_part">
	<div class="container" style="max-width: 1500px;">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="copyright_info">
					<img src="<?php base_url(); ?>assets/img/logo.png" alt="" title="Bet score 24" width='80' class="">
					<p>Copyright © 2017, All rights reserved. </p>
					<p><b>Caution!</b> We are strongly discourage to use this site who are not 18+ and also site administrator is not liable to any kind of issues created by user.</p>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Betting</h5>
							<ul>
								<li><a href="">Spotrs</a></li>
								<li><a href="">Multi-Live</a></li>
								<li><a href="">Live</a></li>
								<li><a href="">Live Casino</a></li>
								<li><a href="">Number</a></li>
								<li><a href="">Toto</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Game</h5>
							<ul>
								<li><a href="">Toto</a></li>
								<li><a href="">Slots</a></li>
								<li><a href="">Live TV Game</a></li>
								<li><a href="">Bingo</a></li>
								<li><a href="">Casino</a></li>
								<li><a href="">Bitcoin</a></li>
								<li><a href="">BS24 Game</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Information</h5>
							<ul>
								<li><a href="">About Us</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Privacy Policy</a></li>
								<li><a href="">ONLINE Affiliate Program</a></li>
								<li><a href="">How to place a bet</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="footer_quick_link">
					<h5>Service Center</h5>
					<ul>
						<li><a href="">Help Center</a></li>
						<li><a href="">Discussions</a></li>
					</ul>
					<br>
					<h5>Downloads</h5>
					<div class="mobile_app_download_icon" style="text-align:left;">
						<a target="_blank" href="">
							<img width="100" alt="" src="<?php echo base_url(); ?>assets/img/android.png">
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="payment_icon_block_bottom">
			<div class="col-sm-6 col-md-6 col-lg-12">
				<img src="<?php echo base_url(); ?>assets/img/partner/neteller.png" width="100" height="100">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/visa_mastercard.png" width="100">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/skrill.png" width="90">&nbsp;&nbsp;&nbsp;
			</div>
			<div class="col-sm-6 col-md-6 col-lg-12">

				<img src="<?php echo base_url(); ?>assets/img/partner/brazilSerieA.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-fcb.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-hellraisers.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-laliga.png" width="40">&nbsp;
			</div>
		</div>

		<div class="disclimar_block">
			<p><?= get_copyright_message(); ?></p>
		</div>
	</div>
</footer>


<!-- Local scripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/materialView.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/react_css_js/sweetalert.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/v.option.meterial.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.slider.js?ver=<?php echo md5(rand(111,999))?>"></script>
 
<?php include(APPPATH . "views/multibet/multibet_app_js.php"); ?>
<!-- End --> 
<!--<script type="text/javascript" src="//support.betscore24.com/php/app.php?widget-init.js"></script>-->
</body>
</html>
 
 

 
    <script type="text/javascript">
        $(document).ready(function() {

        	//setInterval(web_socket_ci,1000);
        	function web_socket_ci() {
        	 	var get_sports_id = $("#sports_id_get").val(); 
				live_bets_all_web_socket(); 
				live_bets_by_cat_web_socket(get_sports_id); 
				live_bets_by_single_match_web_socket(get_sports_id); 
				adv_bets_all_web_socket(); 
				adv_bets_by_cat_web_socket(get_sports_id);
				adv_bets_by_single_match_web_socket(get_sports_id);
        	 }
    		
    	});
    </script> 
 
 


<script type="text/javascript">

	$(document).ready(function() {
		betscore24();
		get_all_count();
	});

	setInterval(get_all_count,20000);

	$("#emailId").hide();
	$("#otpCode").hide();
 	
	
	// -- quick registration
	$(document).ready(function (e) {
		$("#personalInfoFormOtp").on('submit', (function (e) {
			e.preventDefault();

			var country = $("#country").val();
			var phone = $("#phone").val();
			var username = $("#full_name").val();
			var verifyId = $("#verified_by").val();

			if (country == "") {
				swal(
					{
						title: "Select Country",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			if (username == "") {
				swal(
					{
						title: "Username required",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			if (phone == "") {
				swal(
					{
						title: "Phone is required",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			if (verifyId == "phone") {
				if (phone == "") {
					swal(
						{
							title: "Give valid mobile number",
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
					return;
				}
			}

			var pass = $("#regpassword").val();
			var cpass = $("#cpassword").val();
			var c_dt = $("#club_id").val();
			var sponsorname = $("#sponsorname").val();

			if (pass != cpass) {
				swal(
					{
						title: "Confirm Password Not Match",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			if (c_dt == "") {
				swal(
					{
						title: "Select any club",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			if (sponsorname == "") {
				swal(
					{
						title: "Need sponsorname",
						type: "error",
						timer: 2000,
						showConfirmButton: true
					}
				);
				return;
			}

			var url = "<?php echo base_url('betscore/final_step_reg'); ?>";
			$.ajax({
				url: url,
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					document.getElementById('registerBtn').innerText = 'Please Wait...';
				},

				dataType: 'json',
				success: function (data) {
					if (data.st == 400) {
						swal(
							{
								title: data.error,
								type: "error",
								timer: 2000,
								showConfirmButton: true
							}
						);
						document.getElementById('registerBtn').innerText = 'Register';
						return;
					}

					if (data.st == 200) {

						swal(
							{
								title: data.done,
								type: "success",
								timer: 2000,
								showConfirmButton: true
							}
						);
						document.getElementById('registerBtn').innerText = 'Register';
						$("#personalInfoFormOtp").fadeOut();
						$("#registrationFormOtp").show();
						window.location = '<?php echo base_url("/"); ?>';
						return;
					}
				}
			});
			return false;
		}));
	});




	// Numeric only control handler
	jQuery.fn.ForceNumericOnly =
		function () {
			return this.each(function () {
				$(this).keydown(function (e) {
					var key = e.charCode || e.keyCode || 0;
					// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
					// home, end, period, and numpad decimal
					return (
						key == 8 ||
						key == 9 ||
						key == 13 ||
						key == 46 ||
						key == 110 ||
						key == 190 ||
						(key >= 35 && key <= 40) ||
						(key >= 48 && key <= 57) ||
						(key >= 96 && key <= 105));
				});
			});
		};

	// function showBetModal(coin, id) {
	// 	$("#lodingPage").show();
	// 	$("#betBtn").show();
	// 	$("#closeBtn").hide();
	// 	$(".betSuccessMsg").hide();
	// 	$(".betSuccessMsg").text("");
	// 	$(".bet_slip_error").hide();
	// 	$(".bet_slip_error").text("");
	// 	// $("#betModalBox").modal('show');
		
	// 	setTimeout(function(){
 //          $('#betModalBox').modal('hide')
 //        }, 20000);
        
        
	// 	var coin_rate = parseFloat(coin);
	// 	var id = id;

	// 	var url_prefix = "<?php echo base_url(); ?>";
	// 	url = url_prefix + 'betscore/check_init_bet';

	// 	// ajax request
	// 	$.ajax({
	// 		type: "POST",
	// 		url: url,
	// 		data: {
	// 			option_details_id: id,
	// 			coin_rate: coin_rate,
	// 		},
	// 		dataType: 'json',
	// 		success: function (data) {
	// 			console.log(data);
	// 			$("#lodingPage").hide();
	// 			if (data.error == 0) {

	// 				var coin = parseFloat(data.get_data.option_coin);
	// 				var option_id = data.get_data.id;
	// 				var option_title = data.get_data.option_title;
	// 				var match_title = data.get_data.title;
	// 				var bet_title = data.get_data.match_option_title;
	// 				var league_title = data.get_data.league_title;
	// 				var amount = coin * 20;
	// 				amount = amount.toFixed(2);
	// 				$("#option_details_id").attr("value", option_id);
	// 				$("#leagueTitle").text(league_title);
	// 				$("#matchName").text(match_title);
	// 				$("#matchCoin").text(coin.toFixed(2));
	// 				$("#betTitle").text(bet_title);
	// 				$("#betOption").text(option_title);
	// 				$(".return_amount").text(amount);
	// 				$("#betModalBox").modal('show');

	// 				$("#stake").val(20);
	// 				$("#stake").on("keyup", function () {
	// 					$(this).ForceNumericOnly();
	// 					var coinAmount = $(this).val();
	// 					coinAmount = parseFloat(coinAmount);

	// 					if (coinAmount < 20 || coinAmount > 8000 || !coinAmount) {
	// 						$(".bet_slip_error").show();
	// 						$(".bet_slip_error").text("Error! Bet limit is 20 to 8000");
	// 						$(".place_bid_custom_btn").attr('disabled', true);
	// 						return;
	// 					} else {
	// 						$(".bet_slip_error").text("");
	// 						$(".bet_slip_error").hide();
	// 						$(".place_bid_custom_btn").attr('disabled', false);
	// 					}

	// 					totalAmount = coinAmount * coin;
	// 					if (isNaN(totalAmount)) {
	// 						totalAmount = 0;
	// 					}
	// 					totalAmount = totalAmount.toFixed(2);
	// 					$(".return_amount").text(totalAmount);
	// 				});

	// 			} else if (data.error == 1) {
	// 				// $("#loginModal").modal('show');
	// 				swal(
	// 					{
	// 						title: "Please login to continue",
	// 						type: "error",
	// 						timer: 2000,
	// 						showConfirmButton: true
	// 					}
	// 				);
	// 			} else if (data.error == 2 || data.error == 3) {
	// 				swal(
	// 					{
	// 						title: data.error_msg,
	// 						type: "error",
	// 						timer: 2000,
	// 						showConfirmButton: true
	// 					}
	// 				);
	// 			}
	// 			return;
	// 		},
	// 		error: function (exception) {
	// 			//console.log(exception);
	// 		}
	// 	});

	// }

	// // bet submission code
	// $("button#betBtn").on("click", function () {

	// 	var optionDetailsId = $("#option_details_id").val();
	// 	var userBet = parseFloat($("#stake").val());
	// 	var exObj = $(this);

	// 	var url_prefix = "<?php //echo base_url(); ?>";
	// 	url = url_prefix + 'submit_user_bet';

	// 	// ajax request
	// 	$.ajax({
	// 		type: "POST",
	// 		url: url_prefix + 'customeruser/submit_user_bet',
	// 		data: {
	// 			option_details_id: optionDetailsId,
	// 			user_bet: userBet
	// 		},
	// 		beforeSend: function () {
	// 			exObj.attr('disabled', true);
	// 			exObj.text("Please wait.....");
	// 			// $('#betModalBox').modal('hide');
	// 		},
	// 		dataType: 'json',
	// 		success: function (data) {
	// 			exObj.attr('disabled', false);
	// 			exObj.text("Place Bet");

	// 			$("#betBtn").hide();
	// 			$("#closeBtn").show();

	// 			if (data.error == 0) {
	// 				swal(
	// 					{
	// 						title: data.success_msg,
	// 						type: "success",
	// 						timer: 2000,
	// 						showConfirmButton: false
	// 					}
	// 				);
	// 				$('#betModalBox').modal('hide');
	// 				return;
	// 			} else if (data.error == 1) {
	// 				swal(
	// 					{
	// 						title: data.error_msg,
	// 						type: "error",
	// 						timer: 2000,
	// 						showConfirmButton: true
	// 					}
	// 				);
	// 				return;
	// 			} else if (data.error == 2 || data.error == 3) {
	// 				swal(
	// 					{
	// 						title: data.error_msg,
	// 						type: "error",
	// 						timer: 2000,
	// 						showConfirmButton: true
	// 					}
	// 				);
	// 				return;
	// 			}
	// 		},
	// 		error: function (exception) {
	// 			// console.log(exception);
	// 		}
	// 	});
	// });

	function loginForm() {
		$("#login-Modal").modal('show');
	}	
	
	function createNewAccount() {
		$("#login-Modal").modal('hide');
		$("#reg_form").show();
	}


	function forgotPassword() {
		$("#login-Modal").modal("hide");
		swal({
			title: "Reset Your Password?",
			text: "Give Your Valid Phone/Email",
			type: "input",
			confirmButtonColor: '#3ca7f5',
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Write your valid phone or email"
		}, function (inputPhoneOrEmail) {
			if (inputPhoneOrEmail === false) return false;
			if (inputPhoneOrEmail === "") {
				swal.showInputError("You need to give something!");
				return false;
			} else {
				$.ajax({
					type: 'POST',
					url: "<?php echo base_url('betscore/get_otp_for_reset_pass'); ?>",
					data: {inputPhoneOrEmail: inputPhoneOrEmail},
					dataType: 'json',
				}).done(function (response) {
					if (response.st == 400) {
						swal.showInputError(response.error);
						return false;
					}
					if (response.st == 200) {
						swal({
							title: "Verify OTP",
							text: "We sent OTP code to your " + inputPhoneOrEmail,
							type: "input",
							confirmButtonColor: '#3ca7f5',
							showCancelButton: true,
							closeOnConfirm: false,
							animation: "slide-from-top",
							inputPlaceholder: "Write valid otp code"
						}, function (inputOtp) {
							if (inputOtp === false) return false;
							if (inputOtp === "") {
								swal.showInputError("You need to give otp!");
								return false;
							} else {
								$.ajax({
									type: 'POST',
									url: "<?php echo base_url('betscore/otp_verify_for_reset_pass'); ?>",
									data: {inputOtp: inputOtp},
									dataType: 'json',
								}).done(function (response1) {
									if (response1.st == 400) {
										swal.showInputError(response1.error);
										return false;
									}
									if (response1.st == 200) {
										var code = response1.code;
										swal({
											title: "Password to reset",
											text: "Give new password",
											type: "input",
											confirmButtonColor: '#3ca7f5',
											showCancelButton: true,
											closeOnConfirm: false,
											animation: "slide-from-top",
											inputPlaceholder: "Write your new password"
										}, function (inputNewPass) {
											if (inputNewPass === false) return false;
											if (inputNewPass === "") {
												swal.showInputError("You need to give new password!");
												return false;
											} else {
												$.ajax({
													type: 'POST',
													url: "<?php echo base_url('betscore/reset_forgot_pass_final_step'); ?>",
													data: {inputNewPass: inputNewPass, code: code},
													dataType: 'json',
												}).done(function (response2) {

													if (response2.st == 400) {
														swal.showInputError(response2.error);
														return false;
													}
													if (response2.st == 200) {
														swal(
															{
																title: response2.done,
																type: "success",
																timer: 2000,
																showConfirmButton: true
															}
														);
													}

												});
											}

										});
									}
								});
							}
						});
					}
				});
			}
		});
	}

	$(document).ready(function () {

		// validate signup form on keyup and submit
		$("#sign_in").validate({

			rules: {
				username: "required",
				password: {
					required: true,
					minlength: 6
				},
			},
			messages: {
				username: "Email/Phone is required",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 6 characters long"
				}
			},

		});

	});

	$(document).ready(function (e) {
		$("#sign_in").on('submit', (function (e) {
			e.preventDefault();
			var url_prefix = "<?php echo base_url(); ?>";
			var url = url_prefix + 'betscore/singIn';
			$.ajax({
				url: url,
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					document.getElementById('submit_btn').innerText = 'Please Wait...';
				},

				dataType: 'json',
				success: function (data) {
					if (data.st == 400) {
						swal(
							{
								title: data.error,
								type: "error",
								timer: 2000,
								showConfirmButton: true
							}
						);
						document.getElementById('submit_btn').innerText = 'LOG IN';
						return;
					}

					if (data.st == 404) {
						swal(
							{
								title: data.error,
								type: "error",
								timer: 2000,
								showConfirmButton: true
							}
						);
						document.getElementById('submit_btn').innerText = 'LOG IN';
						return;
					}

					if (data.st == 200) {
						document.getElementById('submit_btn').innerText = 'LOG IN';
						// $("#loging").fadeOut();
						swal(
							{
								title: data.success,
								type: "success",
								timer: 2000,
								showConfirmButton: true
							}
						);
						window.location = '<?= base_url("/");?>';
						return;
					}

				}
			});
		}));


	});


</script>

 

<script> 
    function isOnline() { 

        if (navigator.onLine) { 
             $(".page-loader-wrapper").fadeOut();
        } else { 
            $(".page-loader-wrapper").fadeIn();
        } 
    } 

    function youtube_link(link) {
        document.getElementById('liveTvSrc').scrollIntoView();
    	$('#showLiveTv').show();
		$('#upcomingBetTabGames').hide();
		$('#liveTvTab').hasClass("c-tabs__item--active") ? $('#liveTvTab').addClass("c-tabs__item--active") : $('#liveTvTab').addClass("c-tabs__item--active");
		$('#upcomeBetTab').hasClass("c-tabs__item--active") ? $('#upcomeBetTab').removeClass("c-tabs__item--active") : $('#upcomeBetTab').removeClass("c-tabs__item--active");
    	$("#liveTvSrc").html("");
    	$("#liveTvSrc").html("<div class='betslip-bid-area'>"+
				"<iframe width='100%' height='250' src='"+link+"?controls=0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\"'></iframe>"+
			"</div>");
    }

    setInterval(isOnline,5000);
 
    
    
</script> 

 