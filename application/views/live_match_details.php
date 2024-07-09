 ORDER BY match_option_serial ASC
ORDER BY option_serial ASC<?php include(APPPATH . "views/customer/index_header.php"); ?>

<app-game-content-area>
    <section class="game-content-area" style="margin-top: 0px">
        <div class="row">

        <?php include(APPPATH . "views/left_sidebar.php"); ?>

        <perfect-scrollbar class="col-lg-7 game-area custom-scrollbar-2">
            <div style="position: static;" class="ps">
                <div class="ps-content">


                    <div class="live-in-play">

                        <!-- start score board -->
                        <!-- <div class="match-details-breadcumb-area">
                            <ul class="breadcumb">
                                <li><a>Pakistan Super League 2020</a></li>
                                <li class="active"><a>Pakistan Super League 2020</a></li>
                            </ul>
                        </div> -->
                        <div class="match-details-banner" style="background-image: url('<?php echo base_url(); ?>assets/img/hero_Bannar.png')">
                            <div class="match-location-date" style="border-bottom:1px solid yellow">
                                <span class="date ng-star-inserted">Live</span>
                            </div>
                            <!-- <div class="match-countdown-timer ng-star-inserted">
                                <span class="icon"><i class="fas fa-clock"></i></span>
                                <span class="timer"><span> 1 </span><sup>Hrs</sup>
                                <span> 35 </span><sup>Min</sup><span>56</span><sup>Sec</sup></span>
                            </div> -->

                            <div class="match-team-list">
                                <div class="team-name-flag">
                                    <span class="flag">
                                        <img alt="" src="<?= get_admin_url() ?>assets/img/flag/<?= $get_data->icon1 ?>">
                                    </span>
                                    <span class="name"><a><?php echo $team_1; ?></a></span>
                                </div>

                                <div class="match-start-time">
                                    <span class="text">Score</span>
                                    <span class="time"><?php echo $get_data->score_1; ?>:<?php echo $get_data->score_2; ?></span>
                                </div>
                                <div class="team-name-flag">
                                    <span class="flag">
                                        <img alt="" src="<?= get_admin_url() ?>assets/img/flag/<?= $get_data->icon2 ?>">
                                    </span>
                                    <span class="name"><a><?php echo $team_2; ?></a></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="match-details-game-header">
                            <span class="text">
                                <?php echo $get_data->league_title; ?> : <?php echo $get_data->title; ?>
                            </span>
                            <span class="statistics"><img alt="" src="assets/img/graph.svg"></span>
                        </div>
                        <!-- end score board -->


                        <!-- bet option here-->
                        <div id="show_bet_option">
                            
                            <div class="tab-content" id="live-in-play-tab-content">
                                <div class="tab-pane-1" id="homeSports-tab" role="tabpanel">

                                    <?php if(!empty($get_data)) : ?>

                                            <div class="ng-star-inserted">
                                                <div class="single-match-result">

                                                    <!-- <div class="single-match-result-header">
                                                        <a class="left-side">
                                                            <span class="match-infos">
                                                                <span class="top-side">
                                                                    <span><?php //echo $get_data->league_title; ?></span>
                                                                </span>
                                                                <span class="bottom-side">
                                                                    <span class="match-team-name"><?php //echo $get_data->title; ?></span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                        <div class="right-side">
                                                            <div class="bottom-side">
                                                                <span class="current-time"><?php //echo $get_data->notification; ?></span>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <?php
                                                        $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$get_data->id}' AND status=1  ORDER BY match_option_serial ASC
ORDER BY option_serial ASC")->result();

                                                        $x=rand(10, 10000);
                                                        $i=$x+$get_data->id;
                                                        foreach($get_bet_data as $data) :
                                                            $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY match_option_serial ASC
ORDER BY option_serial ASC")->result();
                                                    ?>

                                                        <app-bet>
                                                            <span class="ng-star-inserted">
                                                                <div class="single-match-result-accordion-header ng-star-inserted"
                                                                     data-toggle="collapse"
                                                                     data-target="#single-match-result-accordion-<?php echo $i; ?>"
                                                                     aria-expanded="true"
                                                                     aria-controls="single-match-result-accordion-<?php echo $i; ?>"
                                                                     title="To Win The Match?">
                                                                    <a class="status" title="Match Winner"><?php echo $data->match_option_title; ?></a>
                                                                    <div class="right-side">
                                                                        <span class="single-match-result-accordion-btn">
                                                                            <i class="fas fa-chevron-down"></i>
                                                                            <i class="fas fa-chevron-up"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="collapse show ng-star-inserted"
                                                                     id="single-match-result-accordion-<?php echo $i; ?>">
                                                                    <app-match-ratio class="ng-tns-c28-562">
                                                                        <div class="single-match-result-accordion-body">
                                                                            <div class="row align-items-center justify-content-start">

                                                                                <?php foreach($options as $op) : ?>
                                                                                    <div class="col col-lg-4 ng-tns-c28-562 ng-star-inserted">
                                                                                        <a
                                                                                        class="single-match-result-box "
                                                                                        href="javascript:void(0);"
                                                                                        onclick='return showBetModal("<?php echo $op->option_coin; ?>", "<?php echo $op->id; ?>");'
                                                                                        title="<?php echo $op->option_title; ?>">
                                                                                            <div class="match-name"><?php echo $op->option_title; ?></div>
                                                                                            <div class="match-point ng-tns-c28-562 ng-star-inserted"><?php echo $op->option_coin; ?></div>
                                                                                        </a>
                                                                                    </div>
                                                                                <?php endforeach; ?>


                                                                            </div>
                                                                        </div>
                                                                    </app-match-ratio>
                                                                </div>
                                                            </span>
                                                        </app-bet>

                                                    <?php $i++; endforeach; ?>

                                                </div>
                                            </div>

                                    <?php else: ?>

                                        <div class="single-match-result-header" style="background-color:#666;margin-top:5px">
                                            <a class="left-side">
                                                <span class="match-infos">
                                                    <span class="bottom-side">
                                                        <span style="font-size:12px">Sorry, no match found to bet</span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>

                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                        <!--bet option end here-->
                    </div>
                </div>

            </div>
        </perfect-scrollbar>

        <!-- Right sidebar -->
        <?php include(APPPATH . "views/right_sidebar_old.php"); ?>

        </div>
    </section>
</app-game-content-area>

</app-home-layout>

<!-- Bet Modal -->
<div class="modal fade" id="betModalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <!--common block-->
            <div class="common_block_panel betting_slip_block">
                <h2>Bet Score24</h2>
                <div class="pallate_container bet_slip_container">

                    <!--bet slip 01-->
                    <div class="bet_slip_select_box">                                                   
                        <h5 class="select_bet_perticipant_name">
                            <a href="#" class="remove_button cancel_bet"><span><i class="fa fa-close"></i></span></a>
                            <span class="modal_match_name">
                            <span id="leagueTitle"></span> : <span id="matchName"></span></span>
                            <span id="matchCoin" class="match_result_rating"></span>
                        </h5>

                        <div class="select_bet_match_information">

                            <div style="display:none;" class="bet_result bet_slip_error"><br></div>
                            <div class="betSuccessMsg" style="display:none;background-color:green;color:#fff;padding:10px"></div>

                            <div class="betlimit">Bet limit is 20 to 8000<br></div>
                            <div class="betslipQ">Q: <span id="betTitle" class="modal_match_q"></span></div>
                            <div class="betslipA">A: <span id="betOption" class="modal_match_ans"></span></div>
                        </div>

                        <div class="rating_option_line">
                            <div class="rating_stake_field">
                                <form>
                                    <input id="option_details_id" type="hidden" name="option_details_id">
                                    <div class="form-group">
                                        <input min="2" max="6" type="text" class="form-control stake_inputbox" id="stake" value="20" data-betmin="20" data-betmax="8000">
                                    </div>
                                </form>
                            </div>

                            <div class="to_return_box">
                                To Return <span class="return_amount">0.00</span>
                            </div>
                        </div>
                    </div>
                    <!--bet slip 01-->


                    <!--bid button-->
                    <div class="place_bid_button_line">
                        <button id="betBtn" class="btn btn-success place_bid_custom_btn" data-match="14884" data-q="53981" data-ans="184367">Place Bet</button>
                        <button id="closeBtn" style="width:100%;display:none;" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                    <!--bid button-->

                </div>
            </div>
            <!--end common block-->
        </div>
  </div>
</div>

<!-- login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:red">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please login to continue
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="<?php echo base_url(); ?>login">Login</a>
        <a class="btn btn-primary" href="<?php echo base_url(); ?>register">Signup</a>
      </div>
    </div>
  </div>
</div>

<!-- error modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:red">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="errorModalBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- success modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:green">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="errorModalBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include(APPPATH . "views/customer/footer.php"); ?>

<script>

    // Numeric only control handler
    jQuery.fn.ForceNumericOnly =
    function()
    {
        return this.each(function()
        {
            $(this).keydown(function(e)
            {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });
        });
    };

    function showBetModal(coin, id) {

        $("#betBtn").show();
        $("#closeBtn").hide();
        $(".betSuccessMsg").hide();
        $(".betSuccessMsg").text("");
        $(".bet_slip_error").hide();
        $(".bet_slip_error").text("");

        var coin_rate = parseFloat(coin);
        var id = id;

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'betscore/check_init_bet';

        // ajax request
        $.ajax({
            type: "POST",
            url: url,
            data: {
                option_details_id: id,
                coin_rate: coin_rate,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);

                if(data.error==0) {

                    var coin = parseFloat(data.get_data.option_coin);
                    var option_id = data.get_data.id;
                    var option_title = data.get_data.option_title;
                    var match_title = data.get_data.title;
                    var bet_title = data.get_data.match_option_title;
                    var league_title = data.get_data.league_title;
                    var amount = coin*20;
                    amount = amount.toFixed(2);
                    $("#option_details_id").attr("value", option_id);

                    $("#leagueTitle").text(league_title);
                    $("#matchName").text(match_title);
                    $("#matchCoin").text(coin.toFixed(2));
                    $("#betTitle").text(bet_title);
                    $("#betOption").text(option_title);
                    $(".return_amount").text(amount);
                    $("#betModalBox").modal('show');


                    $("#stake").val(20);
                    $("#stake").on("keyup", function() {
                        $(this).ForceNumericOnly();
                        var coinAmount = $(this).val();
                        coinAmount = parseFloat(coinAmount);

                        if(coinAmount < 20 || coinAmount > 8000 || !coinAmount) {
                            $(".bet_slip_error").show();
                            $(".bet_slip_error").text("Error! Bet limit is 20 to 8000");
                            $(".place_bid_custom_btn").attr('disabled', true);
                            return;
                        }
                        else {
                            $(".bet_slip_error").text("");
                            $(".bet_slip_error").hide();
                            $(".place_bid_custom_btn").attr('disabled', false);
                        }

                        totalAmount = coinAmount*coin;
                        if(isNaN(totalAmount)) {
                            totalAmount = 0;
                        }
                        totalAmount = totalAmount.toFixed(2);
                        $(".return_amount").text(totalAmount);
                    });

                }
                else if(data.error == 1) {
					swal(
						{
							title: "Please login to continue",
							type: "error",
							timer: 2000,
							showConfirmButton: true
						}
					);
                }
                else if(data.error == 2 || data.error == 3) {
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
            error:function(exception){
                // console.log(exception);
            }
        });

    }

    // bet submission code
    $("button#betBtn").on("click", function() {
        var optionDetailsId = $("#option_details_id").val();
        var userBet = parseFloat($("#stake").val());
        var exObj = $(this);

        var url_prefix = "<?php echo base_url(); ?>";
        url = url_prefix + 'submit_user_bet';

        // ajax request
        $.ajax({
            type: "POST",
            url: url_prefix + 'customeruser/submit_user_bet',
            data: {
                option_details_id: optionDetailsId,
                user_bet: userBet 
            },
            beforeSend: function() {
                exObj.attr('disabled', true);
                exObj.text("Please wait.....");
                // $('#betModalBox').modal('hide');
            },
            dataType: 'json',
            success: function(data) {
                exObj.attr('disabled', false);
                exObj.text("Place Bet");

                $("#betBtn").hide();
                $("#closeBtn").show();

                if(data.error == 0) {
                    $(".betSuccessMsg").show();
                    $(".betSuccessMsg").text(data.success_msg);
                }
                else if(data.error == 1) {
                    $(".bet_slip_error").show();
                    $(".bet_slip_error").text(data.error_msg);
                }
                else if(data.error == 2 || data.error == 3) {
                    $(".bet_slip_error").show();
                    $(".bet_slip_error").text(data.error_msg);
                }
            },
            error:function(exception){
                console.log(exception);
            }
        });

        /*console.log(optionDetailsId);
        console.log(userBet);*/
    });

</script>
