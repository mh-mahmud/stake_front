<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Betscore extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
		$this->load->helper('matchcounter');
		$this->load->library('encryption');
		// $this->session->unset_userdata('cus_data', "");
		// $this->session->unset_userdata('club_user_data', "");
		// $this->session->sess_destroy();
	}

	public function verifyOtpCode()
	{
		$country = $this->input->post('country');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$otp_code = $this->input->post('otp_code');
		$verified_by = $this->input->post('verified_by');
		if ($this->session->userdata('verification_data') != $otp_code) {
			echo json_encode(array('st' => 400, 'error' => 'Invalid otp code submit'));
			return false;
		} else {
			echo json_encode(array(
				'st' => 200,
				'done' => 'Verify! Done',
				'country' => $country,
				'phone' => $phone,
				'email' => $email,
				'otp_code' => $otp_code,
				'verified_by' => $verified_by
			));
			return false;
		}
	}

	/*public function final_step_reg()
	{

		if (isset($_POST['club_id_f'])) {
			$club_id = $_POST['club_id_f'];
            
			$username = $_POST['username_f'];
			$verified_by = $_POST['verified_by_f'];
			$country = $_POST['country_f'];
			$email = $_POST['email_f'];
			$phone = $_POST['phone_f'];
			$password = $_POST['cpassword_f'];
			$otp_code = $_POST['otp_f'];
			$sponsor_id = get_user_id_by_username($_POST['sponsorname_f']);
		 
			
			if ($this->session->userdata('verification_data') != $otp_code) {
				echo json_encode(array('st' => 400, 'error' => 'Invalid! Your Information'));
				return false;
			}
			$chk_data = $this->db->query("SELECT * FROM users WHERE username='{$username}'")->row();
			
			if (!empty($chk_data)) {
				$data['st'] = 400;
				$data['error'] = "This username already in used";
				echo json_encode($data);
				return false;
			}

			if (empty($sponsor_id)) {
				$data['st'] = 400;
				$data['error'] = "Please give valid sponsorname";
				echo json_encode($data);
				return false;
			}
			
			if (empty($club_id)) {
				$data['st'] = 400;
				$data['error'] = "Please register with a club";
				echo json_encode($data);
				return false;
			}
			
			if ($club_id==0) {
				$data['st'] = 400;
				$data['error'] = "Please register with a club";
				echo json_encode($data);
				return false;
			}

			$data_arr = array(
				'club_id' => $club_id,
				'name' => $username,
				'username' => $username,
				'verified_by' => $verified_by,
				'country' => $country,
				'email' => $email,
				'phone' => $phone,
				'password' => md5($password),
				'otp_code' => $otp_code,
				'sponsor_id' => $sponsor_id,
				'status' => 1,
				'created_at' => date("Y-m-d H:i:s")
			);
			 
			$this->db->insert('users', $data_arr);
			$this->session->set_userdata('verification_data', "");
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id', $this->db->insert_id());
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();
			$this->session->set_userdata('cus_data', $result);
//			redirect(base_url('/'));
			echo json_encode(array('st' => 200, 'done' => 'Registration successfully done'));
		}
		else{
		    	$data['st'] = 400;
				$data['error'] = "Invaild Request, Try again";
				echo json_encode($data);
				return false;
		}
	}*/
	

	public function final_step_reg()
	{

		if (isset($_POST['club_id_f'])) {
			$club_id = $_POST['club_id_f'];
			$username = $_POST['username_f'];
			// $verified_by = $_POST['verified_by_f'];
			$country = $_POST['country'];
			// $email = $_POST['email_f'];
			$phone = $_POST['phone'];
			$password = $_POST['cpassword_f'];
			// $otp_code = $_POST['otp_f'];
			$sponsor_id = get_user_id_by_username($_POST['sponsorname_f']);
		 
			
			/*if ($this->session->userdata('verification_data') != $otp_code) {
				echo json_encode(array('st' => 400, 'error' => 'Invalid! Your Information'));
				return false;
			}*/

			$chk_data = $this->db->query("SELECT * FROM users WHERE username='{$username}'")->row();
			$chk_phone = $this->db->query("SELECT * FROM users WHERE phone='{$phone}'")->row();

			if(!empty($phone)) // phone number is not empty
			{
			    if(preg_match('/^\d{11}$/',$phone)) // phone number is valid
			    {
			      $phone = $phone;

			      // your other code here
			    }
			    else // phone number is not valid
			    {
					$data['st'] = 400;
					$data['error'] = "phone number is not valid";
					echo json_encode($data);
					return false;
			    }
			}
			else // phone number is empty
			{
				$data['st'] = 400;
				$data['error'] = "phone number is empty";
				echo json_encode($data);
				return false;
			}
			
			if (!empty($chk_data)) {
				$data['st'] = 400;
				$data['error'] = "This username already in used";
				echo json_encode($data);
				return false;
			}

			if (!empty($chk_phone)) {
				$data['st'] = 400;
				$data['error'] = "This phone already in used";
				echo json_encode($data);
				return false;
			}

			if (empty($sponsor_id)) {
				$data['st'] = 400;
				$data['error'] = "Please give valid sponsorname";
				echo json_encode($data);
				return false;
			}
			
			if (empty($club_id)) {
				$data['st'] = 400;
				$data['error'] = "Please register with a club";
				echo json_encode($data);
				return false;
			}
			
			if ($club_id==0) {
				$data['st'] = 400;
				$data['error'] = "Please register with a club";
				echo json_encode($data);
				return false;
			}

			$data_arr = array(
				'club_id' => $club_id,
				'name' => $username,
				'username' => $username,
				// 'verified_by' => $verified_by,
				'country' => $country,
				// 'email' => $email,
				'phone' => $phone,
				'password' => md5($password),
				// 'otp_code' => $otp_code,
				'sponsor_id' => $sponsor_id,
				'status' => 1,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->session->set_userdata('cus_data', "");
			$this->session->set_userdata('club_user_data', "");
			$this->db->insert('users', $data_arr);
			$this->session->set_userdata('verification_data', "");
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id', $this->db->insert_id());
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();
			$this->session->set_userdata('cus_data', $result);
			echo json_encode(array('st' => 200, 'done' => 'Registration successfully done'));
		}
		else{
		    	$data['st'] = 400;
				$data['error'] = "Invaild Request, Try again";
				echo json_encode($data);
				return false;
		}
	}


	public function get_registration_var_code()
	{
		$verified_by = $_POST['verified_by'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$data = [];

		$token = mt_rand(100000, 999999);
		if ($verified_by == 'phone') {

			if (substr($phone, 0, 2)!="01") {
				$data['success'] = 0;
				$data['message'] = "Phone number incorrect, try wihtout code: like 01xxxxx...";
				echo json_encode($data);
				return false;
			}

			if (strlen($phone)!="11") {
				$data['success'] = 0;
				$data['message'] = "Phone number incorrect, try with 11 digit";
				echo json_encode($data);
				return false;
			}

			// -- check dublicacy
			$chk_data = $this->db->query("SELECT * FROM users WHERE phone='{$phone}'")->row();
			if (!empty($chk_data)) {
				$data['success'] = 0;
				$data['message'] = "This phone number already in used";
				echo json_encode($data);
				return false;
			}


			// -- send sms
			if (sent_otp_code_sms_api($phone, $token) == "success") {
				$this->session->set_userdata('verification_data', '');
				$this->session->set_userdata('verification_data', $token);
				$data['success'] = 1;
				$data['message'] = "Verification code send to your " . $verified_by;
				$data['verfiyOp'] = $verified_by;
				$data['phone'] = $phone;
				$data['email'] = $email;
				$data['country'] = $country;
				echo json_encode($data);
				return false;
			} else {
				$data['success'] = 0;
				$data['message'] = "Invalid data provided";
				echo json_encode($data);
				return false;
			}



		} else if ($verified_by == 'email') {

			$chk_data = $this->db->query("SELECT * FROM users WHERE email='{$email}'")->row();
			if (!empty($chk_data)) {
				$data['success'] = 0;
				$data['message'] = "This email address already in used";
				echo json_encode($data);
				return false;
			}

 

			if (sent_otp_code_email($email, $token) == "success") {
				$this->session->set_userdata('verification_data', $token);
				$data['success'] = 1;
				$data['message'] = "Verification code send to your " . $verified_by;
				$data['verfiyOp'] = $verified_by;
				$data['phone'] = $phone;
				$data['email'] = $email;
				$data['country'] = $country;
				echo json_encode($data);
				return false;
			} else {
				$data['success'] = 0;
				$data['message'] = "Mail sending failed";
				echo json_encode($data);
				return false;
			}


		} else {
			$data['success'] = 0;
			$data['message'] = "Invalid data provided";
			echo json_encode($data);
			return false;
		}
	}

	public function get_otp_for_reset_pass()
	{
		$this->session->set_userdata('reset_user_id', "");
		$this->session->set_userdata('reset_user_token', "");

		$data = array();
		$inputPhoneOrEmail = $_POST['inputPhoneOrEmail'];
		if (is_numeric($inputPhoneOrEmail) && strlen($inputPhoneOrEmail) == 11) {

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('phone', $inputPhoneOrEmail);
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();
		} else if (filter_var($inputPhoneOrEmail, FILTER_VALIDATE_EMAIL)) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('email', $inputPhoneOrEmail);
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row();
		} else {

			echo json_encode(array('st' => 400, 'error' => 'Enter valid email or phone to reset'));
			return false;
		}

		if (!empty($result) && isset($result)) {

			if ($query->num_rows() == 1) {
				$token = mt_rand(100000, 999999);
				if (is_numeric($inputPhoneOrEmail) && strlen($inputPhoneOrEmail) == 11) {
					$ee = sent_otp_code_sms_api($inputPhoneOrEmail, $token);
					if ( $ee == "success") {
						$this->session->set_userdata('reset_user_id', $result->id);
						$this->session->set_userdata('reset_user_token', $token);
						echo json_encode(array('st' => 200, 'success' => 'OTP sent successfully'));
						return;
					} else if($ee == "failed") {
						echo json_encode(array('st' => 400, 'error' => 'Otp Sent Failed'));
						return;
					} else {
						echo json_encode(array('st' => 400, 'error' => 'Invalid Phone input'));
						return;
					}
				} else {
//					email verfication here
					if (sent_otp_code_email($inputPhoneOrEmail, $token) == "success") {
						$this->session->set_userdata('reset_user_id', $result->id);
						$this->session->set_userdata('reset_user_token', $token);
						echo json_encode(array('st' => 200, 'success' => 'OTP sent successfully', 'data' => $token));
						return;
					} else {
						echo json_encode(array('st' => 400, 'error' => 'Invalid Email input'));
						return;
					}

				}
			} else {
				echo json_encode(array('st' => 400, 'error' => 'Invalid Input Number, Please registration first'));
				return;
			}
		} else {
			echo json_encode(array('st' => 400, 'error' => 'Invalid Input Number, Please registration first'));
			return;
		}
	}

	public function otp_verify_for_reset_pass()
	{
		$otp_code = $this->input->post('inputOtp');

		if ($this->session->userdata('reset_user_token') != $otp_code) {
			echo json_encode(array('st' => 400, 'error' => 'Invalid otp code submit'));
			return false;
		}
		if ($this->session->userdata('reset_user_token') == $otp_code) {
			echo json_encode(array('st' => 200, 'code' => $otp_code));
			return false;
		}
	}

	public function reset_forgot_pass_final_step()
	{

		if ($this->input->post('inputNewPass')) {
			$otp_code = $this->input->post('code');
			if ($this->session->userdata('reset_user_token') != $otp_code) {
				echo json_encode(array('st' => 400, 'error' => 'Invalid way to submit'));
				return false;
			}
			$password = $this->input->post('inputNewPass');
			$data_arr = array(
				'password' => md5($password),
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->db->where('id', $this->session->userdata('reset_user_id'));
			$this->db->update('users', $data_arr);
			$this->session->set_userdata('reset_user_id', "");
			$this->session->set_userdata('reset_user_token', "");
			echo json_encode(array('st' => 200, 'done' => 'Successfully Reseted Your Password'));
			return false;
		}
	}

	public function login()
	{
		if (!empty($this->session->userdata('club_user_data')) || !empty($this->session->userdata('cus_data'))) {
			redirect('/');
		}
		$this->load->view('user_login');
	}

	public function singIn()
	{
		$data = [];
        
		if ($this->input->post('username')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if(empty($username)){
			    echo json_encode(array('st' => 400, 'error' => 'User is empty'));
			    return;
			}
			
			if(empty($password)){
			    echo json_encode(array('st' => 400, 'error' => 'Password is empty'));
			    return;
			}

// 			if (!is_numeric($username)) {

// 				$this->db->select('*');
// 				$this->db->from('users');
// 				$this->db->where('username', $username);
// 				$this->db->where('password', md5($password));
// 				$this->db->where('status', 1);
// 				$query = $this->db->get();
// 				$result = $query->row();
// 			} else 
			
			if (is_numeric($username) && strlen($username) == 11) {

				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('phone', $username);
				$this->db->where('password', md5($password));
				$this->db->where('status', 1);
				$query = $this->db->get();
				$result = $query->row();
			} else if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('email', $username);
				$this->db->where('password', md5($password));
				$this->db->where('status', 1);
				$query = $this->db->get();
				$result = $query->row();
			} else {

				echo json_encode(array('st' => 400, 'error' => 'Enter valid email or phone to login'));
//				$this->session->set_flashdata('error', 'Enter valid email or phone to login');
//				redirect('login');
				return false;
			}

			if (!empty($result) && isset($result)) {

				if ($query->num_rows() == 1) {
				    // $this->session->sess_destroy(); 
					$this->session->unset_userdata('cus_data', "");
					$this->session->unset_userdata('club_user_data', "");
					$this->session->set_userdata('cus_data', $result);
//					$this->session->set_flashdata('login', 'Logged in Successfully');
					echo json_encode(array('st' => 200, 'success' => 'Logged in Successfully'));
//					redirect('/');
					return;
				} else {
					echo json_encode(array('st' => 400, 'error' => 'Incorrect Crediantials'));
//					$this->session->set_flashdata('error', 'Incorrect Crediantials');
//					redirect('login');
					return;
				}

			} else {
				echo json_encode(array('st' => 400, 'error' => 'Invalid login data'));
				//$this->session->set_flashdata('error', 'Invalid login data');
				//redirect('login');
				return;
			}

		}
		echo json_encode(array('st' => 404, 'error' => 'Inval Request'));
	}

	public function login_flash_clr()
	{
		$this->session->set_flashdata('login', 'done');
	}

	public function forgot_password()
	{
		$this->load->view('forgot_password');
	}

	public function reset_password()
	{
		$this->load->view('reset_password');
	}

	public function club_login()
	{

		if (!empty($this->session->userdata('club_user_data'))) {
			redirect('/club_profile');
		}

		$data = [];

		if ($this->input->post('submit')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
				$this->db->select('*');
				$this->db->from('club_users');
				$this->db->where('club_email', $username);
				$this->db->where('password', md5($password));
				$this->db->where('status', 1);
				$query = $this->db->get();
				$result = $query->row();
			} else {
				$this->session->set_flashdata('error', 'Enter valid email to login');
				redirect('bsclub');
				return false;
			}

			if (!empty($result) && isset($result)) {

				if (count($result) > 0) {
				    // $this->session->sess_destroy();
					$this->session->unset_userdata('cus_data', "");
					$this->session->unset_userdata('club_user_data', "");
					$this->session->set_userdata('club_user_data', $result);
					redirect('/club_profile');
					return false;
				} else {
					$this->session->set_flashdata('error', 'Incorrect Crediantials');
					redirect('bsclub');
				}

			} else {
				$this->session->set_flashdata('error', 'Invalid login data');
				redirect('bsclub');
			}

		}

		$this->load->view('club_login');
	}
	

	public function index()
	{
		$data = array();
		// if (empty($this->session->userdata('cus_data'))) { 
		// 	$this->load->view('new_login', $data);
		// }else{
		// 	$this->load->view('customer/index', $data);
		// }
		$this->load->view('customer/index', $data);
	}

	public function NewLogin()
	{
		$data = array(); 
		if (empty($this->session->userdata('cus_data'))) { 
			$this->load->view('new_login', $data);
		}else{
			$this->load->view('customer/index', $data);
		}
	}

	public function ref_registration()
	{ 
		// $enc_pin = $this->encryption->decrypt("dkfdj");

		$data = array();
		$data['d'] =  $this->encryption->encrypt('xxxxxxx');
		if (empty($this->session->userdata('cus_data'))) { 
			$this->load->view('ref_registration', $data);
		}else{
			$this->load->view('customer/index', $data);
		}
	}

	public function upcoming()
	{
		$data = [];
		$get_count = $this->db->query("SELECT advanced_bet FROM sportscategory WHERE id IN(2,3,5,6,7,8,11,12)")->result();
		$data['football_count'] = $get_count[0]->advanced_bet;
		$data['cricket_count'] = $get_count[1]->advanced_bet;
		$data['backetball_count'] = $get_count[2]->advanced_bet;
		$data['volleyball_count'] = $get_count[3]->advanced_bet;
		$data['badminton_count'] = $get_count[4]->advanced_bet;
		$data['tennis_count'] = $get_count[5]->advanced_bet;
		$data['rugby_count'] = $get_count[6]->advanced_bet;
		$data['amfootball_count'] = $get_count[7]->advanced_bet;
		$data['all_count'] = array_sum($data);
		// -- other data var define must below

		$this->load->view('upcoming', $data);
	}

	public function upcoming_match_details()
	{
		$id = $this->input->post('sports_id');
		$data = array();
		$data['get_data'] = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.id='{$id}'")->row();
		$teams = explode("vs", strtolower($data['get_data']->title));
		$data['startTime'] = $data['get_data']->starting_time;
		$data['team_1'] = "";
		$data['team_2'] = "";
		if (!empty($teams)) {
			$data['team_1'] = $teams[0];
			$data['team_2'] = $teams[1];
		}
		$this->load->view('upcoming_match_single_view', $data);
	}

	public function live_match_details()
	{
		$id = $this->input->post('sports_id');
		$data = array();
		$data['get_data'] = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.id='{$id}'")->row();
		$teams = explode("vs", strtolower($data['get_data']->title));
		$data['startTime'] = $data['get_data']->starting_time;
		$data['team_1'] = "";
		$data['team_2'] = "";
		if (!empty($teams)) {
			$data['team_1'] = $teams[0];
			$data['team_2'] = $teams[1];
		}
		$this->load->view('live_match_single_view', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('cus_data', "");
		$this->session->unset_userdata('club_user_data', "");
		$this->session->sess_destroy();
		$this->session->set_flashdata('login', 'Logged Out Successfully');
		redirect('/');
	}

	// -- bet submission code data
	public function check_init_bet()
	{
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$coin_rate = $_POST['coin_rate'];
		$min_bet = 50;
		$min_bet_amount = $coin_rate * $min_bet;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if (!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		if ($user_balance < $min_bet_amount) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}

		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id='{$option_details_id}'")->row();

		if (empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}

		$data['get_data'] = $row_data;
		echo json_encode($data);
	}


	public function open_live_tv()
	{
		echo "<div class='betslip-bid-area'>
				<iframe width='100%' height='250' src='".get_live_tv_link()."'></iframe>
			</div>";
	}
	
	public function redirect_to_base() {
	    redirect('/');
	}
	
	// -- chat functionality
	// public function insert_chat_data() {
	// 	$user_id = $this->input->post('chat_user_id');
	// 	$cookie_id = $this->input->post('cookie_id');
	// 	$message = trim($this->input->post('message'));

	// 	// -- chk settings
	// 	$chk_data = $this->db->query("SELECT chat_status FROM chat_settings")->row();
	// 	if( $chk_data->chat_status == 1 ) {

	// 		// -- chk to see if this user exis in chat details
	// 		if( !empty($user_id) ) {

	// 			$chk_user = $this->db->query("SELECT * FROM chat_users WHERE user_id='{$user_id}'")->row();
	// 			if( empty($chk_user) ) {
	// 				$data = [
	// 					'user_id' => $user_id
	// 				];
	// 				$this->db->insert('chat_users', $data);
	// 			}
	// 			else {
	// 				$data = ['updated_at' => date("Y-m-d H:i:s"), 'view_last_message' => 0];
	// 				$this->db->where('user_id', $user_id);
	// 				$this->db->update('chat_users', $data);
	// 			}

	// 			// -- send data to chat table
	// 			$data_arr = [
	// 				'user_id' => $user_id,
	// 				'from_msg'=> $message,
	// 			];
	// 			$this->db->insert('chat_msg', $data_arr);
	// 			chat_trigger_pusher('admin_ch','admin_ev', ['user_id'=>$user_id, 'msg_user_type'=>'user']);

	// 			echo $this->fetch_user_chat_history(1, $user_id, null);
	// 		}
	// 		else if( !empty($cookie_id) ) {

	// 			$chk_user = $this->db->query("SELECT * FROM chat_users WHERE cookie_id='{$cookie_id}'")->row();
	// 			if( empty($chk_user) ) {
	// 				$data = [
	// 					'cookie_id' => $cookie_id
	// 				];
	// 				$this->db->insert('chat_users', $data);
	// 			}
	// 			else {
	// 				$data = ['updated_at' => date("Y-m-d H:i:s"), 'view_last_message' => 0];
	// 				$this->db->where('cookie_id', $cookie_id);
	// 				$this->db->update('chat_users', $data);
	// 			}

	// 			// -- send data to chat table
	// 			$data_arr = [
	// 				'cookie_id' => $cookie_id,
	// 				'from_msg'=> $message,
	// 			];
	// 			$this->db->insert('chat_msg', $data_arr);
	// 			chat_trigger_pusher('admin_ch','admin_ev', ['cookie_id'=>$cookie_id, 'msg_user_type'=>'guest']);

	// 			echo $this->fetch_user_chat_history(1, null, $cookie_id);
	// 		}

	// 	}
	// 	else {
	// 		echo "<p style='color:red;padding:10px;font-size:12px'>Chat offline. Please contact when we are online. Thank you</p>";
	// 	}
	// }

	// private function fetch_user_chat_history($admin_id, $user_id, $cookie_id) {
	// 	$data = [];
	// 	if( !empty($user_id) ) {
	// 		$data['get_data'] = $this->db->query("SELECT * FROM chat_msg WHERE user_id='{$user_id}' AND created_at >= NOW() - INTERVAL 1 DAY ORDER BY created_at ASC")->result();
	// 	}
	// 	else {
	// 		$data['get_data'] = $this->db->query("SELECT * FROM chat_msg WHERE cookie_id='{$cookie_id}' AND created_at >= NOW() - INTERVAL 1 DAY ORDER BY created_at ASC")->result();
	// 	}
	// 	$view = $this->load->view('chat_view', $data, true);
	// 	return $view;
	// }

	// public function get_chat_init_data() {
	// 	$user_id = !empty($this->input->post('chat_user_id')) ? $this->input->post('chat_user_id') : null;
	// 	$cookie_id = !empty($this->input->post('cookie_id')) ? $this->input->post('cookie_id') : null;
	// 	echo $this->fetch_user_chat_history(1, $user_id, $cookie_id);
	// }
 

 	/********************************************
	*
	*		// -- Multi bet functionality
	*
	*********************************************/
	public function check_dublicate_match() {
		$matches = [];
		$all_ids = [];
		$option_detail_ids = $this->input->post('option_detail_ids');
		$last_id = $this->input->post('last_id');

		$option_string = implode(",", $option_detail_ids);
		if(count($option_detail_ids)==1) {
			return;
		}

		$all_data = $this->db->query("SELECT id, match_id FROM match_option_details WHERE id IN({$option_string})")->result();
		foreach($all_data as $key => $val) {
			$matches[] = $val->match_id;
		}

		if(count(array_unique($matches))<count($matches)) {
			$new_data = [];
			$new_data['error'] = 2;
			$new_data['get_data'] = "";
			$new_data['error_msg'] = "Duplicate found";
			echo json_encode($new_data);
		}
		else {
			$new_data = [];
			$new_data['error'] = 0;
			$new_data['get_data'] = "All unique";
			$new_data['error_msg'] = "";
			echo json_encode($new_data);
		}
	}

	public function check_init_multibet() {
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$option_string = implode(",", $option_details_id);
		$data['option_string'] = $option_string;
		$min_bet = 20;
		$min_bet_amount = 100;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		if ($user_balance < $min_bet_amount) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}
		$elems = [];
		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id, m.active_status, m.icon1, m.icon2, m.team1, m.team2 FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id IN({$option_string}) AND m.status=1 AND mp.status=1 AND mopd.status=1")->result();

		foreach($row_data as $val) {
            $elems[] = $val->id;
        }

		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}
		$data['get_data'] = $row_data;
		$data['enable_multibet'] = $this->db->query("SELECT multibet_enable FROM settings")->row()->multibet_enable;
        
		$view_data = $this->load->view('multibet/multibet_data', $data, true);
		$new_data = [];
		$new_data['error'] = 0;
		$new_data['last_elems'] = $elems;
		$new_data['get_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);
	}
	
	public function check_coin_for_auto_update() {
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		
		if (isset($_POST['blocked_elems'])) {
			$blocked_elems = $_POST['blocked_elems'];
			$option_details_id = array_merge($option_details_id,$blocked_elems);
		}
		$bet_type = $_POST['bet_type'];
		if (!empty($option_details_id)) {
			$option_string = implode(",", $option_details_id); 
			$data['option_string'] = $option_string;
			 

	        $elems_have = [];
	        $elems_ck = [];
	        $elems_no = [];
			$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title,m.status, m.title, m.sportscategory_id, m.active_status, m.icon1, m.icon2, m.team1, m.team2,mp.status AS mp_status,mopd.status AS mopd_status,mopd.option_coin,mopd.multi_option_coin FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id IN({$option_string})")->result();
	        
	        foreach($row_data as $val) {
	        	if ($val->status==1 && $val->mp_status==1 && $val->mopd_status==1) {
	        		$elems_ck[] = $val->id;
	            	if ($bet_type=="single_bet") {
	            		$elems_have[$val->id] = $val->option_coin;
	            	} else {
	            		$elems_have[$val->id] = $val->multi_option_coin;
	            	}
	        	}
	        }
	        $elems_no = array_diff($option_details_id,$elems_ck);

			if(empty($row_data)) {
				$data['error'] = 3;
				$data['error_msg'] = "Invalid data source";
				echo json_encode($data);
				exit();
			}  
			$data['last_elems_have'] = $elems_have;
			$data['last_elems_no'] = $elems_no;
			$data['option_details_id'] = $option_details_id;
			$data['elems_ck'] = $elems_ck;
			$data['error'] = 0; 
			$data['error_msg'] = "";
			echo json_encode($data);
		}
	}

	public function check_init_multibet_for_modal() {
		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$option_string = implode(",", $option_details_id);
		$data['option_string'] = $option_string;
		$min_bet = 20;
		$min_bet_amount = 100;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if(!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		if ($user_balance < $min_bet_amount) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}

        $elems = [];
		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id, m.active_status, m.icon1, m.icon2, m.team1, m.team2 FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mopd.id IN({$option_string}) AND m.status=1 AND mp.status=1 AND mopd.status=1")->result();
        
        foreach($row_data as $val) {
            $elems[] = $val->id;
        }
        
		if(empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}
		$data['get_data'] = $row_data;
		$data['enable_multibet'] = $this->db->query("SELECT multibet_enable FROM settings")->row()->multibet_enable;
        
		$view_data = $this->load->view('multibet/multibet_data_for_modal', $data, true);
		$new_data = [];
		$new_data['last_elems'] = $elems;
		$new_data['error'] = 0;
		$new_data['get_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);
	}

	public function replace_dublicate_match() {
		$elems = $this->input->post('option_detail_ids'); 
		$option_string = implode(",", $elems);
		$last_id = $this->input->post('last_id');
		$get_dublicate = 0;
		/*if(count($elems)==1) {
			return;
		}*/

		$all_data = $this->db->query("SELECT id, match_id, match_option_id FROM match_option_details WHERE id IN({$option_string})")->result();
		foreach($all_data as $key => $val) {
			$questions[] = [$val->id, $val->match_id, $val->match_option_id];
		}

		// -- get match_option_id, match_id of last id
		$last_id_data = $this->db->query("SELECT id, match_id, match_option_id FROM match_option_details WHERE id={$last_id}")->row();

		foreach( $questions as $key=>$val ) {
			if( $last_id_data->match_id==$val[1] ) {
				$questions[$key][0] = $last_id_data->id;
				$questions[$key][2] = $last_id_data->match_option_id;
				$get_dublicate = 1;
			}
		}

		$filtered_id = [];
		foreach( $questions as $val ) {
			$filtered_id[] = $val[0];
		}

		if( $get_dublicate==0 ) {
			array_push($filtered_id, $last_id);
		}

		//print_r($filtered_id);

		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_data'] = $filtered_id;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);

		// dd($filtered_id);
	}

	public function replace_dublicate_match_when_select_bet_type() {
		
		$elems = $this->input->post('option_detail_ids'); 
		$option_string = implode(",", $elems); 
		$get_dublicate = 0;  

		$get_all_result = $this->db->query("SELECT id FROM match_option_details WHERE id IN({$option_string}) GROUP BY match_id ORDER BY id DESC ")->result();
 		
 		$filtered_id = [];
		foreach ($get_all_result as $key => $value) {
			$filtered_id[] = $value->id;	
		}
		$get_filter = array_diff($elems,$filtered_id);

		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_data'] = $filtered_id;
		$new_data['error_msg'] = $get_filter;
		echo json_encode($new_data); 
	}
	
	public function user_login_by_admin() {
		$user_id = $this->uri->segment(2);
		// dd($user_id);
		$red = $_SERVER['HTTP_REFERER'];

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if(!empty($result) && isset($result)) {

		  $this->session->set_userdata('cus_data', $result);
		  $red = base_url('view_profile');
		  $this->session->set_flashdata('msg', 'Login success as admin user!');
		  redirect($red);
		}
		else {
		  $this->session->set_flashdata('msg', 'Incorrect user');
		  redirect($red);
		}
	}
	
	public function club_login_by_admin() {
		$user_id = $this->uri->segment(2);
		// dd($user_id);
		$red = $_SERVER['HTTP_REFERER'];

		$this->db->select('*');
		$this->db->from('club_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		$result = $query->row();

		if(!empty($result) && isset($result)) {

		  $this->session->set_userdata('club_user_data', $result);
		  $red = base_url('club_profile');
		  $this->session->set_flashdata('msg', 'Login success as admin user!');
		  redirect($red);
		}
		else {
		  $this->session->set_flashdata('msg', 'Incorrect user');
		  redirect($red);
		}
	}

	public function coin_game() {
		$data = [];
		$data['stake'] = $this->db->query("SELECT coin_game_ratio, coin_game_rate FROM settings where id=1")->row()->coin_game_rate;
		$this->load->view('game2/coin_game', $data);
	}

	public function action_coin() {

		$tail = base_url('assets/game2/images/tail.png'); 
		$head = base_url('assets/game2/images/head.png');
		$coin = base_url('assets/game2/images/coin.gif');
		$coin_stake = $_POST['coin_stake'];
		$coin_amount = $_POST['coin_amount'];
		$total_amount = $coin_stake*$coin_amount;
		$game_status = "DRAW";
		$head_tile_status = $_POST['head_tile_status'];
		$settings = $this->db->query("SELECT coin_game_ratio, coin_game_rate FROM settings where id=1")->row();

		// check is logged in
		if (empty($this->session->userdata('cus_data'))) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Please login frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		// collect user data
		$user_data = $this->db->query("SELECT * FROM `users` WHERE id='{$this->session->userdata['cus_data']->id}' AND password = '{$this->session->userdata['cus_data']->password}' AND status=1")->row();
		if (empty($user_data)) {
			$this->session->sess_destroy();
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Please login frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		$user_id = $user_data->id;
		$username = $user_data->username;
		$phone = $user_data->phone;
		$country = $user_data->country;
		$club_id = $user_data->club_id;

		// check user balance
		$user_balance = get_user_current_balance($user_id);
		if ( $user_balance < ($coin_amount) ) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Insufficient balance, please deposit frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}
		
		// minimum bet range
		if ( $coin_amount < 50 ) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Minimum bet amount 50 taka !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		// Deduct from user balance
		$current_balance = $user_balance-$coin_amount;
		$data_arr = array(
			'user_id' => $user_id,
			'club_id' => $club_id,
			'coin' => $coin_amount,
			'current_balance' => $current_balance,
			'coin_type' => 'PLAY_GAME',
			'method' => 'POST',
			'transfer_user_id' => 0,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('my_coin', $data_arr);

		// game logic
		$rand_data = rand(0,100);
		if($settings->coin_game_ratio==10) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13];
		}
		else if($settings->coin_game_ratio==20) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3];
		}
		else if($settings->coin_game_ratio==30) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98];
		}
		else if($settings->coin_game_ratio==40) {
			$win_steak=[2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22];
		}
		else if($settings->coin_game_ratio==50) {
			$win_steak=[2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32];
		}
		else if($settings->coin_game_ratio==60) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42];
		}
		else if($settings->coin_game_ratio==70) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55];
		}
		else if($settings->coin_game_ratio==80) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 63, 64, 65, 66];
		}
		else if($settings->coin_game_ratio==90) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 64, 65, 66, 67, 68, 69, 70, 71, 73, 74, 75, 77, 78];
		}
		else {
			$win_steak = [7];
		}
		
		if(in_array($rand_data, $win_steak)) {
			$game_status = "WIN";
		}
		else {
			$game_status = "LOSS";
		}

		// Insert data to the game db
		$data_arr = array(
			'user_id' => $user_id,
			'club_id' => $club_id,
			'username' => $username,
			'phone' => $phone,
			'country' => $country,
			'coin_stake' => $coin_stake,
			'coin_amount' => $coin_amount,
			'total_amount' => $total_amount,
			'game_type' => 'COIN',
			'game_status' => $game_status,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('game_play', $data_arr);

		// show result to UI
		if($game_status=="WIN" && $head_tile_status==1) {
			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid green;border-radius: 50%;\' src=\'assets/game2/images/head.png\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are win</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/coin.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);

			$data_arr = array(
				'user_id' => $user_id,
				'club_id' => $club_id,
				'coin' => $coin_amount,
				'current_balance' => ($current_balance+$total_amount),
				'coin_type' => 'PLAY_GAME',
				'method' => 'GET',
				'transfer_user_id' => 0,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('my_coin', $data_arr);

			exit();
		}
		else if($game_status=="WIN" && $head_tile_status==2) {
			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid green;border-radius: 50%;\' src=\'assets/game2/images/tail.png\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are win</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/coin.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);

			$data_arr = array(
				'user_id' => $user_id,
				'club_id' => $club_id,
				'coin' => $coin_amount,
				'current_balance' => ($current_balance+$total_amount),
				'coin_type' => 'PLAY_GAME',
				'method' => 'GET',
				'transfer_user_id' => 0,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('my_coin', $data_arr);

			exit();
		}
		else if($game_status=="LOSS" && $head_tile_status==1) {
			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%;\' src=\'assets/game2/images/tail.png\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are Fail</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/coin.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);
			exit();
		}
		else if($game_status=="LOSS" && $head_tile_status==2) {
			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%;\' src=\'assets/game2/images/head.png\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are Fail</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/coin.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);
			exit();
		}
	}

	public function ludu_game() {
		$data = [];
		$data['stake'] = $this->db->query("SELECT ludu_game_ratio, ludu_game_rate FROM settings where id=1")->row()->ludu_game_rate;
		$this->load->view('game2/ludu_game', $data);
	}

	public function action_ludu() {

		$tail = base_url('assets/game2/images/tail.png'); 
		$head = base_url('assets/game2/images/head.png');
		$coin = base_url('assets/game2/images/coin.gif');
		$coin_stake = $_POST['ludu_rate'];
		$coin_amount = $_POST['amount'];
		$total_amount = $coin_stake*$coin_amount;
		$game_status = "DRAW";
		$ludu_stake = $_POST['stake'];
		$settings = $this->db->query("SELECT ludu_game_ratio, ludu_game_rate FROM settings where id=1")->row();

		// check is logged in
		if (empty($this->session->userdata('cus_data'))) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Please login frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		// collect user data
		$user_data = $this->db->query("SELECT * FROM `users` WHERE id='{$this->session->userdata['cus_data']->id}' AND password = '{$this->session->userdata['cus_data']->password}' AND status=1")->row();
		if (empty($user_data)) {
			$this->session->sess_destroy();
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Please login frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		$user_id = $user_data->id;
		$username = $user_data->username;
		$phone = $user_data->phone;
		$country = $user_data->country;
		$club_id = $user_data->club_id;

		// check user balance
		$user_balance = get_user_current_balance($user_id);
		if ( $user_balance < ($coin_amount) ) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Insufficient balance, please deposit frist !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}
		
		// minimum bet range
		if ( $coin_amount < 50 ) {
			$x = array (
			  'error' => '<div role=\'alert\' class=\'alert alert-danger\'><strong>Minimum bet amount 50 taka !!</strong></div>',
			);
			echo json_encode($x);
			return;
		}

		// Deduct from user balance
		$current_balance = $user_balance-$coin_amount;
		$data_arr = array(
			'user_id' => $user_id,
			'club_id' => $club_id,
			'coin' => $coin_amount,
			'current_balance' => $current_balance,
			'coin_type' => 'PLAY_GAME',
			'method' => 'POST',
			'transfer_user_id' => 0,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('my_coin', $data_arr);

		// game logic
		$rand_data = rand(0,100);
		if($settings->ludu_game_ratio==10) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13];
		}
		else if($settings->ludu_game_ratio==20) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3];
		}
		else if($settings->ludu_game_ratio==30) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98];
		}
		else if($settings->ludu_game_ratio==40) {
			$win_steak=[2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22];
		}
		else if($settings->ludu_game_ratio==50) {
			$win_steak=[2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32];
		}
		else if($settings->ludu_game_ratio==60) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42];
		}
		else if($settings->ludu_game_ratio==70) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55];
		}
		else if($settings->ludu_game_ratio==80) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 63, 64, 65, 66];
		}
		else if($settings->ludu_game_ratio==90) {
			$win_steak = [2, 7, 45, 55, 76, 81, 63, 97, 81, 13, 99, 100, 82, 72, 62, 51, 43, 0, 1, 3, 4, 5, 6, 8, 9, 10, 11, 96, 98, 12, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 44, 46, 47, 48, 49, 50, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 64, 65, 66, 67, 68, 69, 70, 71, 73, 74, 75, 77, 78];
		}
		else {
			$win_steak = [7];
		}
		//dd($rand_data);
		if(in_array($rand_data, $win_steak)) {
			$game_status = "WIN";
		}
		else {
			$game_status = "LOSS";
		}

		// Insert data to the game db
		$data_arr = array(
			'user_id' => $user_id,
			'club_id' => $club_id,
			'username' => $username,
			'phone' => $phone,
			'country' => $country,
			'coin_stake' => $coin_stake,
			'coin_amount' => $coin_amount,
			'total_amount' => $total_amount,
			'game_type' => 'LUDU',
			'game_status' => $game_status,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('game_play', $data_arr);


		// -- show result in new pattern



		if($game_status=="WIN") {
			$logo = "dice-".$ludu_stake.".png";

			/*echo $ludu_stake . "<br />";
			echo $game_status . "<br />";
			echo $rand_data . "<br />";
			echo $logo . "<br />";
			dd($win_steak);*/

			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid green;border-radius: 50%;\' src=\'assets/game2/images/ludu/'.$logo.'\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are win</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/ludu/qqq.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);

			$data_arr = array(
				'user_id' => $user_id,
				'club_id' => $club_id,
				'coin' => $coin_amount,
				'current_balance' => ($current_balance+$total_amount),
				'coin_type' => 'PLAY_GAME',
				'method' => 'GET',
				'transfer_user_id' => 0,
				'created_at' => date("Y-m-d H:i:s")
			);
			$this->db->insert('my_coin', $data_arr);
			exit();
		}
		else {
			$no = $this->uniq_rand_data($ludu_stake);
			$logo = "dice-".$no.".png";

			$x = array (
				'wstatues' => '<div class=\'side-a \'><a href=\'\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%;\' src=\'assets/game2/images/ludu/dice-2.png\'></a><span class=\'win\'></span><span class=\'resultwin\'>You are Fail</span></div><div class=\'side-a hideMe\'><img style=\'width: 100%;height: 100%;border: 22px solid #f00;border-radius: 50%; padding:2px;\' src=\'assets/game2/images/ludu/qqq.gif\'></div>',
				'b' => '<div class=\'loading hideMe\'><span class=\'\'>Loadding....</span></div>
				            <div class=\'result side-a \'><span class=\'\'>You are win</span></div>',
				'c' => '<div class=\'loading hideMe\'><span class=\'\'></span></div>
				            <div class=\'result side-a \'><span class=\'\'>Refresh and continue</span></div>',
				'posiblewin' => '<span>Possible Winning</span><span class=\'bg\' id=\'coin_pwin\'>'.$total_amount.'</span>',
				'error' => '',
			);
			echo json_encode($x);
			exit();

		}

		// -- end new pattern
	}

	private function uniq_rand_data($ludu_stake) {
		$ludu_stake = $ludu_stake;
		$data = rand(1, 6);
		if($data!=$ludu_stake) {
			return $data;
		}
		return $this->uniq_rand_data($ludu_stake);

	}
	
}
