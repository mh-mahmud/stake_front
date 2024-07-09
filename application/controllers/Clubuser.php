<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubuser extends CI_Controller
{

	private $club_id;
	private $club_name;
	private $club_email;
	private $club_mobile;
	private $coin;
	private $show_ratio;
	private $created_at;
	private $status;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');
		if (empty($this->session->userdata('club_user_data'))) {
			redirect('/');
		}

		$x = $this->session->userdata('club_user_data');
		$x = $this->db->query("SELECT * FROM `club_users` WHERE id = '{$this->session->userdata['club_user_data']->id}'")->row();
		$this->club_id = $x->id;
		$this->club_name = $x->club_name;
		$this->club_email = $x->club_email;
		$this->club_mobile = $x->club_mobile;
		$this->show_ratio = $x->show_ratio;
		$this->created_at = $x->created_at;
		$this->status = $x->status;

	}

	public function club_profile()
	{
		$data = [];
		$data['club_id'] = $this->club_id;
		$data['club_name'] = $this->club_name;
		$data['club_email'] = $this->club_email;
		$data['club_mobile'] = $this->club_mobile;
		$data['show_ratio'] = $this->show_ratio;
		$data['created_at'] = $this->created_at;
		$data['status'] = $this->status;
		$data['total_member'] = 0;
		$y = $this->db->query("SELECT COUNT(*) AS TOT_COUNT FROM users WHERE club_id='{$this->club_id}'")->row();
		if (!empty($y)) {
			$data['total_member'] = $y->TOT_COUNT;
		}

		$this->load->view('club/club_profile', $data);
	}

	public function club_profile_update()
	{
		$this->load->view('club/club_profile_update');
	}

	public function match_bit_coin()
	{
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ORDER BY mbc.id DESC LIMIT 5";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('club/match_bit_coin', $data);
	}

	public function match_bit_coin_dt()
	{

		$query = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ";
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
						<p style=\"width: 300px !important;text-align:justify;\"> S: $row->name &nbsp;
						L: $row->league_title &nbsp;
						M: $row->title &nbsp;
						Q: $row->match_option_title &nbsp;
						A: $row->option_title
						</p>
					";

			$sub_array[] = $row->username;
			$sub_array[] = $club_dt;
			$sub_array[] = $row->bet_coin;
			$sub_array[] = $row->option_coin;
			$sub_array[] = $row->total_coin;
			$sub_array[] = $row->created_at;
			$sub_array[] = bet_history_status_color($row->bet_status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function match_bit_coin_history()
	{
		$data = array();
		$query_string = "SELECT mbc.*, mopd.option_title, mopd.match_id, mopd.match_option_id, mp.match_option_title, m.league_title, m.title, s.name FROM matchbit_coin AS mbc INNER JOIN match_option_details AS mopd ON mbc.match_bit_id=mopd.id INNER JOIN match_option AS mp ON mopd.match_option_id=mp.id INNER JOIN matchname AS m ON mopd.match_id=m.id INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE mbc.club_id='{$this->club_id}' ORDER BY mbc.id DESC LIMIT 100";
		$data['get_data'] = $this->db->query($query_string)->result();
		$this->load->view('club/match_bit_coin_history', $data);
	}

	public function customer_withdraw()
	{
		$data = [];

		//$data['get_data'] = $this->db->query("SELECT w.*, u.name FROM `withdraw_req` AS w INNER JOIN users AS u ON w.user_id=u.id WHERE club_user_id='{$this->club_id}'")->result();
		$this->load->view('club/customer_withdraw', $data);
	}

	public function customer_withdraw_dt()
	{
		$query = "SELECT w.*, u.name FROM `withdraw_req` AS w INNER JOIN users AS u ON w.user_id=u.id WHERE club_user_id='{$this->club_id}' ";
		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (account_number LIKE "%' . $_POST["search"]["value"] . '%"
			 OR from_no LIKE "%' . $_POST["search"]["value"] . '%"
			 OR payment_type LIKE "%' . $_POST["search"]["value"] . '%"
			 OR amount = "' . $_POST["search"]["value"] . '")
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


			$sub_array[] = $row->name;
			$sub_array[] = $row->created_at;
			$sub_array[] = $row->amount;
			$sub_array[] = $row->payment_method;
			$sub_array[] = $row->payment_type;
			$sub_array[] = $row->from_no;
			$sub_array[] = withdraw_history_status_bg_color($row->status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT w.*, u.name FROM `withdraw_req` AS w INNER JOIN users AS u ON w.user_id=u.id WHERE club_user_id='{$this->club_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function user_balance_transfer()
	{
		$data = [];
		//$data['get_data'] = $this->db->query("SELECT m.*, u.name FROM `my_coin` AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.coin_type IN('TRANSFER_GET', 'TRANSFER_POST') AND m.club_id='{$this->club_id}'")->result();
		$this->load->view('club/user_balance_transfer', $data);
	}

	public function user_balance_transfer_dt()
	{
		$query = "SELECT m.*, u.username FROM `my_coin` AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.coin_type IN('TRANSFER_GET', 'TRANSFER_POST') AND m.club_id='{$this->club_id}' ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (u.username LIKE "%' . $_POST["search"]["value"] . '%")
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
			$sub_array[] = $row->created_at;
			$sub_array[] = str_replace("-", "", $row->coin);
			$sub_array[] = $row->coin_type == 'TRANSFER_GET' ? 'Received Coin' : 'Send Coin';
			$sub_array[] = withdraw_history_status_bg_color_club($row->status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT m.*, u.username FROM `my_coin` AS m INNER JOIN users AS u ON m.user_id=u.id WHERE m.coin_type IN('TRANSFER_GET', 'TRANSFER_POST') AND m.club_id='{$this->club_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function user_history()
	{
		$data = [];
		//$data['get_data'] = $this->db->query("SELECT * FROM `users` WHERE club_id='{$this->club_id}'")->result();
		$this->load->view('club/user_history', $data);
	}

	public function user_history_dt()
	{
		$query = "SELECT * FROM `users` WHERE club_id='{$this->club_id}'  ";
		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (username LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '%")
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
			$sub_array[] = $row->created_at;
			$sub_array[] = user_active_inactive_bg_color($row->status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM `users` WHERE club_id='{$this->club_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function club_withdraw()
	{

		$data = [];

		$data['acc_data'] = $this->db->query("SELECT * FROM withdraw_account WHERE status=1")->result();
		$data['withdraw_status'] = get_club_withdraw_status();

		if ($this->input->post('submit')) {

			$payment_method = $this->input->post('payment_method');
			$account_no = $this->input->post('account_no');
			$withdraw_amount = $this->input->post('withdraw_amount');
			$account_type = $this->input->post('account_type');
			$to_date = date_today();

			$withdraw_limit = $this->db->query("SELECT club_withdraw_limit FROM settings")->row()->club_withdraw_limit;
			$withdraw_limit_max = $this->db->query("SELECT club_withdraw_limit_max FROM settings")->row()->club_withdraw_limit_max;
			
			if(get_club_withdraw_status()=="No"){
			    $this->session->set_flashdata('error', 'Club withdraw currently off, please try later');
				redirect('club_withdraw');
				return;
			}

			$password = $this->input->post('password');
			if (!empty($payment_method) && !empty($account_no) && !empty($withdraw_amount) && !empty($account_type)) {
				$password = md5($this->input->post('password'));
				$get_data = $this->db->query("SELECT * FROM club_users WHERE password='{$password}' AND id='{$this->club_id}'")->row();

				$get_withdraw_count = $this->db->query("SELECT COUNT(*) AS ctn FROM `club_withdraw_req` WHERE club_user_id ='{$this->club_id}' AND created_at LIKE '{$to_date}%'")->row();

				if (empty($get_data)) {
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('club_withdraw');
					return;
				}
				if (get_withdraw_per_day() <= $get_withdraw_count->ctn) {
					$this->session->set_flashdata('error', 'Daily withdraw limit '.get_withdraw_per_day().' times');
					redirect('club_withdraw');
					return;
				}
				if ($withdraw_amount > get_club_current_balance($this->club_id)) {
					$this->session->set_flashdata('error', 'Insuffecient Fund for withdraw amount.');
					redirect('club_withdraw');
					return;
				}
				if ($withdraw_amount < $withdraw_limit) {
					$this->session->set_flashdata('error', 'Please Withdraw Minimum '.$withdraw_limit.' coin');
					redirect('club_withdraw');
					return;
				}
				if ($withdraw_amount > $withdraw_limit_max) {
					$this->session->set_flashdata('error', 'Please Withdraw Maximum '.$withdraw_limit_max.' coin');
					redirect('club_withdraw');
					return;
				}

				$data_arr = array(
					'club_user_id' => $this->club_id,
					'payment_method' => $payment_method,
					'account_number' => $account_no,
					'payment_type' => $account_type,
					'amount' => $withdraw_amount,
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('club_withdraw_req', $data_arr);

				$get_cur_balance = get_club_current_balance($this->club_id) - $withdraw_amount;
				$data_arr_post = array(
					'club_user_id' => '0',
					'club_id' => $this->club_id,
					'coin' => $withdraw_amount,
					'current_balance' => $get_cur_balance,
					'source' => 'WITHDRAW',
					'method' => 'POST',
					'created_at' => date("Y-m-d H:i:s")
				);
				$this->db->insert('club_coin', $data_arr_post);


				$this->session->set_flashdata('msg', 'Withdraw request successfully done. Please wait for admin confirmation');
				redirect('club_withdraw');
			} else {
				$this->session->set_flashdata('error', 'System Error, Try again');
				redirect('club_withdraw');
				return;
			}
		}

		$this->load->view('club/club_withdraw', $data);
	}

	public function club_withdraw_history()
	{
		$data = [];
		//$data['get_data'] = $this->db->query("SELECT * FROM club_withdraw_req WHERE club_user_id='{$this->club_id}'")->result();
		$this->load->view('club/club_withdraw_history', $data);
	}

	public function club_withdraw_history_dt()
	{
		$query = "SELECT * FROM club_withdraw_req WHERE club_user_id='{$this->club_id}'  ";

		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (from_no LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '%"
			 OR account_number LIKE "%' . $_POST["search"]["value"] . '%")
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
			$sub_array[] = $row->from_no;
			$sub_array[] = withdraw_history_status_bg_color($row->status);
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM club_withdraw_req WHERE club_user_id='{$this->club_id}' ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function customer_statement()
	{
		$data = [];
		$data['club_users'] = $this->db->query("SELECT id, username FROM users WHERE club_id='{$this->club_id}'")->result();

		$this->load->view('club/customer_statement', $data);
	}

	public function customer_statement_dt()
	{

		$user_id = $this->input->post('club_id');

		$query = "SELECT * FROM my_coin WHERE user_id='{$user_id}' AND club_id='{$this->club_id}' ";
		if (isset($_POST["search"]["value"])) {
			$query .= ' AND
			 (coin_type LIKE "%' . $_POST["search"]["value"] . '%"
			 OR created_at LIKE "%' . $_POST["search"]["value"] . '%")
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
			}
			$sub_array = array();
			$sub_array[] = $row->created_at;
			$sub_array[] = $purpose;
			$sub_array[] = $row->method == "POST" ? $row->coin : "0.00";
			$sub_array[] = $row->method == "GET" ? $row->coin : "0.00";
			$sub_array[] = $row->current_balance;
			$data[] = $sub_array;
		}

		$recordsTotal = $this->db->query("SELECT * FROM my_coin WHERE user_id='{$user_id}' AND club_id='{$this->club_id}'  ")->num_rows();

		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $recordsTotal,
			"recordsFiltered" => $number_filter_row,
			"data" => $data
		);
		echo json_encode($output);
	}


	public function customer_complain()
	{
		$data = [];
		$data['get_data'] = $this->db->query("SELECT c.*, u.name FROM `complain` AS c INNER JOIN users AS u ON c.user_id=u.id WHERE c.complain_to='CLUB' AND c.club_id='{$this->club_id}' ORDER BY c.id DESC")->result();
		$this->load->view('club/customer_complain', $data);
	}

	public function reply_complain()
	{
		$reply = $this->input->post('reply');
		$complain_id = $this->input->post('complain_id');
		if (!empty($reply) && !empty($complain_id)) {

			$data_arr2 = array(
				'reply' => $reply,
				'updated_at' => date("Y-m-d H:i:s")
			);
			$this->db->where('id', $complain_id);
			$this->db->update('complain', $data_arr2);

			echo json_encode(array(
				'st' => 200
			));
			return;
		}

	}

}
