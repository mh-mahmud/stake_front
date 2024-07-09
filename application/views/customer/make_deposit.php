<?php include(APPPATH . "views/customer/index_header.php"); ?>

<app-user-layout _nghost-yvb-c12="">
	<section class="admin-template-area club-user-admin">
		<div class="row">
			<?php include(APPPATH . "views/customer/left_sidebar.php"); ?>

			<div class="col-lg-10 admin-content">
				<router-outlet></router-outlet>
				<app-user-wallet>
					<div class="tab-content custom-scrollbar-5">
						<router-outlet></router-outlet>
						<app-make-deposit>
							<div class="tab-pane" id="nav-make-diposit" role="tabpanel">
								<div class="admin-content-header-new">Make Deposit</div>
								<div class="admin-content-scroll-wrapper custom-scrollbar-5">
									<?php include(APPPATH . "views/flash_message.php"); ?>

									<div
										class="row admin-profile-update-form justify-content-center">
										<div class="col-lg-6">

											<?php if ($deposit_status == "Yes"): ?>

												<form id="depositForm" action="<?php base_url('customeruser/make_deposit') ?>" method="POST">

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-deposit-payment-method">Payment
																	Method*</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
																	<span class="input-group-icon"><i
																			class="fas fa-credit-card"></i></span>

																	<select class="form-control" id="option_method"
																			onchange="return get_payment_number();"
																			required>
																		<option value=""> Select option</option>
																		<?php foreach ($acc_data as $aval) : ?>
																			<option
																				value="<?php echo $aval->account_no; ?>|<?php echo $aval->account_name; ?>"><?php echo $aval->account_name; ?></option>
																		<?php endforeach; ?>
																	</select>

																</div>
															</div>
														</div>
													</div>

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-deposit-payment-method">Admin
																	Acc*</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
																	<span class="input-group-icon"><i
																			class="fas fa-mobile"></i></span>

																	<input type="text" class="form-control" value=""
																		   name="admin_account" id="admin_account"
																		   readonly="true"
																		   placeholder="Select Payment Method">
																	<input type="hidden" class="form-control" value=""
																		   name="payment_method" id="payment_method"
																		   readonly="true"
																		   placeholder="Select Payment Method">

																</div>
															</div>
														</div>
													</div>

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-deposit-coin">Numbers of Coin*</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-coins"></i></span>
																	<input class="form-control" min="0" name="amount"
																		   placeholder="Numbers of Coin" required
																		   type="number">
																</div>
															</div>
														</div>
													</div>

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-deposit-coin">Transaction Id</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-exchange-alt"></i></span>
																	<input class="form-control" name="transaction_id"
																		   placeholder="Transaction No" type="text">
																</div>
															</div>
														</div>
													</div>

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-current-password">Send From*</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-phone"></i></span>
																	<input class="form-control" name="user_phone"
																		   placeholder="Enter Phone Number" required
																		   type="text">
																</div>
															</div>
														</div>
													</div>

													<div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-current-password">&nbsp;</label>
															</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
																	<p style="background-color:#ff4444;color:#fff;padding:10px;width:100%">
																		Current Deposit Bonus: <?php echo $settings; ?>
																		% </p>
																</div>
															</div>
														</div>
													</div>

													<!-- <div class="row form-row">
														<div class="col-lg-4">
															<div class="form-group">
																<label for="adf-current-password">Current
																	Password*</label>
																</div>
														</div>
														<div class="col-lg-8">
															<div class="form-group">
																<div class="form-group-input-wrapper">
																	<span class="input-group-icon">
																		<i class="fas fa-key"></i></span>
																	<input class="form-control" name="password" placeholder="Current Password" required type="password">
																</div>
															</div>
														</div>
													</div> -->

													<div class="row form-row">
														<div class="col-lg-8 offset-4">
															<input class="admin-profile-update-form-submit"
																   name="submit" type="submit" value="Submit">
														</div>
													</div>
												</form>

											<?php else: ?>

												<b>Deposit Option currently off</b>

											<?php endif; ?>

										</div>
									</div>
								</div>
							</div>
						</app-make-deposit>
					</div>
				</app-user-wallet>
			</div>
		</div>
	</section>

</app-user-layout>

<?php include(APPPATH . "views/customer/footer.php"); ?>


<script>

	function get_payment_number() {
		var x = document.getElementById("option_method").value;
		var strArray = x.split("|");

		$("#admin_account").val(strArray[0]);
		$("#payment_method").val(strArray[1]);
		console.log(strArray[0]);
	}
	
	$("#depositForm").on("submit", function() {
	    $(".admin-profile-update-form-submit").hide();
	    $(this).submit();
	});

</script>
