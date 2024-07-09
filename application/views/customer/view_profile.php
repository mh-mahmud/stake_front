<?php include(APPPATH."views/customer/index_header.php"); ?>
    <style type="text/css">
        div.txt-short {
          white-space: nowrap; 
          width: 360px; 
          overflow: hidden;
          text-overflow: ellipsis; 
          border: 1px solid #000000;
          cursor: pointer;
        }
        div.txt-short:hover{
            border:1px solid blue;
        }
    </style>
    <app-user-layout class="ng-star-inserted">
        <section class="admin-template-area club-user-admin">
            <div class="row">

                <?php include(APPPATH."views/customer/left_sidebar.php"); ?>

                <div class="col-lg-10 admin-content">

                    <app-user-profile class="ng-star-inserted">
                        <div class="tab-content">

                            <app-view-profile class="ng-star-inserted">
                                <div class="tab-pane" id="nav-view-profile" role="tabpanel">
                                    <div class="admin-content-header-new">Personal Profile</div>
                                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                        <div class="row admin-profile-table admin-profile-table-v-2">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="2">Account Info</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Full Name</td>
                                                            <td><?php echo $name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Join Date</td>
                                                            <td><?php echo $created_at; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td><?php echo ($user_status==1) ? 'Active' : 'Inactive'; ?></td>
                                                        </tr>
														<tr>
															<td>Email</td>
															<td class="ng-star-inserted"><?php echo $email_add; ?></td>
														</tr>
														<tr>
															<td>Phone</td>
															<td><?php echo $phone; ?></td>
														</tr>
														<tr>
															<td>Country</td><!---->
															<td class="ng-star-inserted">
																<?php echo $country; ?>
															</td>
														</tr>
														<tr>
															<td>Club</td><!---->
															<td class="ng-star-inserted">
																<?php echo $club_name; ?>
															</td>
														</tr>
														<tr>
															<td>Sponsor Name</td>
															<td class="ng-star-inserted">Not
																Available
															</td>
														</tr>
                                                        <tr>
                                                            <td>Referral Link</td>
                                                            <td class="ng-star-inserted">
                                                                <div class="txt-short" id="a" onclick="copyDivToClipboard()" title="Click Copy to Clipboard">
                                                                    <?php echo $user_ref_link ?>
                                                                </div> 
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </app-view-profile>

                        </div>
                    </app-user-profile>
                </div>

            </div>
        </section>
    </app-user-layout>


<?php include(APPPATH."views/customer/footer.php"); ?>


<script>
    function copyDivToClipboard() {
        var range = document.createRange();
        range.selectNode(document.getElementById("a"));
        window.getSelection().removeAllRanges(); // clear current selection
        window.getSelection().addRange(range); // to select text
        document.execCommand("copy");
        window.getSelection().removeAllRanges();// to deselect
        alert('Copied Referral Url')
    }
</script>