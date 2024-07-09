<div class="tab-content" id="live-in-play-tab-content">

	<div class="tab-pane-1" id="homeSports-tab" role="tabpanel">

		<div class="registration-fullpage-tab-box">
			<ul class="nav nav-tabs">
				<li class="nav-item"></li>
				<li class="nav-item">
					<a class="nav-link active" href="javascript:void(0);" >Sign In</a></li>
				<li class="nav-item"></li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane fade show active" id="f-sign-in" role="tabpanel">
					<div class="login-form">
						<form id="sign_in" class="ng-pristine">
							<div class="row form-inputs-wrapper">
								<div class="col-lg-12">
									<div class="form-group-input-wrapper">
										<input class="form-control ng-pristine" id="username"
											   name="username" placeholder="Email/Phone"
											   type="text">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group-input-wrapper">
										<div class="form-group-input-password-wrapper">
											<input class="form-control" id="password"
												   name="password" placeholder="Password"
												   required="" type="password" value="">
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="rs-other-info">
<!--                                        <span class="left-side">-->
<!--                                          <input class="form-check-input" id="fsid_remember-check" name="fsid_remember-check" type="checkbox">-->
<!--                                            <label class="form-check-label" for="fsid_remember-check" id="fsid_remember-check-label" style="color: #FFFFFF"> &nbsp;Remember</label>-->
<!--                                        </span>-->
										<span class="right-side">
                                            <span class="rs-link rs-forget-password-link"><a style="color: #FFFFFF"
													href="javascript:void(0);" onclick="return forgotPassword();">Forgot Password</a></span>
                                        </span>
									</div>
									<div class="rs-submit">
										<input name="submit" type="submit" id="submit_btn" value="Log in">
									</div>
								</div>
							</div>
						</form>
						<div class="dropdown-divider"></div>
						<div class="rs-other-info py-3">
							<span class="text-center cursor-default" style="color: #FFFFFF"> New around here?
								<span class="rs-link rs-reg-link"><a  style="color: #FFFFFF" href="javascript:void(0);" onclick="return registrationForm();">Join Now</a></span>
							</span>
						</div>
					</div>
				</div>
				<div class="dropdown-divider"></div>
			</div
		</div>
	</div>

</div>


<script type="text/javascript">

	$().ready(function () {

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
		$("#sign_in").on('submit',(function(e) {
			e.preventDefault();
			var url_prefix = "<?php echo base_url(); ?>";
			var url = url_prefix+'betscore/singIn';
			$.ajax({
				url: url,
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function()
				{
					document.getElementById('submit_btn').innerText = 'Please Wait...';
				},

				dataType: 'json',
				success: function(data)
				{
					if (data.st==400) {
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

					if (data.st==404) {
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

					if (data.st==200) {
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
