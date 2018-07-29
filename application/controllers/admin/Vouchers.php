<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'controllers/Users.php';

class Vouchers extends Users {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //load offer model
		$this->load->model('Offers_model');
    }


	public function generated_vouchers(){
		$data['username'] = $this->session->userdata('username');
		$q = $this->db->select('*')->from('vouchers');
        $data['vouchers'] = $q->get()->result();

		$data['page_title']  = "Generated Vouchers";
        $data['maincontent'] = 'admin/vouchers/generated_voucher';
        $this->load->view('includes/admin_template', $data);
	}

	public function used_vouchers(){
		$data['username'] = $this->session->userdata('username');
		$data['vouchers'] = $this->Offers_model->used_voucher();
		$data['page_title']  = "Used Vouchers";
        $data['maincontent'] = 'admin/vouchers/used_vouchers';
        $this->load->view('includes/admin_template', $data);
	}
}