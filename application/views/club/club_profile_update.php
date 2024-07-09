<?php include(APPPATH . "views/customer/index_header.php"); ?>

    <app-user-layout _nghost-yvb-c12="">
        <section _ngcontent-yvb-c12="" class="admin-template-area club-user-admin">
            <div _ngcontent-yvb-c12="" class="row">
                
                <?php include(APPPATH."views/club/left_sidebar.php"); ?>
                
                <div _ngcontent-yvb-c12="" class="col-lg-10 admin-content">
                    <router-outlet _ngcontent-yvb-c12=""></router-outlet>
                    <app-user-profile _nghost-yvb-c14="">
                        <div _ngcontent-yvb-c14="" class="tab-content">
                            <router-outlet _ngcontent-yvb-c14=""></router-outlet>
                            <app-edit-profile _nghost-yvb-c15="">
                                <div _ngcontent-yvb-c15="" class="tab-pane" id="nav-edit-profile" role="tabpanel">
                                    <div _ngcontent-yvb-c15="" class="admin-content-header-new">Update Profile</div>
                                    <div _ngcontent-yvb-c15="" class="admin-content-scroll-wrapper custom-scrollbar-5">
                                        <ng-http-loader _ngcontent-yvb-c15="" _nghost-yvb-c16="">
                                            <!----></ng-http-loader>
                                        <div _ngcontent-yvb-c15=""
                                             class="row admin-profile-update-form justify-content-center">
                                            <div _ngcontent-yvb-c15="" class="col-lg-6">
                                                <form _ngcontent-yvb-c15="" novalidate=""
                                                      class="ng-untouched ng-dirty ng-valid">
                                                    <div _ngcontent-yvb-c15="" class="row form-row">
                                                        <div _ngcontent-yvb-c15="" class="col-lg-4">
                                                            <div _ngcontent-yvb-c15="" class="form-group"><label
                                                                        _ngcontent-yvb-c15=""
                                                                        for="adf-email">Email*</label></div>
                                                        </div>
                                                        <div _ngcontent-yvb-c15="" class="col-lg-8">
                                                            <div _ngcontent-yvb-c15="" class="form-group">
                                                                <div _ngcontent-yvb-c15=""
                                                                     class="form-group-input-wrapper"><span
                                                                            _ngcontent-yvb-c15=""
                                                                            class="input-group-icon"><i
                                                                                _ngcontent-yvb-c15=""
                                                                                class="fas fa-envelope"></i></span><input
                                                                            _ngcontent-yvb-c15=""
                                                                            class="form-control ng-untouched ng-pristine ng-valid"
                                                                            id="adf-email" name="email"
                                                                            placeholder="Enter Your Email" required=""
                                                                            type="email"><span _ngcontent-yvb-c15=""
                                                                                               class="input-validation d-none">Email required</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-yvb-c15="" class="row form-row">
                                                        <div _ngcontent-yvb-c15="" class="col-lg-4">
                                                            <div _ngcontent-yvb-c15="" class="form-group"><label
                                                                        _ngcontent-yvb-c15=""
                                                                        for="adf-country">Country*</label></div>
                                                        </div>
                                                        <div _ngcontent-yvb-c15="" class="col-lg-8">
                                                            <div _ngcontent-yvb-c15="" class="form-group">
                                                                <div _ngcontent-yvb-c15=""
                                                                     class="form-group-input-wrapper"><span
                                                                            _ngcontent-yvb-c15=""
                                                                            class="input-group-icon"><i
                                                                                _ngcontent-yvb-c15=""
                                                                                class="fas fa-map-marker-alt"></i></span>
                                                                    <ngx-select _ngcontent-yvb-c15="" name="country"
                                                                                placeholder="No Country Selected"
                                                                                _nghost-yvb-c9=""
                                                                                class="ng-untouched ng-valid ng-dirty">
                                                                        <div _ngcontent-yvb-c9=""
                                                                             class="ngx-select dropdown" tabindex="0">
                                                                            <div _ngcontent-yvb-c9=""></div><!---->
                                                                            <div _ngcontent-yvb-c9=""
                                                                                 class="ngx-select__selected">
                                                                                <div _ngcontent-yvb-c9=""
                                                                                     class="ngx-select__toggle btn form-control">
                                                                                    <!----><!----><span
                                                                                            _ngcontent-yvb-c9=""
                                                                                            class="ngx-select__selected-single pull-left float-left"><!----><span
                                                                                                _ngcontent-yvb-c9="">Bangladesh(88)</span></span><span
                                                                                            _ngcontent-yvb-c9=""
                                                                                            class="ngx-select__toggle-buttons"><!----><i
                                                                                                _ngcontent-yvb-c9=""
                                                                                                class="dropdown-toggle"></i><i
                                                                                                _ngcontent-yvb-c9=""
                                                                                                class="ngx-select__toggle-caret caret"></i></span>
                                                                                </div>
                                                                            </div><!----><!----><!----><!----><!---->
                                                                        </div>
                                                                    </ngx-select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-yvb-c15="" class="row form-row">
                                                        <div _ngcontent-yvb-c15="" class="col-lg-4">
                                                            <div _ngcontent-yvb-c15="" class="form-group"><label
                                                                        _ngcontent-yvb-c15="" for="adf-mobile">Phone
                                                                    Number*</label></div>
                                                        </div>
                                                        <div _ngcontent-yvb-c15="" class="col-lg-8">
                                                            <div _ngcontent-yvb-c15="" class="form-group">
                                                                <div _ngcontent-yvb-c15=""
                                                                     class="form-group-input-wrapper"><span
                                                                            _ngcontent-yvb-c15=""
                                                                            class="input-group-icon"><i
                                                                                _ngcontent-yvb-c15=""
                                                                                class="fas fa-phone-volume"></i></span><input
                                                                            _ngcontent-yvb-c15=""
                                                                            class="form-control ng-untouched ng-pristine ng-valid"
                                                                            id="adf-mobile" name="phone"
                                                                            placeholder="Enter Your Phone" required=""
                                                                            type="text"><span _ngcontent-yvb-c15=""
                                                                                              class="input-validation d-none">Phone required</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-yvb-c15="" class="row form-row">
                                                        <div _ngcontent-yvb-c15="" class="col-lg-8 offset-4"><input
                                                                    _ngcontent-yvb-c15=""
                                                                    class="admin-profile-update-form-submit"
                                                                    name="admin-edit-profile" type="submit"
                                                                    value="Save Profile" disabled=""></div>
                                                    </div>
                                                </form>
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
        <div _ngcontent-yvb-c12="" class="admin-avater-list-area"><span _ngcontent-yvb-c12=""
                                                                        class="admin-avater-list-area-arrow"></span><span
                    _ngcontent-yvb-c12="" class="admin-avater-list-area-close"><i _ngcontent-yvb-c12=""
                                                                                  class="zmdi zmdi-close"></i></span>
            <div _ngcontent-yvb-c12="" class="admin-avater-upload-area">
                <div _ngcontent-yvb-c12="" class="admin-avater-upload-droppable-area">
                    <div _ngcontent-yvb-c12="" class="admin-avater-upload-instruction"><span _ngcontent-yvb-c12="">Drop your image here</span><span
                                _ngcontent-yvb-c12="">or</span><span _ngcontent-yvb-c12="" class="up-btn">Upload Your Image</span><span
                                _ngcontent-yvb-c12="" class="size">upload max size 500kb</span></div>
                    <input _ngcontent-yvb-c12="" class="admin-avater-upload-input" type="file"></div>
            </div>
            <div _ngcontent-yvb-c12="" class="admin-avater-list"><!---->
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item active"><img _ngcontent-yvb-c12="" alt=""
                                                                                        src="assets/img/avater/AF.png">
                </div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/AF2.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/AF4.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/B1.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/B3.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/F1.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/F2.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/F3.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/T2.png"></div>
                <div _ngcontent-yvb-c12="" class="admin-single-avater-item"><img _ngcontent-yvb-c12="" alt=""
                                                                                 src="assets/img/avater/T1.png"></div>
            </div>
        </div>
        <div _ngcontent-yvb-c12="" class="admin-menu-list-area profile"><span _ngcontent-yvb-c12=""
                                                                              class="admin-menu-list-area-arrow"></span>
            <div _ngcontent-yvb-c12="" class="admin-menu-list-wrapper">
                <div _ngcontent-yvb-c12="" class="admin-profile-sidebar-option-body">
                    <div _ngcontent-yvb-c12="" class="nav"><a _ngcontent-yvb-c12="" class="nav-item"
                                                              routerlink="/profile/view-profile"
                                                              routerlinkactive="active" href="/profile/view-profile">View
                            Profile</a><a _ngcontent-yvb-c12="" class="nav-item active"
                                          routerlink="/profile/update-profile" routerlinkactive="active"
                                          href="/profile/update-profile">Edit Profile</a><a _ngcontent-yvb-c12=""
                                                                                            class="nav-item"
                                                                                            routerlink="/profile/update-club"
                                                                                            routerlinkactive="active"
                                                                                            href="/profile/update-club">Change
                            Club</a><a _ngcontent-yvb-c12="" class="nav-item" routerlink="/profile/my-followers"
                                       routerlinkactive="active" href="/profile/my-followers">My Followers</a><a
                                _ngcontent-yvb-c12="" class="nav-item" routerlink="/profile/bet-history"
                                routerlinkactive="active" href="/profile/bet-history">Bet History</a><a
                                _ngcontent-yvb-c12="" class="nav-item" routerlink="/profile/update-password"
                                routerlinkactive="active" href="/profile/update-password">Change Password</a></div>
                </div>
            </div>
        </div>
        <div _ngcontent-yvb-c12="" class="admin-menu-list-area wallet"><span _ngcontent-yvb-c12=""
                                                                             class="admin-menu-list-area-arrow"></span>
            <div _ngcontent-yvb-c12="" class="admin-menu-list-wrapper">
                <div _ngcontent-yvb-c12="" class="admin-profile-sidebar-option-body">
                    <div _ngcontent-yvb-c12="" class="nav"><a _ngcontent-yvb-c12="" class="nav-item"
                                                              routerlink="/wallet/make-deposit"
                                                              routerlinkactive="active" href="/wallet/make-deposit">Make
                            Diposit</a><a _ngcontent-yvb-c12="" class="nav-item" routerlink="/wallet/deposit-history"
                                          routerlinkactive="active" href="/wallet/deposit-history">Diposit History</a><a
                                _ngcontent-yvb-c12="" class="nav-item" routerlink="/wallet/coin-transfer"
                                routerlinkactive="active" href="/wallet/coin-transfer">Coin Transfer</a><a
                                _ngcontent-yvb-c12="" class="nav-item" routerlink="/wallet/withdraw"
                                routerlinkactive="active" href="/wallet/withdraw">Withdraw</a><a _ngcontent-yvb-c12=""
                                                                                                 class="nav-item"
                                                                                                 routerlink="/wallet/withdraw-history"
                                                                                                 routerlinkactive="active"
                                                                                                 href="/wallet/withdraw-history">Withdraw
                            History</a><a _ngcontent-yvb-c12="" class="nav-item" routerlink="/wallet/statement"
                                          routerlinkactive="active" href="/wallet/statement">Statement</a></div>
                </div>
            </div>
        </div>
        <div _ngcontent-yvb-c12="" class="admin-menu-list-area help"><span _ngcontent-yvb-c12=""
                                                                           class="admin-menu-list-area-arrow"></span>
            <div _ngcontent-yvb-c12="" class="admin-menu-list-wrapper">
                <div _ngcontent-yvb-c12="" class="admin-profile-sidebar-option-body">
                    <div _ngcontent-yvb-c12="" class="nav"><a _ngcontent-yvb-c12="" class="nav-item"
                                                              routerlink="/support/submit-complain"
                                                              routerlinkactive="active" href="/support/submit-complain">Submit
                            Complain</a><a _ngcontent-yvb-c12="" class="nav-item" routerlink="/support/complain-history"
                                           routerlinkactive="active" href="/support/complain-history">Complain
                            History</a></div>
                </div>
            </div>
        </div>
    </app-user-layout>

<?php include(APPPATH . "views/customer/footer.php"); ?>
