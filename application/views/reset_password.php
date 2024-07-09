<?php include(APPPATH."views/customer/index_header.php"); ?>

<app-registration-fullpage class="ng-star-inserted">
    <div class="game-other-info-registration-area registration-fullpage-area mt-100"
         style="background-image: url('/bets/assets/img/register-full-bg.jpg')">
        <div class="registration-fullpage-tab-box">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a aria-controls="f-sign-in" class="nav-link" data-toggle="tab" href="#f-sign-in" role="tab" aria-selected="false">Reset Password</a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane fade show active" id="f-sign-in" role="tabpanel"><!---->
                    <div class="login-form">
                        <form novalidate="" class="ng-pristine ng-invalid ng-touched">
                            <div class="row form-inputs-wrapper">


                                <div class="col-lg-12">
                                    <div class="form-group-input-wrapper">
                                        <input class="form-control ng-untouched ng-pristine ng-valid" id="fgr_sponsorname" name="fgr_sponsorname" placeholder="Verification Code" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group-input-wrapper">
                                        <div class="form-group-input-password-wrapper">
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="fgr_password" name="fgr_password" placeholder="Password"
                                                    required="" type="password">
                                                <span class="fas fa-eye field-icon toggle-password" toggle="#fgr_password"></span>
                                        </div>
                                        <span class="input-validation d-none">Password required</span>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group-input-wrapper">
                                        <div class="form-group-input-password-wrapper">
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="fgr_password_confirm" name="fgr_password_confirm" placeholder="Confirm Password" required="" type="password">
                                            <span class="fas fa-eye field-icon toggle-password" toggle="#fgr_password_confirm"></span>
                                        </div>
                                        <span class="input-validation d-none">Confirm Password required</span>
                                    </div>
                                </div>

                                
                                <div class="col-lg-12">

                                    <div class="rs-submit">
                                        <input name="fsid_reg-submit" type="submit" value="Change Password" disabled="">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <div class="rs-other-info py-3">
                            <!-- <span class="text-center cursor-default"> New around here?
                                <span class="rs-link rs-reg-link">Join Now</span>
                            </span> -->
                        </div>
                    </div><!---->
                </div>

            </div>
        </div>
    </div>
</app-registration-fullpage>

<?php include(APPPATH."views/customer/footer.php"); ?>

<script>
    $(".radionBtn").on("change", function() {
        var radioValue = $("input[name='verified_by']:checked").val();
        if(radioValue=='phone') {
            $("#emailField").hide();
            $("#phoneField").show();
        }
        else if(radioValue=='email') {
            $("#phoneField").hide();
            $("#emailField").show();
        }
    });
</script>