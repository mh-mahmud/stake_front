<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ErrorPage extends CI_Controller
{
	function __construct()
    {
        parent::__construct(); 
        if (empty($this->session->userdata('admin_data'))) {
            redirect('/');
        }
    }
}