<?php include(APPPATH . "views/customer/index_header.php"); ?>

    <app-user-layout class="ng-star-inserted">
        <section class="admin-template-area club-user-admin">
            <div class="row">

                <?php include(APPPATH."views/club/left_sidebar.php"); ?>
                
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
                                                            <td>Club Name</td>
                                                            <td><?php echo $club_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Club Join Date</td>
                                                            <td><?php echo $created_at; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td><?php echo ($status==1) ? 'Active' : 'Inactive'; ?></td>
                                                        </tr>
														<tr>
															<td>Club Email</td>
															<td class="ng-star-inserted"><?php echo $club_email; ?></td>
														</tr>
														<tr>
															<td>Club Phone</td>
															<td><?php echo $club_mobile; ?></td>
														</tr>
														<tr>
															<td>Club Members</td>
															<td class="ng-star-inserted">
																<?php echo $total_member; ?>
															</td>
														</tr>
														<tr>
															<td>Club Ratio</td>
															<td class="ng-star-inserted">
																<?php echo $show_ratio; ?>
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

<?php include(APPPATH . "views/customer/footer.php"); ?>
