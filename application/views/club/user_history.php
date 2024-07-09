<?php include(APPPATH . "views/customer/index_header.php"); ?>


<section class="admin-template-area club-user-admin">
    <div class="row">
        
        <?php include(APPPATH."views/club/left_sidebar.php"); ?>
        
        <div class="col-lg-10 admin-content">
            <app-user-wallet>
                <div class="tab-content custom-scrollbar-5">

                    <app-deposit-history>
                        <div class="tab-pane" id="nav-diposit-history" role="tabpanel">
                            <div class="admin-content-header-new">User History</div>
                            <div class="admin-content-scroll-wrapper custom-scrollbar-5">
                                <?php include(APPPATH."views/flash_message.php"); ?>

                                <div class="row admin-profile-table justify-content-center" style="height:500px !important">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <div id="DataTables_Table_11_wrapper"
                                                         class="dataTables_wrapper no-footer">


                                                        <table class="table table-striped table-hover text-center rwd-table nowrap dataTable no-footer"
                                                               style="width: 100%;" id="dataTable">
                                                            <thead>
                                                            <tr role="row">
                                                                <th>Customer Name</th>
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
                    </app-deposit-history>
                </div>
            </app-user-wallet>
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
			"lengthMenu": [[10], [10]],
			"columnDefs": [
				{"className": "dt-center", "targets": "_all", "orderable": false}
			],
			"order": [],
			oLanguage: {sProcessing: '<i class="fas fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'},
			"ajax": {
				url: base_url + "clubuser/user_history_dt",
				type: "POST"
			},
			drawCallback: function (settings) {

			}
		});
	}
</script>

