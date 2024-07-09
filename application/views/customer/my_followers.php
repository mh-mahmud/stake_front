<?php include(APPPATH."views/customer/index_header.php"); ?>

    <app-user-layout>
        <section class="admin-template-area club-user-admin">
            <div class="row">
                
                <?php require_once('left_sidebar.php'); ?>



				<div class="col-lg-10 admin-content">
					<app-user-profile class="ng-star-inserted">
						<div class="tab-content">
							<router-outlet></router-outlet>
							<app-bet-history class="ng-star-inserted">
								<div class="tab-pane" id="nav-bet-history" role="tabpanel">
									<div class="admin-content-header-new">My Followers List</div>
									<div class="admin-content-scroll-wrapper custom-scrollbar-5">

										<div class="row admin-profile-table justify-content-center" style="height:500px !important">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-12">
														<div class="table-responsive">
															<div id="DataTables_Table_4_wrapper" class="dataTables_wrapper no-footer">


																<table
																	class="table table-striped table-hover text-center rwd-table nowrap dataTable "
																	id="dataTable" role="grid"
																	aria-describedby="DataTables_Table_4_info" style="width: 100%;">
																	<thead>
																	<tr role="row">
																		<th>Username</th>
																		<th>Phone</th>
																		<th>Email</th>
																		<th>Join Date</th>
																		<th>Status</th>
																	</tr>
																	</thead>
																	<tbody>

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
	</app-user-layout>
<?php require_once('footer.php'); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script>
	fetch_data();
	function fetch_data()
	{
		var base_url = '<?php echo base_url()?>';
		let dataTable;
		dataTable = $('#dataTable').DataTable({
			"footerCallback": function () {
				let api = this.api(), data;
			},
			'bProcessing': true,
			"serverSide": true,
			searchHighlight: true,
			"lengthMenu": [[10,15,5], [10,15,5]],
			"columnDefs": [
				{"className": "dt-center", "targets": "_all","orderable": false}
			],
			"order": [],
			oLanguage: {sProcessing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
			"ajax": {
				url: base_url+"customeruser/my_followes_dt",
				type: "POST"
			},
			drawCallback:function (settings)
			{

			}
		});
	}
</script>
