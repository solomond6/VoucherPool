<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
	}

	public function index(){
		// echo $this->config->item('api_key');exit;
		$data['page_title']  = "Admin Login";
		$this->load->view('login', $data);
	}


	function createUser(){
		$data['username'] = $this->session->userdata('username');
		
		//fieldname, error message, validation rules
		$this->form_validation->set_rules('name', 'Fullname', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		if($this->form_validation->run() == FALSE)
		{
			$data['page_title']  = "Signup";
			$this->load->view('signup', $data);
		}
		else
		{	
			$this->load->model('Users_model');
			if ($qyury_validate = $this->Users_model->validateUser()){
				$this->session->set_flashdata('message','User already registered.');
				$this->load->view('signup', $data);
			}
			else{
				if($query = $this->Users_model->createUser())
				{
					$data['page_title']  = "Signup";
					$this->session->set_flashdata('message', 'Signup Successfull.');
					redirect('login');
				}
				else{
					$this->session->set_flashdata('message', 'User not created');
					redirect('signup');
				}	
			}
		}
	}

	//function for the login
	function validate_credentials(){
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
    	$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$data['page_title']  = "Admin Login";
			$this->load->view('login', $data);
		}else{
			$this->load->model('Users_model');
			$query_recipient = $this->Users_model->get_recipient();
			$query_admin = $this->Users_model->get_admin();

			if($query_recipient)
			{
				$data = array(
						'username'=> $query_recipient[0]->name,
						'userId'=> $query_recipient[0]->id,
	                    'is_logged_in' => true
						);
				$this->session->set_userdata($data);
	            redirect('users/recipient');
			}elseif($query_admin){
				$data = array(
						'username'=> $this->input->post('email'),
						'userId'=> $query_recipient[0]->id,
	                    'is_logged_in' => true
						);
				$this->session->set_userdata($data);
	            redirect('users/admin');
			}else{
	            $this->session->set_flashdata('message', 'Incorrect Username/Password.');
	            $this->index();
			}
		}
	}

}