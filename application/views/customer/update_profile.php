<?php include(APPPATH."views/customer/index_header.php"); ?>

    <app-user-layout _nghost-yvb-c12="">
        <section class="admin-template-area club-user-admin">
            <div class="row">
                
                <?php include(APPPATH."views/customer/left_sidebar.php"); ?>

                <div class="col-lg-10 admin-content">
                    <router-outlet></router-outlet>
                    <app-user-profile>
                        <div class="tab-content">


                            <app-edit-profile>
                                <div class="tab-pane" id="nav-edit-profile" role="tabpanel">
                                    <div class="admin-content-header-new">Update Profile</div>
                                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">

                                        <?php include(APPPATH."views/flash_message.php"); ?>

                                        <ng-http-loader></ng-http-loader>
                                        <div class="row admin-profile-update-form justify-content-center">
                                            <div class="col-lg-6">
                                                <!--<form id="updateProfile" method="POST" action="">-->
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-email">Username</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-user"></i>
                                                                    </span>
                                                                    <input class="form-control" type="text" value="<?php echo $username; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-email">Phone *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-phone"></i>
                                                                    </span>
                                                                    <input class="form-control" name="phone" placeholder="Enter username" type="text" value="<?php echo $phone; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

													<div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-email">Email *</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>
                                                                    <input class="form-control" name="email" placeholder="Enter email" type="text" value="<?php echo $email; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-email">Email*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>

                                                                    <input class="form-control" id="adf-email" name="email" placeholder="Enter Your Email" type="email" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-country">Country*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon"><i class="fas fa-map-marker-alt"></i></span>
																	<select name="country" id="country" class="form-control">
																		<option class="option" value="">Select your country</option>
																		<?php
																		$jsonUrl = base_url() . 'assets/json/CountryCodes.json';
																		$countyJson = file_get_contents($jsonUrl);
																		$cuntryArray = json_decode($countyJson, true);

																		foreach ($cuntryArray as $countryVal) {

																			?>
																			<option value="<?= $countryVal['name'] ?><?= $countryVal['dial_code'] ?>" <?php echo $country == $countryVal['name'].$countryVal['dial_code']?"selected":"" ?>><?= $countryVal['name'] ?> <?= $countryVal['dial_code'] ?> </option>
																		<?php } ?>
																	</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row form-row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="adf-mobile">Phone Number*</label>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <div class="form-group-input-wrapper">
                                                                    <span class="input-group-icon">
                                                                        <i class="fas fa-phone-volume"></i>
                                                                    </span>

                                                                    <input class="form-control" name="phone" placeholder="Enter Your Phone" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    
                                                    <!--<div class="row form-row">
                                                        <div class="col-lg-8 offset-4">
                                                            <input class="admin-profile-update-form-submit"     name="submit" type="submit" value="Save Profile">
                                                        </div>
                                                    </div>-->
                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </app-edit-profile>
                        </div>
                    </app-user-profile>
                </div>
            </div>
        </section>
    </app-user-layout>

<?php include(APPPATH."views/customer/footer.php"); ?>
