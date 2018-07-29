<?php

Class Users_model extends CI_Model{
	
	//login model

	function get_recipient(){	
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('roles_id', '2');
        $query = $this->db->get('users'); 
		if ($query->num_rows() == 1){
			return $query->result();
		}
	}
	
	function get_admin(){
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('roles_id', '1');
        $query = $this->db->get('users');
		if ($query->num_rows() == 1){
			return $query->result();
		}
	}
		
	//adding m=new user in the database
	function createUser() {
		
		$insert_new_user = array(
				'name'=> $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'roles_id'=> '1',
                'password' =>md5('password')
		);
	
		$insert= $this->db->insert('users', $insert_new_user);
		return $insert;
	}

	function edit_users($id, $data){
		$username = $this->input->post('firstname').'.'.$this->input->post('lastname');
        $data = array(
            'name'=> $this->input->post('name'),
			'email'=> $this->input->post('email'),
			'roles_id'=> '1'
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('admin_users', $data);
    }

    //checking if user already exist
    function validateUser(){
        $this->db->where('name', $this->input->post('name'));
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('users');
        if ($query->num_rows() == 1){
            return true;
        }
    }

    function change_password($username){
		
        $data = array(
            'password' =>md5($this->input->post('password'))
        );

        $this->db->where('username', $this->input->post('username'));
        $this->db->update('admin_users', $data);
    }
}