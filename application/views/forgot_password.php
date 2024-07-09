<?php include(APPPATH."views/customer/index_header.php"); ?>

<app-registration-fullpage class="ng-star-inserted">
    <div class="game-other-info-registration-area registration-fullpage-area mt-100"
         style="background-image: url('<?php echo base_url(); ?>assets/img/register-full-bg.jpg')">
        <div class="registration-fullpage-tab-box">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a aria-controls="f-sign-in" class="nav-link" data-toggle="tab" href="#f-sign-in" role="tab" aria-selected="false">Forgot Password</a>
                </li>
            </ul>
            <div class="tab-content">

                <div class="tab-pane fade show active" id="f-sign-in" role="tabpanel"><!---->
                    <div class="login-form">
                        <form novalidate="" class="ng-pristine ng-invalid ng-touched">
                            <div class="row form-inputs-wrapper">


                                <div class="col-lg-12">
                                    <div style="margin-top:5px">

                                        <span>Verified By:</span>
                                        <label class="radio-inline">
                                            <input class="radionBtn" type="radio" name="verified_by" value="email" checked>Email
                                        </label>
                                        <label class="radio-inline">
                                            <input class="radionBtn" type="radio" name="verified_by" value="phone">Phone
                                        </label>

                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group-input-wrapper" id="emailField">
                                        <div class="form-group-phone-wrapper">
                                            <span class="phone-code-label">@</span>
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="fgr_email" name="fgr_email" placeholder="Email" required="" type="email">
                                        </div>
                                    </div>

                                    <div class="form-group-input-wrapper" id="phoneField" style="display:none">
                                        <div class="form-group-phone-wrapper">
                                            <span class="phone-code-label">+88</span>
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="fgr_phone" name="fgr_phone" placeholder="Phone" type="text">
                                        </div>
                                    </div>

                                </div>


                                
                                <div class="col-lg-12">

                                    <div class="rs-submit">
                                        <input name="fsid_reg-submit" type="submit" value="Send Verification Code" disabled="">
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
