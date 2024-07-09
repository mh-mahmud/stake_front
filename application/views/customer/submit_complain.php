<?php include(APPPATH."views/customer/index_header.php"); ?>

<app-user-layout>
    <section class="admin-template-area club-user-admin">
        <div class="row">
            
            <?php require_once('left_sidebar.php'); ?>
            
            <div class="col-lg-10 admin-content">

                <app-help-desk>
                    <div class="tab-content custom-scrollbar-5">
                        <router-outlet></router-outlet>
                        <app-submit-complain>
                            <div class="tab-pane" id="nav-submit-complain" role="tabpanel">
                                <div class="admin-content-header-new">Submit Complain</div>
                                <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                  <?php include(APPPATH."views/flash_message.php"); ?>

                                    <div class="row admin-profile-update-form justify-content-center">
                                        <div class="col-lg-6">
                                            <form action="" method="POST">


                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-club">Complain To:</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-handshake"></i>
                                                                    </span>
                                                                    <select class="form-control" name="complain_to" required>
                                                                        <option value=""> Select User </option>
                                                                        <option value="CLUB">Club</option>
                                                                        <option value="ADMIN">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                          <label for="adf-complain-subject">Subject*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <div class="form-group-input-wrapper">
                                                              <span class="input-group-icon"><i class="fas fa-pen"></i></span>
                                                              <input class="form-control" name="subject" placeholder="Enter your complain subject" required="" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                          <label for="adf-complain-description">Complain
                                                                description*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <div class="form-group-input-wrapper align-items-start">
                                                                <textarea class="form-control" name="description" placeholder="Complain description" required="" type="text"></textarea>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </app-submit-complain>
                    </div>
                </app-help-desk>
            </div>
        </div>
    </section>
</app-user-layout>

<?php require_once('footer.php'); ?>
