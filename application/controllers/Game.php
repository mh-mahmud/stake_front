<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('betscore');

	}

	public function index(){
		$data = array();
		$game_id = $this->uri->segment(2);
		$data['slider_query'] = $this->db->query("SELECT * FROM `game_page_slider` WHERE status =1 AND game_page_id = '{$game_id}' ORDER BY serial ASC")->result();
		$this->load->view('game/show_game_page', $data);

	}

}
