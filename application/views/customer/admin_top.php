        <div class="footer-top-right">
            <ul><!----><!----><!---->
                <li>
                    <div class="sign-up-area after-login">
                        <a aria-expanded="false" aria-haspopup="true" class="logged-in-user"data-toggle="dropdown" href="#"><!---->
                            <span class="user-balance">
                                <span class="top-balance">_mh_</span>
                            </span>
                            <span class="dropdown-icon">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right after-login-dropdown-menu purple-megenta-bg-gradient">
                            <div class="balance-type-area">
                                <div class="single-balance-type">
                                    <div class="header-text">Main Balane</div>
                                    <div class="amount-text">0.00 Coins</div>
                                </div>
                                <div class="single-balance-type">
                                    <div class="header-text">Bonus Credits</div>
                                    <div class="amount-text">0.00 Coins</div>
                                </div>
                            </div>
                            <div class="dropdown-balance-area">
                                <a class="deposit-link-boxed" href="<?php echo base_url('deposit_coin'); ?>">Top Up</a>
                           </div>
                            <div class="nav">
                                <a class="nav-item <?php menu_active_route('view_profile'); ?>" href="<?php echo base_url('view_profile'); ?>">Personal Profile</a>
                                <a class="nav-item <?php menu_active_route('deposit_coin'); ?>" href="<?php echo base_url('deposit_coin'); ?>">Make Deposit</a>
                                <a class="nav-item <?php menu_active_route('withdraw'); ?>" href="<?php echo base_url('withdraw'); ?>">Withdraw</a>
                                <a class="nav-item <?php menu_active_route('submit_complain'); ?>" href="<?php echo base_url('submit_complain'); ?>">Support</a>
                                <a class="nav-item" href="<?php echo base_url('logout'); ?>">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li><!---->
                <li>
                    <div class="sign-up-area after-login"><!---->
                        <a class="logged-in-user top-up-area" href="<?php echo base_url('deposit_coin'); ?>"><!---->
                            <span class="user-balance"><!---->
                                <span class="top-up-text h-40" style="background-color:blue;color:#fff">Recharge</span>
                            </span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="header-time"></div>
                </li>
            </ul>
        </div>
