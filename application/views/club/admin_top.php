        <div class="footer-top-right">
            <ul><!----><!----><!---->
                <li>
                    <div class="sign-up-area after-login">
                        <a aria-expanded="false" aria-haspopup="true" class="logged-in-user"data-toggle="dropdown" href="#"><!---->
                            <span class="user-balance">
                                <span class="top-balance">_mh_ (CLUB)</span>
                            </span>
                            <span class="dropdown-icon">
                                <i class="zmdi zmdi-chevron-down"></i>
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right after-login-dropdown-menu purple-megenta-bg-gradient">
                            <div class="balance-type-area">
                                <div class="single-balance-type">
                                    <div class="header-text">Club Balane</div>
                                    <div class="amount-text">1000.00 Coins</div>
                                </div>
                                <div class="single-balance-type">
                                    <div class="header-text">Club User</div>
                                    <div class="amount-text">50</div>
                                </div>
                            </div>
                            <div class="dropdown-balance-area">
                                <a class="deposit-link-boxed" routerlink="/wallet/make-deposit"
                               href="<?php echo base_url('club_withdraw'); ?>">Withdraw</a>
                           </div>
                            <div class="nav">
                                <a class="nav-item <?php menu_active_route('club_profile'); ?>" routerlink="/profile" routerlinkactive="active" href="<?php echo base_url('club_profile'); ?>">Club Profile</a>
                                <a class="nav-item <?php menu_active_route('match_bit_coin'); ?>" routerlink="/wallet/make-deposit" routerlinkactive="active" href="<?php echo base_url('match_bit_coin'); ?>">Match Bit Coin</a>
                                <a class="nav-item <?php menu_active_route('club_withdraw'); ?>" routerlink="/wallet/withdraw" routerlinkactive="active" href="<?php echo base_url('club_withdraw'); ?>">Withdraw</a>
                                <a class="nav-item <?php menu_active_route('customer_complain'); ?>" routerlink="/support" routerlinkactive="active" href="<?php echo base_url('customer_complain'); ?>">Support</a>
                                <a class="nav-item" href="<?php echo base_url('logout'); ?>">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li><!---->
                <li>
                    <div class="sign-up-area after-login"><!---->
                        <a class="logged-in-user top-up-area" routerlink="/wallet/make-deposit" href="<?php echo base_url('club_withdraw'); ?>"><!---->
                            <span class="user-balance"><!---->
                                <span class="top-up-text h-40" style="background-color:orange;color:#333">Withdraw</span>
                            </span>
                        </a>
                    </div>
                </li>
                <!-- <li>
                    <div class="header-time">01:33:13 PM</div>
                </li> -->
            </ul>
        </div>
