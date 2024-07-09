<!DOCTYPE html>
<html>
<head>
	<title>BetScore24 Emergency Access</title>
	<link rel="shortcut icon" type="ico" href="<?php echo base_url("assets/img/")?>favicon.ico.ico"/>
	<style>
		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;
		}
		html{
			height: 100%;
		}
		body{
			font-family: 'Segoe UI', sans-serif;;
			font-size: 1rem;
			line-height: 1.6;
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			background-image: url('<?= base_url("assets/img/cl.jpg")?>');
		}
		.wrap {
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;

			background: linear-gradient(to top, #082234de 0%, rgba(0, 0, 0, 0) 100%), linear-gradient(to bottom, #25405b 0%, rgba(0, 0, 0, 0) 30%);
		}
		.login-form{
			width: 350px;
			margin: 0 auto;
			/*border: 1px solid #ddd;*/
			/*padding: 2rem;*/
			background: #ffffff;
		}
		.form-input{
			background: #fafafa;
			border: 1px solid #eeeeee;
			padding: 12px;
			width: 100%;
		}
		.form-group{
			margin-bottom: 1rem;
			padding: 5px;
			margin-right: 5px;
			margin-left: 5px;
		}
		.form-button{
			background: #633a8a;
			border: 1px solid #ddd;
			color: #ffffff;
			padding: 10px;
			width: 100%;
			text-transform: uppercase;
		}
		.form-button:hover{
			background: #75178a;
			cursor: pointer;
		}
		.form-header{
			text-align: center;
			margin-bottom : 2rem;
			width: 100%;
			color: white;
			background: #082234;
		}
		.form-footer{
			text-align: center;
		}

	</style>
</head>
<body>

<div class="wrap">

	<form id="loginForm" class="login-form" action="" method="POST">

		<div class="form-header">
			<img src="<?= base_url("assets/img/logo.png")?>" width="80" alt="">
			<h3>Login To Bet score Emergency Access</h3>
			<p>Login to access user dashboard</p>
		</div>
		<!--Email Input-->
		<div class="form-group">
			<input type="text" name="username" id="username" class="form-input">
		</div>
		<!--Password Input-->
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-input">
		</div>
		<!--Login Button-->
		<div class="form-group">
			<input name="submit" class="form-button" type="submit" value="Log in">
		</div>
		<div class="form-footer">
			<?php if($this->session->flashdata('msg')) { ?>
				<div style="color: #00CC00; padding: 15px;">
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			<?php } ?>
			<?php if($this->session->flashdata('error')){ ?>
				<div style="color: #ff0c0c; padding: 15px;">
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php } ?>
		</div>
	</form>
</div><!--/.wrap-->
</body>
</html>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script>

    $().ready(function() {

        // validate signup form on keyup and submit
        $("#loginForm").validate({

            rules: {
                username: "required",
                password: {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                username: "Email is required",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                }
            },

        });

    });

</script>
