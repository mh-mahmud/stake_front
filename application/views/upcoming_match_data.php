<div class="tab-content" id="live-in-play-tab-content">

    <div class="tab-pane-1" id="homeSports-tab" role="tabpanel">

        <?php if(!empty($get_data)) : ?>
            <?php foreach($get_data as $val) : ?>
                <div class="ng-star-inserted">
                    <div class="single-match-result">
                        <div class="single-match-result-header">
                            <a class="left-side">
                                <span class="match-infos">
                                    <span class="top-side">
                                        <span><?php echo $val->league_title; ?></span>
                                    </span>
                                    <span class="bottom-side">
                                        <span class="match-team-name"><?php echo $val->title; ?></span>
                                    </span>
                                </span>
                            </a>
                            <div class="right-side">
                                <div class="bottom-side">
                                    <span class="current-time"><?php echo $val->notification; ?></span>
                                </div>
                            </div>
                        </div>

                        <?php
                            $get_bet_data = $this->db->query("SELECT * FROM match_option WHERE match_id='{$val->id}' AND status=1 ORDER BY match_option_serial ASC")->result();

                            $x=rand(10, 10000);
                            $i=$x+$val->id;
                            foreach($get_bet_data as $data) :
                                $options = $this->db->query("SELECT * FROM match_option_details WHERE match_option_id='{$data->id}' ORDER BY option_serial ASC")->result();
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
                                                            <a class="single-match-result-box " title="<?php echo $op->option_title; ?>">
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
            <?php endforeach; ?>
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
