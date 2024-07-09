<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jsquerytimer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('matchcounter');
		$this->load->helper('betscore');
	}

	private function index()
	{
		echo "404 Not Found";
		return;
	}

	public function side_menu_all_match_count(){
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_count_all_match()));
		return;
	}

	public function side_menu_all_live_match_count(){
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_count_all_live_match()));
		return;
	}

 	public function side_menu_all_match_by_cat()
	{
		$data= array();
		$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
		foreach ($sport_cat_side_menu as $val){
			$data[] = array(
				'sportId' => $val->id,
				'gameCount' => get_count_all_by_cat($val->id)
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'obj'=>$data));
		return;
	}

	public function side_menu_live_match_by_cat()
	{
		$data= array();
		$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
		foreach ($sport_cat_side_menu as $val){
			$data[] = array(
				'sportId' => $val->id,
				'gameCount' => get_count_all_live_by_cat($val->id)
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'obj'=>$data));
		return;
	}

	public function top_bar_sports_count_all_live(){
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_count_live_all()));
		return;
	}

	public function top_bar_sports_count_all_adv(){
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_count_adv_all()));
		return;
	}

	public function top_bar_sports_count_all_live_by_cat()
	{
		$data= array();
		$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
		foreach ($sport_cat_side_menu as $val){
			$data[] = array(
				'sportId' => $val->id,
				'sportName' => $val->name,
				'gameCount' => get_count_live_by_cat($val->id)
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'obj'=>$data));
		return;
	}

	public function top_bar_sports_count_all_adv_by_cat()
	{
		$data= array();
		$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
		foreach ($sport_cat_side_menu as $val){
			$data[] = array(
				'sportId' => $val->id,
				'sportName' => $val->name,
				'gameCount' => get_count_adv_by_cat($val->id)
			);
		}
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'obj'=>$data));
		return;
	}


	public function all_game_count_ajax_request(){

		$data= array();
		$response = array();
		$sport_cat_side_menu = $this->db->query("SELECT * FROM sportscategory WHERE active_status=1 ORDER BY serial ASC")->result();
		foreach ($sport_cat_side_menu as $val){
			$data[] = array(
				'sportId' => $val->id,
				'sportName' => $val->name,
				'left_side_all_game_count_by_cat' => get_count_all_by_cat($val->id),
				'left_side_live_game_count_by_cat' => get_count_all_live_by_cat($val->id),
				'top_bar_live_game_count_by_cat' => get_count_live_by_cat($val->id),
				'top_bar_adv_game_count_by_cat' => get_count_adv_by_cat($val->id),
			);
		}

		$response = array(
			'status' => 200,
			'left_side_all_game_count' => get_count_all_match(),
			'left_side_all_live_game_count' => get_count_all_live_match(),
			'top_bar_all_live_game_count' => get_count_live_all(),
			'top_bar_all_adv_game_count' => get_count_adv_all(),
			'data_by_cat' => $data
		);

		header('Content-Type: application/json');
		echo json_encode($response);
	}


	public function upcomming_bet_tab_ajax(){
		$this->load->view('upcoming_bet_tab_ajax');
	}

	public function upcomming_score_ajax(){
		$this->load->view('upcoming_score_ajax');
	}

 
	public function cehckAjaxClubBal()
	{
		$id = $this->input->post("id");
		header('Content-Type: application/json');
		echo json_encode(array('st'=>200,'data'=>get_club_current_balance($id)));
		return;
	}

}
