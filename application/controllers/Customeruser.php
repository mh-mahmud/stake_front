<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customeruser extends CI_Controller
{

	private $user_id;
	private $name;
	private $username;
	private $email_add;
	private $phone;
	private $country;
	private $club_id;
	private $verified_by;
	private $user_status;
	private $created_at;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
		$this->load->library('encryption');
		if (empty($this->session->userdata('cus_data'))) {
			redirect('/');
		}
		$x = $this->db->query("SELECT * FROM `users` WHERE id='{$this->session->userdata['cus_data']->id}' AND password = '{$this->session->userdata['cus_data']->password}' AND status=1")->row();
		if (empty($x)) {
			$this->session->sess_destroy();
			redirect('/');
		}
		$this->user_id = $x->id;
		$this->name = $x->name;
		$this->username = $x->username;
		$this->email_add = $x->email;
		$this->phone = $x->phone;
		$this->country = $x->country;
		$this->club_id = $x->club_id;
		$this->sponsor_id = $x->sponsor_id;
		$this->verified_by = $x->verified_by;
		$this->created_at = $x->created_at;
		$this->user_status = $x->status;
		// $this->db->close();
	}

	public function view_profile()
	{
		$data = [];
		$data['user_id'] = $this->user_id;
		$data['name'] = $this->name;
		$data['email_add'] = $this->email_add;
		$data['phone'] = $this->phone;
		$data['country'] = $this->country;
		$data['club_name'] = $this->db->query("SELECT club_name FROM club_users WHERE id='{$this->club_id}'")->row()->club_name;
		$data['verified_by'] = $this->verified_by;
		$data['created_at'] = $this->created_at;
		$data['user_status'] = $this->user_status;
		$data['user_ref_link'] = base_url()."ref_login/".$this->encryption->encrypt($this->phone);
		// dd($data);
		$this->load->view('customer/view_profile', $data);
	}

	public function bet_history()
	{
		$this->load->view('customer/bet_history');
	}

	public function bet_history_dt()
	{

		$query = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title,m.status as matchname_status,m.id as matchname_id, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.bet_type='SINGLE_BET' AND mbc.user_id='{$this->user_id}' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (title LIKE "%' . $_POST["search"]["value"] . '%"
			 OR match_option_title LIKE "%' . $_POST["search"]["value"] . '%"
			 OR option_title LIKE "%' . $_POST["search"]["value"] . '%"
			 OR bet_status = "' . $_POST["search"]["value"] . '")
			';
		}

		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY mbc.id DESC ';
		}

		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$club_dt = "
					<p style=\"width: 300px !important;text-align:justify;\"> S: $row->name &nbsp; L: $row->league_title <br> M: $row->title&nbsp;
					Q: $row->match_option_title &nbsp; A: $row->option_title
					</p>
			";

			if ($row->matchname_status==1){
				$action = "<a class='badge badge-danger' onclick=\"return cancel_bet_by_user($row->id, '$row->user_id', '$row->bet_coin','$row->matchname_id');\" title=\"Bet Cancel, Charge should be apply for cancel\" style='color: white'>Cancel</a>";
			}else{
				$action = "";
			}
			$sub_array[] = $club_dt;
			$sub_array[] = $row->bet_coin;
			$sub_array[] = $row->option_coin;
			$sub_array[] = $row->total_coin;
			$sub_array[] = $row->created_at;
			$sub_array[] = bet_history_status_color($row->bet_status);
			$sub_array[] = $row->bet_status=="MATCH_RUNNING"?$action:"";
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title,m.status, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.user_id='{$this->user_id}'")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function multi_bet_history()
	{
		$this->load->view('customer/multi_bet_history');
	}

	public function multi_bet_history_dt()
	{
		$query = "SELECT m.*, u.username FROM multibet AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.user_id='{$this->user_id}'";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (u.username LIKE "%' . $_POST["search"]["value"] . '%")
			';
		}

		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY m.id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		} else {
			$query1 = "";
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		$i = 1;
		foreach ($fetch_data as $row) {
			$sub_array = array();
		 	 
    	    $bet_list_btn = "<a data-toggle=\"modal\" data-target=\"#multibetModal\" onclick=\"show_bets($row->id,$row->user_id)\" href=\"javascript:void(0);\" class=\"bet-btn btn btn-sm btn-primary\" style=\"color:#FFF\">Bet List</a>";

			$sub_array[] = $i; 
			$sub_array[] = date("D j F Y, g.iA", strtotime($row->created_at));
			$sub_array[] = $row->total_stake;
			$sub_array[] = $row->total_coin;
			$sub_array[] = $row->possible_win;
			$sub_array[] = bet_history_status_color($row->status); 
			$sub_array[] = $bet_list_btn;
			$data[] = $sub_array;
			$i++;
		}
		$recordsTotal = $this->db->query("SELECT m.*, u.username FROM multibet AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.user_id='{$this->user_id}'")->num_rows();
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function ajax_multibet_details() {
		$id = $_POST['option_detail_ids'];
		$user_id = $_POST['user_id'];
		$red = $_SERVER['HTTP_REFERER'];
		$data = [];
		$get_bet = $this->db->query("SELECT * FROM multibet WHERE id='{$id}' AND user_id='{$user_id}'")->row();
		if(empty($get_bet)) {
			redirect($red);
			return;
		}
		$option_ids = $get_bet->option_detail_ids;
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, m.starting_time, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.bet_type='MULTI_BET' AND mbc.match_bit_id IN({$option_ids}) AND mbc.user_id='{$user_id}' GROUP BY mbc.match_bit_id ORDER BY mbc.id DESC";
		$get_data = $this->db->query($query_string)->result();
		$data['get_data'] = $get_data;
		$view_data = $this->load->view('customer/ajax_multibet_details', $data, true);
		$new_data = [];
		$new_data['error'] = 0;
		$new_data['get_new_data'] = $view_data;
		$new_data['error_msg'] = "";
		echo json_encode($new_data);
	}

	public function coin_transfer()
	{
		$data = [];

		if ($this->input->post('submit')) {

			$username = $this->input->post('username');
			$number_of_coin = $this->input->post('number_of_coin');
			$password = $this->input->post('password');

			if (!empty($username) && !empty($number_of_coin) && !empty($password)) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();
				if (empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('coin_transfer');
					return;
				}

				if ($number_of_coin < get_min_transfer()) {
					$this->session->set_flashdata('error', 'Please transfer Minimum '.get_min_transfer().' coin');
					redirect('coin_transfer');
					return;
				}

				if ($number_of_coin > get_max_transfer()) {
					$this->session->set_flashdata('error', 'Please transfer Maximum '.get_max_transfer().' coin');
					redirect('coin_transfer');
					return;
				}
				
                $avg_balance = get_user_current_balance($this->user_id) - 20;
				if ($number_of_coin > $avg_balance) {
					$this->session->set_flashdata('error', 'Insufficient Fund for transfer amount.');
					redirect('coin_transfer');
					return;
				}

				// -- get coin receive user id
				$transfer_user_id = null;
				$transfer_user_name = null;
				$transfer_club_id = null;
				if (!is_numeric($username)) {

					$this->db->select('id, club_id, username');
					$this->db->from('users');
					$this->db->where('username', $username);
					$this->db->where('status', 1);
					$query = $this->db->get();
					$result = $query->row();
					if (!empty($result)) {
						$transfer_user_id = $result->id;
						$transfer_user_name = $result->username;
						$transfer_club_id = $result->club_id;
					}
				} else if (is_numeric($username) && strlen($username) == 11) {

					$this->db->select('id, club_id, username');
					$this->db->from('users');
					$this->db->where('phone', $username);
					$this->db->where('status', 1);
					$query = $this->db->get();
					$result = $query->row();
					if (!empty($result)) {
						$transfer_user_id = $result->id;
						$transfer_user_name = $result->username;
						$transfer_club_id = $result->club_id;
					}
				} else if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
					$this->db->select('id, club_id, username');
					$this->db->from('users');
					$this->db->where('email', $username);
					$this->db->where('status', 1);
					$query = $this->db->get();
					$result = $query->row();
					if (!empty($result)) {
						$transfer_user_id = $result->id;
						$transfer_user_name = $result->username;
						$transfer_club_id = $result->club_id;
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid user found');
					redirect('coin_transfer');
					return false;
				}

				if (empty($transfer_user_id)) {
					$this->session->set_flashdata('error', 'Inactive user found');
					redirect('coin_transfer');
					return false;
				}

				// data insert to balance table
				$data_arr = array(
					'transfer_to' => $transfer_user_id,
					'transfer_to_name' => $transfer_user_name,
					'transfer_by' => $this->user_id,
					'transfer_by_name' => $this->username,
					'amount' => $number_of_coin,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('balance_transfer', $data_arr);

				// -- make transfer coin calculation
				$get_cur_balance = get_user_current_balance($transfer_user_id) + $number_of_coin;
				$data_arr2 = array(
					'user_id' => $transfer_user_id,
					'club_id' => $transfer_club_id,
					'coin' => $number_of_coin,
					'current_balance' => $get_cur_balance,
					'coin_type' => 'TRANSFER_GET',
					'method' => 'GET',
					'transfer_user_id' => $this->user_id,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('my_coin', $data_arr2);

				$get_cur_balance = get_user_current_balance($this->user_id) - $number_of_coin;
				$data_arr_post = array(
					'user_id' => $this->user_id,
					'club_id' => $this->club_id,
					'coin' => $number_of_coin,
					'current_balance' => $get_cur_balance,
					'coin_type' => 'TRANSFER_POST',
					'method' => 'POST',
					'transfer_user_id' => $transfer_user_id,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('my_coin', $data_arr_post);
				$this->session->set_flashdata('msg', 'Coin transfer successfully done');
				redirect('coin_transfer');
			}
		}

		$this->load->view('customer/coin_transfer');
	}

	public function coin_transfer_history()
	{
		$data = [];
		$this->load->view('customer/coin_transfer_history', $data);
	}

	public function coin_transfer_history_dt()
	{
		$query = "SELECT * FROM `balance_transfer` WHERE transfer_by = '{$this->user_id}'";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (transfer_to LIKE "%' . $_POST["search"]["value"] . '%"
			 OR transfer_to_name LIKE "%' . $_POST["search"]["value"] . '%"
			 OR amount = "' . $_POST["search"]["value"] . '"
			 OR created_at = "' . $_POST["search"]["value"] . '")
			';

		}

		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}

		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->created_at;
			$sub_array[] = $row->amount;
			$sub_array[] = get_user_username($row->transfer_to);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `balance_transfer` WHERE transfer_by = '{$this->user_id}'")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function complain_history()
	{
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `complain` WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/complain_history', $data);
	}

	public function complain_history_dt()
	{
		$query = "SELECT * FROM `complain` WHERE user_id='{$this->user_id}' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (complain_to LIKE "%' . $_POST["search"]["value"] . '%"
			 OR subject LIKE "%' . $_POST["search"]["value"] . '%"
			 OR message LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->complain_to;
			$sub_array[] = $row->subject;
			$sub_array[] = $row->message;
			$sub_array[] = $row->reply == "" ? "No Reply Yet" : $row->reply;
			$sub_array[] = $row->created_at;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `complain` WHERE user_id='{$this->user_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function deposit_history()
	{
		$data = [];
		$data['name'] = $this->name;
		$data['coin_rate'] = 1.5;
		$data['get_data'] = $this->db->query("SELECT d.*, c.club_name FROM `deposit` AS d INNER JOIN club_users AS c ON d.club_user_id=c.id WHERE user_id='{$this->user_id}'")->result();
		$this->load->view('customer/deposit_history', $data);
	}

	public function deposit_history_dt()
	{
		$query = "SELECT d.*, c.club_name FROM `deposit` AS d INNER JOIN club_users AS c ON d.club_user_id=c.id WHERE user_id='{$this->user_id}' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (transaction_id LIKE "%' . $_POST["search"]["value"] . '%"
			 OR user_phone LIKE "%' . $_POST["search"]["value"] . '%"
			 OR amount LIKE "%' . $_POST["search"]["value"] . '%"
			 OR user_phone LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY created_at DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$admin_ac = explode(",", $row->admin_account);
			$admin_ac = end($admin_ac);
			// if (empty($admin_ac)) {
			// 	$admin_ac = $row->admin_account;
			// }

			$sub_array = array();
			$sub_array[] = $row->created_at;
			$sub_array[] = round($row->coin);
			$sub_array[] = $row->coin_rate;
			$sub_array[] = $row->coin;
			$sub_array[] = $row->payment_method;
			$sub_array[] = $row->transaction_id;
			$sub_array[] = $row->user_phone;
			$sub_array[] = $admin_ac;
			$sub_array[] = deposit_history_status_bg_color($row->status);
			$data[] = $sub_array;
		}
			// dd($admin_ac);

		$recordsTotal = $this->db->query("SELECT d.*, c.club_name FROM `deposit` AS d INNER JOIN club_users AS c ON d.club_user_id=c.id WHERE user_id='{$this->user_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function make_deposit()
	{
		$data = [];
		$data['settings'] = $this->db->query("SELECT deposit_bonus_ratio FROM settings")->row()->deposit_bonus_ratio;
		 
		$data['acc_data'] = $this->db->query("SELECT * FROM deposit_account WHERE status IN(1)")->result();
		 
		$data['deposit_status'] = get_deposit_status();

		if ($this->input->post('submit')) {
			 
			$payment_method = $this->input->post('payment_method');
			$admin_account = $this->input->post('admin_account');
			$amount = $this->input->post('amount');
			$transaction_id = $this->input->post('transaction_id');
			$user_phone = $this->input->post('user_phone');
			$coin_rate = $data['settings'];
			$deposit_coin = (($coin_rate * $amount) / 100) + $amount;
			 
			 
			if (!empty($payment_method) && !empty($amount) && !empty($admin_account) && !empty($user_phone)) {
				 
				if ($amount <= 0) { 
					$this->session->set_flashdata('error', 'Please Deposit Minimum 500 coin');
					redirect('deposit_coin');
					return;
				}
				if ($amount < "500") { 
					$this->session->set_flashdata('error', 'Please Deposit Minimum 500 coin');
					redirect('deposit_coin');
					return;
				}
				if ($amount > "25000") {
					$this->session->set_flashdata('error', 'Please Deposit Maximum 25000 coin');
					redirect('deposit_coin');
					return;
				}

				$data_arr = array(
					'user_id' => $this->user_id,
					'club_user_id' => $this->club_id,
					'payment_method' => $payment_method,
					'transaction_id' => $transaction_id,
					'user_phone' => $user_phone,
					'amount' => $amount,
					'coin_rate' => $coin_rate,
					'coin' => $deposit_coin,
					'admin_account' => $admin_account,
					'created_at' => date("Y-m-d H:i:s")
				);

				//dd($data_arr);

				$this->db->insert('deposit', $data_arr);
				$this->session->set_flashdata('msg', 'Deposit successfully done. Please wait for admin confirmation');
				redirect('deposit_coin');
			}else{
				$this->session->set_flashdata('error', 'Deposit Data Error');
				redirect('deposit_coin');
			}
		}

		$this->load->view('customer/make_deposit', $data);
	}

	public function my_followers()
	{
		$this->load->view('customer/my_followers');
	}

	public function my_followes_dt()
	{
		$query = "SELECT * FROM `users` WHERE sponsor_id = '{$this->user_id}' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (username LIKE "%' . $_POST["search"]["value"] . '%"
			 OR phone LIKE "%' . $_POST["search"]["value"] . '%"
			 OR email LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->username;
			$sub_array[] = $row->phone;
			$sub_array[] = $row->email;
			$sub_array[] = $row->created_at;
			$sub_array[] = user_active_inactive_bg_color($row->status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `users` WHERE sponsor_id = '{$this->user_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function statement()
	{
		$data = [];
         
		$this->load->view('customer/statement', $data);
	}

	public function statement_dt()
	{

		
 
		$query = "SELECT * FROM my_coin WHERE user_id='{$this->user_id}' AND coin_type!='BONUS' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (created_at LIKE "%' . $_POST["search"]["value"] . '%"
			 OR coin_type LIKE "%' . $_POST["search"]["value"] . '%"
			 OR method LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		$purpose = null;
		foreach ($fetch_data as $row) {
			if ($row->coin_type == 'DEPOSIT') {
				$purpose = 'Deposit Coin';
			} else if ($row->coin_type == 'TRANSFER_GET') {
				$purpose = 'Received Coin';
			} else if ($row->coin_type == 'WITHDRAW') {
				$purpose = 'Withdraw';
			} else if ($row->coin_type == 'BONUS') {
				$purpose = 'Bonus Coin';
			} else if ($row->coin_type == 'BETWIN') {
				$purpose = 'Match Win';
			} else if ($row->coin_type == 'BETLOSS') {
				$purpose = 'Bet Loss';
			} else if ($row->coin_type == 'BETCANCEL') {
				$purpose = 'Bet Return';
			} else if ($row->coin_type == 'TRANSFER_POST') {
				$purpose = 'Send Coin';
			} else if ($row->coin_type == 'RUNNING_BET') {
				$purpose = 'Take Bet';
			} else if ($row->coin_type == 'ADD_COIN') {
				$purpose = 'Coin Add';
			} else if ($row->coin_type == 'RETURN_COIN') {
				$purpose = 'Coin Return';
			} else if ($row->coin_type == 'WITHDRAW_CANCEL') {
				$purpose = 'Withdraw Cancel';
			}
			$sub_array = array();
			$sub_array[] = $row->created_at;
			$sub_array[] = $purpose;
			//$sub_array[] = $row->bet_option_id;
			$sub_array[] = $row->method == "POST" ? $row->coin : "0.00";
			$sub_array[] = $row->method == "GET" ? $row->coin : "0.00";
			$sub_array[] = $row->current_balance;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM my_coin WHERE user_id='{$this->user_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function submit_complain()
	{
		$data = [];

		if ($this->input->post('submit')) {

			$subject = $this->input->post('subject');
			$description = $this->input->post('description');
			$complain_to = $this->input->post('complain_to');

			if (!empty($subject) && !empty($description)) {

				$data_arr = array(
					'user_id' => $this->user_id,
					'club_id' => $this->club_id,
					'complain_to' => $complain_to,
					'subject' => $subject,
					'message' => $description,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('complain', $data_arr);
				$this->session->set_flashdata('msg', 'Complain added successfully to admin');
				redirect('submit_complain');
			}
		}

		$this->load->view('customer/submit_complain');
	}

	public function update_club()
	{
		$data = [];
		$data['club_id'] = $this->db->query("SELECT club_id FROM users WHERE id='{$this->user_id}'")->row()->club_id;
		$data['club_names'] = $this->db->query("SELECT id, club_name FROM club_users WHERE status=1 ORDER BY serial ASC")->result();

		if ($this->input->post('submit')) {
			if (!empty($_POST['club_id']) && !empty($_POST['password'])) {

				$club_id = $this->input->post('club_id');
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();
				if (empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('update_club');
					return;
				}

				$data_arr = array(
					'club_id' => $club_id,
					'updated_at' => date("Y-m-d H:i:s")
				);
				$this->db->where('id', $this->user_id);
				$this->db->update('users', $data_arr);
				$this->session->set_flashdata('msg', 'Club updated successfully');
				redirect('update_club');
			}
		}

		$this->load->view('customer/update_club', $data);
	}

	public function update_password()
	{
		$data = [];

		if ($this->input->post('submit')) {
			$current_password = $this->input->post('current_password');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');

			if ($password != $confirm_password) {
				$this->session->set_flashdata('error', 'Password and confirm password did not match');
				redirect('update_password');
				return;
			}

			if (!empty($current_password) && !empty($password) && !empty($confirm_password)) {


				$current_password = md5($this->input->post('current_password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$current_password}' AND id='{$this->user_id}'")->row();
				if (empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('update_password');
					return;
				}

				$data_arr = array(
					'password' => md5($password),
					'updated_at' => date("Y-m-d H:i:s")
				);
				$this->db->where('id', $this->user_id);
				$this->db->update('users', $data_arr);
				$this->session->set_flashdata('msg', 'Password updated successfully');
				redirect('update_password');

			}
		}

		$this->load->view('customer/update_password');
	}

	public function update_profile()
	{
		$data = [];
		$data['username'] = $this->username;
		$data['email'] = $this->email_add;
		$data['phone'] = $this->phone;
		$data['country'] = $this->country;

		if ($this->input->post('submit')) {
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$country = $this->input->post('country');

			$data_arr = array(
				'phone' => $phone,
				'email' => $email,
				'country' => $country,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->db->where('id', $this->user_id);
			$this->db->update('users', $data_arr);
			$this->session->set_flashdata('msg', 'Profile updated successfully');
			redirect('update_profile');
		}

		$this->load->view('customer/update_profile', $data);
	}

	public function withdraw()
	{
		$data = [];
		$data['acc_data'] = $this->db->query("SELECT * FROM withdraw_account WHERE status=1")->result();
		$data['withdraw_status'] = get_withdraw_status();


		if ($this->input->post('submit')) {

			$payment_method = $this->input->post('payment_method');
			$account_no = $this->input->post('account_no');
			$withdraw_amount = $this->input->post('withdraw_amount');
			$account_type = $this->input->post('account_type');
			$to_date = date_today();

            if(get_withdraw_status()=="No"){
			    $this->session->set_flashdata('error', 'Withdraw currently off, please try later');
				redirect('withdraw');
				return;
			}
			
			
			$password = $this->input->post('password');

			if (!empty($payment_method) && !empty($account_no) && !empty($withdraw_amount) && !empty($account_type)) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM users WHERE password='{$password}' AND id='{$this->user_id}'")->row();

				$get_withdraw_count = $this->db->query("SELECT COUNT(*) AS ctn FROM `withdraw_req` WHERE user_id ='{$this->user_id}' AND created_at LIKE '{$to_date}%'")->row();
                
                
				 

				if (empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('withdraw');
					return;
				}

 				
				
				if (get_withdraw_per_day() <= $get_withdraw_count->ctn) {
					$this->session->set_flashdata('error', 'Daily withdraw limit '.get_withdraw_per_day().' times');
					redirect('withdraw');
					return;
				}

				if ($withdraw_amount > get_user_current_balance($this->user_id)) {
					$this->session->set_flashdata('error', 'Insufficient Fund for withdraw amount.');
					redirect('withdraw');
					return;
				}
				
				$avg_balance = get_user_current_balance($this->user_id) - 20;
				if ($withdraw_amount > $avg_balance) {
					$this->session->set_flashdata('error', 'Please withdraw your amount less than 20. Your 20 coin is not refund able');
					redirect('withdraw');
					return;
				}

				if ($withdraw_amount < get_min_withdraw()) {
					$this->session->set_flashdata('error', 'Please Withdraw Minimum '.get_min_withdraw().' coin');
					redirect('withdraw');
					return;
				}

				if ($withdraw_amount > get_max_withdraw()) {
					$this->session->set_flashdata('error', 'Please Withdraw Maximum '.get_max_withdraw().' coin');
					redirect('withdraw');
					return;
				}

				$data_arr = array(
					'user_id' => $this->user_id,
					'club_user_id' => $this->club_id,
					'payment_method' => $payment_method,
					'account_number' => $account_no,
					'payment_type' => $account_type,
					'amount' => $withdraw_amount,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('withdraw_req', $data_arr);

				$get_cur_balance = get_user_current_balance($this->user_id) - $withdraw_amount;
				$data_arr_post = array(
					'user_id' => $this->user_id,
					'club_id' => $this->club_id,
					'coin' => $withdraw_amount,
					'current_balance' => $get_cur_balance,
					'coin_type' => 'WITHDRAW',
					'method' => 'POST',
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('my_coin', $data_arr_post);

				$this->session->set_flashdata('msg', 'Withdraw request successfully done. Please wait for admin confirmation');
				redirect('withdraw');
			}
		}

		$this->load->view('customer/withdraw',$data);
	}

	public function withdraw_history()
	{
		$data = [];
		$data['get_data'] = $this->db->query("SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}'")->result();
		//echo "<pre>";
		//print_r($data);
		//exit();
		$this->load->view('customer/withdraw_history', $data);
	}

	public function withdraw_history_dt(){
		$query = "SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}'";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (account_number LIKE "%' . $_POST["search"]["value"] . '%"
			 OR from_no LIKE "%' . $_POST["search"]["value"] . '%" 
			 OR amount = "' . $_POST["search"]["value"] . '"
			 OR created_at LIKE "' . $_POST["search"]["value"] . '"
			 OR status = "' . $_POST["search"]["value"] . '")
			';
		}

		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}

		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->created_at;
			$sub_array[] = $row->amount;
			$sub_array[] = $row->payment_method;
			$sub_array[] = $row->payment_type;
			$sub_array[] = $row->account_number;
			$sub_array[] = $row->from_no;
			$sub_array[] = withdraw_history_status_bg_color($row->status);
			$sub_array[] = $row->status=="PENDING"?"<a onclick=\"return withdrawCancelByUser($row->id);\" title=\"Withdraw Cancel\" href=\"javascript:void(0);\"><i class=\"fa fa-reply-all\"></i></a>":"N/A";
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}'")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function cancel_withdraw_by_user(){

		if ($this->input->post('withdraw_id')){
			$withdraw_id = $this->input->post('withdraw_id');
			$query = "SELECT * FROM `withdraw_req` WHERE user_id='{$this->user_id}' AND status = 'PENDING' AND id = '{$withdraw_id}'";
			$number_filter_row = $this->db->query($query)->num_rows();
			if ($number_filter_row>0){
				$fetch_data = $this->db->query($query)->result();
				foreach ($fetch_data as $row) {
					$withdraw_amount = $row->amount;
				}
				$data_arr = array(
					'status' => "CANCEL",
					'from_no' => "USER CANCEL"
				);
				$this->db->where('id', $withdraw_id);
				$this->db->update('withdraw_req', $data_arr);

				$get_cur_balance = get_user_current_balance($this->user_id) + $withdraw_amount;
				$data_arr_post = array(
					'user_id' => $this->user_id,
					'club_id' => $this->club_id,
					'coin' => $withdraw_amount,
					'current_balance' => $get_cur_balance,
					'coin_type' => 'WITHDRAW_CANCEL',
					'method' => 'GET',
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('my_coin', $data_arr_post);
				echo json_encode(array(
					'status' => 200,
					'message' => "Your withdraw now cancelled, check your a/c balance"
				));
			}else{
				echo json_encode(array(
					'status' => 400,
					'message' => "Only Pending Withdraw are allowed"
				));
			}
		}else{
			echo json_encode(array(
				'status' => 400,
				'message' => "Invalid Request"
			));
		}
	}

	public function submit_user_bet_old(){

		$data = [];
		$option_details_id = $_POST['option_details_id'];
		$user_bet = $_POST['user_bet'];
		$min_bet = 50;

		$data['error'] = 0;
		$data['error_msg'] = "";

		if (!$this->session->userdata('cus_data')) {
			$data['error'] = 1;
			$data['error_msg'] = "You are not logged in. Please login to continue";
			echo json_encode($data);
			exit();
		}

		$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.league_title, m.title, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mp.status='1' AND mopd.status='1' AND m.status = '1' AND mopd.id='{$option_details_id}'")->row();

		if (empty($row_data)) {
			$data['error'] = 3;
			$data['error_msg'] = "Invalid data source";
			echo json_encode($data);
			exit();
		}

		// -- check user balance data
		$min_bet_amount = $row_data->option_coin * $min_bet;
		$user_id = $this->session->userdata('cus_data')->id;
		$user_balance = get_user_current_balance($user_id);
		$club_bonus = get_user_club_bonus($user_id);
		$total_coin = $row_data->option_coin * $user_bet;
		$get_cut_balance = @($user_balance - 20);
		$cur_balance = $user_balance - $user_bet;


		if ($min_bet > $user_bet) {
			$data['error'] = 2;
			$data['error_msg'] = "Minimum bet amount 50";
			echo json_encode($data);
			exit();
		}

		if ($get_cut_balance < $user_bet) {
			$data['error'] = 2;
			$data['error_msg'] = "Insufficient balance. Please deposit first";
			echo json_encode($data);
			exit();
		}
		
		// -- find as fault user
		$fu_ids = [];
		$fu = $this->db->query("SELECT user_id FROM fault_users WHERE status=1")->result();
		foreach($fu as $fuel) {
			$fu_ids[] = $fuel->user_id;
		}

		if(!empty($fu_ids)) {
			if(in_array($this->user_id, $fu_ids)) {
				$options = $this->db->query("SELECT id FROM match_option_details WHERE match_option_id='{$row_data->match_option_id}' ORDER BY RAND() LIMIT 2")->result();
				if($options[0]->id != $option_details_id) {
					$option_details_id = $options[0]->id;
				}
				else if($options[1]->id != $option_details_id) {
					$option_details_id = $options[1]->id;
				}
			}
		}

		// insert match bit coin data
		$data_arr = array(
			'user_id' => $this->user_id,
			'club_id' => $this->club_id,
			'username' => $this->username,
			'match_bet_option_id' => $row_data->match_option_id,
			'match_bit_id' => $option_details_id,
			'option_coin' => $row_data->option_coin,
			'bet_coin' => $user_bet,
			'total_coin' => $total_coin,
			'prev_balance' => $user_balance,
			'cur_balance' => $cur_balance,
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('matchbit_coin', $data_arr);

		// -- deduct user balance from my_coin
		$data_arr2 = array(
			'user_id' => $this->user_id,
			'club_id' => $this->club_id,
			'coin' => $user_bet,
			'current_balance' => $cur_balance,
			'coin_type' => 'RUNNING_BET',
			'method' => 'POST',
			'created_at' => date("Y-m-d H:i:s")
		);
		$this->db->insert('my_coin', $data_arr2);

		// -- give club share
		$get_club_ratio = $club_bonus=="0.00"?get_user_club_ratio($this->club_id):$club_bonus;
		$club_coin = @(($get_club_ratio * $user_bet) / 100);
		$club_balance = get_club_current_balance($this->club_id);
		$get_club_current_bal = $club_balance + $club_coin;
		$data_arr3 = array(
			'club_id' => $this->club_id,
			'club_user_id' => $user_id,
			'match_bet_id' => $option_details_id,
			'coin' => $club_coin,
			'current_balance' => $get_club_current_bal,
			'source' => 'BET',
			'method' => 'GET',
			'created_at' => date("Y-m-d H:i:s"),
			'status' => 1
		);
		$this->db->insert('club_coin', $data_arr3);

		// -- give user share

		$sponsor_coin = @((0.1 * $user_bet) / 100);
		$sponsor_balance = get_user_current_balance($this->sponsor_id);
		$get_sponsor_current_bal = @($sponsor_balance + $sponsor_coin);
		$get_user_club_id = get_user_club_id($this->sponsor_id);
		$data_arr4 = array(
			'user_id' => $this->sponsor_id,
			'club_id' => $get_user_club_id,
			'coin' => $sponsor_coin,
			'current_balance' => $get_sponsor_current_bal,
			'coin_type' => 'BONUS',
			'method' => 'GET',
			'created_at' => date("Y-m-d H:i:s")
		);

		$this->db->insert('my_coin', $data_arr4);

		$data['success_msg'] = "Your bet submitted successfully";
		echo json_encode($data);
	}

	public function check_bet_cancel_option(){

		$get_bet_cancel_time = json_decode(get_bet_cancel_time_array());

		$get_bet_time = get_bet_taken_time($this->input->post('id'));


		if (get_matchname_status($this->input->post('m_id'))!=1){
			echo json_encode(array('st'=>400,'msg'=>"Sorry! bet cancel time expired"));
			exit();
		}
		if (get_bet_cancelable($this->input->post('m_id'))!="Yes"){
			echo json_encode(array('st'=>400,'msg'=>"Sorry! you can not cancel this bet"));
			exit();
		}

		$cs = array();
		foreach ($get_bet_cancel_time as $x => $val){
			$cs[] = $x;
			if ($x>=$get_bet_time){
				echo json_encode(array('st'=>200,'msg'=>'if you cancel this bet for time within this '.$x.' minute charge apply '.$val.'% from your coin','rate_percent'=>$val));
				exit();
			}
			else{

			}
		}
		$cs = implode(',' ,(array)$cs);
		echo json_encode(array('st'=>400,'msg'=>"Sorry! bet cancel time expired, cancel bet within ".$cs." Minute"));
		exit();
	}

	public function cancel_bet_by_user(){

		$id = $this->input->post('id');
		$rate_percent = $this->input->post('rate_percent');
		$uid = $this->input->post('uid');
		$coin = $this->input->post('coin');

		$data_arr = array(
			'bet_status' => 'USER_CANCEL'
		);

		$this->db->where('id', $id);
		$this->db->update('matchbit_coin', $data_arr);

		$number_of_coin = @($coin*(1-($rate_percent/100)));

		$get_cur_balance = get_user_current_balance($uid) + $number_of_coin;

		$data_arr2 = array(
			'user_id' => $uid,
			'club_id' => $this->club_id,
			'coin' => $number_of_coin,
			'current_balance' => $get_cur_balance,
			'coin_type' => 'BETCANCEL',
			'method' => 'GET',
			'transfer_user_id' => $this->user_id,
			'created_at' => date("Y-m-d H:i:s")
		);
		if ($this->db->insert('my_coin', $data_arr2)){
			echo json_encode(array('st'=>200,'msg'=>'Successfully canceled your bet'));
		}
	}

	public function cehckAjaxUserBal()
	{
		$u_id = $this->input->post("id");
		// print_r($u_id);die; 
		//$this->db->cache_on();
		$single_bet_data = $this->db->query("SELECT id,total_coin,club_id,match_bit_id FROM matchbit_coin WHERE user_id='{$u_id}' AND bet_status='WIN' AND user_coin_update ='No' AND bet_type = 'SINGLE_BET' ORDER BY id ASC")->result();
		// this is for get single bet winning balance user
		if (!empty($single_bet_data)) {
			foreach ($single_bet_data as $key => $value) {
				$this->db->query("UPDATE matchbit_coin SET user_coin_update = 'Yes' WHERE id = '{$value->id}'");
				$user_balance = get_user_current_balance($u_id);
				$cur_balance = @($user_balance + $value->total_coin);
				$data_arry = array(
					'user_id' => $u_id,
					'club_id' => $value->club_id,
					'coin' => $value->total_coin,
					'current_balance' => $cur_balance,
					'coin_type' => 'BETWIN',
					'method' => 'GET',
					'bet_option_id' => $value->match_bit_id,
					'single_bet_id' => $value->id,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('my_coin', $data_arry);
			}
		}

		// header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_user_current_balance($u_id)));
		return;
	}




	/********************************************
	*
	*		// -- Multi bet functionality
	*
	*********************************************/

	public function submit_user_bet() {

		if( !empty($_POST) ) {

			if (!$this->session->userdata('cus_data')) {
				$data['error'] = 1;
				$data['error_msg'] = "You are not logged in. Please login to continue";
				echo json_encode($data);
				exit();
			}

			$min_bet = get_bet_min_max()->bet_limit_min;
			$min_balance_for_bet = get_bet_min_max()->min_balance_for_bet;
			$data['error'] = 0;
			$data['error_msg'] = "";
			$user_id = $this->session->userdata('cus_data')->id;
			$user_balance = get_user_current_balance($user_id);
			
			// -- check balance status with all ids


			if($_POST['betType'] == 'multi_bet') {

				$inputTotalStack = $_POST['inputTotalStack'];
				$option_details_id = $_POST['detailsIds'];
				$option_string = implode(",", $option_details_id);

				$inputMultibetRatio = $this->db->query("SELECT SUM(multi_option_coin) AS sum_coin FROM `match_option_details` WHERE id IN({$option_string}) ")->row()->sum_coin;

				// here need to last check for same match duplicated option
				$duplicate_match_id = $this->db->query("SELECT match_id FROM `match_option_details` WHERE id IN({$option_string}) GROUP BY match_id HAVING COUNT(match_id) > 1 ")->row();

				if (!empty($duplicate_match_id->match_id)) {
					$data['error'] = 2;
					$data['error_msg'] = "Error In place Bet, Encounter  Problem";
					echo json_encode($data);
					exit();
				}


				$possible_win = $inputTotalStack*$inputMultibetRatio;
				$user_balance = get_user_current_balance($user_id);
				$cur_balance = $user_balance - $inputTotalStack;
				$user_balance_min = $user_balance-$min_balance_for_bet;
				$min_bet = 100;



				if($user_balance_min < $inputTotalStack) {
					$data['error'] = 2;
					$data['error_msg'] = "Insufficient balance. Please deposit first";
					echo json_encode($data);
					exit();
				}

				// if found any less min bet, out him
				if ($min_bet > $inputTotalStack) {
					$data['error'] = 2;
					$data['error_msg'] = "Minimum multibet limit is " . $min_bet;
					echo json_encode($data);
					exit();
				}

				$res_data = $this->db->query("SELECT mopd.*, mp.id AS bet_id, mp.match_option_title, mp.status, m.league_title, m.active_status, m.title, m.id AS match_id, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mp.status='1' AND mopd.status= '1' AND m.status = '1' AND mopd.id IN({$option_string})")->result();

				if(empty($res_data)) {
					$data['error'] = 3;
					$data['error_msg'] = "Invalid data source";
					echo json_encode($data);
					exit();
				}

				// -- insert data to the multibet table
		        $multi_data_arr = array(
					'option_detail_ids'		=> $option_string,
					'user_id'				=> $this->user_id,
					'club_id'				=> $this->club_id,
					'username'				=> $this->username,
					'total_stake'			=> $inputMultibetRatio,
					'total_coin'			=> $inputTotalStack,
					'possible_win'			=> $possible_win
		        );
		        
		        $this->db->insert('multibet', $multi_data_arr);
				$last_multi_bet_id = $this->db->insert_id();

				// insert match bit coin data
				foreach($res_data as $row_data) {
			        $data_arr = array(
						'user_id'				=> $this->user_id,
						'club_id'				=> $this->club_id,
						'match_id'				=> $row_data->match_id,
						'username'				=> $this->username,
						'match_bet_option_id'	=> $row_data->match_option_id,
						'match_bit_id'			=> $row_data->id,
						'option_coin'			=> $row_data->multi_option_coin,
						'bet_coin'				=> 0,
						'total_coin'			=> 0,
						'prev_balance'			=> $user_balance,
						'cur_balance'			=> $cur_balance,
						'bet_type'				=> 'MULTI_BET',
						'multi_bet_id'			=> $last_multi_bet_id,
						'created_at'			=> date("Y-m-d H:i:s")
			        );
			        $this->db->insert('matchbit_coin', $data_arr);
				}

		        // -- deduct user balance from my_coin
		        $data_arr2 = array(
		        	'user_id'			=> $this->user_id,
		        	'club_id'			=> $this->club_id,
					'coin'				=> $inputTotalStack,
					'current_balance'	=> $cur_balance,
					'coin_type'			=> 'RUNNING_BET',
					'method'			=> 'POST',
					'multi_bet_id'		=> $last_multi_bet_id,
					'created_at'		=> date("Y-m-d H:i:s")
		        );
		        $this->db->insert('my_coin', $data_arr2);
 

				$data['success_msg'] = "Your Multi bet submitted successfully";
				echo json_encode($data);
				exit();
			}
			else if($_POST['betType'] == 'single_bet') {

				$balance_data = [];
				$bet_amount = [];
				foreach( $_POST['singleBetBox'] as $key=>$val ) {
					$get_mopd= $this->db->query("SELECT id,option_coin,limit_option_coin FROM match_option_details WHERE id={$key}")->row();
					$balance_q = $get_mopd->option_coin;

					// if found any less min bet, out him
					if ($min_bet > $val) {
						$data['error'] = 2;
						$data['error_msg'] = "Minimum bet limit is " . $min_bet;
						echo json_encode($data);
						exit();
					}

				 
					$balance_data[] = $balance_q*$val;
					$bet_amount[] = $val;
				}
				$total_return_amount = array_sum($balance_data);
				$bet_amount = array_sum($bet_amount);
				
				$cur_balance = @($user_balance - $bet_amount - $min_balance_for_bet);

				if($user_balance < $bet_amount) {
					$data['error'] = 2;
					$data['error_msg'] = "Insufficient balance. Please deposit first";
					echo json_encode($data);
					exit();
				}

				sleep(5);
				foreach( $_POST['singleBetBox'] as $option_details_id => $user_bet ) {

					$row_data = $this->db->query("SELECT mopd.*, mp.match_option_title, m.id as matchID, m.league_title, m.title, m.sportscategory_id FROM match_option_details AS mopd INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id WHERE mp.status='1' AND mopd.status='1' AND m.status = '1' AND mopd.id='{$option_details_id}'")->row();

					if (!empty($row_data)) {
						// -- find as fault user
						$fu_ids = [];
						$fu = $this->db->query("SELECT user_id FROM fault_users WHERE status=1")->result();
						foreach($fu as $fuel) {
							$fu_ids[] = $fuel->user_id;
						}
						if(!empty($fu_ids)) {
							if(in_array($this->user_id, $fu_ids)) {
								$options = $this->db->query("SELECT id FROM match_option_details WHERE match_option_id='{$row_data->match_option_id}' ORDER BY RAND() LIMIT 2")->result();
								if($options[0]->id != $option_details_id) {
									$option_details_id = $options[0]->id;
								}
								else if($options[1]->id != $option_details_id) {
									$option_details_id = $options[1]->id;
								}
							}
						}

						$return_amount = $row_data->option_coin*$user_bet;
						$user_balance = get_user_current_balance($user_id);
						$user_current_bal = @($user_balance-$user_bet);
						// insert match bit coin data
						$data_arr = array(
							'user_id' => $this->user_id,
							'club_id' => $this->club_id,
							'match_id' => $row_data->matchID,
							'username' => $this->username,
							'match_bet_option_id' => $row_data->match_option_id,
							'match_bit_id' => $option_details_id,
							'option_coin' => $row_data->option_coin,
							'bet_coin' => $user_bet,
							'total_coin' => $return_amount,
							'prev_balance' => $user_balance,
							'cur_balance' => $user_current_bal,
							'created_at' => date("Y-m-d H:i:s")
						);
						$this->db->insert('matchbit_coin', $data_arr);
						$last_single_bet_id = $this->db->insert_id();
						// -- deduct user balance from my_coin
						$data_arr2 = array(
							'user_id' => $this->user_id,
							'club_id' => $this->club_id,
							'coin' => $user_bet,
							'current_balance' => $user_current_bal,
							'coin_type' => 'RUNNING_BET',
							'method' => 'POST',
							'single_bet_id' => $last_single_bet_id,
							'created_at' => date("Y-m-d H:i:s")
						);
						$this->db->insert('my_coin', $data_arr2);

						// -- give club share
						$get_club_ratio = get_user_club_ratio($this->club_id);
						$club_coin = @(($get_club_ratio * $user_bet) / 100);
						$club_balance = get_club_current_balance($this->club_id);
						$get_club_current_bal = $club_balance + $club_coin;
						
						if (!empty($club_coin)) {
							$data_arr3 = array(
								'club_id' => $this->club_id,
								'club_user_id' => $user_id,
								'match_bet_id' => $option_details_id,
								'coin' => $club_coin,
								'current_balance' => $get_club_current_bal,
								'source' => 'BET',
								'method' => 'GET',
								'single_bet_id' => $last_single_bet_id,
								'created_at' => date("Y-m-d H:i:s"),
								'status' => 1
							);
							$this->db->insert('club_coin', $data_arr3);
						}

						// -- give user share
						if (!empty($this->sponsor_id) || $this->sponsor_id!=0) {
							$sponsor_coin = @((0.1 * $user_bet) / 100);
							$sponsor_balance = get_user_current_balance($this->sponsor_id);
							$get_sponsor_current_bal = @($sponsor_balance + $sponsor_coin);
							$get_user_club_id = get_user_club_id($this->sponsor_id);
							$data_arr4 = array(
								'user_id' => $this->sponsor_id,
								'club_id' => $get_user_club_id,
								'coin' => $sponsor_coin,
								'current_balance' => $get_sponsor_current_bal,
								'coin_type' => 'BONUS',
								'method' => 'GET',
								'single_bet_id' => $last_single_bet_id,
								'created_at' => date("Y-m-d H:i:s")
							);
							$this->db->insert('my_coin', $data_arr4);
						}
					}
					else {
						$data['error'] = 2;
						$data['error_msg'] = "Bet submission failed";
						echo json_encode($data);
						exit();
					}
				}

				$data['success_msg'] = "Your bet submitted successfully";
				echo json_encode($data);
				exit();
			}
		}
	}

	// game functinalities
	public function coin_game_history() {
		$data = [];
		$this->load->view('customer/game2/coin_game_history', $data);
	}

	public function coin_game_history_dt()
	{
		$query = "SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='COIN' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (coin_stake LIKE "%' . $_POST["search"]["value"] . '%"
			 OR coin_amount LIKE "%' . $_POST["search"]["value"] . '%"
			 OR game_status LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->coin_stake;
			$sub_array[] = $row->coin_amount;
			$sub_array[] = $row->total_amount;
			$sub_array[] = $row->game_status;
			$sub_array[] = $row->created_at;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='COIN' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function ludu_game_history() {
		$data = [];
		$this->load->view('customer/game2/ludu_game_history', $data);
	}

	public function ludu_game_history_dt()
	{
		$query = "SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='LUDU' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (coin_stake LIKE "%' . $_POST["search"]["value"] . '%"
			 OR coin_amount LIKE "%' . $_POST["search"]["value"] . '%"
			 OR game_status LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->coin_stake;
			$sub_array[] = $row->coin_amount;
			$sub_array[] = $row->total_amount;
			$sub_array[] = $row->game_status;
			$sub_array[] = $row->created_at;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='LUDU' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function dice_game_history() {
		$data = [];
		$this->load->view('customer/game2/dice_game_history', $data);
	}

	public function dice_game_history_dt()
	{
		$query = "SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='DICE' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (coin_stake LIKE "%' . $_POST["search"]["value"] . '%"
			 OR coin_amount LIKE "%' . $_POST["search"]["value"] . '%"
			 OR game_status LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '")
			';
		}
		if (isset($_POST["order"])) {
			$columns = "";
			$query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
		} else {
			$query .= 'ORDER BY id DESC ';
		}
		if ($_POST["length"] != -1) {
			$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$number_filter_row = $this->db->query($query)->num_rows();
		$fetch_data = $this->db->query($query . $query1)->result();
		$data = array();
		foreach ($fetch_data as $row) {
			$sub_array = array();
			$sub_array[] = $row->coin_stake;
			$sub_array[] = $row->coin_amount;
			$sub_array[] = $row->total_amount;
			$sub_array[] = $row->game_status;
			$sub_array[] = $row->created_at;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `game_play` WHERE user_id='{$this->user_id}' AND game_type='DICE' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

}
