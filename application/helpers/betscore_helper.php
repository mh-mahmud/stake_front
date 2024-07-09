<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('menu_active_route')) {

    function menu_active_route($route_name)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        if($route_name == $ci->uri->segment(1)) {
            echo "active";
        }
    }
}

if(! function_exists('date_time')){
    function date_time(){ 
        return date('Y-m-d H:i:s');
    }
}

if(! function_exists('date_today')){
    function date_today(){ 
        return date('Y-m-d');
    }
}

if (!function_exists('menu_active_route_parent')) {
//	$route_name = array();
    function menu_active_route_parent($route_name)
    {
        $ci =& get_instance();
        $ci->load->helper('url');
        if (in_array($ci->uri->segment(1),$route_name)){
			echo "show";
		}
//        if($route_name == $ci->uri->segment(1)) {
//            echo "show";
//        }
    }
}

if (!function_exists('get_user_current_balance')) {

    function get_user_current_balance($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('current_balance');
        $CI->db->from('my_coin');
        $CI->db->where('user_id', $user_id);
        $CI->db->order_by("id", "desc");
        $CI->db->limit(1);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->current_balance;
        }
        return 0;
    }
}

if (!function_exists('get_user_club_id')) {

    function get_user_club_id($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('club_id');
        $CI->db->from('users');
        $CI->db->where('id', $user_id); 
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->club_id;
        }
        return 0;
    }
}

if (!function_exists('get_user_club_bonus')) {

    function get_user_club_bonus($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('club_bonus');
        $CI->db->from('users');
        $CI->db->where('id', $user_id); 
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->club_bonus;
        }
        return 0;
    }
}

if (!function_exists('get_club_current_balance')) {

    function get_club_current_balance($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('current_balance');
        $CI->db->from('club_coin');
        $CI->db->where('club_id', $user_id);
        $CI->db->order_by("id", "desc");
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->current_balance;
        }
        return 0;
    }
}

if (!function_exists('get_user_club_ratio')) {

    function get_user_club_ratio($club_id)
    {
        $CI =& get_instance();
        $CI->db->select('club_ratio');
        $CI->db->from('club_users');
        $CI->db->where('id', $club_id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->club_ratio;
        }
        return 0;
    }
}

if (!function_exists('get_user_fullname')) {

    function get_user_fullname($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('name');
        $CI->db->from('users');
        $CI->db->where('id', $user_id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->name;
        }
        return '';
    }
}


if (!function_exists('get_user_username')) {

    function get_user_username($user_id)
    {
        $CI =& get_instance();
        $CI->db->select('username');
        $CI->db->from('users');
        $CI->db->where('id', $user_id);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->username;
        }
        return '';
    }
}

if (!function_exists('get_user_id_by_username')) {

    function get_user_id_by_username($username)
    {
        $CI =& get_instance();
        $CI->db->select('id');
        $CI->db->from('users');
        $CI->db->where('username', $username);
        $query = $CI->db->get();
        if(!empty($query->row())) {
            return $query->row()->id;
        }
        return '';
    }
}

if (!function_exists('sent_otp_code_sms_api')) {
	function sent_otp_code_sms_api($phone, $token)
	{ 
		$apiUrl ="https://app.usasms.net/sms_api_bs";
	 
		$msg = "<#> Use " . $token . " as ONE TIME KEY to complete Betscore24 Operation";
		$key = "294809b10ed4ca82d5c9215b02210cb2";
 
		$curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $apiUrl);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            "simNumber" => $phone,
			"message" => $msg,
			"otpKey" => $token,
			"accessKey" => $key
            ));
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $object = json_decode($buffer);

		return $object->status;
	}
}

if (!function_exists('sent_otp_code_email')) {

	function sent_otp_code_email($em,$token){
 		$ci =& get_instance();
        $config = Array(
		    'protocol' => 'mail',
		    'smtp_host' => 'mail.betscore.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'no-reply@betscore.com',
		    'smtp_pass' => 'SISDHe36673HYSGD',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
	 		
        //Load email library 
	 	
	 	$ci->email->initialize($config);
        $ci->load->library('email'); 
   		$ci->email->set_newline("\r\n");
  
        $ci->email->from('no-reply@betscore24.com', 'BETSCORE24 OTP'); 
        $ci->email->to($em);
        $ci->email->subject('OTP SEND FROM BETSCORE24'); 
        $ci->email->message('Please verify your mail by otp code. Your OTP code is: '.$token); 
        if ($ci->email->send()) {
         	return "success";
        }else{
         	return "failed";
        }
	} 
}


if (!function_exists('bet_history_status_color')) {

	function bet_history_status_color($status)
	{
		switch ($status) {
			case "WIN":
				$res = "<span class=\"badge badge-success\">WIN</span>";
				break;
			case "LOST":
				$res = "<span class=\"badge badge-danger\">LOST</span>";
				break;
			case "USER_CANCEL":
				$res = "<span class=\"badge badge-secondary\">BET CANCEL</span>";
				break;
			case "CANCEL_ADMIN":
				$res = "<span class=\"badge badge-info\">CANCEL</span>";
				break;
			case "MATCH_RUNNING":
				$res = "<span class=\"badge badge-warning\">RUNNING</span>";
				break;
			default:
				break;
		}
		return $res;
	}

}




if (!function_exists('user_active_inactive_bg_color')) {

	function user_active_inactive_bg_color($status)
	{
		switch ($status) {
			case "1":
				$res = "<span class=\"badge badge-success\">Active</span>";
				break;
			case "0":
				$res = "<span class=\"badge badge-danger\">Inactive</span>";
				break;
			default:
				break;
		}
		return $res;
	}

}

if (!function_exists('deposit_history_status_bg_color')) {

	function deposit_history_status_bg_color($status)
	{
		switch ($status) {
			case "SUCCESS":
				$res = "<span class=\"badge badge-success\">SUCCESS</span>";
				break;
			case "CANCEL":
				$res = "<span class=\"badge badge-danger\">CANCEL</span>";
				break;
				case "PENDING":
				$res = "<span class=\"badge badge-warning\">PENDING</span>";
				break;
			default:
				break;
		}
		return $res;
	}

}

if (!function_exists('withdraw_history_status_bg_color')) {

	function withdraw_history_status_bg_color($status)
	{
		switch ($status) {
			case "SUCCESS":
				$res = "<span class=\"badge badge-success\">SUCCESS</span>";
				break;
			case "CANCEL":
				$res = "<span class=\"badge badge-danger\">CANCEL</span>";
				break;
				case "PENDING":
				$res = "<span class=\"badge badge-warning\">PENDING</span>";
				break;
			default:
				break;
		}
		return $res;
	}

}

if (!function_exists('withdraw_history_status_bg_color_club')) {

	function withdraw_history_status_bg_color_club($status)
	{
		switch ($status) {
			case "1":
				$res = "<span class=\"badge badge-success\">SUCCESS</span>";
				break;
			case "2":
				$res = "<span class=\"badge badge-danger\">CANCEL</span>";
				break;
				case "0":
				$res = "<span class=\"badge badge-warning\">PENDING</span>";
				break;
			default:
				break;
		}
		return $res;
	}

}


if (!function_exists('get_copyright_message')) {

	function get_copyright_message()
	{
		$CI =& get_instance();
		$CI->db->select('copyright');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->copyright;
		}
		return '';
	}

}

if (!function_exists('get_live_tv_link')) {

	function get_live_tv_link()
	{
		$CI =& get_instance();
		$CI->db->select('live_tv');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->live_tv;
		}
		return '';
	}

}

if (!function_exists('get_deposit_status')) {

	function get_deposit_status()
	{
		$CI =& get_instance();
		$CI->db->select('isDeposit');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->isDeposit;
		}
		return '';
	}

}

if (!function_exists('get_withdraw_status')) {

	function get_withdraw_status()
	{
		$CI =& get_instance();
		$CI->db->select('isWithdraw');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->isWithdraw;
		}
		return '';
	}

}

if (!function_exists('get_club_withdraw_status')) {

	function get_club_withdraw_status()
	{
		$CI =& get_instance();
		$CI->db->select('isClubWithdraw');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->isClubWithdraw;
		}
		return '';
	}

}

if (!function_exists('get_bet_cancel_time_array')) {

	function get_bet_cancel_time_array()
	{
		$CI =& get_instance();
		$CI->db->select('bet_cancel_time');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->bet_cancel_time;
		}
		return '';
	}
}

if (!function_exists('get_bet_taken_time')) {

	function get_bet_taken_time($id)
	{
		$CI =& get_instance();
		$CI->db->select('created_at');
		$CI->db->from('matchbit_coin');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			$curDate = date("Y-m-d H:i:s");
			$getCurCancelTime =   @(strtotime($curDate)-strtotime($query->row()->created_at))/60;
			return $getCurCancelTime;
		}
		return '';
	}
}

if (!function_exists('get_matchname_status')) {

	function get_matchname_status($id)
	{
		$CI =& get_instance();
		$CI->db->select('status');
		$CI->db->from('matchname');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->status;
		}
		return '';
	}
}

if (!function_exists('get_bet_cancelable')) {

	function get_bet_cancelable($id)
	{
		$CI =& get_instance();
		$CI->db->select('isBetCancelable');
		$CI->db->from('matchname');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->isBetCancelable;
		}
		return '';
	}
}

if (!function_exists('get_min_deposit')) {

	function get_min_deposit()
	{
		$CI =& get_instance();
		$CI->db->select('min_deposit');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->min_deposit;
		}
		return '';
	}
}

if (!function_exists('get_max_deposit')) {

	function get_max_deposit()
	{
		$CI =& get_instance();
		$CI->db->select('max_deposit');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->max_deposit;
		}
		return '';
	}
}

if (!function_exists('get_min_withdraw')) {

	function get_min_withdraw()
	{
		$CI =& get_instance();
		$CI->db->select('min_withdraw');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->min_withdraw;
		}
		return '';
	}
}

if (!function_exists('get_max_withdraw')) {

	function get_max_withdraw()
	{
		$CI =& get_instance();
		$CI->db->select('max_withdraw');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->max_withdraw;
		}
		return '';
	}
}

if (!function_exists('get_min_transfer')) {

	function get_min_transfer()
	{
		$CI =& get_instance();
		$CI->db->select('min_transfer');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->min_transfer;
		}
		return '';
	}
}

if (!function_exists('get_max_transfer')) {

	function get_max_transfer()
	{
		$CI =& get_instance();
		$CI->db->select('max_transfer');
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row()->max_transfer;
		}
		return '';
	}
}

 

if (!function_exists('get_withdraw_per_day')) {
	function get_withdraw_per_day()
	{
		$CI =& get_instance();
		$CI->db->select('withdraw_per_day');
		$CI->db->from('settings');
		$CI->db->where('id', '1'); 
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->row()->withdraw_per_day;
		}
		return 0;
	}
}

 
 

// multimet function

if (!function_exists('get_bet_min_max')) {

	function get_bet_min_max()
	{
		$CI =& get_instance();
		$CI->db->select(['bet_limit_min', 'bet_limit_max', 'multibet_limit','min_balance_for_bet']);
		$CI->db->from('settings');
		$CI->db->where('id', 1);
		$query = $CI->db->get();
		if(!empty($query->row())) {
			return $query->row();
		}
		return '0';
	}
}


//new after UDH

if (!function_exists('get_total_bet_running')) {

	function get_total_bet_running($id)
	{
		$CI =& get_instance();
		$CI->db->select('sum(bet_coin) as bet_total');
		$CI->db->from('matchbit_coin');
		$CI->db->where('match_bit_id', $id); 
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->row()->bet_total;
		}
		return 0;
	}
}

if (!function_exists('get_total_bet_return')) {

	function get_total_bet_return($id)
	{
		$CI =& get_instance();
		$CI->db->select('sum(total_coin) as bet_total');
		$CI->db->from('matchbit_coin');
		$CI->db->where('match_bit_id', $id); 
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->row()->bet_total;
		}
		return 0;
	}
}

 