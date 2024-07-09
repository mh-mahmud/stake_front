<?php include(APPPATH . "views/customer/index_header.php"); ?>
<style>
.admin-template-area {
    height:1400px !important;
}
.admin-profile-table {
	height:1300px !important;
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
							<div class="admin-content-header-new">Bet History</div>
							<div class="admin-content-scroll-wrapper custom-scrollbar-5">

								<div class="row admin-profile-table justify-content-center">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<div id="DataTables_Table_4_wrapper"
														 class="dataTables_wrapper no-footer">


														<table
															class="table table-striped table-hover text-center rwd-table nowrap dataTable "
															id="dataTable" role="grid"
															aria-describedby="DataTables_Table_4_info"
															style="width: 100%;">
															<thead>
															<tr role="row">
																<th>Match Details</th>
																<th>Match Bit Coin</th>
																<th>Rate</th>
																<th>Return Amount</th>
																<th>Date</th>
																<th>Status</th>
																<th>Action</th>
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
				url: base_url + "customeruser/bet_history_dt",
				type: "POST",
				data: {
					is_date_search: is_date_search
				}
			},
			drawCallback: function (settings) {

			}
		});
	}


	function cancel_bet_by_user(id, uid, coin, m_id) {
		var base_url = '<?php echo base_url()?>';

		$.ajax({
			url: base_url + "customeruser/check_bet_cancel_option",
			type: "POST",
			data: {
				m_id: m_id, id: id
			},
			dataType: "JSON",
			success: function (data) {
				if (data.st == 200) {
					swal({
						title: "Are you sure Cancel Bet?",
						text: data.msg,
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes!",
						cancelButtonText: "No!",
						closeOnConfirm: false,
						closeOnCancel: false
					}, function (isConfirm) {
						if (isConfirm) {
							$.ajax({
								url:base_url + "customeruser/cancel_bet_by_user",
								type: "POST",
								data: {
									id:id,rate_percent:data.rate_percent,uid:uid,coin:coin
								},
								dataType: "JSON",
								success: function (data) {
									if (data.st==200){
										swal("", data.msg, "success",2000);
										$('#dataTable').DataTable().destroy();
										fetch_data();
										return;
									}
								}
							});
						} else {
							$('#dataTable').DataTable().destroy();
							fetch_data();
							swal("Action Cancelled", "", "error");
						}
					});
					return;
				}
				if (data.st == 400) {
					$('#dataTable').DataTable().destroy();
					fetch_data();
					swal("", data.msg, "error");
				}
			}
		});
	}


	//function getTimeRemaining(endtime) {
	//	var t = Date.parse(endtime) - Date.parse(new Date());
	//	console.log(t);
	//	var seconds = Math.floor((t / 1000) % 60);
	//	var minutes = Math.floor((t / 1000 / 60) % 60);
	//	var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
	//	var days = Math.floor(t / (1000 * 60 * 60 * 24));
	//	return {
	//		'total': t,
	//		'days': days,
	//		'hours': hours,
	//		'minutes': minutes,
	//		'seconds': seconds
	//	};
	//}
	//
	//function initializeClock(id, endtime) {
	//	var ts = Date.parse(endtime) - Date.parse(new Date());
	//	if (isNaN(ts)) {
	//		$('#clockdiv').hide();
	//		$('.timer').html("Expired!");
	//	} else if (ts < 0) {
	//		$('#clockdiv').hide();
	//		$('.timer').html("Expired!");
	//	} else {
	//		var clock = document.getElementById(id);
	//		var daysSpan = clock.querySelector('.days');
	//		var hoursSpan = clock.querySelector('.hours');
	//		var minutesSpan = clock.querySelector('.minutes');
	//		var secondsSpan = clock.querySelector('.seconds');
	//
	//		function updateClock() {
	//			var t = getTimeRemaining(endtime);
	//
	//			daysSpan.innerHTML = t.days;
	//			hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
	//			minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
	//			secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
	//
	//			if (t.total <= 0) {
	//				clearInterval(timeinterval);
	//			}
	//		}
	//
	//		updateClock();
	//		var timeinterval = setInterval(updateClock, 1000);
	//	}
	//
	//}
	//
	//var deadline = new Date('<?php //echo $startTime; ?>//');
	//initializeClock('clockdiv', deadline);
</script>
