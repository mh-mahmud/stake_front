<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'betscore';
$route['404_override'] = 'ErrorPage';
$route['translate_uri_dashes'] = FALSE;

// $route['admin_login'] = 'welcome/admin_login';


// $route['match_details/view/:any'] = 'betscore/view_details';

// $route['remove_match/:any'] = 'betscore/remove_match'; 

$route['login'] = 'betscore/login';
$route['signin'] = 'betscore/singIn';
$route['login_success_clr'] = 'betscore/login_success_clr';
$route['logout'] = 'betscore/logout';
$route['forgot-password'] = 'betscore/forgot_password';
$route['reset-password'] = 'betscore/reset_password';
$route['bsclub'] = 'betscore/club_login';
// $route['em_access'] = 'betscore/em_access';

$route['ref_login'] = 'betscore/ref_registration';

$route['statement'] = 'customeruser/statement';
$route['submit_complain'] = 'customeruser/submit_complain';
$route['update_club'] = 'customeruser/update_club';
$route['update_password'] = 'customeruser/update_password';
$route['update_profile'] = 'customeruser/update_profile';
$route['withdraw'] = 'customeruser/withdraw';
$route['withdraw_history'] = 'customeruser/withdraw_history';
$route['view_profile'] = 'customeruser/view_profile';
$route['bet_history'] = 'customeruser/bet_history';
$route['multi_bet_history'] = 'customeruser/multi_bet_history';
$route['complain_history'] = 'customeruser/complain_history';
$route['deposit_history'] = 'customeruser/deposit_history';
$route['deposit_coin'] = 'customeruser/make_deposit';
$route['my_followers'] = 'customeruser/my_followers';
$route['coin_transfer'] = 'customeruser/coin_transfer';
$route['coin_transfer_history'] = 'customeruser/coin_transfer_history';

// -- Route for club users
$route['club_profile'] = 'clubuser/club_profile';
$route['club_profile_update'] = 'clubuser/club_profile_update';
$route['match_bit_coin'] = 'clubuser/match_bit_coin';
$route['match_bit_coin_history'] = 'clubuser/match_bit_coin_history';
$route['customer_withdraw'] = 'clubuser/customer_withdraw';
$route['user_balance_transfer'] = 'clubuser/user_balance_transfer';
$route['user_history'] = 'clubuser/user_history';
$route['club_withdraw'] = 'clubuser/club_withdraw';
$route['club_withdraw_history'] = 'clubuser/club_withdraw_history';
$route['customer_statement'] = 'clubuser/customer_statement';
$route['customer_complain'] = 'clubuser/customer_complain';

// -- Ajax request
$route['get_registration_var_code'] = 'betscore/get_registration_var_code';

// -- ajax form load index page
$route['get_bet_all'] = 'Betoption';
$route['get_bet_by_cat'] = 'Betoption/get_bet_by_cat';
$route['live_bets_by_single_match'] = 'Betscore/live_match_details';

$route['upcoming_get_bet_all'] = 'Betoption/upcoming_get_bet_all';
$route['adv_bets_by_cat'] = 'Betoption/upcoming_get_bet_by_cat';
$route['adv_bets_by_single_match'] = 'Betscore/upcoming_match_details';



$route['get_all_count'] = 'Jsquerytimer/all_game_count_ajax_request';

// right side bar ajax call
$route['up_bet_tab'] = 'Jsquerytimer/upcomming_bet_tab_ajax';
$route['up_score'] = 'Jsquerytimer/upcomming_score_ajax';


// score slider ajax call
$route['f_s_s'] = 'Betoption/football_score_slider';
$route['c_s_s'] = 'Betoption/cricket_score_slider';

//game_page_route

$route['game/:any'] = "Game/index";

//balance check user

$route['coin_check'] = "customeruser/cehckAjaxUserBal";
$route['user_login_by_admin/:any'] = "Betscore/user_login_by_admin";
$route['club_login_by_admin/:any'] = "Betscore/club_login_by_admin";

// game routes
$route['ludu'] = "Betscore/ludu_game";
$route['coin'] = "Betscore/coin_game";
$route['dice'] = "Betscore/dice_game";
$route['action_coin'] = "Betscore/action_coin";
$route['action_ludu'] = "Betscore/action_ludu";


$route['coin-game-history'] = "customeruser/coin_game_history";
$route['ludu-game-history'] = "customeruser/ludu_game_history";
$route['dice-game-history'] = "customeruser/dice_game_history";