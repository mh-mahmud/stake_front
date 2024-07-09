<?php include(APPPATH."views/customer/index_header.php"); ?>

    <app-user-layout>
        <section class="admin-template-area club-user-admin">
            <div class="row">
                
                <?php require_once('left_sidebar.php'); ?>
                
                <div class="col-lg-10 admin-content">
                    <router-outlet></router-outlet>
                    <app-user-profile>
                        <div class="tab-content">
                            <router-outlet></router-outlet>
                            <app-change-password>
                                <div class="tab-pane" id="nav-change-password" role="tabpanel">
                                    <div class="admin-content-header-new">Update Password</div>
                                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                        <?php include(APPPATH."views/flash_message.php"); ?>

                                        <div class="row admin-profile-update-form justify-content-center">
                                            <div class="col-lg-6">
                                                <form action="" method="POST">
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
                                                                    <input class="form-control" name="current_password" placeholder="Current Password" required type="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-new-password">New
                                                                    Password*</label>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-key"></i></span>
                                                                    <input class="form-control" name="password"placeholder="New Password" required type="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-confirm-new-password">Confirm New Password*</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-key"></i></span>
                                                                        <input class="form-control" name="confirm_password" placeholder="Confirm New Password" required type="password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-lg-8 offset-4">
                                                            <input class="admin-profile-update-form-submit" name="submit" type="submit" value="Change Password">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </app-change-password>
                        </div>
                    </app-user-profile>
                </div>
            </div>
        </section>

    </app-user-layout>

<?php require_once('footer.php'); ?>
