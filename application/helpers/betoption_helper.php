<?php
 

defined('BASEPATH') OR exit('No direct script access allowed');


if (!function_exists('get_sports_cat_name')) {

	function get_sports_cat_name($id)
	{
		$CI =& get_instance();
		$CI->db->select('name');
		$CI->db->from('sportscategory');
		$CI->db->where('id', $id);
		$CI->db->order_by("id", "desc");
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->row()->name;
		}
		return 0;
	}
}
if (!function_exists('get_sports_cat_image')) {

	function get_sports_cat_image($id)
	{
		$CI =& get_instance();
		$CI->db->select('image');
		$CI->db->from('sportscategory');
		$CI->db->where('id', $id);
		$CI->db->order_by("id", "desc");
		$query = $CI->db->get();
		if (!empty($query->row())) {
			return $query->row()->image;
		}
		return 0;
	}
}
