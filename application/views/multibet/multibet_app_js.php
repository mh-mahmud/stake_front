<?php $get_min_max = get_bet_min_max(); ?>

<script>

	// -- new functionality
	var betType = "Singles";
	var elems = [];
	var blocked_elems = [];
	var multi_bet_stack_count = $("#multi_bet_stack_count");
	var multibet_enabled = $("#multibet_enabled");
	
	var betMinValue = "<?= $get_min_max->bet_limit_min; ?>";
	var betMaxValue = "<?= $get_min_max->bet_limit_max; ?>";
	var multiBetLimit = "<?= $get_min_max->multibet_limit; ?>";
	
 

    function prepareModalData(id) {
    	var slip_val = $("#multi_bet_slip").attr("data-badge");

    	if( elems.length == 0 ) {
    		elems.push(id);
    		$("#multi_bet_slip").attr("data-badge", 1);
    		return;
    	}

    	// -- replace dublicate match
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'betscore/replace_dublicate_match';
        var return_first = function () {
            var tmp = null;
            $.ajax({
                'async': false,
                'type': "POST",
                'global': false,
                'dataType': 'json',
                'url': url,
                data: {
                    option_detail_ids: elems, 
                    last_id: id
                },
                'success': function (data) { 
                    tmp = data.get_data;
                }
            });
            return tmp;
        }(); 
        elems = return_first;
        $("#multi_bet_slip").attr("data-badge", return_first.length);
    }

    function prepareModalDataByBetType() { 
        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'betscore/replace_dublicate_match_when_select_bet_type';
        var return_first = function () {
            var tmp = null;

            $.ajax({
                'async': false,
                'type': "POST",
                'global': false,
                'dataType': 'json',
                'url': url,
                data: {
                    option_detail_ids: elems
                },
                'success': function (data) { 
                    tmp = data.get_data; 
                    for (var key in data.error_msg) {
					  	$("#betBox_"+data.error_msg[key]).remove();
					}
                }
            });
            return tmp;
        }(); 
        elems = return_first;
        $("#multi_bet_slip").attr("data-badge", return_first.length);
    } 

	function plusStack() {
		var inputTotalStack = parseInt($("#inputTotalStack").val()); 

		if(inputTotalStack <= betMaxValue) {
			inputTotalStack += 10; 

			$("#inputTotalStack").attr('value', inputTotalStack).val(inputTotalStack);
			$(".single-bet-box").attr('value', inputTotalStack).val(inputTotalStack); 
		}
		coin_stack_cal();
	}

	function minusStack() {
		var inputTotalStack = parseInt($("#inputTotalStack").val()); 

		if(inputTotalStack > betMinValue) {
			inputTotalStack -= 10; 

			$("#inputTotalStack").attr('value', inputTotalStack).val(inputTotalStack);
			$(".single-bet-box").attr('value', inputTotalStack).val(inputTotalStack); 
		}
		coin_stack_cal();
	}

	function singleMinusStack(x) {
		var stack = $(".single_input_"+x).val();
		stack = parseInt(stack);

		if(stack > betMinValue) {
			stack -= 1;
			$(".single_input_"+x).attr('value', stack).val(stack);
		}
		coin_stack_cal();
	}

	function singlePlusStack(x) {
		var stack = $(".single_input_"+x).val();
		stack = parseInt(stack);

		if(stack < betMaxValue) {
			stack += 1;
			$(".single_input_"+x).attr('value', stack).val(stack);
		}
		coin_stack_cal();
	}

	function coin_stack_cal() { 
		var _bet_ratio = 0;
		var _single_input = 0;
		var _total_m = 0;  
		var _total = 0;  
		for (var i = 0; elems.length > i; i++) {
			if (betType==="Multibet") {
				_bet_ratio = _bet_ratio+parseFloat($("#multibet_rate_"+elems[i]).val()); 
				_total_m = _total_m+parseFloat($("#inputTotalStack").val());
				_total = _total_m*_bet_ratio/elems.length;
			} else {
				_bet_ratio = _bet_ratio+parseFloat($("#singlebet_rate_"+elems[i]).val());
				_single_input = _single_input+parseFloat($(".single_input_"+elems[i]).val());
				_total = _bet_ratio*_single_input/elems.length; 
			}
		}
		$(".multibet-ratio").html(_bet_ratio.toFixed(2));
		if (_total_m===0) {
			$(".total_stack").html(_single_input.toFixed(2));
		} else {
			$(".total_stack").html("");
		}
		$("#possible-winning-val").text(_total.toFixed(2)); 
	}

	function auto_coin_update_in_modal(elems,blocked_elems) {
		var url_prefix = "<?php echo base_url(); ?>";
		url = url_prefix + 'betscore/check_coin_for_auto_update';
		var getBetType = $("#bet_type").val();
		var tmp = null;
		var block_tmp = null;
		// ajax request
		$.ajax({
			type: "POST",
			url: url,
			data: {
				option_details_id: elems,
				blocked_elems: blocked_elems,
				bet_type: getBetType
			},
			dataType: 'json',
			success: function (data) {
				for (var key in data.last_elems_have) {
					if (getBetType==="single_bet") {
						$("#option_coin_update_"+key).html(data.last_elems_have[key]);
						$("#singlebet_rate_"+key).val(data.last_elems_have[key]);
					} else {
						$("#multibet_rate_"+key).val(data.last_elems_have[key]);
					}
					$("#block_over_"+key).hide();
					tmp = key;
				}
				for (var i = 0; i < data.last_elems_no.length; i++) {
					$("#block_over_"+data.last_elems_no[i]).show();
					block_tmp = data.last_elems_no[i];
				}
				if( getBetType=='multi_bet' && multiBetLimit > elems.length) {
			        $(".instant-bet").attr('disabled', true);
			    }
			    elems = tmp;
			    blocked_elems = block_tmp;
				coin_stack_cal();			
			}
		});
	}

	$(document).on("click", "#MultiBetclear", function() {
		elems = [];
		slip_val = 0;
		$("#multi_bet_slip").attr("data-badge", slip_val);
		$("#bets_count_top").html("");
		$('#betModalBox').modal('hide');
		$("#current_session").val("in_play");
		betType = "Singles";
	})

	$(document).on("keyup", "#inputTotalStack", function() {
		var inputTotalStack = $(this).val();
		var ratio = parseFloat($("#ratio").val());
		var possibleWin = 0;

		$(this).ForceNumericOnly();
		var inputTotalStack = $(this).val();
		inputTotalStack = parseFloat(inputTotalStack);

		if (inputTotalStack < betMinValue || inputTotalStack > betMaxValue || !inputTotalStack) { 
			$(".bet_slip_error").show();
			$(".bet_slip_error").text("Error! Bet limit is " + betMinValue + " to " + betMaxValue);
			$(".instant-bet").attr('disabled', true);
			$(".single-bet-box").attr('value', betMinValue).val(betMinValue); 
			return;
		} else { 
			$(".bet_slip_error").text("");
			$(".bet_slip_error").hide();
			$(".instant-bet").attr('disabled', false);
			$(".single-bet-box").attr('value', inputTotalStack).val(inputTotalStack); 
		}
		coin_stack_cal();
	});

	$(document).on("keyup", ".single-bet-box", function() {
		var inputStack = $(this).val(); 
		$(this).ForceNumericOnly();
		var inputStack = $(this).val();
		inputStack = parseFloat(inputStack);

		if (inputStack < betMinValue || inputStack > betMaxValue || !inputStack) { 
			$(".bet_slip_error").show();
			$(".bet_slip_error").text("Error! Bet limit is " + betMinValue + " to " + betMaxValue);
			$(".instant-bet").attr('disabled', true); 
			return;
		} else { 
			$(".bet_slip_error").text("");
			$(".bet_slip_error").hide();
			$(".instant-bet").attr('disabled', false);
			$(this).attr('value', inputStack); 
		}
		coin_stack_cal();
	});

	$(document).on('change', '.multiselect__single', function() {
		betType = $(this).val();
		var betInputBox = $('.single-bet-div');
		var betCoinSingle = $('.single-bet-coin'); 

		if(betType=='Singles') { 
		    $(".instant-bet").attr('disabled', false);
			betInputBox.show();
			betCoinSingle.show();  
			$("#bet_type").attr('value', 'single_bet'); 
		}
		else if(betType=='Multibet') { 
		    prepareModalDataByBetType();
			if(multiBetLimit > elems.length) {
		       $(".instant-bet").attr('disabled', true);
		    }
		    betInputBox.hide();
			betCoinSingle.hide();  
			$("#bet_type").attr('value', 'multi_bet'); 
			$("#bets_count_top").html("["+elems.length+"]");
		}
		coin_stack_cal();
	});

	$(document).on('hidden.bs.modal','#betModalBox', function () { 
		if (elems.length!=0) {
			multi_bet_stack_count.show();
			$("#multi_bet_slip").attr("data-badge", elems.length);
		}
		$("#current_session").val("in_play");
	});

	$(document).on('show.bs.modal','#betModalBox', function () {
		multi_bet_stack_count.hide();
		$("#current_session").val("openBetmodal");
	});

	function betCloseButton(arr_val) {
        var slip_val = $("#multi_bet_slip").attr("data-badge");
        slip_val = parseInt(slip_val);
        if(slip_val > 0) {
            elems = jQuery.grep(elems, function(value) {
                return value != arr_val;
            });
            slip_val--;
        }
        $("#multi_bet_slip").attr("data-badge", slip_val);
        $("#bets_count_top").html("["+slip_val+"]");
        $("#betBox_"+arr_val).remove();
        coin_stack_cal();
	}

	function showBetModalFromStack() {
		$('#betModalBox').modal('show');
	}

	function showBetModal(coin, id) { 
 		if (elems.includes(id)) {
        	swal(
				{
					title: "This Item already in Bet slip",
					type: "error",
					timer: 2000,
					showConfirmButton: true
				}
			);
			return;
        }

        if (betType==="Singles") {
        	if( elems.length == 0 ) {
	    		elems.push(id);
	    		$("#multi_bet_slip").attr("data-badge", 1); 
	    	} else {
	    		elems.push(id);
	    		$("#multi_bet_slip").attr("data-badge", elems.length);
	    	}
        } else{
        	prepareModalData(id);
        }

		$("#lodingPage").show();
		$("#betBtn").show();
		$("#closeBtn").hide();
		$(".betSuccessMsg").hide();
		$(".betSuccessMsg").text("");
		$(".bet_slip_error").hide();
		$(".bet_slip_error").text("");
		var betInputBox = $('.single-bet-div');
		var betCoinSingle = $('.single-bet-coin');
		var ratioVal = $("#ratio").val();
		
		var coin_rate = parseFloat(coin);
		
		var url_prefix = "<?php echo base_url(); ?>";
		url = url_prefix + 'betscore/check_init_multibet';

		// ajax request
		$.ajax({
			type: "POST",
			url: url,
			data: {
				option_details_id: elems,
				coin_rate: coin_rate
			},
			dataType: 'json',
			success: function (data) {
				$("#lodingPage").hide();
				if (data.error == 0) {

                    $(".modal-content").html(data.get_data);
                    elems = data.last_elems;

                    $("#betModalBox").modal('show');
                    $("#multiselect__single").val(betType);
					$('#multiselect__single option[value="'+betType+'"]').prop('selected', true);
					 
					var betInputBox = $('.single-bet-div');
					var betCoinSingle = $('.single-bet-coin');
					var ratioVal = $("#ratio").val();

					if(betType=='Singles') {
					    $(".instant-bet").attr('disabled', false);
						betInputBox.show();
						betCoinSingle.show(); 
						$("#inputMultibetRatio").attr('value', 0);
						$("#bet_type").attr('value', 'single_bet'); 
					}
					else if(betType=='Multibet') {
					    
					    if(multiBetLimit > elems.length) {
					        $(".instant-bet").attr('disabled', true);
					    }
						betInputBox.hide();
						betCoinSingle.hide(); 
						$("#inputMultibetRatio").attr('value', ratioVal);
						$("#bet_type").attr('value', 'multi_bet'); 
					}
					coin_stack_cal(); 

				} else if (data.error == 1) {
					elems = [];
					swal(
						{
							title: "Please login to continue",
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
				} else if (data.error == 2 || data.error == 3) {
					swal(
						{
							title: data.error_msg,
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
				}
				return;
			},
			error: function (exception) {

			}
		});
	}

	function submitBetForm() {

		var detailsIds = elems;
		var getBetType = $("#bet_type").val();
		var inputTotalStack = $("#inputTotalStack").val();
		var inputMultibetRatio = $("#inputMultibetRatio").val();
		var singleBetBox = {};

	    if( getBetType=='multi_bet' && multiBetLimit > elems.length) {
	        $(".instant-bet").attr('disabled', true);
	        swal(
				{
					title: "Error in place bet, limit issue",
					type: "error",
					timer: 2000,
					showConfirmButton: true
				}
			);
	        return;
	    }

		for( i=0; i<elems.length; i++ ) {
			var x = $(".single_input_"+elems[i]).val();
			var y = elems[i];
			singleBetBox[y] = x;
		}
		var exObj = $(".instant-bet");

		var url_prefix = "<?php echo base_url(); ?>";
		url = url_prefix + 'submit_user_bet';
		// ajax request
		$.ajax({
			type: "POST",
			url: url_prefix + 'customeruser/submit_user_bet',
			data: {
				detailsIds: detailsIds,
				betType: getBetType,
				inputTotalStack: inputTotalStack,
				inputMultibetRatio: inputMultibetRatio,
				singleBetBox: singleBetBox
			},
			beforeSend: function () {
				exObj.attr('disabled', true);
				exObj.text("Please wait.....");
			},
			dataType: 'json',
			success: function (data) {
				exObj.attr('disabled', false);
				exObj.text("Instant bet");

				$("#betBtn").hide();
				$("#closeBtn").show();

				if (data.error == 0) {
					elems = [];
					betType = "Singles"; 
					$("#multi_bet_slip").attr("data-badge", 0); 
					$('#betModalBox').modal('hide');
					multi_bet_stack_count.hide();
					swal(
						{
							title: data.success_msg,
							type: "success",
							timer: 2000,
							showConfirmButton: false
						}
					);
					
					return;
				} else if (data.error == 1) {
					swal(
						{
							title: data.error_msg,
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
					return;
				} else if (data.error == 2 || data.error == 3) {
					swal(
						{
							title: data.error_msg,
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
					return;
				}
			},
			error: function (exception) {
				// console.log(exception);
			}
		});
	}
	 

</script>