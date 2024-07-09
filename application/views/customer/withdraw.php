<?php include(APPPATH."views/customer/index_header.php"); ?>

    <app-user-layout _nghost-yvb-c12="">
        <section class="admin-template-area club-user-admin">
            <div class="row">
                <?php include(APPPATH."views/customer/left_sidebar.php"); ?>
                
                <div class="col-lg-10 admin-content">
                    <router-outlet></router-outlet>
                    <app-user-wallet>
                        <div class="tab-content custom-scrollbar-5">
                            <router-outlet></router-outlet>
                            <app-make-deposit>
                                <div class="tab-pane" id="nav-make-diposit" role="tabpanel">
                                    <div class="admin-content-header-new">Customer Withdraw</div>
                                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                        <?php include(APPPATH."views/flash_message.php"); ?>

                                        <div
                                             class="row admin-profile-update-form justify-content-center">
                                            <div class="col-lg-6">

												<?php if ($withdraw_status == "Yes"): ?>

                                                <form action="" method="POST">

                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-deposit-payment-method">Payment Method*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon"><i class="fas fa-money-bill-alt"></i></span>

                                                                    <select class="form-control" name="payment_method" required>
                                                                        <option value=""> Select Payment </option>
																		<?php foreach ($acc_data as $aval) : ?>
																			<option
																				value="<?php echo $aval->account_name; ?>"><?php echo $aval->account_name; ?></option>
																		<?php endforeach; ?>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-deposit-payment-method">Account No*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-coins"></i></span>
                                                                    <input class="form-control" min="0" name="account_no" placeholder="Account No" required type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-deposit-payment-method">Withdraw Amount*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-coins"></i></span>
                                                                    <input class="form-control" min="0" name="withdraw_amount" placeholder="Amount" required type="number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-deposit-payment-method">Account Type*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon"><i class="fas fa-money-bill-alt"></i></span>

                                                                    <select class="form-control" name="account_type" required>
                                                                        <option value=""> Select Type </option>
                                                                        <option value="agent">Agent</option>
                                                                        <option value="personal">Personal</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-row">
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
                                                    </div>

                                                    <div class="row form-row">
                                                        <div class="col-lg-8 offset-4">
                                                            <input class="admin-profile-update-form-submit" name="submit" type="submit" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
												<?php else: ?>

													<b>Withdraw Option currently off</b>

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

<?php include(APPPATH."views/customer/footer.php"); ?>
