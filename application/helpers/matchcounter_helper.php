<?php

 
// for sidebar counting
if (!function_exists('get_count_all_match')) {

	function get_count_all_match()
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_all_by_cat')) {

	function get_count_all_by_cat($id)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('sportscategory_id', $id);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_all_live_match')) {

	function get_count_all_live_match()
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('status', 1);
		$CI->db->where('active_status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_all_live_by_cat')) {

	function get_count_all_live_by_cat($id)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('sportscategory_id', $id);
		$CI->db->where('active_status', 1);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}


// for top bar counting
if (!function_exists('get_count_live_all')) {

	function get_count_live_all()
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('active_status', 1);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_adv_all')) {

	function get_count_adv_all()
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('active_status', 2);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_live_by_cat')) {

	function get_count_live_by_cat($id)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('sportscategory_id', $id);
		$CI->db->where('active_status', 1);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

if (!function_exists('get_count_adv_by_cat')) {

	function get_count_adv_by_cat($id)
	{
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('matchname');
		$CI->db->where('sportscategory_id', $id);
		$CI->db->where('active_status', 2);
		$CI->db->where('status', 1);
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->num_rows();
		}
		return '0';
	}
}

