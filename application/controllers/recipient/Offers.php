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

        // $data["order"] = $this->db->select('*')
        //             			->from('orders')
			     //                ->where('delivery_status', 1)
			     //                ->order_by('delivery_date', "desc")
			     //                ->limit(10)
			     //                ->get()->result();

		$data['page_title']  = "Offers";
        $data['maincontent'] = 'recipient/offers/index';
        $this->load->view('includes/recipient_template', $data);
	}

	public function takeoffer($id = null){
		$data['username'] = $this->session->userdata('username');
		$offerId = $id;
		$userId = $this->session->userdata('userId');
		
		//check if user has already choosen this offer
		$checkOfferUserVoucher = $this->Offers_model->validateOfferUserVoucher($offerId, $userId);
		
		if($checkOfferUserVoucher){
			$this->session->set_flashdata('message', 'You have this offer already');
			redirect('recipient/offers/index');
		}else{

			//call the api for generating the voucher and returning the voucher_id
			$curl = curl_init();
	    	curl_setopt($curl, CURLOPT_URL,"http://localhost/voucher_pool/index.php/api/voucher/vouchers");
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    	curl_setopt($curl, CURLOPT_POST, 1);
	    	$voucherId = curl_exec ($curl);
	    	curl_close ($curl);
		
			$offerVoucher = $this->Offers_model->offerVoucher($offerId, $voucherId);
			//assigning generated voucher to the user and offer selected
			$offerUserVoucher = $this->Offers_model->offerUserVoucher($offerId, $voucherId, $userId);

			if($offerUserVoucher){
				$this->session->set_flashdata('message', 'Congratulation, offer has been accepted!');
				redirect('recipient/offers/myoffers');
			}else{
				$this->session->set_flashdata('message', 'Offer not accepted!');
				redirect('recipient/offers/index');
			}
		}
	}

	public function myoffers(){
		$data['username'] = $this->session->userdata('username');
		$userId = $this->session->userdata('userId');
		$data['myoffers'] = $this->Offers_model->myoffers($userId);
		$data['page_title']  = "Offers";
        $data['maincontent'] = 'recipient/offers/myoffers';
        $this->load->view('includes/recipient_template', $data);
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
}