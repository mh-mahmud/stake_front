<?php include(APPPATH."views/customer/index_header.php"); ?>

<app-user-layout _nghost-yvb-c12="">
    <section class="admin-template-area club-user-admin">
        <div class="row">

            <?php include(APPPATH."views/customer/left_sidebar.php"); ?>

            <div class="col-lg-10 admin-content">
                <app-user-wallet>
                    <div class="tab-content custom-scrollbar-5">

                        <app-coin-transfer>
                            <div class="tab-pane" id="nav-coin-transfer" role="tabpanel">
                                <div class="admin-content-header-new">Coin Transfer</div>
                                <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                    <?php include(APPPATH."views/flash_message.php"); ?>

                                    <div
                                         class="row admin-profile-update-form justify-content-center">
                                        <div class="col-lg-6">
                                            <form method="POST" action="">
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="adf-transfer-username">Username*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <div class="form-group-input-wrapper">
                                                                <span class="input-group-icon">
                                                                    <i class="fas fa-user"></i></span>
                                                                <input class="form-control" name="username" placeholder="Username" required type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="adf-transfer-coin">Numbers
                                                                of Coin*</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <div class="form-group-input-wrapper">
                                                                <span class="input-group-icon">
                                                                    <i class="fas fa-coins"></i></span>
                                                                    <input class="form-control ng-untouched ng-pristine ng-invalid" min="0" name="number_of_coin" placeholder="Numbers of Coin" required type="number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="adf-current-password-for-transfer">Current Password*</label>
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
                                                        <input class="admin-profile-update-form-submit" name="submit" type="submit" value="Transfer">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </app-coin-transfer>
                    </div>
                </app-user-wallet>
            </div>
        </div>
    </section>

</app-user-layout>

<?php include(APPPATH."views/customer/footer.php"); ?>
