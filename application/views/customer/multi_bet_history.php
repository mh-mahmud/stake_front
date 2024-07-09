<?php include(APPPATH . "views/customer/index_header.php"); ?>
<style>
.admin-template-area {
    height:1400px !important;
}
.admin-profile-table {
	/*height:1300px !important;*/
}

@media only screen and (max-width: 600px) and (min-width: 300px) {
    .admin-template-area {
        height:1100px !important;
    }
}
</style>

<section class="admin-template-area club-user-admin">
	<div class="row">
		<?php include(APPPATH . "views/customer/left_sidebar.php"); ?>


		<div class="col-lg-10 admin-content">
			<app-user-profile class="ng-star-inserted">
				<div class="tab-content">

					<app-bet-history class="ng-star-inserted">
						<div class="tab-pane" id="nav-bet-history" role="tabpanel">
							<div class="admin-content-header-new">Multi Bet</div>
							<div class="admin-content-scroll-wrapper custom-scrollbar-5">

								<div class="row admin-profile-table justify-content-center">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<div id="DataTables_Table_4_wrapper"
														 class="dataTables_wrapper no-footer">


														<table
															class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0" id="dataTable" 
															aria-describedby="DataTables_Table_4_info"
															style="width: 100%;">
															<thead>
							                                    <tr role="row">
							                                        <th>#SL</th>
							                                        <th>Created at</th>
							                                        <th>Total Stake</th>
							                                        <th>Total Coin</th>
							                                        <th>Possible Win</th>
							                                        <th>Result</th>
							                                        <th>Details</th>
							                                    </tr>
															</thead>

						                                    <tbody>
						                                        <!-- <?php foreach($get_data as $val) : ?>
						                                            <tr>
						                                                <td><?= date("D j F Y, g.iA", strtotime($val->created_at)); ?></td>
						                                                <td><?= $val->total_stake; ?></td>
						                                                <td><?= $val->total_coin; ?></td>
						                                                <td><?= $val->possible_win; ?></td>
						                                                <td>
						                                                    <?php if($val->status=='MATCH_RUNNING') { ?>
						                                                        <span class="badge badge-warning">processing</span>
						                                                    <?php } else if($val->status=='WIN') { ?>
						                                                        <span class="badge badge-success">win</span>
						                                                    <?php } else if($val->status=='USER_CANCEL') { ?>
						                                                        <span class="badge badge-danger">reject</span>
						                                                    <?php } else if($val->status=='ADMIN_CANCEL') { ?>
						                                                        <span class="badge badge-danger">cancel</span>
						                                                    <?php } else if($val->status=='LOST') { ?>
						                                                        <span class="badge badge-danger">lost</span>
						                                                    <?php } ?>
						                                                </td>
						                                                <td> 
						                                                    <a
						                                                    class="btn btn-success btn-sm"
						                                                    href="<?php echo base_url('user_multibet_details/'.$val->id); ?>"
						                                                    >Details</a>
						                                                </td>
						                                            </tr>
						                                        <?php endforeach; ?> -->
						                                    </tbody>

														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</app-bet-history>
				</div>
			</app-user-profile>
		</div>

	</div>
</section>
<!-- multibet modal -->
<div id="multibetModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title">Multibet Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="multiBetDetailsContent2"> 
                            
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . "views/customer/footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script> 
<script>
	fetch_data();

	function fetch_data(is_date_search = '') {
		var base_url = '<?php echo base_url()?>';
		let dataTable;
		dataTable = $('#dataTable').DataTable({
			"footerCallback": function () {
				let api = this.api(), data;
			},
			'bProcessing': true,
			"serverSide": true,
			searchHighlight: true,
			"lengthMenu": [[10, 15, 5], [10, 15, 5]],
			"columnDefs": [
				{"className": "dt-center", "targets": "_all", "orderable": false}
			],
			"order": [],
			oLanguage: {sProcessing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
			"ajax": {
				url: base_url + "customeruser/multi_bet_history_dt",
				type: "POST",
				data: {
					is_date_search: is_date_search
				}
			},
			drawCallback: function (settings) {

			}
		});
	}

	function show_bets(id,user_id) { 

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'customeruser/ajax_multibet_details';
        $("#multiBetDetailsContent2").html("Please wait...");
        $.ajax({
            type: "POST",
            url: url,
            data: {
                option_detail_ids: id,
                user_id: user_id,
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data.get_data);return;
                if(data.error==0) {
                    $("#multibetModal").modal('show');
                    $("#multiBetDetailsContent2").html(data.get_new_data); 
                }
                else if(data.error == 2) {

                }

            },
            error:function(exception){
                console.log(exception);
            }
        });
    } 
</script>

