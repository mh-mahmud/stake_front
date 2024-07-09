<?php include(APPPATH . "views/customer/index_header.php"); ?>

<!-- <app-user-layout> -->
<section class="admin-template-area club-user-admin">
<div class="row">
    
<?php require_once('left_sidebar.php'); ?>
<div class="col-lg-10 admin-content">
    <app-user-wallet>
        <div class="tab-content custom-scrollbar-5">

            <app-statement>
                <div class="tab-pane" id="nav-statement" role="tabpanel">
                    <div class="admin-content-header-new">Club User Statement</div>
                    <div class="admin-content-scroll-wrapper custom-scrollbar-5">


                            <div class="col-lg-12" style="margin-bottom: 20px">
                                <div class="row">

                                    <div class="col-lg-3">
                                        <select class="form-control" name="club_user" id="club_user">
                                            <option value="">Select a club user</option>
                                            <?php foreach($club_users as $val) : ?>
                                                <option value="<?php echo $val->id ?>"><?php echo $val->username; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <input type="submit" id="submit_filter" class="btn btn-success" name="submit" value="Search">
                                    </div>
                                </div>
                            </div>


                        <div class="row admin-profile-table justify-content-center">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_13_wrapper"
                                                 class="dataTables_wrapper no-footer">

                                                <table class="table table-striped table-hover text-center rwd-table nowrap dataTable no-footer" id="dataTable" style="width: 100%;">
                                                    <thead>

                                                    <tr role="row">
                                                        <th>Date</th>
                                                        <th>Purpose</th>
                                                        <th>Debit (Out)</th>
                                                        <th>Credit (In).</th>
                                                        <th>Current Balance</th>
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
            </app-statement>
        </div>
    </app-user-wallet>
</div>

</div>
</section>



<?php include(APPPATH . "views/customer/footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script>
	fetch_data();

	function fetch_data(club_id='') {
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
				url: base_url + "clubuser/customer_statement_dt",
				type: "POST",
				data:{club_id:club_id}
			},
			drawCallback: function (settings) {

			}
		});
	}

	$("#submit_filter").on('click',function () {
		var club_id = $("#club_user").val();
		$('#dataTable').DataTable().destroy();
		fetch_data(club_id);
	});

</script>
