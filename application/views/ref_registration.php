<!DOCTYPE html>
<html>
<head>
	<title>Betscore24</title>
	<style type="text/css">
		
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			box-sizing: border-box;
		}

		body {
			background: #f6f5f7;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		h1 {
			font-weight: bold;
			margin: 0;
		}

		h2 {
			text-align: center;
		}

		p {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		button {
			border-radius: 20px;
			border: 1px solid #FF4B2B;
			background-color: #FF4B2B;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		form {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
		  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
					0 10px 10px rgba(0,0,0,0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {
			0%, 49.99% {
				opacity: 0;
				z-index: 1;
			}
			
			50%, 100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container{
			transform: translateX(-100%);
		}

		.overlay {
			background: #FF416C;
			background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
			background: linear-gradient(to right, #FF4B2B, #FF416C);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
		  	transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
		  	transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
			transform: translateX(20%);
		}

		.social-container {
			margin: 20px 0;
		}

		.social-container a {
			border: 1px solid #DDDDDD;
			border-radius: 50%;
			display: inline-flex;
			justify-content: center;
			align-items: center;
			margin: 0 5px;
			height: 40px;
			width: 40px;
		}

		footer {
		    background-color: #222;
		    color: #fff;
		    font-size: 14px;
		    bottom: 0;
		    position: fixed;
		    left: 0;
		    right: 0;
		    text-align: center;
		    z-index: 999;
		}

		footer p {
		    margin: 10px 0;
		}

		footer i {
		    color: red;
		}

		footer a {
		    color: #3c97bf;
		    text-decoration: none;
		}
	</style>
	<link href="<?php echo base_url(); ?>assets/react_css_js/sweetalert.css?ver=<?php echo md5(rand(111,999))?>" rel="stylesheet">
</head>
	<body>
		<h2>::Betscore24:: <?php echo $d; ?></h2>
		<div class="container" id="container">

			<div class="form-container sign-up-container">
				<form action="" method="post" id="registered">
					<h1>Create Account</h1>
					<input type="hidden" id="verified_op" name="verified_by" value="phone">
					<select name="country" id="country">
						<option class="option" value="">Select your country</option>
						<!--<?php
						$jsonUrl = base_url() . 'assets/json/CountryCodes.json';
						$countyJson = file_get_contents($jsonUrl);
						$cuntryArray = json_decode($countyJson, true);

						foreach ($cuntryArray as $countryVal) {

							?>
							<option
								class="option" <?= $countryVal['dial_code'] == "+880" ? "selected" : "" ?>
								value="<?= $countryVal['name'] ?> <?= $countryVal['dial_code'] ?>"><?= $countryVal['name'] ?> <?= $countryVal['dial_code'] ?> </option>
						<?php } ?> -->
						<option value="Maylaysia +60">Maylaysia +60</option>
						<option value="Singapore +65">Singapore +65</option>
						<option value="India +91">India +91</option>
						<option value="Bangladesh +880">Bangladesh +880</option>
					</select>
					<input type="tel" id="phone" placeholder="Mobile Number" name="phone">
					<input type="text" id="full_name" placeholder="Username" name="username_f">
					<input type="password" id="regpassword" placeholder="Give any password" name="password_f">
					<input type="password" id="cpassword" placeholder="Confirm password" name="cpassword_f">
					<input type="text" id="sponsorname" placeholder="Your sponsor name(Required)" required="true" name="sponsorname_f">
					<select name="club_id_f" id="club_id">
						<option value="">Select A Club *</option>
						<?php
						$club_data = $this->db->query("SELECT id, club_name FROM club_users WHERE status=1 ORDER BY serial ASC")->result();
						foreach ($club_data as $cval):
							?>
							<option class="option" value="<?= $cval->id; ?>"><?= $cval->club_name; ?></option>
						<?php endforeach; ?>
					</select>

					<button>Sign Up</button>
				</form>
			</div>


			<div class="form-container sign-in-container">
				<form action="" method="post" id="sign_in">
					<h1>Sign in</h1>
					<input type="text" name="username" id="username" placeholder="Username" />
					<input type="password" name="password" id="password" placeholder="Password" />
					<a href="#">Forgot your password?</a>
					<button type="submit" id="submit_btn">Sign In</button>
				</form>

			</div>


			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Welcome Back!</h1>
						<p>To keep connected with us please login with your personal info</p>
						<button class="ghost" id="signIn">Sign In</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Restricted</h1>
						<p>You may be accessing the website from a country from where we do not accept bets from or because the traffic from your network was detected as being unusual. If you believe that this detection has occurred in error, please Contact Us for further assistance - Ray ID is required if you do so. 

						<input class="ghost" id="signUp" type="submit">
					</div>
				</div>
			</div>

		</div>
	 
		<footer>
			<p>
				PPB Counterparty Services Limited, having its registered address at Triq il-Kappillan Mifsud, St. Venera, SVR 1851, MALTA, is licensed and regulated by the Malta Gaming Authority under Licence Number MGA/CRP/131/2006 (issued on 01 August 2018). PPB Counterparty Services Limited, Betfair Casino Limited, TSE Malta LP and PPB Entertainment Limited are licensed and regulated in Great Britain by the Gambling Commission under account numbers 39439, 39435, 39561 and 39426.
			</p>
		</footer>
	</body>
</html>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js?ver=<?php echo md5(rand(111,999))?>"></script>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
 
	$(document).ready(function (e) {
		$("#sign_in").on('submit', (function (e) {
			e.preventDefault();
			var url_prefix = "<?php echo base_url(); ?>";
			var url = url_prefix + 'signin';
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
						document.getElementById('submit_btn').innerText = 'Sign In';
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
						document.getElementById('submit_btn').innerText = 'Sign In';
						return;
					}

					if (data.st == 200) {
						document.getElementById('submit_btn').innerText = 'Sign In';
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