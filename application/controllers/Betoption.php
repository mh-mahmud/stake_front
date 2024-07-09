<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Betoption extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('betoption');
        // for debuging
        // $this->output->enable_profiler(true);
        // $this->session->unset_userdata('cus_data', "");
        // $this->session->unset_userdata('club_user_data', "");
        // $this->session->sess_destroy();
    }

    public function index() {
        /*$data = array();
        $data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE active_status=1 AND status=1 GROUP BY sportscategory_id ORDER BY serial ASC")->result();
        $this->load->view('customer/betoption/bet_all', $data);
        return;*/
         
        $data = array();
		$cat_ids = [];
		$match_ids = [];
        $data['get_data'] = $this->db->query("SELECT sc.name, sc.image,
            m.id, m.sportscategory_id, m.team1, m.team2, m.title, m.league_title, m.serial, m.notification, m.active_status, m.isLive, m.youtubeLInk,
            mop.match_option_title, mop.match_option_serial, mop.id AS match_option_id, mop.status AS mopst, mop.collapse_or_expand,  mop.end_time
            FROM match_option AS mop INNER JOIN matchname AS m
            ON mop.match_id=m.id
            INNER JOIN sportscategory AS sc
            ON m.sportscategory_id=sc.id
            WHERE m.active_status=1 AND m.status=1 ORDER BY m.serial, mop.match_option_serial ASC")->result();

        foreach($data['get_data'] as $key=>$val) {
            $cat_ids[] = $val->sportscategory_id;
            $match_ids[] = $val->id;
        }
        $cat_ids = array_unique($cat_ids);
        $match_ids = array_unique($match_ids);
        $each_cat_match = [];
        
        foreach($cat_ids as $cat_val) {
            foreach($data['get_data'] as $val_y) {
                if($cat_val == $val_y->sportscategory_id) {
                    $each_cat_match[$cat_val][] = $val_y;
                }
            }
        }
        $data['get_data'] = $each_cat_match;
        $data['match_ids'] = $match_ids;
        
        $this->load->view('customer/betoption/bet_all_new', $data);
    }

    public function get_bet_by_cat() {
        $data = array();
        $sports_id = $this->input->post("sports_id");
        $data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE sportscategory_id='{$sports_id}' AND active_status=1 AND status=1 ORDER BY id DESC")->result();
        $this->load->view('customer/betoption/bet_by_category', $data);
    }

    // -- upcoming bet data here
    public function upcoming_get_bet_all() { 
        $data = array();
        $cat_ids = [];
        $match_ids = [];
        $data['get_data'] = $this->db->query("SELECT sc.name, sc.image,
            m.id, m.sportscategory_id, m.team1, m.team2, m.title, m.league_title, m.serial, m.notification, m.active_status, m.isLive, m.youtubeLInk,
            mop.match_option_title, mop.match_option_serial, mop.id AS match_option_id, mop.status AS mopst, mop.collapse_or_expand
            FROM match_option AS mop INNER JOIN matchname AS m
            ON mop.match_id=m.id
            INNER JOIN sportscategory AS sc
            ON m.sportscategory_id=sc.id
            WHERE m.active_status=2 AND m.status=1 ORDER BY m.serial, mop.match_option_serial ASC")->result();

        foreach($data['get_data'] as $key=>$val) {
            $cat_ids[] = $val->sportscategory_id;
            $match_ids[] = $val->id;
        }
        $cat_ids = array_unique($cat_ids);
        $match_ids = array_unique($match_ids);
        $each_cat_match = [];
        
        foreach($cat_ids as $cat_val) {
            foreach($data['get_data'] as $val_y) {
                if($cat_val == $val_y->sportscategory_id) {
                    $each_cat_match[$cat_val][] = $val_y;
                }
            }
        }
        $data['get_data'] = $each_cat_match;
        $data['match_ids'] = $match_ids;
        
        $this->load->view('customer/advanced/upcoming_bet_all', $data);
    }

	public function upcoming_get_bet_by_cat() {
		$data = array();
		$sports_id = $this->input->post("sports_id");
		$data['get_data'] = $this->db->query("SELECT * FROM matchname WHERE sportscategory_id='{$sports_id}' AND active_status=2 AND status=1 ORDER BY id DESC")->result();
		$this->load->view('customer/advanced/upcoming_get_bet_by_id', $data);
	}

	public function football_score_slider(){
		$data = array();
		$slider_query = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.score_show_in='Football' AND m.active_status = '1' AND m.status = '1'")->result();
		foreach ($slider_query as $sval){

			$data[] = array(
				'id'=>$sval->id,
				'league_title'=>$sval->league_title,
				'team1'=>$sval->team1,
				'team2'=>$sval->team2,
				'notification'=>$sval->notification,
				'icon1'=>get_admin_url()."assets/img/flag/".$sval->icon1,
				'icon2'=>get_admin_url()."assets/img/flag/".$sval->icon2,
				'score_1'=>$sval->score_1,
				'score_2'=>$sval->score_2,
			);

		}
		echo json_encode(array('obj'=>$data));
	}

	public function cricket_score_slider(){
		$data = array();
		$slider_query = $this->db->query("SELECT m.*, s.name FROM matchname AS m INNER JOIN sportscategory AS s ON m.sportscategory_id=s.id WHERE m.score_show_in='Cricket' AND m.active_status = '1' AND m.status = '1'")->result();
		foreach ($slider_query as $sval){

			$data[] = array(
				'id'=>$sval->id,
				'league_title'=>$sval->league_title,
				'team1'=>$sval->team1,
				'team2'=>$sval->team2,
				'notification'=>$sval->notification,
				'icon1'=>get_admin_url()."assets/img/flag/".$sval->icon1,
				'icon2'=>get_admin_url()."assets/img/flag/".$sval->icon2,
				'score_1'=>$sval->score_1,
				'score_2'=>$sval->score_2,
			);

		}
		echo json_encode(array('obj'=>$data));
	}

}
