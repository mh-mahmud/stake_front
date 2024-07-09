<?php include(APPPATH."views/customer/index_header.php"); ?>

    <app-user-layout _nghost-yvb-c12="">
        <section class="admin-template-area club-user-admin">
            <div class="row">
                
                <?php require_once('left_sidebar.php'); ?>
                
                <div class="col-lg-10 admin-content">
                    <router-outlet></router-outlet>
                    <app-user-profile>
                        <div class="tab-content">
                            <router-outlet></router-outlet>
                            <app-change-club>
                                <div class="tab-pane" id="nav-change-club" role="tabpanel">
                                    <div class="admin-content-header-new">Update Club</div>
                                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                        <?php include(APPPATH."views/flash_message.php"); ?>

                                        <div class="row admin-profile-update-form justify-content-center">
                                            <div class="col-lg-6">
                                                <form method="POST" action="">
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-club">Club</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-handshake"></i>
                                                                    </span>
                                                                    <select class="form-control" name="club_id" required>
                                                                        <option value=""> Select Club </option>
                                                                        <?php foreach($club_names as $val) : ?>
                                                                            <option <?php echo ($club_id==$val->id) ? "selected" : ""; ?> value="<?php echo $val->id; ?>"><?php echo $val->club_name; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-current-password-for-club">Current Password*</label>
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
                                                            <input class="admin-profile-update-form-submit" name="submit" type="submit" value="Update Club"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </app-change-club>
                        </div>
                    </app-user-profile>
                </div>
            </div>
        </section>
    </app-user-layout>

<?php require_once('footer.php'); ?>
