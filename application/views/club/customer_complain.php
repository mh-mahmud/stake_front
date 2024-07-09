<?php include(APPPATH . "views/customer/index_header.php"); ?>

<app-user-layout>
	<section class="admin-template-area club-user-admin">
		<div class="row">

			<?php include(APPPATH . "views/club/left_sidebar.php"); ?>

			<div class="col-lg-10 admin-content">

				<div class="tab-content custom-scrollbar-5">
					<router-outlet></router-outlet>
					<app-complain-history>
						<div class="tab-pane" id="nav-complain-history" role="tabpanel">
							<div class="admin-content-header-new">Complain History</div>
							<div class="admin-content-scroll-wrapper custom-scrollbar-5">
								<?php include(APPPATH . "views/flash_message.php"); ?>

								<div class="row admin-profile-table justify-content-center"
									 style="height:500px !important">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="table-responsive">
													<div id="DataTables_Table_14_wrapper"
														 class="dataTables_wrapper no-footer">

														<!-- <div class="dataTables_length" id="DataTables_Table_14_length">
															<label>Show

															<select name="DataTables_Table_14_length"
																		aria-controls="DataTables_Table_14"
																		class="">
																	<option value="10">10</option>
																	<option value="25">25</option>
																	<option value="50">50</option>
																	<option value="100">100</option>
																</select> entries</label>
														</div>
														<div id="DataTables_Table_14_filter"
															 class="dataTables_filter"><label>Search:<input
																		type="search" class="" placeholder=""
																		aria-controls="DataTables_Table_14"></label>
														</div> -->

														<table
															class="table table-striped table-hover text-center rwd-table nowrap dataTable no-footer"
															style="width: 100%;" id="dataTable">
															<thead>

															<tr role="row">
																<th>Usrname</th>
																<th>Complain To</th>
																<th>Subject</th>
																<th>Description</th>
																<th>Answer</th>
																<th>Date</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($get_data as $val) : ?>
																<tr>
																	<td><?php echo $val->name; ?></td>
																	<td><?php echo $val->complain_to ?></td>
																	<td><?php echo $val->subject ?></td>
																	<td><?php echo $val->message ?></td>
																	<td><?php echo $val->reply == "" ? "<a class='btn btn-info' href='javascript:void(0);' onclick='return replyAnswer($val->id)'>Reply</a>" : $val->reply ?></td>
																	<td><?php echo $val->created_at ?></td>
																</tr>
															<?php endforeach; ?>
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
					</app-complain-history>
				</div>

			</div>
		</div>
	</section>

</app-user-layout>

<?php include(APPPATH . "views/customer/footer.php"); ?>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>

<script>
	$("#dataTable").dataTable();


	function replyAnswer(id) {

		swal({
			title: "Type your answer",
			text: "Write something to reply",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Write your reply here",
			showLoaderOnConfirm: true,
		}, function (inputValue) {
			if (inputValue === false) return false;
			if (inputValue === "") {
				swal.showInputError("You need to write something!");
				return false
			}

			$.ajax({
				method: "POST",
				url: '<?php echo base_url("clubuser/reply_complain"); ?>',
				data: {
					reply: inputValue,
					complain_id: id
				},
				dataType: "JSON",
				success: function (data) {
					if (data.st == 200) {
						swal({
							title: "Success",
							type:"success",
							text: "Successfully reply your answer to you customer"
						},function (isConfirm) {
							window.location='customer_complain';
						});
					}
				}
			});
		});
	}


</script>
