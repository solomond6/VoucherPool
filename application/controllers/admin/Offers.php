<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'controllers/Users.php';

class Offers extends Users {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        //load offer model
		$this->load->model('Offers_model');
    }

	public function index(){
		$data['username'] = $this->session->userdata('username');
		$q = $this->db->select('*')->from('offers');
        $data['offers'] = $q->get()->result();

		$data['page_title']  = "Offers";
        $data['maincontent'] = 'admin/offers/index';
        $this->load->view('includes/admin_template', $data);
	}

	public function add(){
		$data['username'] = $this->session->userdata('username');
		
		$this->form_validation->set_rules('name', 'Offer Name', 'trim|required');
		$this->form_validation->set_rules('discount', 'Percentage Discount', 'trim|required');
		$this->form_validation->set_rules('description', 'Product Code', 'trim');

		if($this->form_validation->run() == FALSE){
			$data['page_title']  = "New Offer";
			$data['maincontent'] = 'admin/offers/add';
			$this->load->view('includes/admin_template', $data);
		}else{	
			$this->load->model('Offers_model');
			if ($qyury_validate = $this->Offers_model->validateOffer()){
				$this->session->set_flashdata('message', 'Offer Already Exist');
				$data['page_title']  = "Add New Offer";
				$data['maincontent'] = 'admin/offers/add';
				$this->load->view('includes/admin_template', $data);
			}else{
				if($query = $this->Offers_model->addoffer()){
					$this->session->set_flashdata('message', 'Offer Added Successfully');
					redirect('admin/offers/index');
				}else{
					$this->session->set_flashdata('message', 'An error as occured');
					redirect('admin/offers/index');
				}	
			}
		}
	}

	public function recipients(){
		$data['username'] = $this->session->userdata('username');
		$data['vouchers'] = $this->Offers_model->used_voucher();
		$data['page_title']  = "All Recipients";
        $data['maincontent'] = 'admin/offers/recipients';
        $this->load->view('includes/admin_template', $data);
	}

	public function generated_voucher(){
		$data['username'] = $this->session->userdata('username');
		$q = $this->db->select('*')->from('vouchers');
        $data['vouchers'] = $q->get()->result();

		$data['page_title']  = "Vouchers";
        $data['maincontent'] = 'admin/offers/generated_voucher';
        $this->load->view('includes/admin_template', $data);
	}
}