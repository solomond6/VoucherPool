<?php
Class Users extends CI_Controller{

	public $data 	= 	array();
	
	function __construct(){
		 parent::__construct();
		$this->is_logged_in();
	}
	
	function recipient(){
		$this->load->helper('date');
		$data['username'] = $this->session->userdata('username');
		$q = $this->db->select('*')->from('offers');
        $data['offers'] = $q->get()->result();
		$data['maincontent'] = 'recipient/offers/index';
		$this->load->view('includes/recipient_template', $data);
	}
	
	function admin(){
		$this->load->helper('date');
		$data['username'] = $this->session->userdata('username');
		$q = $this->db->select('*')->from('offers');
        $data['offers'] = $q->get()->result();
		$data['maincontent'] = 'admin/offers/index';
		$this->load->view('includes/admin_template', $data);
	}

	//to check if the user is logged in or cookies cleared
	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
        $this->session->sess_expire_on_close = TRUE;
        $this->session->sess_expiration = 1800;
        if(!$this->session->userdata('is_logged_in') && !strstr(current_url(),'login/')){
            redirect('login/index');
        }

		if(!isset($is_logged_in) || $is_logged_in !=true ){
            redirect('login/index');
            die();
		}
	}
}