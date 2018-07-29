<?php

Class Vouchers_model extends CI_Model{
	
	//function to generate and insert voucher into the database
	function generateVoucher($expiry_date = null){
		$insert_new_voucher = array(
			'code'=> uniqid(),
			'expiry_date'=> $expiry_date,
			'status'=> '1',
		);
	
		$insert = $this->db->insert('vouchers', $insert_new_voucher);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function verifyVoucher($voucher_code){
        $this->db->where('code', $voucher_code);
        $query = $this->db->get('vouchers');
        if ($query->num_rows() == 1){
            return true;
        }
    }
}