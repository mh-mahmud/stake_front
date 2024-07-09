<?php include(APPPATH . "views/customer/index_header.php"); ?>

<section class="admin-template-area club-user-admin">
    <div class="row">
        
        <?php include(APPPATH."views/club/left_sidebar.php"); ?>
        
        <div class="col-lg-10 admin-content">
            <router-outlet></router-outlet>
            <app-user-wallet>
                <div class="tab-content custom-scrollbar-5">

                    <app-deposit-history>
                    <div class="tab-pane" id="nav-diposit-history" role="tabpanel">
                        <div class="admin-content-header-new">Bet History</div>
                        <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                            <?php include(APPPATH."views/flash_message.php"); ?>

                            <div class="row admin-profile-table justify-content-center" style="height:500px !important">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <div id="DataTables_Table_11_wrapper"
                                                     class="dataTables_wrapper no-footer">
                                                    
                                                    <div id="DataTables_Table_11_filter"
                                                         class="dataTables_filter"><label>Search:<input
                                                                    type="search" class="" placeholder=""
                                                                    aria-controls="DataTables_Table_11"></label>
                                                    </div>

                                                    <table class="table table-striped table-hover text-center rwd-table nowrap dataTable no-footer"
                                                           style="width: 1050px;">
                                                        <thead>
                                                        <tr role="row">
                                                            <th>Name</th>
                                                            <th>Match Details</th>
                                                            <th>Match Bit Coin</th>
                                                            <th>Rate</th>
                                                            <th>Return Amount</th>
                                                            <!-- <th>Previous Balance</th> -->
                                                            <!-- <th>Current Balance</th> -->
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="odd">
                                                            <?php foreach($get_data as $val) : ?>
                                                                <tr>
                                                                    <td><?= $val->username; ?></td>
                                                                    <td style="width: 300px !important;text-align:justify;">
                                                                      S: <?= $val->name; ?><br>
                                                                      L: <?= $val->league_title; ?><br>
                                                                      M: <?= $val->title; ?><br>
                                                                      Q: <?= $val->match_option_title; ?><br>
                                                                      A: <?= $val->option_title; ?>
                                                                    </td>
                                                                    <td><?= $val->bet_coin; ?></td>
                                                                    <td><?= $val->option_coin; ?></td>
                                                                    <td><?= $val->total_coin; ?></td>
                                                                    <!-- <td>
                                                                        <?php //echo $val->prev_balance; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php //echo $val->cur_balance; ?>
                                                                    </td> -->
                                                                    <td><?= $val->created_at; ?></td>
                                                                    <td><?= str_replace("_", " ", $val->bet_status); ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- <div class="dataTables_info"
                                                         id="DataTables_Table_11_info" role="status"
                                                         aria-live="polite">Showing 0 to 0 of 0 entries
                                                    </div>
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_11_paginate">
                                                        <a class="paginate_button previous disabled" id="DataTables_Table_11_previous">Previous</a><span></span>
                                                        <a class="paginate_button next disabled" aria-controls="DataTables_Table_11" id="DataTables_Table_11_next">Next</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </app-deposit-history>

                </div>
            </app-user-wallet>
        </div>
    </div>
</section>
<?php include(APPPATH."views/club/footer.php"); ?>
