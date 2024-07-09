<?php include(APPPATH . "views/customer/index_header.php"); ?>

<section class="admin-template-area club-user-admin">
	<div class="row">

		<?php include(APPPATH . "views/club/left_sidebar.php"); ?>

		<div class="col-lg-10 admin-content">
			<app-user-profile class="ng-star-inserted">
				<div class="tab-content">

					<app-bet-history class="ng-star-inserted">
						<div class="tab-pane">
							<div class="admin-content-header-new">Bet History</div>
							<div class="admin-content-scroll-wrapper custom-scrollbar-5">

								<div class="row admin-profile-table justify-content-center" style="height:500px !important">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<div class="dataTables_wrapper">

														<table id="dataTable" style="width: 100%;">
															<thead>
															<tr role="row">
																<th>Username</th>
																<th>Match Details</th>
																<th>Match Bit Coin</th>
																<th>Rate</th>
																<th>Return Amount</th>
																<th>Date</th>
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
<?php include(APPPATH . "views/customer/footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script>
	fetch_data();

	function fetch_data() {
		var base_url = '<?php echo base_url()?>';
		let dataTable;
		dataTable = $('#dataTable').DataTable({
			"footerCallback": function () {
				let api = this.api(), data;
			},
			'bProcessing': true,
			"serverSide": true,
			searchHighlight: true,
			"lengthMenu": [[10,30,50,-1], [10,30,50,'All']],
			"columnDefs": [
				{"className": "dt-center", "targets": "_all", "orderable": false}
			],
			"order": [],
			oLanguage: {sProcessing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
			"ajax": {
				url: base_url + "clubuser/match_bit_coin_dt",
				type: "POST"
			},
			drawCallback: function (settings) {

			}
		});
	}
</script>
