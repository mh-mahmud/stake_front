<script>

	$(".chatbox-open").on("click", function() {
		$(".cOSjlu").show();
		$(".chat-head").trigger('click').addClass('mobile-device-user');
	});

	$(document).on("click", ".mobile-device-user", function() {
		$(".chat-head").removeClass('mobile-device-user');
		$(".cOSjlu").hide();
		$(".chat-content").hide();
	});

	var i=0;
	$(".chat-head").on("click", function() {
		$(".chat-content").slideToggle("fast", function() {
			var chatStyle = $(this).css('display');
			if(chatStyle == 'block') {
				if( i==1 ) {
					
				}
			}
			else if(chatStyle == 'none') {
				
			}
		});
		i++;
	});

	$("#chat-form").on("submit", function(e) {
		e.preventDefault();

		var chat_msg = $("#sendMessageArea").val().trim();
		var cookie_id = $("#chat_cookie_id").val();
		var chat_user_id = $("#chat_user_id").val();
		if(chat_msg=="") {
			return;
		}

		$.ajax({
			url: "<?php echo base_url(); ?>betscore/insert_chat_data",
			type: "POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function () {
				$("#sendMessageArea").val("");
			},

			dataType: 'html',
			success: function (data) {
				$("#textdiv").html(data);
				$('#textdiv').animate({scrollTop: $('#textdiv')[0].scrollHeight}, 1000);
			}
		});

	});

	$('#sendMessageArea').keyup(function(e) {
	    if(e.keyCode == 13) {
			var chat_msg = $("#sendMessageArea").val().trim();
			if(chat_msg=="") {
				return;
			}

	        $("form#chat-form").submit();
	    }
	});

	function get_chat_init_data() {
		var cookie_id = $("#chat_cookie_id").val();
		var chat_user_id = $("#chat_user_id").val();
		var url = "<?php echo base_url(); ?>betscore/get_chat_init_data";

        $.ajax({
            type: "POST",
            url: url,
            data: {
				cookie_id: cookie_id,
				chat_user_id: chat_user_id
            },
            beforeSend: function() {

            },
            dataType: 'html',
			success: function (data) {
				$("#textdiv").html(data);
				$('#textdiv').animate({scrollTop: $('#textdiv')[0].scrollHeight}, 2000);
			},
            error:function(exception){
                console.log(exception);
            }
        });

	}

	function update_chat_status(data) {
		if(data.status==0) {
			$('.dzmiYl').removeClass('chat-online').addClass('chat-offline').text('off-line');
		}
		else if(data.status==1) {
			$('.dzmiYl').addClass('chat-online').removeClass('chat-offline').text('on-line');
			$("#textdiv").html("");
		}
	}

</script>