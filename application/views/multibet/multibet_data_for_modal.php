            <div style="display:none;background-color:#ef5350;color:#fff;padding:5px;text-align:center;margin-top:2px;" class="bet_result bet_slip_error"></div>
            <div class="betSuccessMsg"
                 style="display:none;background-color:green;color:#fff;padding:10px"></div>

            <form id="submitMultiBetForm">
                
                <input id="bet_type" type="hidden" name="bet_type" value="single_bet">
                <div class="coupon__bets">
                    <div class="">
                        <div mode="in-out" class="o-bet-box-list">

							<?php $total_stake = 0; foreach($get_data as $val) : $total_stake = $total_stake+$val->multi_option_coin; ?>

	                            <div id="betBox_<?= $val->id; ?>" class="o-bet-box-list__item">

                                    <input id="multibet_rate_<?= $val->id; ?>" type="hidden" value="<?= $val->multi_option_coin; ?>">
	                                <div class="c-bet-box">

	                                    <div class="c-bet-box__header c-bet-box__header--single">
	                                        <button onclick='return betCloseButton("<?= $val->id ?>")' type="button" class="c-bet-box__del c-btn--close c-btn--flat c-btn--size-s c-btn c-btn--icon-only"><i class="c-btn__icon"></i></button>

	                                        <div class="c-bet-box__liga u-f-row u-jcfs u-f-nowrap c-bet-box__row">
	                                            <div class="c-bet-box__img-con">
	                                            	<?php if($val->sportscategory_id == 6) { ?>
	                                                	<img src="<?php echo get_admin_url() ?>assets/img/icon/football.png" alt="">
	                                                <?php } else if($val->sportscategory_id == 2) { ?>
														<img src="<?php echo get_admin_url() ?>assets/img/icon/6.png" alt="">
	                                                <?php } else { ?>
														<img src="<?php echo get_admin_url() ?>assets/img/icon/tennis.png" alt="">
	                                                <?php } ?>
	                                            </div>
	                                            <div class="c-bet-box__sport">
	                                                <?php echo $val->title; ?> :- <?php echo $val->league_title; ?>
	                                                <!-- <div class="c-bet-box__live">
	                                                    <span class="c-bet-box__live-label">Live</span>
	                                                    <span class="c-bet-box__score">0 : 0</span>
	                                                </div> -->
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="c-bet-box__content">
	                                        <div class="u-f-nowrap c-bet-box__teams c-bet-box__row">
	                                            <div class="c-bet-box__col">
	                                                <div data-v-f5a92e0a="" class="c-bet-box__row u-f-row u-jcfs u-f-nowrap">
	                                                    <div data-v-f5a92e0a="" class="c-bet-box__img-con">
	                                                        <img src="<?php echo get_admin_url() ?>assets/img/flag/<?php echo $val->icon1 ?>" alt="" class="c-bet-box__img">
	                                                    </div>
	                                                    <?php echo $val->team1; ?>
	                                                </div>
	                                                <div class="c-bet-box__row u-f-row u-jcfs u-f-nowrap">
	                                                    <div class="c-bet-box__img-con">
	                                                        <img src="<?php echo get_admin_url() ?>assets/img/flag/<?php echo $val->icon2 ?>" alt="" class="c-bet-box__img">
	                                                    </div>
	                                                    <?php echo $val->team2; ?>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="c-bet-box__row u-f-row c-bet-box__row--no-wrap" style="margin-left:5px">
	                                            <div class="c-bet-box__market">Q: <?php echo $val->match_option_title; ?></div>
	                                            <div class="c-bet-box__bet single-bet-coin"><?php echo $val->option_coin; ?></div>
	                                        </div>
	                                        <div class="c-bet-box__row u-f-row c-bet-box__row--no-wrap" style="margin-left:5px">
	                                            <div class="c-bet-box__market">A: <?php echo $val->option_title; ?></div>
	                                        </div>
	                                    </div>

	                                    <div class="c-bet-box__spinner c-spinner c-spinner--single single-bet-div">
	                                        <button onclick="return singleMinusStack(<?= $val->id; ?>);" type="button" class="c-btn c-btn--icon-only c-spinner__btn">
	                                            <i aria-hidden="true" class="fa fa-minus"></i>
	                                        </button>
	                                        <input autocomplete="off" type="text" name="single_bet_box[]" class="c-spinner__input single-bet-box single_input_<?= $val->id; ?>" value="100">
	                                        <button class="c-btn c-btn--icon-only c-spinner__btn c-spinner__btn--reset">
	                                            <i aria-hidden="true" class="fa fa-times"></i>
	                                        </button>
	                                        <button onclick="return singlePlusStack(<?= $val->id; ?>);" type="button" class="c-btn c-btn--icon-only c-spinner__btn">
	                                            <i aria-hidden="true" class="fa fa-plus"></i>
	                                        </button>
	                                    </div>
	                                </div>

	                            </div>
                            <?php endforeach; ?>
                            <input type="hidden" id="ratio" value="<?php echo number_format($total_stake, 2); ?>">

                        </div>
                    </div>
                </div>

                <div class="coupon__settings">
                    <div class="grid grid--custom-offset u-npv coupon__type-selector">
                        <div class="grid__inner coupon-grid__main">
                            <div class="grid__cell grid__cell--span-6 grid__cell--span-br-7 grid__cell--span-bsr-8">
                                <div tabindex="0" class="multiselect coupon-select multiselect--above">

                                    <div class="multiselect__tags">
                                        <select name="multiselect__single" class="multiselect__single" id="multiselect__single" style="font-size:12px;color:#000;width:120px !important;height:30px;font-weight:bold;background-color:#ffbb33;">
                                            <option value="Singles">Single Bet</option>
                                            <?php if($enable_multibet=='YES') : ?>
                                                <option value="Multibet">Multibet</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="coupon-grid__cell grid__cell  grid__cell--span-6 grid__cell--span-br-5 grid__cell--span-bsr-4">
                                <button type="button" id="MultiBetclear" class="c-btn c-btn--block c-btn--theme-lightest" style="background-color:#0099CC;color:#FFF;font-size:12px;">
                                    <i class="c-btn__icon fa fa-trash" style="color:red"></i>
                                    <span class="c-btn__text" style="font-weight:bold">Clear</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="coupon__bet-settings">
                        <div class="grid coupon-grid coupon-grid--theme-light u-npv">
                            <div class="grid__inner">
                                <div class="coupon-grid__cell grid__cell grid__cell--span-12">
                                    <div class="coupon-grid__row">
                                        <div class="coupon__text ">Overall odds</div>
                                        <input id="inputMultibetRatio" type="hidden">
                                        <div class="coupon__text coupon__text--big coupon__end-coef u-mla multibet-ratio">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="coupon-grid__cell grid__cell grid__cell--span-6">
                                    <div class="coupon-grid__row">
                                        <div class="coupon__text">Stake</div>
                                        <div class="c-dropdown coupon__dropdown coupon__dropdown--settings">
                                            <div class="c-dropdown__trigger">
                                                <button type="button" class="c-btn c-btn--size-s c-btn--icon-only c-btn--flat c-btn--flat-shade">
                                                    <span class="c-btn__icon fa fa-cog"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="coupon-grid__cell grid__cell grid__cell--span-6">
                                    <div class="c-spinner c-spinner--cover-height c-spinner--theme-lightest coupon__spinner">
                                        <button type="button" onclick="return minusStack();" class="c-btn c-btn--icon-only c-spinner__btn">
                                            <i  class="c-btn__icon c-btn__icon--minus"></i>
                                        </button>
                                        <input id="inputTotalStack" type="text" name="input_total_stack" class="c-spinner__input bet_sum_input" value="100" autocomplete="off">
                                        <button type="button" onclick="return plusStack();" class="c-btn c-btn--icon-only c-spinner__btn">
                                            <i class="c-btn__icon c-btn__icon--plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid coupon-grid coupon-grid--full-width u-npv">
                            <div class="grid__inner">
                                <div class="coupon-grid__cell grid__cell grid__cell--span-12 grid__cell--span-bsr-6">
                                    <div class="coupon-grid__row">
                                        <span class="coupon__text">Minimum stake</span>
                                        <span style="text-decoration:none;" class="c-btn c-btn--flat c-btn--link coupon__text u-fw-500 u-mla"><?php echo get_bet_min_max()->bet_limit_min; ?></span>
                                    </div>
                                </div>

                                <div class="coupon-grid__cell grid__cell grid__cell--span-12 grid__cell--span-bsr-6">
                                    <div class="coupon-grid__row">
                                        <span class="coupon__text">Maximum stake</span>
                                        <span style="text-decoration:none;" class="c-btn c-btn--flat c-btn--link coupon__text u-fw-500 u-mla"><?php echo get_bet_min_max()->bet_limit_max; ?></span>
                                    </div>
                                </div>

                                <div class="coupon-grid__cell grid__cell grid__cell--span-12 grid__cell--span-bsr-6">
                                    <div class="grid coupon-grid coupon-grid--full-width u-npv">
                                        <div class="grid__inner">
                                            <div class="coupon-grid__cell grid__cell grid__cell--span-12">
                                                <div id="possible-winning" class="coupon-grid__row" style="display:none;">
                                                    <span class="coupon__text">Minimum possible winnings</span>
                                                    <span id="possible-winning-val" class="coupon__text u-fw-500 u-mla"><?php echo number_format($total_stake, 2)*100; ?> BDT</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div>&nbsp;</div>
                    </div>

                    <div class="grid coupon-btn-group u-npv">
                        <div class="grid__inner coupon-flex">
                            <div class="grid__cell grid__cell--span-12 grid__cell--span-br-6 grid__cell--span-bsr-6">
                                <div class="coupon-btn-group__item">
                                    <button style="font-weight:12px" onclick="submitMultiBetForm();" type="button" class="c-btn c-btn--size-l c-btn--block c-btn--theme-brand u-upcase instant-bet">
                                        Instant bet
                                    </button>

                                    <!-- <input id="submitButton" type="button" class="c-btn c-btn--size-l c-btn--block c-btn--theme-brand u-upcase instant-bet"> -->
                                </div>
                            </div>

                            <div class="grid__cell grid__cell--span-12 grid__cell--span-br-6 grid__cell--span-bsr-6">
                                <div class="coupon-btn-group__item">
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="c-btn c-btn--size-l c-btn--block c-btn--gradient c-btn--gradient-accent u-upcase">
                                        Save
                                    </button>
                                </div>
                            </div>

                            <div class="coupon-grid__cell grid__cell grid__cell--span-12 grid--align-center">
                                <div class="coupon-grid__row coupon__text coupon__text--accent u-jcc u-grow">
                                    <a class="coupon__link">Bet slip for single & multibet</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="grid coupon-grid coupon-grid--full-width u-cp-grid-p-t u-npv">
                        <div class="grid__inner">
                            <div class="coupon-grid__cell grid__cell grid__cell--span-12">
                                <div class="c-dropdown coupon__dropdown coupon__dropdown--full u-8pt-ph-0 c-dropdown--classic">
                                    <div class="c-dropdown__trigger">
                                        <div class="coupon__text coupon-grid__row">Save/load bet slip</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

            </form>