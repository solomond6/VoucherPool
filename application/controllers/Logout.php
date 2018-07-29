<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Users.php';

class Logout extends Users {
	
	function __construct(){
		
		parent::__construct();
	}

	public function index()
	{
		$this->session->unset_userdata('is_logged_in');
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
}